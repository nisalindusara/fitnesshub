# FitnessHub

FitnessHub is a gym management web app built for Sri Lankan gyms. It is a university group project developed using plain PHP with a custom MVC framework, MySQL, and vanilla JavaScript. No external libraries or Composer packages are used, as required by the coursework.

## What It Does

The system supports five types of users:

- Customer
- Instructor
- Admin
- Receptionist
- Manager

It covers account and membership management, class and personal training bookings, work schedules, communication, payments and billing, an online store, daily action plans and adherence tracking, equipment management, and reporting.

## Tech Stack

Backend: Plain PHP with a custom Router, Controller, and Model structure, using PDO to connect to MySQL.
Frontend: Vanilla JavaScript and Web Components, with no build tools required.
Database: MySQL, run locally through XAMPP.
Design: Figma was used for UI and UX design before development began.

## Branching Model

- The main branch is protected and represents stable, gradeable code.
- The dev branch is where all completed features come together before being merged into main.
- All new work happens on feature branches created from dev, and every change goes through a pull request.
- A CODEOWNERS file ensures pull requests are reviewed and approved before merging.

## Getting Started

- Clone the repository and place it inside your XAMPP htdocs folder.
- Import the database file found in the database folder into MySQL through phpMyAdmin.
- Start Apache and MySQL through XAMPP, then open the project in your browser.

## Project Status

This project is under active development as part of a university coursework requirement.
