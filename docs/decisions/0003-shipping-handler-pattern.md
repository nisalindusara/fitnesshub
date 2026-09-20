# 3. Shipping methods use a handler pattern

Status: Accepted

Recorded: 2026-09-20 (the decision was made earlier during development)

## Context

Orders can be picked up or delivered, and more shipping methods may be added later. Each method has its own rules. Handling this with `if` or `switch` statements on the method name would spread those checks through the codebase and require editing existing code for every new method.

## Decision

- `ShippingHandlerInterface` (in `app/contracts/`) defines what every shipping handler must do.
- Each shipping method has its own concrete handler class (in `app/services/shipping/`).
- `ShippingHandlerFactory` maps the key string stored in the `shipping_methods` table to the matching handler class.
- Calling code depends only on the interface.

See [`app/services/shipping/README.md`](../../app/services/shipping/README.md) for how to add a new method.

## Consequences

- Adding a shipping method means a new handler class, a factory entry, and a database row. Existing code does not change (Open/Closed Principle).
- Each method's rules live in one class.
- There are more files, and the database key and the factory entry must match exactly. A mismatch only shows up at runtime.

## Alternatives considered

- **`if` / `switch` on the method name.** Fewer files, but every new method edits existing code and the checks spread across the codebase.
