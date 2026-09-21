# 1. Business logic lives in services

Status: Accepted

Recorded: 2026-09-20 (the decision was made earlier during development)

## Context

FitnessHub follows an MVC structure. Business rules such as "an order that has been handed to the courier cannot be cancelled" involve several tables (orders, stock, payments), so they do not belong to any single model. Putting them in controllers would make controllers large and impossible to reuse or test without a web request.

## Decision

- All business rule validation and multi-step workflows live in `app/services/`.
- **Models** are data access only (queries through PDO).
- **Controllers** handle the request and response and call services.

Dependencies point one way: Controller → Service → Model → Database.

## Consequences

- Each rule exists in one place and can be tested without a browser or a database-backed request.
- Controllers stay thin and models stay simple.
- There is one more layer to learn, and each new piece of code needs a decision about where it belongs. `app/README.md` includes a "where does this code go?" guide for that.

## Alternatives considered

- **Rules in models ("fat models").** A model would need to reach into other models for rules that span tables, and models would become tangled.
- **Rules in controllers.** Rules could not be reused from another controller, and could not be tested without a request.
