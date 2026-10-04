# CSS follow-ups

Work deliberately left out of the CSS restructure (`refactor/css-structure`).
That branch only changes how CSS is organised and loaded; everything here
would change how a page looks or behaves, so each item needs its own decision
and its own commit.

## 1. Colour convergence

`public/assets/css/tokens.css` keeps every colour that renders today. Values
within 3 RGB units per channel were merged during the restructure; the
clusters below differ visibly and were not.

Converging a token is a one-line change in `tokens.css`, for example
`--fh-red-520: var(--fh-red-500);`. Once nothing references the old name,
it can be deleted.

Counts are declarations across view `<style>` blocks and the shared CSS
files, measured before the restructure. "Files" counts views and shared
stylesheets.

The agreed design-system values are defined but not yet used:
`--fh-brand-red` (#ED1C24), `--fh-ink-black` (#171717),
`--fh-status-{active,suspended,inactive}-{bg,fg}`, `--fh-radius-card` (16px)
and `--fh-font-ui` (Inter).

### Brand reds — 3 tokens, 98 uses

| Token | Value | Uses | Files | Surfaces | Used for |
|---|---|---|---|---|---|
| `--fh-red-590` | `#e31837` | 80 | 19 | landing 73, staff 5 | text/background |
| `--fh-red-680` | `#c2122d` | 14 | 13 | landing 12, staff 1 | background/variable |
| `--fh-red-560` | `#ed1c24` | 4 | 3 | staff 4 | text/background |

### Danger / error reds — 28 tokens, 101 uses

| Token | Value | Uses | Files | Surfaces | Used for |
|---|---|---|---|---|---|
| `--fh-red-710` | `#b42318` | 19 | 7 | staff 19 | text/background |
| `--fh-red-520` | `#e5484d` | 14 | 5 | staff 14 | background/text |
| `--fh-red-600` | `#dc2626` | 10 | 8 | staff 8, member 2 | text/background |
| `--fh-red-605` | `#d92d20` | 7 | 6 | staff 7 | text |
| `--fh-red-670` | `#c0262d` | 6 | 2 | staff 6 | text/background |
| `--fh-red-620` | `#d3272c` | 5 | 5 | member 5 | background |
| `--fh-red-540` | `#e53e3e` | 5 | 4 | staff 5 | text/border |
| `--fh-red-650` | `#c62828` | 3 | 3 | member 3 | variable |
| `--fh-red-690` | `#ba1f24` | 3 | 3 | member 3 | background |
| `--fh-red-565` | `#d74444` | 3 | 2 | staff 3 | background/text |
| `--fh-red-500` | `#ef4444` | 3 | 3 | staff 2, member 1 | border/variable |
| `--fh-red-700` | `#b91c1c` | 3 | 3 | member 3 | text/background |
| `--fh-red-820` | `#912018` | 2 | 2 | staff 2 | background |
| `--fh-red-595` | `#e2231c` | 2 | 1 | member 2 | background |
| `--fh-red-430` | `#f56565` | 2 | 1 | staff 2 | border/text |
| `--fh-red-505` | `#e84d4f` | 2 | 1 | staff 2 | background/border |
| `--fh-red-400` | `#f87171` | 1 | 1 | staff 1 | background |
| `--fh-red-525` | `#e24949` | 1 | 1 | staff 1 | text |
| `--fh-rose-600` | `#e11d48` | 1 | 1 | member 1 | text |
| `--fh-red-610` | `#d32f2f` | 1 | 1 | member 1 | variable |
| `--fh-red-740` | `#a82323` | 1 | 1 | member 1 | variable |
| `--fh-red-660` | `#c91c16` | 1 | 1 | member 1 | background |
| `--fh-red-770` | `#a11f25` | 1 | 1 | staff 1 | background |
| `--fh-red-585` | `#e0252e` | 1 | 1 | staff 1 | background |
| `--fh-red-490` | `#e65355` | 1 | 1 | staff 1 | border |
| `--fh-red-550` | `#d74749` | 1 | 1 | staff 1 | text |
| `--fh-red-545` | `#df4548` | 1 | 1 | staff 1 | text |
| `--fh-rose-620` | `#c63e40` | 1 | 1 | staff 1 | text |

### Ink (dark neutrals) — 22 tokens, 507 uses

| Token | Value | Uses | Files | Surfaces | Used for |
|---|---|---|---|---|---|
| `--fh-neutral-870` | `#1c1c1c` | 169 | 25 | staff 159, landing 8, member 1 | text/background |
| `--fh-neutral-950` | `#0a0a0a` | 83 | 22 | landing 79, member 4 | text/background |
| `--fh-gray-900` | `#111827` | 59 | 19 | staff 29, member 29 | text/background |
| `--fh-gray-740` | `#2d3748` | 58 | 6 | staff 58 | text/background |
| `--fh-gray-850` | `#1a202c` | 28 | 7 | staff 28 | text/background |
| `--fh-neutral-930` | `#111111` | 22 | 6 | member 22 | text/background |
| `--fh-gray-800` | `#1f2937` | 19 | 5 | staff 19 | text/background |
| `--fh-zinc-900` | `#18181b` | 14 | 9 | member 13 | variable/border |
| `--fh-slate-800` | `#1e293b` | 9 | 3 | staff 9 | text/background |
| `--fh-zinc-780` | `#292c33` | 8 | 3 | staff 8 | background/border |
| `--fh-zinc-805` | `#24272d` | 7 | 3 | staff 7 | text/background |
| `--fh-neutral-780` | `#2b2b2b` | 7 | 5 | member 3, staff 2 | background/variable |
| `--fh-neutral-750` | `#333333` | 7 | 7 | staff 6, member 1 | background |
| `--fh-slate-850` | `#172033` | 3 | 1 | staff 3 | text |
| `--fh-neutral-830` | `#222222` | 2 | 2 | member 2 | text |
| `--fh-neutral-900` | `#171717` | 1 | 1 | staff 1 | variable |
| `--fh-red-960` | `#281715` | 6 | 1 | staff 6 | text (dark brown, filed under red by hue) |
| `--fh-zinc-870` | `#1c1d21` | 1 | 1 | member 1 | variable |
| `--fh-zinc-740` | `#33353b` | 1 | 1 | member 1 | background |
| `--fh-gray-930` | `#0a0f1a` | 1 | 1 | staff 1 | background |
| `--fh-slate-770` | `#273142` | 1 | 1 | staff 1 | text |
| `--fh-neutral-910` | `#151515` | 1 | 0 |  | variable |

### Muted text greys — 32 tokens, 330 uses

| Token | Value | Uses | Files | Surfaces | Used for |
|---|---|---|---|---|---|
| `--fh-gray-400` | `#9ca3af` | 62 | 25 | landing 24, staff 23, member 15 | text/background |
| `--fh-slate-380` | `#a0aec0` | 52 | 7 | staff 52 | text |
| `--fh-gray-500` | `#6b7280` | 39 | 16 | staff 21, member 17 | text/variable |
| `--fh-slate-600` | `#475569` | 27 | 10 | staff 26, member 1 | text/background |
| `--fh-gray-600` | `#4b5563` | 25 | 11 | landing 18, staff 5, member 1 | text/variable |
| `--fh-slate-470` | `#718096` | 23 | 5 | staff 23 | text |
| `--fh-slate-510` | `#667085` | 15 | 7 | staff 15 | text/border |
| `--fh-slate-405` | `#98a2b3` | 14 | 7 | staff 14 | text |
| `--fh-slate-500` | `#64748b` | 13 | 8 | staff 7, member 6 | text/variable |
| `--fh-slate-400` | `#94a3b8` | 8 | 3 | staff 8 | text/background |
| `--fh-neutral-460` | `#888888` | 6 | 5 | member 5, staff 1 | text |
| `--fh-gray-430` | `#8b93a1` | 6 | 3 | staff 6 | text |
| `--fh-neutral-540` | `#666666` | 5 | 5 | member 4, staff 1 | text |
| `--fh-slate-420` | `#8c9bab` | 4 | 1 | staff 4 | text |
| `--fh-neutral-490` | `#777777` | 4 | 4 | member 4 | text |
| `--fh-slate-560` | `#526277` | 4 | 1 | staff 4 | text/background |
| `--fh-neutral-400` | `#a3a3a3` | 3 | 1 | staff 3 | text |
| `--fh-neutral-590` | `#555555` | 2 | 2 | member 2 | text |
| `--fh-neutral-420` | `#999999` | 2 | 1 | member 2 | text |
| `--fh-neutral-520` | `#6b6b6b` | 2 | 1 | staff 2 | text |
| `--fh-neutral-370` | `#b0b0b0` | 2 | 2 | staff 2 | border/variable |
| `--fh-gray-350` | `#b8bdc6` | 2 | 2 | member 2 | border/text |
| `--fh-gray-390` | `#a3a9b4` | 2 | 1 | member 2 | text |
| `--fh-slate-340` | `#adc3d1` | 1 | 1 | staff 1 | background |
| `--fh-zinc-440` | `#8a8f98` | 1 | 1 | staff 1 | variable |
| `--fh-zinc-510` | `#6a6d75` | 1 | 1 | member 1 | variable |
| `--fh-slate-430` | `#8b95a7` | 1 | 1 | staff 1 | text |
| `--fh-gray-420` | `#929bab` | 1 | 1 | staff 1 | text |
| `--fh-gray-460` | `#7d8898` | 1 | 1 | staff 1 | text |
| `--fh-gray-560` | `#536071` | 1 | 1 | staff 1 | text |
| `--fh-slate-475` | `#778397` | 1 | 1 | staff 1 | text |
| `--fh-neutral-550` | `#616161` | 0 | 0 |  | - |

### Muted text: translucent staff ink — 14 tokens, 180 uses

| Token | Value | Uses | Files | Surfaces | Used for |
|---|---|---|---|---|---|
| `--fh-neutral-870-a50` | `rgba(28,28,28,0.5)` | 48 | 17 | staff 46, landing 2 | text/variable |
| `--fh-neutral-870-a40` | `rgba(28,28,28,0.4)` | 33 | 15 | staff 33 | text/border |
| `--fh-neutral-870-a45` | `rgba(28,28,28,0.45)` | 28 | 11 | staff 28 | text |
| `--fh-neutral-870-a55` | `rgba(28,28,28,0.55)` | 16 | 9 | staff 16 | text |
| `--fh-neutral-870-a60` | `rgba(28,28,28,0.6)` | 15 | 9 | staff 15 | text |
| `--fh-neutral-870-a30` | `rgba(28,28,28,0.3)` | 11 | 9 | staff 11 | text |
| `--fh-neutral-870-a35` | `rgba(28,28,28,0.35)` | 9 | 8 | staff 9 | text/background |
| `--fh-neutral-870-a70` | `rgba(28,28,28,0.7)` | 9 | 8 | staff 9 | text |
| `--fh-neutral-870-a65` | `rgba(28,28,28,0.65)` | 5 | 3 | staff 5 | text |
| `--fh-neutral-870-a75` | `rgba(28,28,28,0.75)` | 2 | 2 | staff 2 | text |
| `--fh-neutral-870-a25` | `rgba(28,28,28,0.25)` | 1 | 1 | staff 1 | text |
| `--fh-neutral-870-a48` | `rgba(28,28,28,0.48)` | 1 | 1 | staff 1 | text |
| `--fh-neutral-870-a46` | `rgba(28,28,28,0.46)` | 1 | 1 | staff 1 | text |
| `--fh-neutral-870-a62` | `rgba(28,28,28,0.62)` | 1 | 1 | staff 1 | text |

### Borders (light greys) — 21 tokens, 203 uses

| Token | Value | Uses | Files | Surfaces | Used for |
|---|---|---|---|---|---|
| `--fh-gray-200` | `#e5e7eb` | 81 | 33 | staff 37, landing 27, member 16 | border/background |
| `--fh-gray-300` | `#d1d5db` | 33 | 22 | staff 19, member 10, landing 4 | border/text |
| `--fh-slate-200` | `#e2e8f0` | 20 | 12 | staff 20 | border/background |
| `--fh-slate-300` | `#cbd5e1` | 19 | 9 | staff 18, member 1 | border/background |
| `--fh-gray-160` | `#eaecf0` | 19 | 15 | member 10, staff 9 | border/variable |
| `--fh-neutral-300` | `#d4d4d4` | 6 | 2 | staff 6 | border/background |
| `--fh-gray-230` | `#dfe2e7` | 4 | 3 | member 2, staff 2 | variable/border |
| `--fh-gray-280` | `#d6d9df` | 4 | 4 | member 2, staff 2 | background/border |
| `--fh-neutral-200` | `#e5e5e5` | 3 | 2 | staff 3 | border/background |
| `--fh-neutral-250` | `#dddddd` | 2 | 2 | member 1, staff 1 | border |
| `--fh-slate-220` | `#dfe4eb` | 2 | 1 | staff 2 | border |
| `--fh-gray-320` | `#c9cdd4` | 1 | 1 | member 1 | border |
| `--fh-neutral-220` | `#e2e2de` | 1 | 1 | member 1 | variable |
| `--fh-neutral-330` | `#c5c5c0` | 1 | 1 | member 1 | border |
| `--fh-gray-330` | `#c3c7cf` | 1 | 1 | member 1 | text |
| `--fh-gray-325` | `#c4cad3` | 1 | 1 | staff 1 | text |
| `--fh-slate-180` | `#e6eaf0` | 1 | 1 | staff 1 | border |
| `--fh-slate-150` | `#e9eff7` | 1 | 1 | staff 1 | background |
| `--fh-slate-310` | `#c7d2e0` | 1 | 1 | staff 1 | border |
| `--fh-neutral-170` | `#e9e9e9` | 1 | 0 |  | variable |
| `--fh-neutral-310` | `#cfcfcf` | 1 | 0 |  | variable |

### Borders: translucent staff ink — 10 tokens, 172 uses

| Token | Value | Uses | Files | Surfaces | Used for |
|---|---|---|---|---|---|
| `--fh-neutral-870-a12` | `rgba(28,28,28,0.12)` | 42 | 11 | staff 42 | border |
| `--fh-neutral-870-a08` | `rgba(28,28,28,0.08)` | 32 | 16 | staff 32 | border/background |
| `--fh-neutral-870-a06` | `rgba(28,28,28,0.06)` | 29 | 12 | staff 29 | background/border |
| `--fh-neutral-870-a10` | `rgba(28,28,28,0.1)` | 26 | 14 | staff 25, member 1 | border/background |
| `--fh-neutral-870-a05` | `rgba(28,28,28,0.05)` | 16 | 10 | staff 14, landing 2 | background/border |
| `--fh-neutral-870-a20` | `rgba(28,28,28,0.2)` | 11 | 8 | staff 11 | text/border |
| `--fh-neutral-870-a07` | `rgba(28,28,28,0.07)` | 5 | 4 | staff 5 | border/background |
| `--fh-neutral-870-a15` | `rgba(28,28,28,0.15)` | 5 | 3 | staff 5 | border |
| `--fh-neutral-870-a14` | `rgba(28,28,28,0.14)` | 4 | 2 | staff 4 | border |
| `--fh-neutral-870-a04` | `rgba(28,28,28,0.04)` | 2 | 1 | staff 2 | background |

### Backgrounds (near-white) — 8 tokens, 620 uses

| Token | Value | Uses | Files | Surfaces | Used for |
|---|---|---|---|---|---|
| `--fh-white` | `#ffffff` | 368 | 92 | staff 197, landing 88, member 82 | background/text |
| `--fh-gray-50` | `#f9fafb` | 92 | 47 | staff 76, landing 10, member 6 | background/variable |
| `--fh-gray-100` | `#f3f4f6` | 76 | 35 | member 37, staff 30, landing 8 | background/border |
| `--fh-slate-120` | `#edf2f7` | 44 | 11 | staff 44 | border/background |
| `--fh-neutral-130` | `#f0f0f0` | 36 | 21 | member 23, staff 13 | border/background |
| `--fh-slate-90` | `#f4f6fb` | 2 | 2 | staff 2 | background |
| `--fh-neutral-120` | `#f1f1f1` | 1 | 1 | staff 1 | background |
| `--fh-neutral-80` | `#f7f7f7` | 1 | 1 | staff 1 | background |

## 2. Other visual differences found during the audit

- **Undefined variables in `portals.css`.** `--brand-red`, `--success-green`,
  `--warning-amber` and `--neutral-gray` are used for status text but never
  defined, so that text renders in the inherited colour. Point them at the
  status tokens once the status colours are agreed.
- **Fonts used but not loaded.** Each renders as its fallback today:
  - The member layout sets `'DM Sans'` on `.main-content`, but only Plus
    Jakarta Sans is loaded.
  - The staff layout loads Inter 400 and 500, but staff pages use 600 and
    700, so the browser fakes the bold.
  - `minimal.php` sets `font-family: 'Inter'` but loads only Barlow.
  - One staff page uses `'Arimo'`, which is never loaded.
- **Font stacks merged during the restructure.** Stacks that share a primary
  font were merged (for example `'Barlow', sans-serif` into the longer Barlow
  stack). They differ only if the web font fails to load. Worth checking for
  the offline PWA case.
- **Inline `style=""` attributes.** About 300 in total, mostly in
  `landing/about.php` (101), `analytics_module/member_analytics.php` (36) and
  `staff/dashboard/_manager-summary.php` (34).
- **Minimal layout font fallback.** `minimal.php` set `'Inter', sans-serif`
  on `body`/`main`; it now uses `--fh-font-inter` (`"Inter", Arial,
  sans-serif`). Inter isn't loaded there, so text falls back to Arial instead
  of the generic sans-serif. That's identical on Windows and Android but may
  differ on macOS (Helvetica).
- **Onboarding images that never load.** The CSS for
  `onboarding/membership/*` uses relative `url('image_xxxxxx.png')` paths.
  No such files exist, so they failed before the restructure and still fail.
- **JS that hardcodes colours.** `hero-slider.js` and `programs-accordian.js`
  hardcode `#E31837`.

## 3. Bugs outside CSS

- **Case-sensitive view path.** `communication_module/Instructor_profile_view.php`
  is rendered as `instructor_profile_view`. It works only on case-insensitive
  filesystems (Windows/macOS) and will fail on a Linux host.
- **Stray markup.** `layouts/member-layout.php` has a stray `</form>` in the
  header.
- **Dead JS.** Nothing references `public/assets/js/hero-slider.js` or
  `public/assets/js/programs-accordian.js`.

## 4. Pages whose CSS reaches outside their own content (`$bodyClass`)

Page CSS is scoped under the page class on the layout's `<main>`
(`:where(.page-…)`). Some rules styled the layout chrome, `<body>` or
`<html>` when they were inline, for example `* { margin: 0 }` resets or an
`img` rule that also hit the nav logo. To keep that effect, those rules are
scoped under a body class instead, which the view sets in `$bodyClass`
(`:where()` keeps the original specificity). Each one is a candidate for
scoping down to the page once the chrome no longer depends on it.

| Page | Rules scoped to `<body>` | Body class |
|---|---|---|
| landing/about | `*`, `body`, `img` (also the nav and footer logos) | `page-landing-about--global` |
| landing/cart | `*`, `body` | `page-landing-cart--global` |
| landing/contact | `*`, `body` | `page-landing-contact--global` |
| landing/eCom-catalogue | `*`, `body` | `page-landing-ecom-catalogue--global` |
| landing/eCom-landing | `*`, `body` | `page-landing-ecom-landing--global` |
| landing/ecommerce-checkout | `*`, `body` | `page-landing-ecommerce-checkout--global` |
| landing/sample-product | `*`, `body` | `page-landing-sample-product--global` |

The minimal layout's own `body`/`main` rules (formerly the `<style>` blocks
in `minimal.php`) sit in `landing.css` under `body.layout-minimal`, a fixed
class on that layout.

