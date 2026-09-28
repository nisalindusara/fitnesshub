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
(30, 'view_manager_summary', 'View manager-only summary dashboard'),
(31, 'manage_leave_requests', 'Approve, reject and cancel instructor leave requests (manager only)');

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
(5, 26),
(4, 31);

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
(12, 'Instructor', 'One', 'instructorexample@example.com', '077 123 4567', 'uploads/profiles/profile_2.jpg', '$2y$10$TYCdOhNEF9QcfWyxJdcFEu8bJ8OI5l/g3hiNDNdpdqSMMW6x3FHtC', 5, '2026-09-23 06:19:24'),
(13, 'Maya', 'Thompson', 'maya.thompson@example.com', '077 234 5678', NULL, '$2y$10$TYCdOhNEF9QcfWyxJdcFEu8bJ8OI5l/g3hiNDNdpdqSMMW6x3FHtC', 5, '2026-09-23 11:55:00'),
(14, 'Jordan', 'Lee', 'jordan.lee@example.com', '077 345 6789', NULL, '$2y$10$TYCdOhNEF9QcfWyxJdcFEu8bJ8OI5l/g3hiNDNdpdqSMMW6x3FHtC', 5, '2026-09-23 11:56:00'),
(15, 'Priya', 'Nair', 'priya.nair@example.com', '077 456 7890', NULL, '$2y$10$TYCdOhNEF9QcfWyxJdcFEu8bJ8OI5l/g3hiNDNdpdqSMMW6x3FHtC', 5, '2026-09-23 11:57:00');

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

-- --------------------------------------------------------
-- Daily plan module: exercise library, instructor ↔ client assignments,
-- workout plans (draft / published / archived) and member workout logs.
-- Tables are self-contained (keys and constraints inline) and are created
-- after `users` so the foreign keys resolve.
-- --------------------------------------------------------

DROP TABLE IF EXISTS `workout_logs`;
DROP TABLE IF EXISTS `workout_plan_exercises`;
DROP TABLE IF EXISTS `workout_plan_days`;
DROP TABLE IF EXISTS `workout_plans`;
DROP TABLE IF EXISTS `instructor_clients`;
DROP TABLE IF EXISTS `exercises`;

