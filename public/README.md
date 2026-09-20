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

| File          | Role                                                                          |
| ------------- | ----------------------------------------------------------------------------- |
| `tokens.css`  | The single source of raw design values (colours, spacing, radius, typography) |
| `landing.css` | Styles for the public landing pages                                           |
| `member.css`  | Styles for the member-facing surface                                          |
| `admin.css`   | Styles for the admin and staff surface                                        |

### Images

| Folder              | Holds                     |
| ------------------- | ------------------------- |
| `images/dashboard/` | Images used on dashboards |
| `images/icons/`     | Icons                     |
| `images/landing/`   | Landing page images       |
