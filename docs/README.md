# docs

Documentation that explains how FitnessHub works **across** several folders.

## Contents

| Document                                   | Explains                                                                |
| ------------------------------------------ | ----------------------------------------------------------------------- |
| [`decisions/`](decisions/README.md)        | Architecture Decision Records (ADR)                                     |
| [`order-lifecycle.md`](order-lifecycle.md) | How an order moves through its statuses, and the rules behind each step |

## Where does documentation go?

| If it explains...                            | It goes in              |
| -------------------------------------------- | ----------------------- |
| How to work in one folder                    | A README in that folder |
| How something works across the system        | `docs/`                 |
| Why a design choice was made                 | `docs/decisions/`       |
| Why a piece of code is written the way it is | A comment in the code   |

## Keeping docs current

Update the relevant document in the **same pull request** as the change. If code and docs disagree, fix whichever is wrong.
