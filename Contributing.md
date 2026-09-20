# Contributing to FitnessHub

## Branches

FitnessHub uses a simplified GitHub Flow.

| Branch        | Purpose                                               |
| ------------- | ----------------------------------------------------- |
| `main`        | Stable code. Protected.                               |
| `dev`         | Integration branch and the default branch. Protected. |
| `feature/...` | Your work, always branched from `dev`.                |

- Branch from **`dev`**, never from `main`.
- Never commit directly to `main` or `dev`.
- To bring the latest `dev` into your branch, **merge `dev` into it**.

## Pull requests

- Open a pull request **into `dev`**. It needs a review from a code owner (see `CODEOWNERS` in `.github/`).
- Say what changed and why.
- **If you changed the database structure, update the SQL file in [`database/`](database/README.md) in the same commit.**

## Conventions

Each folder has a README with its own rules. The root [`README.md`](README.md) links to all of them.
