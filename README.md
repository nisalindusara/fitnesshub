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

See [GETTING-STARTED.md](getting-started.md) for full setup instructions (Mac and Windows).

## Project structure

```
fitnesshub/
├── .github/                GitHub configuration (CODEOWNERS, PR template)
├── app/
│   ├── controllers/        Request handling
│   ├── core/               Framework internals (router, base classes, database)
│   ├── models/             Data access
│   ├── routes/             ROute registration
│   ├── services/           Business rules
│   └── views/              Templates, organised by actor
│   └── bootstrap.php       Start-up story
├── config/                 Application and database configuration
├── database/               SQL schema file and database notes
├── docs/                   Cross-cutting documentation and ADRs
├── public/                 Web root: entry point, assets, public uploads
├── storage/                Logs and private uploads (not publicly served)
└── tests/                  Automated tests
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
