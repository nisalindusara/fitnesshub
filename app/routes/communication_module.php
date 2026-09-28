<?php

// empty screen
$router->get('/member/messages-empty', [CommunicationController::class, 'UserMessages']);
// message screen
$router->get('/member/messages', [CommunicationController::class, 'showMemberMessageScreen']);

$router->get('/communication/chat-marcus', [CommunicationController::class, 'chatMarcus']);
$router->get('/communication/chat-sarah', [CommunicationController::class, 'chatSarah']);
$router->get('/communication/chat-support', [CommunicationController::class, 'chatSupport']);
$router->get('/instructor/profile/marcus', [CommunicationController::class, 'profileMarcus']);
$router->get('/instructor/profile/sarah', [CommunicationController::class, 'profileSarah']);

// Chat view for Coach Elena
$router->get('/communication/chat-elena', [CommunicationController::class, 'chatElena']);

// Profile view for Coach Elena
$router->get('/instructor/profile/elena', [CommunicationController::class, 'profileElena']);
$router->get('/communication/NonPT-messages', [CommunicationController::class, 'NonPTMessages']);
$router->get('/communication/available-instructors', [CommunicationController::class, 'availableInstructors']);
$router->get('/instructor/profile/kavindu', [CommunicationController::class, 'profileKavindu']);
$router->get('/communication/Empty-support-tickets', [CommunicationController::class, 'EmptySupportTickets']);
$router->get('/communication/user-ticketForm', [CommunicationController::class, 'userTicketForm']);
$router->get('/communication/instructor-tickets', [CommunicationController::class, 'InstructorTickets']);
$router->get('/communication/instructor-messages', [CommunicationController::class, 'InstructorMessages']);
$router->get('/messages', [CommunicationController::class, 'InstructorMessages']);

// Also register Apache subfolder paths (/fitnesshub/public/...)
$router->get('/fitnesshub/public/messages', [CommunicationController::class, 'InstructorMessages']);
$router->get('/fitnesshub/public/communication/instructor-messages', [CommunicationController::class, 'InstructorMessages']);

// API endpoints for chat (Root and Apache subfolder)
$router->get('/api/conversations', [CommunicationController::class, 'listConversations']);
$router->get('/fitnesshub/public/api/conversations', [CommunicationController::class, 'listConversations']);

$router->get('/api/messages',      [CommunicationController::class, 'listMessages']);
$router->get('/fitnesshub/public/api/messages', [CommunicationController::class, 'listMessages']);

$router->post('/api/messages/read', [CommunicationController::class, 'markRead']);
$router->post('/fitnesshub/public/api/messages/read', [CommunicationController::class, 'markRead']);

$router->post('/api/messages/send', [CommunicationController::class, 'send']);
$router->post('/fitnesshub/public/api/messages/send', [CommunicationController::class, 'send']);

$router->post('/api/messages/delete', [CommunicationController::class, 'delete']);
$router->post('/fitnesshub/public/api/messages/delete', [CommunicationController::class, 'delete']);

//instructor view member's profile
$router->get('/member/profile/nisal', [CommunicationController::class, 'profileNisal']);
$router->get('/admin/support_tickets', [CommunicationController::class, 'AdminTickets']);
$router->get('/admin/ticket_details', [CommunicationController::class, 'AdminTicketDetails']);
$router->get('/manager/support_tickets', [CommunicationController::class, 'ManagerTickets']);
