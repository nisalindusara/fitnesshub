# FitnessHub

A gym management system built for the local business 'fitnesshub'.

FitnessHub gives gym staff, instructors, and members one place to manage memberships, classes, payments, equipment, and an online store through admin panels and a member side Progressive Web App (PWA).

This is a university group project, built on a custom PHP MVC framework with no external libraries.

## Who uses it

| Actor                       | What they do                                                                                     |
| --------------------------- | ------------------------------------------------------------------------------------------------ |
| **Customer (member)**       | Manage their account and membership, book classes, follow a daily action plan, shop in the store |
| **Instructor**              | Manage classes and personal training, view schedules, track member adherence                     |
| **Admin / Manager (staff)** | Run the gym: members, payments, orders, equipment, communication, reports                        |

## Modules

1. Account & Membership Management
2. Class & Personal Training Management
3. Work Schedule Management
4. Communication Management
5. Payment & Billing Management
6. E-Commerce Management (storefront only; fulfilment and logistics are out of scope)
7. Daily Action Plan & Adherence Tracking
8. Equipment Management
9. Reporting & Analytics Management

## Tech stack

| Layer         | Technology                                                                 |
| ------------- | -------------------------------------------------------------------------- |
| Backend       | Plain PHP with a custom MVC framework (no Composer, no external libraries) |
| Database      | MySQL, accessed through PDO                                                |
| Frontend      | Vanilla JavaScript (ES6 modules, Web Components), no external libraries    |
| Local runtime | XAMPP (Apache + PHP + MySQL)                                               |

> **No external libraries** is a coursework requirement. There is no Composer and no autoloader; dependencies are loaded manually with `require_once`, base classes first.

## Getting started

### Requirements

- [XAMPP](https://www.apachefriends.org/) with Apache, PHP, and MySQL
- PHP version: <!-- TODO: add the minimum PHP version you develop and test on -->
- Git

### 1. Clone the repository

```bash
git clone https://github.com/nisalindusara/fitnesshub.git
cd fitnesshub
```

### 2. Create the database

1. Start **Apache** and **MySQL** from the XAMPP control panel.
2. Open phpMyAdmin and create a database named `fitnesshub_db` (collation `utf8mb4_general_ci`).
3. Import the SQL file from the [`database/`](database/README.md) folder.

Full import instructions, including the command-line method, are in [`database/README.md`](database/README.md).

### 3. Configure the application

Check the database connection settings in [`config/`](config/README.md) and make sure they match your local MySQL credentials.

### 4. Set up the local domain (VirtualHost)

The project is served from the `public/` folder at `http://fitnesshub.local`.

Add this to XAMPP's `httpd-vhosts.conf` (adjust the path to where you cloned the repo):

```apache
<VirtualHost *:80>
    ServerName fitnesshub.local
    DocumentRoot "C:/path/to/fitnesshub/public"

    <Directory "C:/path/to/fitnesshub/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Then add this line to your hosts file (`C:\Windows\System32\drivers\etc\hosts`, open as Administrator):

```
127.0.0.1   fitnesshub.local
```

Restart Apache and open **http://fitnesshub.local**.

### 5. Folder permissions

Make sure PHP can write to `storage/logs/`, `storage/uploads/`, and the folders under `public/uploads/`.

## Project structure

```
fitnesshub/
├── .github/          GitHub configuration (CODEOWNERS, PR template)
├── app/
│   ├── contracts/    Interfaces
│   ├── controllers/  Request handling
│   ├── core/         Framework internals (router, base classes, database)
│   ├── models/       Data access
│   ├── services/     Business rules
│   └── views/        Templates, organised by actor
├── config/           Application and database configuration
├── database/         SQL schema file and database notes
├── docs/             Cross-cutting documentation and ADRs
├── public/           Web root: entry point, assets, public uploads
├── storage/          Logs and private uploads (not publicly served)
└── tests/            Automated tests
```

## Documentation index

| README                                     | Covers                                            |
| ------------------------------------------ | ------------------------------------------------- |
| [`app/README.md`](app/README.md)           | Architecture and where code goes                  |
| [`database/README.md`](database/README.md) | Schema file, import, and the schema sync rule     |
| [`public/README.md`](public/README.md)     | Web root and assets                               |
| [`CONTRIBUTING.md`](CONTRIBUTING.md)       | Git workflow and pull request checklist           |
| [`docs/README.md`](docs/README.md)         | Order lifecycle and architecture decision records |

## Contributing

Please read [`CONTRIBUTING.md`](CONTRIBUTING.md) before opening a pull request. In short:
