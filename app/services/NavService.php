<?php

require_once __DIR__ . '/../contracts/NavItemRepositoryInterface.php';

/**
 * The only place that turns "a flat nav_items table + a session's permission
 * keys" into "the nav tree this session should render."
 *
 * Depends on NavItemRepositoryInterface, not the concrete NavItem class —
 * same DIP boundary as AuthorizationService/RoleRepositoryInterface.
 *
 * Collapse rule (deliberate, not a role check):
 * - A parent with 0 visible children is omitted entirely.
 * - A parent with exactly 1 visible child is replaced by that child —
 *   the child's own label/icon/route stand in for the parent.
 * - A parent with 2+ visible children renders as a dropdown.
 * This means adding a new split module (Members, Classes, etc. per the
 * project's open question) needs zero changes here — only nav_items rows.
 */
class NavService
{
    private NavItemRepositoryInterface $navItemRepository;

    public function __construct(NavItemRepositoryInterface $navItemRepository)
    {
        $this->navItemRepository = $navItemRepository;
    }

    /**
     * @param array $sessionPermissions Permission keys from $_SESSION['permissions']
     * @return array Nav tree grouped by section, ready for the sidebar partial
     */
    public function getVisibleNavForSession(array $sessionPermissions): array
    {
        $allItems = $this->navItemRepository->getAllOrdered();

        $topLevel = array_values(array_filter(
            $allItems,
            fn($item) => $item['parent_id'] === null
        ));

        $childrenByParent = [];
        foreach ($allItems as $item) {
            if ($item['parent_id'] !== null) {
                $childrenByParent[$item['parent_id']][] = $item;
            }
        }

        $visible = [];

        foreach ($topLevel as $item) {
            $itemChildren = $childrenByParent[$item['id']] ?? [];

            // Leaf item — no children exist in the tree at all
            if (empty($itemChildren)) {
                if (
                    $item['permission'] !== null
                    && in_array($item['permission'], $sessionPermissions, true)
                ) {
                    $visible[] = $item + ['type' => 'link'];
                }
                continue;
            }

            // Parent item — filter its children by permission
            $visibleChildren = array_values(array_filter(
                $itemChildren,
                fn($child) => in_array($child['permission'], $sessionPermissions, true)
            ));

            if (count($visibleChildren) > 1) {
                $visible[] = $item + ['type' => 'dropdown', 'children' => $visibleChildren];
            } elseif (count($visibleChildren) === 1) {
                // The single visible child fully replaces the parent
                $visible[] = $visibleChildren[0] + ['type' => 'link'];
            }
            // 0 visible children → parent omitted entirely
        }

        return $this->groupBySection($visible);
    }

    private function groupBySection(array $items): array
    {
        $grouped = [];
        foreach ($items as $item) {
            $grouped[$item['section']][] = $item;
        }
        return $grouped;
    }
}
