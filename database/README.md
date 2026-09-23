# database

This folder holds the SQL file that defines the FitnessHub database (`fitnesshub_db`).

| File         | Purpose                                                                                        |
| ------------ | ---------------------------------------------------------------------------------------------- |
| `schema.sql` | Contains only the structure of the database. No data is included                               |
| `seed.sql`   | Contains only the minimum amount of reference data required to demonstrate the functionalities |

## The sync rule

> **If you change the table structure, you must update the SQL file in the same commit.**

This includes adding, renaming, or dropping a table or column, changing a data type, default, or constraint, and adding or changing an index or foreign key. It also includes changes to **reference data** the app depends on (see below).

A code change that needs a schema change but does not include the updated SQL file is an incomplete change, and reviewers should not approve it.

> **If you add a row that the code relies on such as a permission, it belongs in the SQL file.**

## Importing the database

### With phpMyAdmin

1. Start Apache and MySQL in XAMPP.
2. Create a database named `fitnesshub_db` with collation `utf8mb4_general_ci`.
3. Select it, go to **Import**, choose the SQL file from this folder, and run it.

### From the command line

```bash
mysql -u root -p -e "CREATE DATABASE fitnesshub_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"
mysql -u root -p fitnesshub_db < database/fitnesshub_db.sql
```

On XAMPP for Windows, `mysql` is in `C:\xampp\mysql\bin`.
