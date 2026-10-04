# routes

One file per module registers that module's URLs. `public/index.php` loads them all.

## Naming URLs

URLs are grouped by who uses them, and are lowercase kebab-case.

| Prefix      | Who                                  | Permission on the route           | Examples                                          |
| ----------- | ------------------------------------ | --------------------------------- | ------------------------------------------------- |
| `/`         | Anyone (marketing, store, sign-up)   | none                              | `/classes`, `/store/cart`, `/onboarding/class`    |
| `/member/*` | Logged-in members                    | `'@member'`                       | `/member/profile/orders`, `/member/messages`      |
| `/portal/*` | Staff, instructors included          | a permission key, e.g. `'manage_orders'` | `/portal/orders/view`, `/portal/clients`   |
| `/api/*`    | JSON endpoints called from page JS   | same as the page that calls it    | `/api/messages/send`, `/api/members/search`       |

- Use the plural noun for a list and a verb or noun below it for the rest:
  `/portal/orders`, `/portal/orders/create`, `/portal/orders/view?id=3`.
- Pass record ids as query strings (`?id=`, `?member=`); the router matches exact paths only.
- A form that submits and then redirects posts to a `/portal/...` or `/member/...` path.
  An endpoint that answers with JSON lives under `/api/`.
- Every staff route needs a permission, and the staff nav item that links to it must use the same one
  (see `app/views/layouts/staff-layout.php`), so nobody sees a link that leads to a 403.

## Adding a page

1. Register the route in this module's file, with its permission.
2. Link to it from the nav (`staff-layout.php` / `member-layout.php`) or from a page that leads there.
3. Check no link still points at an old path when you rename one.
