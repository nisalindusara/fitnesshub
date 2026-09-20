# app

This folder holds all of FitnessHub's application code.

## Request flow

```
Request → Router → Controller → Service → Model → Database
                        │
                        └──────→ Layout / View → Response
```

## Folder map

| Folder                                  | Holds                                                       | Rule of thumb                               |
| --------------------------------------- | ----------------------------------------------------------- | ------------------------------------------- |
| [`core/`](core/README.md)               | Framework internals: router, base classes, database wrapper | Changes here affect everything. Be careful. |
| [`controllers/`](controllers/README.md) | Request handling                                            | Thin: no business rules, no SQL             |
| [`services/`](services/README.md)       | Business rules and workflows                                | All rule validation lives here              |
| [`models/`](models/README.md)           | Data access, one class per table or entity                  | SQL and PDO only, no business decisions     |
| [`contracts/`](contracts/README.md)     | Interfaces                                                  | Promises about behaviour, no logic          |
| [`views/`](views/README.md)             | Templates, organised by actor                               | Display only, no queries                    |
