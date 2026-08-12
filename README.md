# FitnessHub

FitnessHub is a Progressive Web App for gym management, built for Sri Lankan gyms. It supports Customer, Instructor, and Admin/Owner roles, collecting member data and presenting it through informative analytics visuals — helping gym owners make more informed business decisions — alongside membership, class scheduling, payments, and e-commerce.

## Tech Stack

- **Backend:** PHP (plain, no framework)
- **Architecture:** 3-tier MVC (custom-built routing, controllers, models)
- **Database:** MySQL
- **Frontend:** HTML, CSS, JavaScript (Progressive Web App)

## Actors

- **Customer** — books classes, views membership/workout/meal plans, messages instructor, shops the store
- **Instructor** — manages sessions and schedule
- **Wellness Instructor** *(specialized Instructor)* — additionally creates and assigns meal plans
- **Admin** — manages members, equipment, payments, and views analytics
- **Owner** — full administrative access including business-level reporting

## System Modules

1. Account & Membership Management
2. Class & Personal Training Management
3. Work Schedule Management
4. Communication Management
5. Payment & Billing Management
6. E-Commerce Management
7. Daily Action Plan & Adherence Tracking
8. Equipment Management
9. Reporting & Analytics Management

## Project Structure

```
fitnesshub/
├── public/              # Web root (only exposed folder)
│   ├── index.php        # Front controller
│   ├── manifest.json    # PWA manifest
│   ├── service-worker.js
│   └── assets/          # CSS, JS, images
├── app/
│   ├── controllers/     # Application tier
│   ├── models/          # Data tier
│   ├── views/           # Presentation tier (templates)
│   └── core/            # Router, base Controller/Model, Database
├── config/               # Database and app configuration
├── storage/              # Logs and uploads (not web-accessible)
└── tests/                 # Test suite
```

## Setup

1. Clone the repository
2. Copy `.env.example` to `.env` and fill in your database credentials
3. Point your web server's document root to the `public/` folder
4. Import the database schema (to be added)

## Team

This is a second-year group project developed by a 4-member team, with biweekly progress reports submitted to project supervisors and subject coordinators.
