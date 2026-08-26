<?php

require_once __DIR__ . '/../core/Model.php';
require_once __DIR__ . '/../contracts/NavItemRepositoryInterface.php';

/**
 * Concrete, PDO-backed implementation of nav item data access.
 *
 * Like Role, this class knows nothing about permissions logic or who's
 * allowed to see what — it only returns rows. NavService is the DIP
 * consumer that turns "a flat list of rows" into "the tree this session
 * is allowed to see."
 */
class NavItem extends Model implements NavItemRepositoryInterface
{
    public function getAllOrdered(): array
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM nav_items ORDER BY section, sort_order'
        );
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
