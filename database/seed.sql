-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2026 at 09:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitnesshub_db`
--
CREATE DATABASE IF NOT EXISTS `fitnesshub_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fitnesshub_db`;

--
-- Truncate table before insert `class_payments`
--

TRUNCATE TABLE `class_payments`;
--
-- Truncate table before insert `membership_payments`
--

TRUNCATE TABLE `membership_payments`;
--
-- Truncate table before insert `orders`
--

TRUNCATE TABLE `orders`;
--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `member_id`, `guest_name`, `guest_phone`, `placed_by`, `shipping_method_id`, `shipping_cost`, `subtotal`, `discount_amount`, `tax_amount`, `total_amount`, `status`, `notes`, `cancelled_at`, `cancelled_reason`, `created_at`, `updated_at`) VALUES
(15, 'ORD-SEED-0001', 11, NULL, NULL, 11, 1, 0.00, 6500.00, 0.00, 0.00, 6500.00, 'completed', NULL, NULL, NULL, '2026-09-21 11:26:27', '2026-09-21 11:26:27'),
(16, 'ORD-SEED-0002', 11, NULL, NULL, 11, 2, 500.00, 23000.00, 0.00, 0.00, 23500.00, 'paid', NULL, NULL, NULL, '2026-09-21 11:26:27', '2026-09-21 11:26:27'),
(17, 'ORD-SEED-0003', NULL, 'Walk-in Customer', '0771234567', 1, 1, 0.00, 6500.00, 0.00, 0.00, 6500.00, 'completed', 'In-store sale', NULL, NULL, '2026-09-21 11:26:27', '2026-09-21 11:26:27'),
(18, 'ORD-SEED-0004', 11, NULL, NULL, 11, 1, 0.00, 11500.00, 0.00, 0.00, 11500.00, 'pending', NULL, NULL, NULL, '2026-09-21 11:26:27', '2026-09-21 11:26:27'),
(19, 'ORD-SEED-0005', 11, NULL, NULL, 11, 1, 0.00, 6500.00, 0.00, 0.00, 6500.00, 'cancelled', NULL, '2026-09-21 11:26:27', 'payment not received', '2026-09-21 11:26:27', '2026-09-21 11:26:27');

--
-- Truncate table before insert `order_items`
--

TRUNCATE TABLE `order_items`;
--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_variant_id`, `product_name`, `variant_label`, `unit_price`, `quantity`, `line_subtotal`) VALUES
(1, 4, 1, 'Whey Protein', '1kg', 6500.00, 1, 6500.00),
(2, 5, 3, 'Gym T-Shirt', 'M / Black', 2200.00, 2, 4400.00),
(3, 6, 2, 'Whey Protein', '2kg', 11500.00, 1, 11500.00),
(4, 12, 4, 'Gym T-Shirt', 'L / Black', 2200.00, 1, 2200.00),
(5, 14, 4, 'Gym T-Shirt', 'L / Black', 2200.00, 1, 2200.00),
(6, 15, 1, 'Whey Protein', '1kg', 6500.00, 1, 6500.00),
(7, 16, 2, 'Whey Protein', '2kg', 11500.00, 2, 23000.00),
(8, 17, 1, 'Whey Protein', '1kg', 6500.00, 1, 6500.00),
(9, 18, 2, 'Whey Protein', '2kg', 11500.00, 1, 11500.00),
(10, 19, 1, 'Whey Protein', '1kg', 6500.00, 1, 6500.00);

--
-- Truncate table before insert `order_payments`
--

TRUNCATE TABLE `order_payments`;
--
-- Dumping data for table `order_payments`
--

INSERT INTO `order_payments` (`payment_id`, `order_id`) VALUES
(1, 12),
(2, 14),
(3, 15),
(4, 16),
(5, 17);

--
-- Truncate table before insert `order_status_history`
--

TRUNCATE TABLE `order_status_history`;
--
-- Dumping data for table `order_status_history`
--

INSERT INTO `order_status_history` (`id`, `order_id`, `status`, `changed_by`, `changed_at`) VALUES
(1, 4, 'completed', NULL, '2026-08-27 03:01:20'),
(2, 6, 'cancelled', NULL, '2026-08-27 03:01:20'),
(3, 12, 'completed', NULL, '2026-09-10 21:05:32');

--
-- Truncate table before insert `payments`
--