--
-- Table structure for table `exercises` (the instructor's exercise library)
--
CREATE TABLE `exercises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `muscle_group` varchar(30) NOT NULL,
  `equipment` varchar(30) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_exercises_name` (`name`),
  KEY `idx_exercises_muscle` (`muscle_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `instructor_clients` (members assigned to an instructor)
--
CREATE TABLE `instructor_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instructor_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `client_type` enum('1-on-1','group') NOT NULL DEFAULT '1-on-1',
  `status` enum('active','paused') NOT NULL DEFAULT 'active',
  `flag_title` varchar(100) DEFAULT NULL,
  `flag_note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_instructor_member` (`instructor_id`,`member_id`),
  KEY `fk_ic_member` (`member_id`),
  CONSTRAINT `fk_ic_instructor` FOREIGN KEY (`instructor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_ic_member` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `workout_plans`
-- A member has at most one draft and one published plan; older published
-- versions are kept as 'archived' so workout logs and "copy last week" survive.
--
CREATE TABLE `workout_plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `goal` varchar(50) NOT NULL,
  `duration_weeks` tinyint(3) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `sessions_per_week` tinyint(3) UNSIGNED NOT NULL,
  `difficulty` enum('beginner','intermediate','advanced') NOT NULL DEFAULT 'beginner',
  `status` enum('draft','published','archived') NOT NULL DEFAULT 'draft',
  `published_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_wp_member_status` (`member_id`,`status`),
  KEY `fk_wp_instructor` (`instructor_id`),
  CONSTRAINT `fk_wp_member` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_wp_instructor` FOREIGN KEY (`instructor_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `workout_plan_days` (1 = Monday … 7 = Sunday)
--
CREATE TABLE `workout_plan_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) NOT NULL,
  `day_of_week` tinyint(3) UNSIGNED NOT NULL,
  `focus` varchar(50) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_plan_day` (`plan_id`,`day_of_week`),
  CONSTRAINT `fk_wpd_plan` FOREIGN KEY (`plan_id`) REFERENCES `workout_plans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `workout_plan_exercises`
-- Rows sharing a superset_group within a day are performed back to back.
--
CREATE TABLE `workout_plan_exercises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_day_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  `sort_order` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `sets` tinyint(3) UNSIGNED NOT NULL,
  `reps` smallint(5) UNSIGNED NOT NULL,
  `load_text` varchar(20) DEFAULT NULL,
  `rest_seconds` smallint(5) UNSIGNED NOT NULL DEFAULT 60,
  `superset_group` tinyint(3) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_wpe_day_order` (`plan_day_id`,`sort_order`),
  KEY `fk_wpe_exercise` (`exercise_id`),
  CONSTRAINT `fk_wpe_day` FOREIGN KEY (`plan_day_id`) REFERENCES `workout_plan_days` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_wpe_exercise` FOREIGN KEY (`exercise_id`) REFERENCES `exercises` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `workout_logs` (a member ticking off an exercise on a date)
--
CREATE TABLE `workout_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `plan_exercise_id` int(11) NOT NULL,
  `log_date` date NOT NULL,
  `completed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_log_member_exercise_date` (`member_id`,`plan_exercise_id`,`log_date`),
  KEY `fk_wl_plan_exercise` (`plan_exercise_id`),
  CONSTRAINT `fk_wl_member` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_wl_plan_exercise` FOREIGN KEY (`plan_exercise_id`) REFERENCES `workout_plan_exercises` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Daily plan module: meal plans. One weekly meal plan per member
-- (day 1 = Mon … 7 = Sun). Each meal of a day has a few options; the member
-- picks the one they ate, which is logged in `meal_logs`.
-- --------------------------------------------------------

DROP TABLE IF EXISTS `meal_logs`;
DROP TABLE IF EXISTS `meal_plan_items`;

--
-- Table structure for table `meal_plan_items` (one option for one meal on one weekday of a member's meal plan)
--
CREATE TABLE `meal_plan_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `day_of_week` tinyint(3) UNSIGNED NOT NULL,
  `meal_type` enum('breakfast','lunch','dinner','snack') NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `calories` smallint(5) UNSIGNED DEFAULT NULL,
  `protein_g` smallint(5) UNSIGNED DEFAULT NULL,
  `sort_order` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_mpi_member_day` (`member_id`,`day_of_week`,`sort_order`),
  KEY `fk_mpi_instructor` (`instructor_id`),
  CONSTRAINT `fk_mpi_member` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_mpi_instructor` FOREIGN KEY (`instructor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `meal_logs` (the option a member picked for a meal on a date)
--
CREATE TABLE `meal_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `meal_item_id` int(11) NOT NULL,
  `log_date` date NOT NULL,
  `completed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_meal_log_member_item_date` (`member_id`,`meal_item_id`,`log_date`),
  KEY `fk_ml_meal_item` (`meal_item_id`),
  CONSTRAINT `fk_ml_member` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_ml_meal_item` FOREIGN KEY (`meal_item_id`) REFERENCES `meal_plan_items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Work schedule module: instructor sessions an admin puts on the calendar.
-- A repeating session is stored as one row per date, linked to the series
-- that holds its repeat rule.
-- --------------------------------------------------------

DROP TABLE IF EXISTS `leave_request_sessions`;
DROP TABLE IF EXISTS `leave_requests`;
DROP TABLE IF EXISTS `work_sessions`;
DROP TABLE IF EXISTS `work_session_series`;

--
-- Table structure for table `work_session_series` (the repeat rule shared by a set of sessions)
--
CREATE TABLE `work_session_series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frequency` enum('daily','weekly','monthly') NOT NULL,
  `weekdays` varchar(20) DEFAULT NULL COMMENT 'Weekly only: ISO weekdays, e.g. 1,3,5 = Mon, Wed, Fri',
  `repeat_until` date NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_wss_created_by` (`created_by`),
  CONSTRAINT `fk_wss_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `work_sessions` (one instructor session on one date)
--
CREATE TABLE `work_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instructor_id` int(11) NOT NULL,
  `session_type` varchar(30) NOT NULL,
  `session_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `series_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_ws_date` (`session_date`,`start_time`),
  KEY `idx_ws_instructor_date` (`instructor_id`,`session_date`),
  KEY `fk_ws_series` (`series_id`),
  KEY `fk_ws_created_by` (`created_by`),
  CONSTRAINT `fk_ws_instructor` FOREIGN KEY (`instructor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_ws_series` FOREIGN KEY (`series_id`) REFERENCES `work_session_series` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fk_ws_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Work schedule module: instructor leave requests. A manager approves or
-- rejects each request; approving reassigns or cancels the instructor's
-- sessions in that period, and the outcome for every session is recorded.
-- --------------------------------------------------------

DROP TABLE IF EXISTS `leave_request_sessions`;
DROP TABLE IF EXISTS `leave_requests`;

--
-- Table structure for table `leave_requests` (a planned or immediate leave request from an instructor)
--
CREATE TABLE `leave_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instructor_id` int(11) NOT NULL,
  `leave_type` enum('planned','immediate') NOT NULL,
  `reason` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('pending','approved','rejected','cancelled') NOT NULL DEFAULT 'pending',
  `submitted_at` datetime NOT NULL DEFAULT current_timestamp(),
  `decided_by` int(11) DEFAULT NULL,
  `decided_at` datetime DEFAULT NULL,
  `cancelled_by` int(11) DEFAULT NULL,
  `cancelled_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_lr_status` (`status`,`start_date`),
  KEY `idx_lr_instructor_dates` (`instructor_id`,`start_date`,`end_date`),
  KEY `fk_lr_decided_by` (`decided_by`),
  KEY `fk_lr_cancelled_by` (`cancelled_by`),
  CONSTRAINT `fk_lr_instructor` FOREIGN KEY (`instructor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_lr_decided_by` FOREIGN KEY (`decided_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fk_lr_cancelled_by` FOREIGN KEY (`cancelled_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `leave_request_sessions` (what happened to each session a processed leave affected)
-- The session details are copied here because a cancelled session is removed from `work_sessions`.
--
CREATE TABLE `leave_request_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leave_request_id` int(11) NOT NULL,
  `work_session_id` int(11) DEFAULT NULL,
  `session_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `session_type` varchar(30) NOT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `original_instructor_id` int(11) NOT NULL,
  `replacement_instructor_id` int(11) DEFAULT NULL,
  `outcome` enum('replaced','cancelled','kept','reverted','restored') NOT NULL,
  `outcome_note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_lrs_request` (`leave_request_id`,`session_date`,`start_time`),
  KEY `fk_lrs_work_session` (`work_session_id`),
  KEY `fk_lrs_original` (`original_instructor_id`),
  KEY `fk_lrs_replacement` (`replacement_instructor_id`),
  CONSTRAINT `fk_lrs_request` FOREIGN KEY (`leave_request_id`) REFERENCES `leave_requests` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_lrs_work_session` FOREIGN KEY (`work_session_id`) REFERENCES `work_sessions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fk_lrs_original` FOREIGN KEY (`original_instructor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_lrs_replacement` FOREIGN KEY (`replacement_instructor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daily plan module seed: exercise library, instructor 12's clients and one published plan.
-- Member 1 has a published plan (edit flow); member 11 has none (create flow).
--


INSERT INTO `exercises` (`id`, `name`, `muscle_group`, `equipment`) VALUES
(1, 'Barbell bench press', 'Chest', 'Barbell'),
(2, 'Incline dumbbell press', 'Chest', 'Dumbbell'),
(3, 'Dumbbell fly', 'Chest', 'Dumbbell'),
(4, 'Push-up', 'Chest', 'Bodyweight'),
(5, 'Cable crossover', 'Chest', 'Cable'),
(6, 'Seated cable row', 'Back', 'Cable'),
(7, 'Lat pulldown', 'Back', 'Cable'),
(8, 'Pull-up', 'Back', 'Bodyweight'),
(9, 'Bent-over barbell row', 'Back', 'Barbell'),
(10, 'Chest-supported row', 'Back', 'Dumbbell'),
(11, 'Barbell back squat', 'Legs', 'Barbell'),
(12, 'Romanian deadlift', 'Legs', 'Barbell'),
(13, 'Walking lunge', 'Legs', 'Dumbbell'),
(14, 'Leg press', 'Legs', 'Machine'),
(15, 'Lying leg curl', 'Legs', 'Machine'),
(16, 'Standing calf raise', 'Legs', 'Machine'),
(17, 'Bulgarian split squat', 'Legs', 'Dumbbell'),
(18, 'Goblet squat', 'Legs', 'Kettlebell'),
(19, 'Trap bar deadlift', 'Legs', 'Barbell'),
(20, 'Seated shoulder press', 'Shoulders', 'Dumbbell'),
(21, 'Lateral raise', 'Shoulders', 'Dumbbell'),
(22, 'Face pull', 'Shoulders', 'Cable'),
(23, 'Overhead barbell press', 'Shoulders', 'Barbell'),
(24, 'Rope tricep pushdown', 'Arms', 'Cable'),
(25, 'Hammer curl', 'Arms', 'Dumbbell'),
(26, 'Barbell curl', 'Arms', 'Barbell'),
(27, 'Overhead tricep extension', 'Arms', 'Dumbbell'),
(28, 'Plank', 'Core', 'Bodyweight'),
(29, 'Hanging leg raise', 'Core', 'Bodyweight'),
(30, 'Cable woodchop', 'Core', 'Cable'),
(31, 'Farmer carry', 'Core', 'Dumbbell'),
(32, 'Treadmill intervals', 'Cardio', 'Machine'),
(33, 'Rowing machine', 'Cardio', 'Machine'),
(34, 'Assault bike sprint', 'Cardio', 'Machine'),
(35, 'Hip flow sequence', 'Mobility', 'Bodyweight'),
(36, 'Thoracic rotation', 'Mobility', 'Bodyweight');

INSERT INTO `instructor_clients` (`id`, `instructor_id`, `member_id`, `client_type`, `status`, `flag_title`, `flag_note`, `created_at`) VALUES
(1, 12, 1, '1-on-1', 'active', 'Shoulder flag on file', 'Keep overhead pressing under 12 reps and check form on Friday.', '2026-09-01 09:00:00'),
(2, 12, 11, 'group', 'active', NULL, NULL, '2026-09-24 09:00:00');

INSERT INTO `workout_plans` (`id`, `member_id`, `instructor_id`, `name`, `goal`, `duration_weeks`, `start_date`, `sessions_per_week`, `difficulty`, `status`, `published_at`) VALUES
(1, 1, 12, 'Hypertrophy Block A', 'Muscle gain', 8, '2026-09-21', 5, 'intermediate', 'published', '2026-09-20 18:00:00');

INSERT INTO `workout_plan_days` (`id`, `plan_id`, `day_of_week`, `focus`, `note`) VALUES
(1, 1, 1, 'Upper body', NULL),
(2, 1, 2, 'Cardio', NULL),
(3, 1, 3, 'Lower body', NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 5, 'Full body', 'Check shoulder form before pressing.'),
(6, 1, 6, 'Mobility', NULL),
(7, 1, 7, NULL, NULL);

INSERT INTO `workout_plan_exercises` (`plan_day_id`, `exercise_id`, `sort_order`, `sets`, `reps`, `load_text`, `rest_seconds`, `superset_group`) VALUES
(1, 1, 1, 4, 8, '60 kg', 90, NULL),
(1, 2, 2, 3, 10, '22 kg', 75, NULL),
(1, 6, 3, 4, 12, '50 kg', 60, NULL),
(1, 7, 4, 3, 12, '45 kg', 60, NULL),
(1, 20, 5, 3, 10, '18 kg', 60, NULL),
(1, 24, 6, 3, 15, '25 kg', 45, NULL),
(2, 32, 1, 8, 1, NULL, 60, NULL),
(2, 33, 2, 3, 1, NULL, 90, NULL),
(2, 34, 3, 6, 1, NULL, 45, NULL),
(3, 11, 1, 4, 8, '80 kg', 120, NULL),
(3, 12, 2, 3, 10, '60 kg', 90, NULL),
(3, 13, 3, 3, 12, '14 kg', 60, NULL),
(3, 14, 4, 3, 12, '120 kg', 75, NULL),
(3, 15, 5, 3, 12, '35 kg', 60, 1),
(3, 16, 6, 4, 15, '40 kg', 45, 1),
(5, 19, 1, 4, 6, '90 kg', 120, NULL),
(5, 1, 2, 3, 10, '55 kg', 75, NULL),
(5, 8, 3, 3, 8, 'BW', 90, NULL),
(5, 18, 4, 3, 12, '24 kg', 60, NULL),
(5, 31, 5, 3, 40, '32 kg', 60, NULL),
(6, 35, 1, 2, 8, NULL, 30, NULL),
(6, 36, 2, 2, 10, NULL, 30, NULL),
(6, 29, 3, 3, 12, NULL, 30, NULL);

INSERT INTO `workout_logs` (`member_id`, `plan_exercise_id`, `log_date`) VALUES
(1, 1, '2026-09-21'), (1, 2, '2026-09-21'), (1, 3, '2026-09-21'), (1, 4, '2026-09-21'), (1, 5, '2026-09-21'), (1, 6, '2026-09-21'),
(1, 7, '2026-09-22'), (1, 8, '2026-09-22'), (1, 9, '2026-09-22'),
(1, 10, '2026-09-23'), (1, 11, '2026-09-23'), (1, 12, '2026-09-23'), (1, 13, '2026-09-23'), (1, 14, '2026-09-23'),
(1, 16, '2026-09-25'), (1, 17, '2026-09-25'), (1, 18, '2026-09-25'), (1, 19, '2026-09-25');

--
-- Meal plan seed: member 1 has a full week from instructor 12; member 11 has none.
--

INSERT INTO `meal_plan_items` (`id`, `member_id`, `instructor_id`, `day_of_week`, `meal_type`, `name`, `description`, `calories`, `protein_g`, `sort_order`) VALUES
(1, 1, 12, 1, 'breakfast', 'Oatmeal with Berries', 'Rolled oats, blueberries, honey, almond milk', 380, 14, 1),
(2, 1, 12, 1, 'lunch', 'Chicken Rice Bowl', 'Grilled chicken, brown rice, steamed broccoli', 560, 42, 2),
(3, 1, 12, 1, 'dinner', 'Beef Stir-fry', 'Lean beef, peppers, snap peas, jasmine rice', 610, 40, 3),
(4, 1, 12, 1, 'snack', 'Protein Shake', 'Whey protein, banana, oat milk', 260, 28, 4),
(5, 1, 12, 2, 'breakfast', 'Scrambled Eggs on Toast', '3 eggs, whole grain toast, spinach', 400, 24, 1),
(6, 1, 12, 2, 'lunch', 'Tuna Wrap', 'Tuna, whole wheat wrap, lettuce, light mayo', 480, 36, 2),
(7, 1, 12, 2, 'dinner', 'Chicken Curry', 'Chicken breast, light coconut curry, basmati rice', 640, 44, 3),
(8, 1, 12, 2, 'snack', 'Apple & Peanut Butter', '1 apple, 2 tbsp peanut butter', 280, 8, 4),
(9, 1, 12, 3, 'breakfast', 'Avocado Toast with Egg', '2 slices whole grain bread, 2 poached eggs', 420, 22, 1),
(10, 1, 12, 3, 'lunch', 'Grilled Chicken Salad', 'Mixed greens, cherry tomatoes, balsamic', 510, 45, 2),
(11, 1, 12, 3, 'dinner', 'Baked Salmon & Quinoa', 'Atlantic salmon, tri-color quinoa', 620, 38, 3),
(12, 1, 12, 3, 'snack', 'Greek Yogurt & Berries', 'Low-fat Greek yogurt, mixed berries', 220, 18, 4),
(13, 1, 12, 4, 'breakfast', 'Protein Pancakes', 'Oat and egg-white pancakes, maple syrup', 430, 30, 1),
(14, 1, 12, 4, 'lunch', 'Turkey Sandwich', 'Sliced turkey, whole grain bread, avocado', 520, 38, 2),
(15, 1, 12, 4, 'dinner', 'Shrimp Pasta', 'Whole wheat pasta, garlic shrimp, tomato sauce', 600, 36, 3),
(16, 1, 12, 4, 'snack', 'Mixed Nuts', 'Almonds, cashews, walnuts (30 g)', 190, 6, 4),
(17, 1, 12, 5, 'breakfast', 'Smoothie Bowl', 'Banana, spinach, protein powder, granola', 410, 26, 1),
(18, 1, 12, 5, 'lunch', 'Lentil Soup & Bread', 'Red lentil soup, sourdough slice', 460, 22, 2),
(19, 1, 12, 5, 'dinner', 'Grilled Fish Tacos', 'White fish, corn tortillas, cabbage slaw', 580, 40, 3),
(20, 1, 12, 5, 'snack', 'Cottage Cheese & Pineapple', 'Low-fat cottage cheese, pineapple chunks', 200, 20, 4),
(21, 1, 12, 6, 'breakfast', 'Egg White Omelette', 'Egg whites, mushrooms, peppers, feta', 320, 28, 1),
(22, 1, 12, 6, 'lunch', 'Quinoa Buddha Bowl', 'Quinoa, chickpeas, roasted veg, tahini', 550, 22, 2),
(23, 1, 12, 6, 'dinner', 'Chicken & Sweet Potato', 'Roast chicken thigh, baked sweet potato, greens', 630, 45, 3),
(24, 1, 12, 6, 'snack', 'Rice Cakes & Hummus', '2 rice cakes, 3 tbsp hummus', 180, 6, 4),
(25, 1, 12, 7, 'breakfast', 'French Toast', 'Whole grain bread, egg, cinnamon, berries', 450, 20, 1),
(26, 1, 12, 7, 'lunch', 'Chicken Caesar Wrap', 'Grilled chicken, romaine, light Caesar dressing', 530, 40, 2),
(27, 1, 12, 7, 'dinner', 'Vegetable Stir-fry with Tofu', 'Firm tofu, mixed vegetables, brown rice', 540, 28, 3),
(28, 1, 12, 7, 'snack', 'Dark Chocolate & Almonds', '20 g dark chocolate, 15 almonds', 210, 5, 4);

-- Two more options for every meal, so the member picks 1 of 3
INSERT INTO `meal_plan_items` (`id`, `member_id`, `instructor_id`, `day_of_week`, `meal_type`, `name`, `description`, `calories`, `protein_g`, `sort_order`) VALUES
(29, 1, 12, 1, 'breakfast', 'Greek Yogurt Parfait', 'Greek yogurt, granola, strawberries', 350, 20, 1),
(30, 1, 12, 1, 'breakfast', 'Veggie Omelette', '3 eggs, peppers, onion, spinach', 360, 24, 1),
(31, 1, 12, 1, 'lunch', 'Turkey & Hummus Wrap', 'Turkey breast, hummus, cucumber, wholemeal wrap', 520, 38, 2),
(32, 1, 12, 1, 'lunch', 'Lentil & Feta Salad', 'Green lentils, feta, rocket, lemon dressing', 490, 26, 2),
(33, 1, 12, 1, 'dinner', 'Grilled Chicken & Vegetables', 'Chicken breast, roasted courgette, peppers', 540, 46, 3),
(34, 1, 12, 1, 'dinner', 'Salmon Teriyaki Bowl', 'Salmon, teriyaki glaze, rice, edamame', 630, 38, 3),
(35, 1, 12, 1, 'snack', 'Boiled Eggs', '2 hard-boiled eggs, pinch of salt', 150, 12, 4),
(36, 1, 12, 1, 'snack', 'Banana & Almonds', '1 banana, 15 almonds', 210, 5, 4),
(37, 1, 12, 2, 'breakfast', 'Overnight Oats', 'Oats, chia seeds, milk, apple, cinnamon', 390, 15, 1),
(38, 1, 12, 2, 'breakfast', 'Peanut Butter Toast', 'Whole grain toast, peanut butter, banana', 420, 14, 1),
(39, 1, 12, 2, 'lunch', 'Chicken Noodle Soup', 'Chicken, egg noodles, carrots, celery', 450, 32, 2),
(40, 1, 12, 2, 'lunch', 'Falafel Pita', 'Baked falafel, pita, salad, yogurt sauce', 530, 20, 2),
(41, 1, 12, 2, 'dinner', 'Beef & Bean Chilli', 'Lean beef mince, kidney beans, brown rice', 620, 42, 3),
(42, 1, 12, 2, 'dinner', 'Baked Cod & Potatoes', 'Cod fillet, baby potatoes, green beans', 520, 40, 3),
(43, 1, 12, 2, 'snack', 'Protein Bar', 'Low-sugar protein bar', 220, 20, 4),
(44, 1, 12, 2, 'snack', 'Carrot Sticks & Hummus', 'Carrot sticks, 3 tbsp hummus', 170, 5, 4),
(45, 1, 12, 3, 'breakfast', 'Berry Protein Smoothie', 'Whey protein, mixed berries, oat milk', 330, 28, 1),
(46, 1, 12, 3, 'breakfast', 'Egg & Spinach Muffins', '3 baked egg muffins with spinach and cheese', 360, 26, 1),
(47, 1, 12, 3, 'lunch', 'Tuna Poke Bowl', 'Tuna, sushi rice, avocado, cucumber, soy', 560, 40, 2),
(48, 1, 12, 3, 'lunch', 'Chickpea Buddha Bowl', 'Chickpeas, quinoa, roasted veg, tahini', 530, 20, 2),
(49, 1, 12, 3, 'dinner', 'Turkey Meatballs & Pasta', 'Turkey meatballs, wholewheat spaghetti, tomato sauce', 640, 44, 3),
(50, 1, 12, 3, 'dinner', 'Chicken Fajitas', 'Chicken strips, peppers, onion, 2 tortillas', 600, 42, 3),
(51, 1, 12, 3, 'snack', 'Cottage Cheese & Honey', 'Low-fat cottage cheese, drizzle of honey', 190, 22, 4),
(52, 1, 12, 3, 'snack', 'Trail Mix', 'Nuts, seeds, raisins (30 g)', 200, 6, 4),
(53, 1, 12, 4, 'breakfast', 'Breakfast Burrito', 'Scrambled eggs, black beans, salsa, wrap', 450, 26, 1),
(54, 1, 12, 4, 'breakfast', 'Muesli with Milk', 'Unsweetened muesli, low-fat milk, banana', 380, 14, 1),
(55, 1, 12, 4, 'lunch', 'Chicken Pesto Pasta Salad', 'Chicken, pasta, pesto, cherry tomatoes', 560, 40, 2),
(56, 1, 12, 4, 'lunch', 'Egg Fried Rice', 'Brown rice, egg, peas, carrots, soy', 500, 20, 2),
(57, 1, 12, 4, 'dinner', 'Lamb Kofta & Couscous', 'Lean lamb kofta, couscous, cucumber salad', 640, 38, 3),
(58, 1, 12, 4, 'dinner', 'Vegetable Lasagne', 'Spinach, ricotta, courgette lasagne', 560, 26, 3),
(59, 1, 12, 4, 'snack', 'Greek Yogurt & Walnuts', 'Greek yogurt, walnuts, cinnamon', 210, 15, 4),
(60, 1, 12, 4, 'snack', 'Edamame', 'Steamed edamame, sea salt', 190, 17, 4),
(61, 1, 12, 5, 'breakfast', 'Cottage Cheese Toast', 'Whole grain toast, cottage cheese, tomato', 340, 24, 1),
(62, 1, 12, 5, 'breakfast', 'Banana Oat Pancakes', 'Banana, oats, egg, berries', 400, 18, 1),
(63, 1, 12, 5, 'lunch', 'Chicken Burrito Bowl', 'Chicken, rice, black beans, corn, salsa', 580, 44, 2),
(64, 1, 12, 5, 'lunch', 'Salmon Salad', 'Smoked salmon, leafy greens, new potatoes', 480, 32, 2),
(65, 1, 12, 5, 'dinner', 'Steak & Sweet Potato Fries', 'Sirloin steak, sweet potato fries, salad', 650, 46, 3),
(66, 1, 12, 5, 'dinner', 'Prawn Stir-fry', 'Prawns, noodles, pak choi, ginger', 540, 36, 3),
(67, 1, 12, 5, 'snack', 'Protein Shake', 'Whey protein, water or milk', 160, 25, 4),
(68, 1, 12, 5, 'snack', 'Apple & Cheese', '1 apple, 30 g cheddar', 200, 8, 4),
(69, 1, 12, 6, 'breakfast', 'Shakshuka', '2 eggs baked in tomato and pepper sauce, toast', 400, 22, 1),
(70, 1, 12, 6, 'breakfast', 'Acai Bowl', 'Acai, banana, granola, coconut flakes', 420, 10, 1),
(71, 1, 12, 6, 'lunch', 'Grilled Halloumi Wrap', 'Halloumi, roasted peppers, rocket, wrap', 560, 26, 2),
(72, 1, 12, 6, 'lunch', 'Chicken & Avocado Salad', 'Chicken, avocado, mixed greens, lime', 520, 42, 2),
(73, 1, 12, 6, 'dinner', 'Homemade Chicken Pizza', 'Wholemeal base, chicken, peppers, mozzarella', 660, 42, 3),
(74, 1, 12, 6, 'dinner', 'Pork Tenderloin & Rice', 'Pork tenderloin, rice, steamed greens', 600, 44, 3),
(75, 1, 12, 6, 'snack', 'Popcorn', 'Air-popped popcorn (30 g)', 120, 4, 4),
(76, 1, 12, 6, 'snack', 'Chocolate Milk', '300 ml low-fat chocolate milk', 200, 10, 4),
(77, 1, 12, 7, 'breakfast', 'Full English (Lighter)', 'Eggs, turkey bacon, beans, mushrooms, toast', 520, 34, 1),
(78, 1, 12, 7, 'breakfast', 'Chia Pudding', 'Chia seeds, coconut milk, mango', 350, 10, 1),
(79, 1, 12, 7, 'lunch', 'Roast Chicken Sandwich', 'Roast chicken, whole grain bread, salad', 500, 38, 2),
(80, 1, 12, 7, 'lunch', 'Minestrone & Bread', 'Vegetable minestrone, sourdough slice', 420, 16, 2),
(81, 1, 12, 7, 'dinner', 'Sunday Roast Beef', 'Lean roast beef, potatoes, carrots, peas', 650, 46, 3),
(82, 1, 12, 7, 'dinner', 'Baked Salmon & Asparagus', 'Salmon fillet, asparagus, new potatoes', 580, 40, 3),
(83, 1, 12, 7, 'snack', 'Frozen Yogurt', 'Low-fat frozen yogurt, berries', 180, 8, 4),
(84, 1, 12, 7, 'snack', 'Oat Energy Balls', '2 oat, date and peanut butter balls', 220, 6, 4);

INSERT INTO `meal_logs` (`member_id`, `meal_item_id`, `log_date`) VALUES
(1, 1, '2026-09-21'), (1, 2, '2026-09-21'), (1, 3, '2026-09-21'), (1, 4, '2026-09-21'),
(1, 5, '2026-09-22'), (1, 6, '2026-09-22'), (1, 7, '2026-09-22'),
(1, 9, '2026-09-23'), (1, 10, '2026-09-23'),
(1, 13, '2026-09-24'), (1, 14, '2026-09-24'), (1, 15, '2026-09-24'), (1, 16, '2026-09-24'),
(1, 17, '2026-09-25'), (1, 19, '2026-09-25');

--
-- Work schedule seed: instructor 12's sessions, created by superadmin 7.
-- A weekly Mon/Wed floor duty series plus one-off sessions.
--

INSERT INTO `work_session_series` (`id`, `frequency`, `weekdays`, `repeat_until`, `created_by`) VALUES
(1, 'weekly', '1,3', '2026-10-31', 7);

INSERT INTO `work_sessions` (`id`, `instructor_id`, `session_type`, `session_date`, `start_time`, `end_time`, `notes`, `series_id`, `created_by`) VALUES
(1, 12, 'floor', '2026-09-21', '09:30:00', '10:30:00', NULL, 1, 7),
(2, 12, 'floor', '2026-09-23', '09:30:00', '10:30:00', NULL, 1, 7),
(3, 12, 'floor', '2026-09-28', '09:30:00', '10:30:00', NULL, 1, 7),
(4, 12, 'floor', '2026-09-30', '09:30:00', '10:30:00', NULL, 1, 7),
(5, 12, 'floor', '2026-10-05', '09:30:00', '10:30:00', NULL, 1, 7),
(6, 12, 'floor', '2026-10-07', '09:30:00', '10:30:00', NULL, 1, 7),
(7, 12, 'floor', '2026-10-12', '09:30:00', '10:30:00', NULL, 1, 7),
(8, 12, 'floor', '2026-10-14', '09:30:00', '10:30:00', NULL, 1, 7),
(9, 12, 'floor', '2026-10-19', '09:30:00', '10:30:00', NULL, 1, 7),
(10, 12, 'floor', '2026-10-21', '09:30:00', '10:30:00', NULL, 1, 7),
(11, 12, 'floor', '2026-10-26', '09:30:00', '10:30:00', NULL, 1, 7),
(12, 12, 'floor', '2026-10-28', '09:30:00', '10:30:00', NULL, 1, 7),
(13, 12, 'class', '2026-09-22', '11:00:00', '12:00:00', 'HIIT Bootcamp, Studio A', NULL, 7),
(14, 12, 'pt', '2026-09-25', '13:00:00', '15:30:00', 'Strength block with new PT clients', NULL, 7),
(15, 12, 'meeting', '2026-09-29', '08:00:00', '09:00:00', 'Monthly staff meeting', NULL, 7),
(16, 12, 'class', '2026-10-01', '17:30:00', '18:30:00', 'Spin class cover', NULL, 7),
(17, 12, 'orientation', '2026-10-02', '10:00:00', '11:00:00', 'New member orientation', NULL, 7);

--
-- Leave management seed (instructors 13–15 are added with the other users).
--  1: planned holiday, pending — Maya, Oct 14–18
--  2: immediate leave, pending — Maya, Sep 28 (Jordan, Priya and Instructor One are partly busy, so some sessions can't be covered)
--  3: planned leave, approved and processed — Maya, Oct 5–6 (2 replaced, 2 cancelled)
--  4: immediate leave, rejected — Maya, Sep 21 (sessions kept)
--

INSERT INTO `work_sessions` (`id`, `instructor_id`, `session_type`, `session_date`, `start_time`, `end_time`, `notes`, `series_id`, `created_by`) VALUES
(18, 13, 'class', '2026-10-14', '09:00:00', '10:00:00', 'Morning Vinyasa Yoga, Studio B', NULL, 10),
(19, 13, 'pt', '2026-10-14', '13:30:00', '14:30:00', 'Emma Miller, 1:1 coaching', NULL, 10),
(20, 13, 'class', '2026-10-16', '10:00:00', '11:00:00', 'Strength Foundations, Studio A', NULL, 10),
(21, 13, 'pt', '2026-10-16', '16:00:00', '17:00:00', 'Oliver Chen, 1:1 coaching', NULL, 10),
(22, 13, 'class', '2026-09-28', '09:00:00', '10:00:00', 'Strength Foundations, Studio A', NULL, 10),
(23, 13, 'pt', '2026-09-28', '10:30:00', '11:15:00', 'Oliver Chen, 1:1 coaching', NULL, 10),
(24, 13, 'class', '2026-09-28', '12:00:00', '13:00:00', 'Power Circuit, Studio B', NULL, 10),
(25, 13, 'pt', '2026-09-28', '14:00:00', '14:45:00', 'Amelia Davis, mobility assessment', NULL, 10),
(26, 13, 'class', '2026-09-28', '16:30:00', '17:30:00', 'Core & Stability, Studio A', NULL, 10),
(27, 14, 'floor', '2026-09-28', '10:00:00', '13:30:00', NULL, NULL, 10),
(28, 15, 'class', '2026-09-28', '10:00:00', '11:30:00', 'Spin Express, Studio C', NULL, 10),
(29, 15, 'floor', '2026-09-28', '11:30:00', '13:00:00', NULL, NULL, 10),
(30, 12, 'pt', '2026-09-28', '10:30:00', '13:00:00', 'Back-to-back PT clients', NULL, 10),
(31, 14, 'class', '2026-10-05', '09:00:00', '10:00:00', 'Strength Foundations, Studio A', NULL, 10),
(32, 15, 'class', '2026-10-06', '16:30:00', '17:30:00', 'Core & Stability, Studio A', NULL, 10),
(33, 13, 'class', '2026-09-21', '09:00:00', '10:00:00', 'Strength Foundations, Studio A', NULL, 10),
(34, 13, 'pt', '2026-09-21', '14:00:00', '14:45:00', 'Amelia Davis, mobility assessment', NULL, 10);

INSERT INTO `leave_requests` (`id`, `instructor_id`, `leave_type`, `reason`, `start_date`, `end_date`, `status`, `submitted_at`, `decided_by`, `decided_at`) VALUES
(1, 13, 'planned', 'Family holiday', '2026-10-14', '2026-10-18', 'pending', '2026-09-21 10:05:00', NULL, NULL),
(2, 13, 'immediate', 'Family emergency', '2026-09-28', '2026-09-28', 'pending', '2026-09-27 08:16:00', NULL, NULL),
(3, 13, 'planned', 'Fitness conference', '2026-10-05', '2026-10-06', 'approved', '2026-09-15 09:30:00', 10, '2026-09-20 16:42:00'),
(4, 13, 'immediate', 'Feeling unwell', '2026-09-21', '2026-09-21', 'rejected', '2026-09-21 07:10:00', 10, '2026-09-21 07:25:00');

INSERT INTO `leave_request_sessions` (`leave_request_id`, `work_session_id`, `session_date`, `start_time`, `end_time`, `session_type`, `notes`, `original_instructor_id`, `replacement_instructor_id`, `outcome`, `outcome_note`) VALUES
(3, 31, '2026-10-05', '09:00:00', '10:00:00', 'class', 'Strength Foundations, Studio A', 13, 14, 'replaced', NULL),
(3, NULL, '2026-10-05', '10:30:00', '11:15:00', 'pt', 'Oliver Chen, 1:1 coaching', 13, NULL, 'cancelled', 'Cancelled automatically — no suitable instructor available.'),
(3, NULL, '2026-10-06', '12:00:00', '13:00:00', 'class', 'Mobility Flow, Studio B', 13, NULL, 'cancelled', 'Cancelled automatically — no suitable instructor available.'),
(3, 32, '2026-10-06', '16:30:00', '17:30:00', 'class', 'Core & Stability, Studio A', 13, 15, 'replaced', NULL),
(4, 33, '2026-09-21', '09:00:00', '10:00:00', 'class', 'Strength Foundations, Studio A', 13, NULL, 'kept', NULL),
(4, 34, '2026-09-21', '14:00:00', '14:45:00', 'pt', 'Amelia Davis, mobility assessment', 13, NULL, 'kept', NULL);

-- --------------------------------------------------------
-- Communication module: one-to-one messages between an instructor and a member.
-- Deleting a message sets `deleted_at` (soft delete); only the sender can delete.
-- --------------------------------------------------------

DROP TABLE IF EXISTS `messages`;

--
-- Table structure for table `messages`
--
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_msg_thread` (`sender_id`,`receiver_id`,`created_at`),
  KEY `idx_msg_inbox` (`receiver_id`,`is_read`),
  CONSTRAINT `fk_msg_sender` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_msg_receiver` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Messaging seed: Instructor One (12) chatting with clients 1 and 11. The last two messages from user 1 are unread.
--
INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `is_read`, `created_at`) VALUES
(1, 12, 1, 'Hi! I have published your Hypertrophy Block A plan. Take a look and let me know if you have questions.', 1, '2026-09-20 18:05:00'),
(2, 1, 12, 'Thanks coach! Looks great. How heavy should I go on overhead press?', 1, '2026-09-20 19:12:00'),
(3, 12, 1, 'Keep it under 12 reps and focus on form. We will check it together on Friday.', 1, '2026-09-20 19:30:00'),
(4, 1, 12, 'My shoulder felt a bit tight after yesterday''s session.', 0, '2026-09-27 08:40:00'),
(5, 1, 12, 'Should I skip pressing today?', 0, '2026-09-27 08:41:00'),
(6, 11, 12, 'Is the group class still on this Thursday?', 1, '2026-09-25 10:15:00'),
(7, 12, 11, 'Yes, same time in Studio A. See you there!', 1, '2026-09-25 11:02:00');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
