-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2026 at 11:06 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `class_payments`
--

CREATE TABLE `class_payments` (
  `payment_id` int(11) NOT NULL,
  `class_fee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `membership_payments`
--

CREATE TABLE `membership_payments` (
  `payment_id` int(11) NOT NULL,
  `membership_fee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `membership_plans`
--

CREATE TABLE `membership_plans` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `duration_days` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `included_pt_sessions` int(11) NOT NULL DEFAULT 0,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership_plans`
--

INSERT INTO `membership_plans` (`plan_id`, `plan_name`, `description`, `duration_days`, `price`, `included_pt_sessions`, `status`, `created_at`) VALUES
(1, 'Basic', 'General gym access with standard equipment', 30, 5000.00, 0, 'ACTIVE', '2026-09-26 03:29:46'),
(2, 'Premium', 'Gym access with personal training sessions', 30, 8500.00, 4, 'ACTIVE', '2026-09-26 03:29:46'),
(3, '5 Month', 'kjdfkjskfjl', 150, 15000.00, 5, 'ACTIVE', '2026-09-26 03:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_number` varchar(30) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `guest_name` varchar(100) DEFAULT NULL,
  `guest_phone` varchar(20) DEFAULT NULL,
  `placed_by` int(11) NOT NULL,
  `shipping_method_id` int(11) DEFAULT NULL,
  `channel` enum('in_store','online') NOT NULL DEFAULT 'online',
  `shipping_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `subtotal` decimal(10,2) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tax_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('pending','paid','ready_for_pickup','completed','cancelled') NOT NULL DEFAULT 'pending',
  `notes` varchar(255) DEFAULT NULL,
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `cancelled_reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `member_id`, `guest_name`, `guest_phone`, `placed_by`, `shipping_method_id`, `channel`, `shipping_cost`, `subtotal`, `discount_amount`, `tax_amount`, `total_amount`, `status`, `notes`, `cancelled_at`, `cancelled_reason`, `created_at`, `updated_at`) VALUES
(15, 'ORD-SEED-0001', 11, NULL, NULL, 11, 1, 'online', 0.00, 6500.00, 0.00, 0.00, 6500.00, 'completed', NULL, NULL, NULL, '2026-09-21 11:26:27', '2026-09-21 11:26:27'),
(16, 'ORD-SEED-0002', 11, NULL, NULL, 11, 2, 'online', 500.00, 23000.00, 0.00, 0.00, 23500.00, 'paid', NULL, NULL, NULL, '2026-09-21 11:26:27', '2026-09-21 11:26:27'),
(17, 'ORD-SEED-0003', NULL, 'Walk-in Customer', '0771234567', 1, 1, 'in_store', 0.00, 6500.00, 0.00, 0.00, 6500.00, 'completed', 'In-store sale', NULL, NULL, '2026-09-21 11:26:27', '2026-09-23 10:23:30'),
(18, 'ORD-SEED-0004', 11, NULL, NULL, 11, 1, 'online', 0.00, 11500.00, 0.00, 0.00, 11500.00, 'pending', NULL, NULL, NULL, '2026-09-21 11:26:27', '2026-09-21 11:26:27'),
(19, 'ORD-SEED-0005', 11, NULL, NULL, 11, 1, 'online', 0.00, 6500.00, 0.00, 0.00, 6500.00, 'cancelled', NULL, '2026-09-21 11:26:27', 'payment not received', '2026-09-21 11:26:27', '2026-09-21 11:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_variant_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `variant_label` varchar(100) DEFAULT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `line_subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_variant_id`, `product_name`, `variant_label`, `unit_price`, `quantity`, `line_subtotal`) VALUES
(6, 15, 1, 'Whey Protein', '1kg', 6500.00, 1, 6500.00),
(7, 16, 2, 'Whey Protein', '2kg', 11500.00, 2, 23000.00),
(8, 17, 1, 'Whey Protein', '1kg', 6500.00, 1, 6500.00),
(9, 18, 2, 'Whey Protein', '2kg', 11500.00, 1, 11500.00),
(10, 19, 1, 'Whey Protein', '1kg', 6500.00, 1, 6500.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_payments`
--

CREATE TABLE `order_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_payments`
--

INSERT INTO `order_payments` (`payment_id`, `order_id`) VALUES
(3, 15),
(4, 16),
(5, 17);

-- --------------------------------------------------------

--
-- Table structure for table `order_status_history`
--

CREATE TABLE `order_status_history` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` enum('confirmed','ready_for_pickup','handed_for_delivery','completed','cancelled') NOT NULL,
  `changed_by` int(11) DEFAULT NULL,
  `changed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `method` enum('cash','card','bank_transfer','other') NOT NULL,
  `verification_status` enum('verified','pending_verification') NOT NULL DEFAULT 'verified',
  `recorded_by` int(11) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `key` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(24, 'view_at_risk_members', 'View members flagged for dropping attendance or poor adherence'),
(25, 'change_payment_settings', 'Edit payment related settings'),
(26, 'view_own_schedule', 'View own floor duty shifts and personal training bookings (read-only)'),
(27, 'view_daily_overview', 'View front-desk daily overview (receptionist, manager, super_admin)'),
(28, 'view_ecommerce_overview', 'View ecommerce dashboard overview (ecommerce_admin, manager, super_admin)'),
(29, 'view_system_overview', 'View system-wide overview (super_admin, manager)'),
(30, 'view_manager_summary', 'View manager-only summary dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `base_price` decimal(10,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `base_price`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Whey Protein', 'Chocolate flavored whey protein powder', 6500.00, 1, '2026-08-27 02:57:33', '2026-08-27 02:57:33'),
(2, 1, 'Gym T-Shirt', 'FitnessHub branded training tee', 2200.00, 1, '2026-08-27 02:57:33', '2026-08-27 02:57:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'Supplements', 'Protein powders, vitamins, and pre-workout', '2026-08-27 02:57:33'),
(4, 'Apparel', 'Gym shirts, leggings, and hoodies', '2026-09-21 12:57:41'),
(5, 'Accessories', 'Shaker bottles, gym bags, and lifting straps', '2026-09-21 12:57:41'),
(6, 'Relaxation', 'Foam rollers, massage guns, and recovery balms', '2026-09-21 12:57:41'),
(8, 'Fitnees', 'Fitness related stuff', '2026-09-24 06:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `is_primary` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(20) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `size`, `color`, `sku`, `price`, `stock_quantity`, `is_active`, `created_at`) VALUES
(1, 1, '1kg', NULL, 'WP-1KG-CHOC', 6500.00, 20, 1, '2026-08-27 02:57:33'),
(2, 1, '2kg', NULL, 'WP-2KG-CHOC', 11500.00, 10, 1, '2026-08-27 02:57:33'),
(3, 2, 'M', 'Black', 'TSHIRT-M-BLK', 2200.00, 15, 1, '2026-08-27 02:57:33'),
(4, 2, 'L', 'Black', 'TSHIRT-L-BLK', 2200.00, 10, 1, '2026-08-27 02:57:33');

-- --------------------------------------------------------

--
-- Table structure for table `pt_session_payments`
--

CREATE TABLE `pt_session_payments` (
  `payment_id` int(11) NOT NULL,
  `pt_booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pt_session_payments`
--

INSERT INTO `pt_session_payments` (`payment_id`, `pt_booking_id`) VALUES
(6, 1),
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'receptionist', 'Front desk: members, classes, support tickets'),
(2, 'ecommerce_admin', 'Store: inventory, products, orders'),
(3, 'super_admin', 'Full operational access — superset of receptionist + ecommerce_admin'),
(4, 'manager', 'Oversight: everything super_admin has, plus reports and admin provisioning'),
(5, 'instructor', 'Leads classes and manages personal training clients');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 11),
(1, 14),
(1, 27),
(2, 4),
(2, 5),
(2, 28),
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
(3, 25),
(3, 27),
(3, 28),
(3, 29),
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
(4, 25),
(4, 27),
(4, 28),
(4, 29),
(4, 30),
(5, 11),
(5, 15),
(5, 18),
(5, 21),
(5, 22),
(5, 26);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_methods`
--

CREATE TABLE `shipping_methods` (
  `id` int(11) NOT NULL,
  `key` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `base_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `requires_address` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_methods`
--

INSERT INTO `shipping_methods` (`id`, `key`, `name`, `base_cost`, `requires_address`, `is_active`) VALUES
(1, 'pickup', 'Pickup at Gym', 0.00, 0, 1),
(2, 'standard_delivery', 'Standard Delivery', 500.00, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_profiles`
--

CREATE TABLE `staff_profiles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `employee_id` varchar(50) DEFAULT NULL,
  `hire_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `profile_image`, `password_hash`, `role_id`, `created_at`) VALUES
(1, 'user', 'example', 'userexample@example.com', '5678901234', 'uploads/profiles/profile_1.jpg', '$2y$10$wxFiQdTzAHDHi.X1Cq3Jk.1xzVqcQBHZpWrq7Pz43GB5kUrd8nW72', NULL, '2026-08-27 02:50:10'),
(7, 'superadmin', 'example', 'superadminexample@example.com', '1234567890', 'uploads/profiles/profile_2.jpg', '$2y$10$vH7dpzSMdaI4ghzbB82I7.1AK5994gqr8TmRWNgho6HpB8JdMNQii', 3, '2026-08-26 05:32:54'),
(8, 'ecomadmin', 'example', 'ecomadminexample@example.com', '2345678901', 'uploads/profiles/profile_3.jpg', '$2y$10$XCi2RjLD/Xdybxsx.mDBD.BlpvXa/Bus7qOLIrnXQ1Wk6P0q3wMEy', 2, '2026-08-26 05:35:00'),
(9, 'receptionist', 'example', 'receptionistexample@example.com', '3456789012', 'uploads/profiles/profile_4.jpg', '$2y$10$qzT2/JMMGkayLBh7Z4BtPOfWu0gUMszhv2MdzmuuYRZyEWYsd/M1u', 1, '2026-08-26 05:36:54'),
(10, 'manager', 'example', 'managerexample@example.com', '4567890123', 'uploads/profiles/profile_5.jpg', '$2y$10$.ZIbxS9yuZrTyCE.9CaiPegHkgfPw1t4l1/zs26Gnyl3Vkk3DZ3By', 4, '2026-08-26 05:37:58'),
(11, 'user2', 'example', 'userexample1@example.com', '3456789238', 'uploads/profiles/profile_6.jpg', '$2y$10$0uWEGx/MYI6I/qUHtlNgo.0HfLP7tXiuKm/GdEHYViAr0bEz.Apgu', NULL, '2026-08-27 02:56:38'),
(12, 'Instructor', 'One', 'instructorexample@example.com', '077 123 4567', 'uploads/profiles/profile_2.jpg', '$2y$10$TYCdOhNEF9QcfWyxJdcFEu8bJ8OI5l/g3hiNDNdpdqSMMW6x3FHtC', 5, '2026-09-23 06:19:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_payments`
--
ALTER TABLE `class_payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `class_fee_id` (`class_fee_id`);

--
-- Indexes for table `membership_payments`
--
ALTER TABLE `membership_payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `membership_fee_id` (`membership_fee_id`);

--
-- Indexes for table `membership_plans`
--
ALTER TABLE `membership_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD KEY `fk_orders_member` (`member_id`),
  ADD KEY `fk_orders_placed_by` (`placed_by`),
  ADD KEY `fk_orders_shipping_method` (`shipping_method_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_items_order` (`order_id`),
  ADD KEY `fk_order_items_variant` (`product_variant_id`);

--
-- Indexes for table `order_payments`
--
ALTER TABLE `order_payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD UNIQUE KEY `uq_order_payments_order` (`order_id`),
  ADD KEY `fk_order_payments_order` (`order_id`);

--
-- Indexes for table `order_status_history`
--
ALTER TABLE `order_status_history`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_order_status` (`order_id`,`status`),
  ADD KEY `idx_changed_by` (`changed_by`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payments_recorded_by` (`recorded_by`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_category` (`category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_images_product` (`product_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD UNIQUE KEY `uk_variant_product_size_color` (`product_id`,`size`,`color`);

--
-- Indexes for table `pt_session_payments`
--
ALTER TABLE `pt_session_payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `pt_booking_id` (`pt_booking_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `staff_profiles`
--
ALTER TABLE `staff_profiles`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_users_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `membership_plans`
--
ALTER TABLE `membership_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_status_history`
--
ALTER TABLE `order_status_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_payments`
--
ALTER TABLE `class_payments`
  ADD CONSTRAINT `fk_class_payments_payment` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `membership_payments`
--
ALTER TABLE `membership_payments`
  ADD CONSTRAINT `fk_membership_payments_payment` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_member` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_orders_placed_by` FOREIGN KEY (`placed_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_orders_shipping_method` FOREIGN KEY (`shipping_method_id`) REFERENCES `shipping_methods` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_order_items_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_order_items_variant` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`);

--
-- Constraints for table `order_payments`
--
ALTER TABLE `order_payments`
  ADD CONSTRAINT `fk_order_payments_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_order_payments_payment` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_status_history`
--
ALTER TABLE `order_status_history`
  ADD CONSTRAINT `fk_osh_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_osh_user` FOREIGN KEY (`changed_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_payments_recorded_by` FOREIGN KEY (`recorded_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `fk_images_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `fk_variants_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pt_session_payments`
--
ALTER TABLE `pt_session_payments`
  ADD CONSTRAINT `fk_pt_session_payments_payment` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff_profiles`
--
ALTER TABLE `staff_profiles`
  ADD CONSTRAINT `staff_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `staff_profiles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
