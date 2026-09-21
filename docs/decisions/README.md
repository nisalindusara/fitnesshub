# Architecture Decision Records

## Index

| #                                               | Decision                                     |
| ----------------------------------------------- | -------------------------------------------- |
| [0001](0001-business-logic-in-services.md)      | Business logic lives in services             |
| [0002](0002-permission-based-access-control.md) | Access control checks permissions, not roles |
| [0003](0003-shipping-handler-pattern.md)        | Shipping methods use a handler pattern       |
| [0004](0004-custom-autoloader.md)               | Classes are loaded by a custom autoloader    |

## Writing a new record

1. Copy the format below into a new file named `NNNN-short-title.md` with the next number.
2. Keep it to about a page.
3. Add it to the index above.
4. **Never rewrite an old record.** If a decision changes, write a new record and set the old one's status to _Superseded by NNNN_.

```markdown
# N. Title

Status: Proposed | Accepted | Superseded by NNNN

## Context

What problem or situation led to this decision?

## Decision

What did we choose?

## Consequences

What gets better, and what gets harder?

## Alternatives considered

What else did we look at, and why not?
```