## 5. Pages that repeat a shared rule

When rules repeated across pages moved into surface files and kits (see
`refactor/css-structure`), these pages kept their own copy as well. Each
page has an earlier rule of equal specificity that matches the same
elements and sets an overlapping property. Loading the shared copy first
would let that earlier rule win, so the page repeats the rule to keep the
original order. Reorder or merge the page rules, then delete the copy.

| Page | Repeated rule(s) | Shared file |
|---|---|---|
| landing/sample-product | `.product-card-title a`, `.product-card-title a:hover` | `landing/landing/_store` |
| onboarding/browse-plans | `.btn-skip`, `.content-section` (base and media query) | `landing/onboarding/_onboarding` |
| onboarding/start | `.content-section` (base and media query) | `landing/onboarding/_onboarding` |
| onboarding/view-classes | `.btn-skip`, `.content-section` (base and media query) | `landing/onboarding/_onboarding` |
| onboarding/view-store | `.btn-skip`, `.content-section` (base and media query) | `landing/onboarding/_onboarding` |
| analytics_module/member_analytics | `.mini-bar--blank` | `member.css` |
| member/dashboard | `.mini-bar--blank` | `member.css` |
| class_pt_module/classes/create | `.cls-primary` | `staff/class_pt_module/classes/_classes` |
| class_pt_module/classes/show | `.cls-primary` | `staff/class_pt_module/classes/_classes` |
| class_pt_module/sessions/index | `.cs-footer` | `staff/class_pt_module/sessions/_sessions` |

These two pages repeated a `portals.css` rule (now in `staff.css`) even
before the restructure:

| Page | Repeated rule | Shared file |
|---|---|---|
| payment_module/payment-setting | `.icon-btn:hover` | `staff.css` |
| payment_module/review-bank-transfers | `.icon-btn:hover` | `staff.css` |
