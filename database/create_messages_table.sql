USE `fitnesshub_db`;

-- 1. Table Creation
CREATE TABLE IF NOT EXISTS `messages` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `sender_id` INT(11) NOT NULL,
  `receiver_id` INT(11) NOT NULL,
  `message_text` TEXT NOT NULL,
  `is_read` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_messages_sender` (`sender_id`),
  KEY `idx_messages_receiver` (`receiver_id`),
  CONSTRAINT `fk_messages_sender` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_messages_receiver` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 2. Ensure Roles Exist
INSERT INTO `roles` (`name`, `description`) 
VALUES 
  ('Instructor', 'Gym Instructor and Personal Trainer'),
  ('Client', 'Gym Member / Client')
ON DUPLICATE KEY UPDATE `description` = VALUES(`description`);

-- 3. Upsert Users (Matches on Unique Email)
INSERT INTO `users` (`first_name`, `last_name`, `email`, `phone_number`, `password_hash`, `role_id`)
VALUES 
  ('Sarah', 'Jenkins', 'sarah.j@example.com', '(555) 123-4567', '$2y$10$samplehashforpasswordhere1234567890', (SELECT `id` FROM `roles` WHERE `name` = 'Instructor' LIMIT 1)),
  ('Nisal', 'Indusara', 'nisal.i@example.com', '077 123 4567', '$2y$10$samplehashforpasswordhere1234567890', (SELECT `id` FROM `roles` WHERE `name` = 'Client' LIMIT 1)),
  ('Melani', 'Muthumini', 'melani.m@example.com', '071 234 5678', '$2y$10$samplehashforpasswordhere1234567890', (SELECT `id` FROM `roles` WHERE `name` = 'Client' LIMIT 1)),
  ('Hajara', 'Shafra', 'hajara.s@example.com', '076 345 6789', '$2y$10$samplehashforpasswordhere1234567890', (SELECT `id` FROM `roles` WHERE `name` = 'Client' LIMIT 1)),
  ('Tharusha', 'Gunawardhena', 'tharusha.g@example.com', '078 456 7890', '$2y$10$samplehashforpasswordhere1234567890', (SELECT `id` FROM `roles` WHERE `name` = 'Client' LIMIT 1)),
  ('Manuja', 'Nirmal', 'manuja.n@example.com', '070 567 8901', '$2y$10$samplehashforpasswordhere1234567890', (SELECT `id` FROM `roles` WHERE `name` = 'Client' LIMIT 1))
ON DUPLICATE KEY UPDATE 
  `first_name` = VALUES(`first_name`),
  `last_name` = VALUES(`last_name`),
  `phone_number` = VALUES(`phone_number`),
  `role_id` = VALUES(`role_id`);

-- 4. Seed Messages (Resolving IDs via Email to Avoid Hardcoding Conflicts)
SET @instructor := (SELECT `id` FROM `users` WHERE `email` = 'sarah.j@example.com');
SET @nisal      := (SELECT `id` FROM `users` WHERE `email` = 'nisal.i@example.com');
SET @melani     := (SELECT `id` FROM `users` WHERE `email` = 'melani.m@example.com');
SET @hajara     := (SELECT `id` FROM `users` WHERE `email` = 'hajara.s@example.com');
SET @tharusha   := (SELECT `id` FROM `users` WHERE `email` = 'tharusha.g@example.com');
SET @manuja     := (SELECT `id` FROM `users` WHERE `email` = 'manuja.n@example.com');

DELETE FROM `messages` 
WHERE `sender_id` IN (@instructor, @nisal, @melani, @hajara, @tharusha, @manuja) 
   OR `receiver_id` IN (@instructor, @nisal, @melani, @hajara, @tharusha, @manuja);

INSERT INTO `messages` (`sender_id`, `receiver_id`, `message_text`, `is_read`, `created_at`) VALUES
(@nisal, @instructor, 'Hey Coach! Just confirming our session for today at 2 PM.', 1, DATE_SUB(NOW(), INTERVAL 140 MINUTE)),
(@instructor, @nisal, 'Hi Nisal! Yes, we''re all set. We''ll be focusing on upper body strength today.', 1, DATE_SUB(NOW(), INTERVAL 130 MINUTE)),
(@nisal, @instructor, 'Looks great! I''m excited to get started.', 1, DATE_SUB(NOW(), INTERVAL 60 MINUTE)),
(@nisal, @instructor, 'I''ll be about 5 minutes late to our session today.', 0, DATE_SUB(NOW(), INTERVAL 10 MINUTE)),
(@melani, @instructor, 'Could you send over the workout plan for this week?', 0, DATE_SUB(NOW(), INTERVAL 145 MINUTE)),
(@hajara, @instructor, 'The new routine is a killer! Feeling great.', 0, DATE_SUB(NOW(), INTERVAL 1 DAY)),
(@tharusha, @instructor, 'Quick question about the schedule for Monday...', 0, DATE_SUB(NOW(), INTERVAL 1 DAY)),
(@manuja, @instructor, 'Thanks for check-in. Knee is feeling much better.', 0, DATE_SUB(NOW(), INTERVAL 15 DAY)),
(@manuja, @instructor, 'Can I get the meal plan for this week?', 0, DATE_SUB(NOW(), INTERVAL 15 DAY));