TRUNCATE TABLE `payments`;
--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `amount`, `method`, `verification_status`, `recorded_by`, `notes`, `created_at`) VALUES
(1, 2200.00, 'cash', 'verified', 7, NULL, '2026-09-10 21:05:32'),
(2, 2200.00, 'card', 'verified', 7, NULL, '2026-09-20 01:13:43'),
(3, 6500.00, 'card', 'verified', 11, 'Sample data', '2026-09-21 11:26:27'),
(4, 23500.00, 'bank_transfer', 'verified', 1, 'Sample data', '2026-09-21 11:26:27'),
(5, 6500.00, 'cash', 'verified', 1, 'Sample data', '2026-09-21 11:26:27'),
(6, 3500.00, 'cash', 'verified', 1, 'Sample PT session payment', '2026-09-21 11:26:27'),
(7, 3500.00, 'card', 'verified', 1, 'Sample PT session payment', '2026-09-21 11:26:27');

--
-- Truncate table before insert `permissions`
--

TRUNCATE TABLE `permissions`;
--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `description`) VALUES
(1, 'manage_members', 'View/edit member accounts and membership status'),
(2, 'manage_classes', 'Book/manage class enrollments'),
(3, 'handle_support_tickets', 'Respond to and resolve support tickets'),
(4, 'manage_inventory', 'Manage store products and stock'),
(5, 'manage_orders', 'View/process store orders'),
(6, 'manage_schedule', 'Manage instructor schedules'),
(7, 'manage_equipment', 'Manage equipment records'),
(8, 'manage_payments', 'Process/view payments and billing'),
(9, 'view_reports', 'View analytics and reports'),
(10, 'register_super_admins', 'Create/manage Super Admin accounts'),
(11, 'manage_attendance', 'Mark and view member attendance'),
(12, 'view_overview', 'View dashboard overview and summary metrics'),
(13, 'view_payments_overview', 'View payment history and summary'),
(14, 'add_payment', 'Record a new payment'),
(15, 'view_own_clients', 'View and manage only the members assigned as this instructor\'s own clients'),
(16, 'manage_membership_plans', 'Create/edit membership plans and tiers'),
(17, 'manage_personal_training', 'Manage personal training bookings and instructor assignment'),
(18, 'manage_messages', 'Send and manage member-instructor messaging'),
(19, 'manage_notifications', 'Manage system notifications and retention alerts'),
(20, 'verify_bank_slips', 'Verify uploaded bank transfer slips'),
(21, 'manage_action_plans', 'Assign workout and meal plans to members'),
(22, 'view_adherence', 'View member adherence to assigned action plans'),
(23, 'view_facility_map', 'View the facility equipment map'),
(24, 'view_at_risk_members', 'View members flagged for dropping attendance or poor adherence');

--
-- Truncate table before insert `products`
--

TRUNCATE TABLE `products`;
--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `base_price`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Whey Protein', 'Chocolate flavored whey protein powder', 6500.00, 1, '2026-08-27 02:57:33', '2026-08-27 02:57:33'),
(2, 1, 'Gym T-Shirt', 'FitnessHub branded training tee', 2200.00, 1, '2026-08-27 02:57:33', '2026-08-27 02:57:33');

--
-- Truncate table before insert `product_categories`
--

TRUNCATE TABLE `product_categories`;
--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `description`, `is_active`, `created_at`) VALUES
(1, 'Supp', 'Protein powders, vitamins, and pre-workout', 1, '2026-08-27 02:57:33'),
(4, 'Apparel', 'Gym shirts, leggings, and hoodies', 1, '2026-09-21 12:57:41'),
(5, 'Accessories', 'Shaker bottles, gym bags, and lifting straps', 1, '2026-09-21 12:57:41'),
(6, 'Relaxation', 'Foam rollers, massage guns, and recovery balms', 1, '2026-09-21 12:57:41'),
(7, 'Fitness', 'Resistance bands, jump ropes, and yoga mats', 1, '2026-09-21 12:57:41');

--
-- Truncate table before insert `product_images`
--

TRUNCATE TABLE `product_images`;
--
-- Truncate table before insert `product_variants`
--

