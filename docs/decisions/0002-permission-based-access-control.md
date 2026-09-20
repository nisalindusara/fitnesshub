# 2. Access control checks permissions, not roles

Status: Accepted

Recorded: 2026-09-20 (the decision was made earlier during development)

## Context

FitnessHub has several actors (customers, instructors, admin and manager staff), and more roles are likely to be needed. Checking role names in code (`if ($role === 'admin')`) spreads knowledge of every role through the codebase, so each new role means changing code.

## Decision

- Code checks **permissions**, never role names.
- Permissions are stored as **data**, in a `role_permissions` junction table.
- `AuthorizationService` computes a user's permissions at login and caches them in the session.
- A stateless `Gate` class enforces permissions on every request.
- Navigation mirrors capability: if a role cannot perform an action, it does not see it in the nav.

## Consequences

- A new role needs only data inserts, not code or schema changes (Open/Closed Principle).
- Permission checks are consistent across routes, controllers, and navigation.
- Permissions are cached at login, so a change to a user's permissions takes effect at their next login.
- The permission and role data are part of the database contract and must be kept in the SQL file (see [`database/README.md`](../../database/README.md)).

## Alternatives considered

- **Checking role names in code.** Simpler at first, but every new role requires code changes and role names get scattered everywhere.
