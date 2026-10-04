# public

The **web root**.

This is the only folder the web server serves directly, and the one the VirtualHost `DocumentRoot` points to (`http://fitnesshub.local`).

Everything else in the repository (`app/`, `config/`, `database/`, `storage/`) sits outside it, so it can never be requested by URL.

```
public/
├── assets/
│   ├── css/                Stylesheets
│   ├── js/                 Vanilla JavaScript
│   └── images/             Static images
└── uploads/                User-uploaded files that are served publicly
├── .htaccess               Route all web traffic to index.php
├── index.php               Every request enters the application here
```

## Assets

### CSS

```
css/
├── tokens.css          Raw design values for every surface
├── landing.css         Public site, sign-in, onboarding, error pages
├── member.css          Member app
├── staff.css           Staff portal (all staff roles, including instructors)
└── pages/
    └── <surface>/<view path>.css      One file per view, mirroring app/views/
        <surface>/<module>/_<kit>.css  Shared by several views in one module
```

**Why three layers.** Values, shared surface styles and page styles change
at different rates and for different reasons:

- **`tokens.css`** holds raw values only, with the `--fh-` prefix. Colours
  are named after the Tailwind step they sit on, e.g. `--fh-gray-500`. An
  odd step such as `--fh-red-520` marks a value that drifted from that
  scale. Converging it is a one-line change here.
- **Surface files** give those values meaning and hold the layout chrome,
  plus any rule used by two or more views across modules.
- **Kits** (`_<kit>.css`) hold rules shared only within one module, so they
  don't load on every page of the surface.
- **Page files** hold only what is unique to one view.

**Rules for writing CSS here:**

- Colours, radii and font families always use `var(--fh-…)`, so they can
  be changed in one place. Sizes and spacing stay literal in page files.
- Never redefine a token in a page file.
- If a rule is needed by a second view, move it up to a kit or to the
  surface file instead of copying it.

**Load order.** `app/views/partials/_stylesheets.php` links `tokens.css`,
then the surface file, then each entry of `$pageStyles`. Later files win
ties, so page CSS can override shared CSS without raising specificity.
Every URL gets `?v=<filemtime>`, so browsers refetch a file as soon as it
changes.

**In a view:**

```php
<?php $pageStyles = ['staff/ecommerce_module/_product-header', 'staff/ecommerce_module/product-grid']; ?>
```

List kits first and the page file last. Paths are relative to
`css/pages/` and have no extension. Letter case must match the file
exactly, because Linux hosts are case-sensitive. A partial that is
included into a view appends instead (`$pageStyles[] = '…';`), so it
doesn't wipe the view's list.

**Scoping.** `Controller::render()` sets `$pageClass` from the view path
(`ecommerce_module/product-grid` → `page-ecommerce-module-product-grid`),
and every layout puts it on `<main>`. Page files prefix their selectors
with `:where(.page-…)`. That stops page CSS from leaking into other pages
or the layout chrome, and `:where()` adds no specificity.

**`$bodyClass`** is for the few page rules that must also reach the layout
chrome, `<body>` or `<html>`, such as old `* { margin: 0 }` resets. The
view sets `$bodyClass = 'page-…--global'`, and those rules are scoped under
`body.page-…--global`. Each use is listed in `docs/css-followups.md`
as something to remove later.

### Images

| Folder              | Holds                     |
| ------------------- | ------------------------- |
| `images/dashboard/` | Images used on dashboards |
| `images/icons/`     | Icons                     |
| `images/landing/`   | Landing page images       |
