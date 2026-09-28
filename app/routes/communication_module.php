<?php

// ---------- Member: messages with coaches ----------
// /member/messages is the member with a personal trainer; no-coach and empty are
// the same screen for members without a trainer / without any conversations.
$router->get('/member/messages', [CommunicationController::class, 'showMemberMessageScreen'], '@member');
$router->get('/member/messages/no-coach', [CommunicationController::class, 'NonPTMessages'], '@member');
$router->get('/member/messages/empty', [CommunicationController::class, 'UserMessages'], '@member');
$router->get('/member/messages/marcus', [CommunicationController::class, 'chatMarcus'], '@member');
$router->get('/member/messages/sarah', [CommunicationController::class, 'chatSarah'], '@member');
$router->get('/member/messages/elena', [CommunicationController::class, 'chatElena'], '@member');
$router->get('/member/messages/support', [CommunicationController::class, 'chatSupport'], '@member');

// Member: browse instructors
$router->get('/member/instructors', [CommunicationController::class, 'availableInstructors'], '@member');
$router->get('/member/instructors/marcus', [CommunicationController::class, 'profileMarcus'], '@member');
$router->get('/member/instructors/sarah', [CommunicationController::class, 'profileSarah'], '@member');
$router->get('/member/instructors/elena', [CommunicationController::class, 'profileElena'], '@member');
$router->get('/member/instructors/kavindu', [CommunicationController::class, 'profileKavindu'], '@member');

// Member: support tickets
$router->get('/member/support', [CommunicationController::class, 'UserSupportTickets'], '@member');
$router->get('/member/support/empty', [CommunicationController::class, 'EmptySupportTickets'], '@member');
$router->get('/member/support/new', [CommunicationController::class, 'userTicketForm'], '@member');
$router->post('/member/support', [CommunicationController::class, 'submitSupportTicket'], '@member');

// ---------- Staff ----------
$router->get('/portal/messages', [CommunicationController::class, 'InstructorMessages'], 'manage_messages');
$router->get('/portal/notifications', [NotificationController::class, 'showStaffNotificationsScreen'], 'manage_notifications');

// Support tickets raised by members, and requests raised by staff
$router->get('/portal/support-tickets', [CommunicationController::class, 'AdminTickets'], 'handle_support_tickets');
$router->get('/portal/support-tickets/view', [CommunicationController::class, 'AdminTicketDetails'], 'handle_support_tickets');
$router->get('/portal/staff-requests', [CommunicationController::class, 'ManagerTickets'], 'manage_leave_requests');

// Instructor: their own requests (leave etc.), and a client's profile
$router->get('/portal/schedule/requests', [CommunicationController::class, 'InstructorTickets'], 'view_own_schedule');
$router->get('/portal/clients/profile', [CommunicationController::class, 'profileNisal'], 'view_own_clients');

// ---------- JSON: staff messaging ----------
$router->get('/api/messages/conversations', [CommunicationController::class, 'listConversations'], 'manage_messages');
$router->get('/api/messages', [CommunicationController::class, 'listMessages'], 'manage_messages');
$router->post('/api/messages/send', [CommunicationController::class, 'send'], 'manage_messages');
$router->post('/api/messages/read', [CommunicationController::class, 'markRead'], 'manage_messages');
$router->post('/api/messages/delete', [CommunicationController::class, 'delete'], 'manage_messages');