TRUNCATE TABLE `product_variants`;
--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `size`, `color`, `sku`, `price`, `stock_quantity`, `is_active`, `created_at`) VALUES
(1, 1, '1kg', NULL, 'WP-1KG-CHOC', 6500.00, 20, 1, '2026-08-27 02:57:33'),
(2, 1, '2kg', NULL, 'WP-2KG-CHOC', 11500.00, 10, 1, '2026-08-27 02:57:33'),
(3, 2, 'M', 'Black', 'TSHIRT-M-BLK', 2200.00, 15, 1, '2026-08-27 02:57:33'),
(4, 2, 'L', 'Black', 'TSHIRT-L-BLK', 2200.00, 10, 1, '2026-08-27 02:57:33');

--
-- Truncate table before insert `pt_session_payments`
--

TRUNCATE TABLE `pt_session_payments`;
--
-- Dumping data for table `pt_session_payments`
--

INSERT INTO `pt_session_payments` (`payment_id`, `pt_booking_id`) VALUES
(6, 1),
(7, 2);

--
-- Truncate table before insert `roles`
--

TRUNCATE TABLE `roles`;
--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'receptionist', 'Front desk: members, classes, support tickets'),
(2, 'ecommerce_admin', 'Store: inventory, products, orders'),
(3, 'super_admin', 'Full operational access — superset of receptionist + ecommerce_admin'),
(4, 'manager', 'Oversight: everything super_admin has, plus reports and admin provisioning'),
(5, 'instructor', 'Leads classes and manages personal training clients');

--
-- Truncate table before insert `role_permissions`
--

TRUNCATE TABLE `role_permissions`;
--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 11),
(1, 14),
(2, 4),
(2, 5),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 16),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 23),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 14),
(4, 16),
(4, 17),
(4, 18),
(4, 19),
(4, 20),
(4, 21),
(4, 22),
(4, 23),
(4, 24),
(5, 2),
(5, 6),
(5, 11),
(5, 15),
(5, 17),
(5, 18),
(5, 21),
(5, 22),
(5, 23);

--
-- Truncate table before insert `shipping_methods`
--

TRUNCATE TABLE `shipping_methods`;
--
-- Dumping data for table `shipping_methods`
--

INSERT INTO `shipping_methods` (`id`, `key`, `name`, `base_cost`, `requires_address`, `is_active`) VALUES
(1, 'pickup', 'Pickup at Gym', 0.00, 0, 1),
(2, 'standard_delivery', 'Standard Delivery', 500.00, 1, 1);

--
-- Truncate table before insert `staff_profiles`
--

TRUNCATE TABLE `staff_profiles`;
--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `profile_image`, `password_hash`, `role_id`, `created_at`) VALUES
(1, 'user', 'example', 'userexample@example.com', '5678901234', 'uploads/profiles/profile_1.jpg', '$2y$10$wxFiQdTzAHDHi.X1Cq3Jk.1xzVqcQBHZpWrq7Pz43GB5kUrd8nW72', NULL, '2026-08-27 02:50:10'),
(7, 'superadmin', 'example', 'superadminexample@example.com', '1234567890', 'uploads/profiles/profile_2.jpg', '$2y$10$vH7dpzSMdaI4ghzbB82I7.1AK5994gqr8TmRWNgho6HpB8JdMNQii', 3, '2026-08-26 05:32:54'),
(8, 'ecomadmin', 'example', 'ecomadminexample@example.com', '2345678901', 'uploads/profiles/profile_3.jpg', '$2y$10$XCi2RjLD/Xdybxsx.mDBD.BlpvXa/Bus7qOLIrnXQ1Wk6P0q3wMEy', 2, '2026-08-26 05:35:00'),
(9, 'receptionist', 'example', 'receptionistexample@example.com', '3456789012', 'uploads/profiles/profile_4.jpg', '$2y$10$qzT2/JMMGkayLBh7Z4BtPOfWu0gUMszhv2MdzmuuYRZyEWYsd/M1u', 1, '2026-08-26 05:36:54'),
(10, 'manager', 'example', 'managerexample@example.com', '4567890123', 'uploads/profiles/profile_5.jpg', '$2y$10$.ZIbxS9yuZrTyCE.9CaiPegHkgfPw1t4l1/zs26Gnyl3Vkk3DZ3By', 4, '2026-08-26 05:37:58'),
(11, 'user2', 'example', 'userexample1@example.com', '3456789238', 'uploads/profiles/profile_6.jpg', '$2y$10$0uWEGx/MYI6I/qUHtlNgo.0HfLP7tXiuKm/GdEHYViAr0bEz.Apgu', NULL, '2026-08-27 02:56:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
