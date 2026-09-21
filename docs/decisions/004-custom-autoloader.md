# 4. Classes are loaded by a custom autoloader

Status: Accepted

Recorded: 2026-09-21

## Context

Until now every class was loaded by hand with `require_once`, with the list living in `public/index.php`. This had three problems:

- The list grew with every controller, and would keep growing as the nine modules were built.
- Base classes and interfaces had to be loaded before the classes that extend or implement them, so the order of the list mattered.
- Moving a file to a different folder broke every `require_once` path that pointed to it.

The project may not use external libraries, so Composer's autoloader is not an option.

## Decision

- A small `Autoloader` class in `app/core/Autoloader.php` is registered once in `app/bootstrap.php` with `spl_autoload_register()`.
- The convention is **class name = file name**, one class per file.
- On the first class PHP cannot find, the autoloader scans the `core`, `controllers`, `models` and `services` folders once and builds a map of class name to file path. It then loads files from that map when a class is first used.
- If two files define the same class name, the autoloader throws an error.
- It is plain PHP, so it does not break the "no external libraries" rule.

`app/bootstrap.php` is now the only place that loads a file by hand.

## Consequences

- There is no `require_once` list to maintain, and adding a controller, model or service needs no registration.
- Base classes and interfaces load themselves, so load order no longer matters.
- Classes are loaded only when used, so a request loads just the classes it needs.
- Files can be moved between subfolders of the scanned folders without changing any code. New module folders are found automatically.
- The file name must match the class name exactly, and each file may hold only one class. A class in a file with a different name will not be found.
- Class names must be unique across all scanned folders, even in different modules.
- The folder scan runs on every request, because PHP keeps no state between requests. For a project this size the cost is small.
- Loading is less visible than a list of `require_once` lines, so a new teammate has to learn the naming convention.
- A class outside the four scanned folders will not be found until its folder is added to `bootstrap.php`.

## Alternatives considered

- **Keep manual `require_once`.** Simple and explicit, but the list, the load order and the fragile paths were the problem.
- **Composer's autoloader.** Ruled out by the no-external-libraries rule.
- **Namespaces with PSR-4-style path mapping.** The standard approach, but every class would need a namespace and every folder would have to match one. That was more change than the project needed.
- **Load every file in a folder with `glob()`.** No list to maintain, but it loads every class on every request and does not solve the load order problem.
