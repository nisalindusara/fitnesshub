# CSS migration status

Tracks the `refactor/css-structure` work: moving inline `<style>` blocks into
`public/assets/css/`. Updated with every commit on that branch.

## Done

- **Landing (landing-layout.php, minimal.php)**: migrated. 26 of 26 views have no inline `<style>`.
- **Member (member-layout.php)**: migrated. 25 of 25 views have no inline `<style>`.
- **Staff (staff-layout.php)**: migrated. 49 of 49 views have no inline `<style>`.

## Views that still have a `<style>` block

None.
Layouts with a `<style>` block: none.
Views that link a stylesheet from `<body>`: none.

## Conventions

- **Load order.** `partials/_stylesheets.php` links `tokens.css`, then the surface file
  (`landing.css`, `member.css` or `staff.css`), then each entry in the view's `$pageStyles`
  in order: kits first, the page file last. Every URL gets `?v=<filemtime>`.
- **`tokens.css`** holds raw values only (`--fh-` prefix). Surface files add meaning on top.
  Colours, radii and font families always use `var(--fh-…)`. Sizes, spacing and shadow
  geometry stay literal in page files.
- **Rule of two.** A rule used identically by 2+ pages goes to the surface file, or to a
  module kit `pages/<surface>/<module>/_<kit>.css` when every user is in that module folder.
- **Page files** live at `pages/<surface>/<view path>.css`, mirroring `app/views/`, and hold
  only what is unique to that page.
- **Scoping.** `Controller::render()` sets `$pageClass` from the view path (`landing/cart` →
  `page-landing-cart`) and layouts put it on `<main>`. Page rules use
  `:where(.page-…) selector`, so specificity is unchanged.
- **`$bodyClass`.** Rules that also style the layout chrome, `<body>` or `<html>` are scoped
  under `body.page-…--global`, which the view sets in `$bodyClass`. They are listed in
  `docs/css-followups.md`.
- **Partials** append to `$pageStyles` (`$pageStyles[] = …`) and never reassign it.
- **No visual changes** in this branch. Anything that would change rendering goes to
  `docs/css-followups.md`.

## Next step

Phase 5: remove dead CSS and unused files, and update `public/README.md`.
