# Permissions Reference

See [ADR-2](../docs/decisions/002-permissions-not-roles.md) for why access
control works this way — this file is the current state of that system.
**Update it whenever `permissions` or `role_permissions` changes.**

> **Known issue as of this snapshot:** `manager` is missing most of the
> permissions it was designed to have (see the note under Role → Permission
> assignments below). This file documents the database as it actually
> stands, not the intended design — fix the data, then re-generate this
> file from a fresh query rather than hand-editing this note away.

## Permissions

| Key                      | Description                                                                |
| ------------------------ | -------------------------------------------------------------------------- |
| manage_members           | View/edit member accounts and membership status                            |
| manage_classes           | Book/manage class enrollments                                              |
| handle_support_tickets   | Respond to and resolve support tickets                                     |
| manage_inventory         | Manage store products and stock                                            |
| manage_orders            | View/process store orders                                                  |
| manage_schedule          | Manage instructor schedules                                                |
| manage_equipment         | Manage equipment records                                                   |
| manage_payments          | Process/view payments and billing                                          |
| view_reports             | View analytics and reports                                                 |
| register_super_admins    | Create/manage Super Admin accounts                                         |
| manage_attendance        | Mark and view member attendance                                            |
| view_overview            | View dashboard overview and summary metrics                                |
| view_payments_overview   | View payment history and summary                                           |
| add_payment              | Record a new payment                                                       |
| view_own_clients         | View and manage only the members assigned as this instructor's own clients |
| manage_membership_plans  | Create/edit membership plans and tiers                                     |
| manage_personal_training | Manage personal training bookings and instructor assignment                |
| manage_messages          | Send and manage member-instructor messaging                                |
| manage_notifications     | Manage system notifications and retention alerts                           |
| verify_bank_slips        | Verify uploaded bank transfer slips                                        |
| manage_action_plans      | Assign workout and meal plans to members                                   |
| view_adherence           | View member adherence to assigned action plans                             |
| view_facility_map        | View the facility equipment map                                            |
| view_at_risk_members     | View members flagged for dropping attendance or poor adherence             |
| change_payment_settings  | Edit payment related settings                                              |
| view_own_schedule        | View own floor duty shifts and personal training bookings (read-only)      |
| view_daily_overview      | View front-desk daily overview (receptionist, manager, super_admin)        |
| view_ecommerce_overview  | View ecommerce dashboard overview (ecommerce_admin, manager, super_admin)  |
| view_system_overview     | View system-wide overview (super_admin, manager)                           |
| view_manager_summary     | View manager-only summary dashboard                                        |

## Role → Permission assignments

### receptionist

add_payment, handle_support_tickets, manage_attendance, manage_classes, manage_members, view_daily_overview

### ecommerce_admin

manage_inventory, manage_orders, view_ecommerce_overview

### super_admin

add_payment, change_payment_settings, handle_support_tickets, manage_action_plans, manage_attendance, manage_classes, manage_equipment, manage_inventory, manage_members, manage_membership_plans, manage_messages, manage_notifications, manage_orders, manage_payments, manage_personal_training, manage_schedule, register_super_admins, verify_bank_slips, view_adherence, view_daily_overview, view_ecommerce_overview, view_facility_map, view_overview, view_payments_overview, view_system_overview

### manager

view_manager_summary, view_overview, view_payments_overview, view_reports, view_system_overview

> ⚠️ **This does not match the design decision recorded when the manager
> role was built.** Manager was meant to hold everything `super_admin`
> holds (the 25 keys listed above), plus `view_reports`, `view_at_risk_members`,
> and `view_manager_summary`. As it stands, manager is missing every
> `manage_*` permission and several `view_*` ones. Re-run the manager grant
> and refresh this section before treating it as correct.

### instructor

manage_action_plans, manage_attendance, manage_messages, view_adherence, view_own_clients, view_own_schedule
