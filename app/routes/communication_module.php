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
$router->get('/communication/user-support-ticket', [CommunicationController::class, 'UserSupportTickets']);
$router->get('/communication/user-ticketForm', [CommunicationController::class, 'userTicketForm']);
$router->get('/communication/instructor-tickets', [CommunicationController::class, 'InstructorTickets']);
// Instructor messaging screen + its JSON API (CRUD). Also registered under the
// Apache subfolder paths (/fitnesshub/public/...).
foreach (['', '/fitnesshub/public'] as $prefix) {
    $router->get($prefix . '/communication/instructor-messages', [CommunicationController::class, 'InstructorMessages'], 'manage_messages');
    $router->get($prefix . '/messages', [CommunicationController::class, 'InstructorMessages'], 'manage_messages');

    $router->get($prefix . '/api/conversations', [CommunicationController::class, 'listConversations'], 'manage_messages');
    $router->get($prefix . '/api/messages', [CommunicationController::class, 'listMessages'], 'manage_messages');
    $router->post($prefix . '/api/messages/send', [CommunicationController::class, 'send'], 'manage_messages');
    $router->post($prefix . '/api/messages/read', [CommunicationController::class, 'markRead'], 'manage_messages');
    $router->post($prefix . '/api/messages/delete', [CommunicationController::class, 'delete'], 'manage_messages');
}

//instructor view member's profile
$router->get('/member/profile/nisal', [CommunicationController::class, 'profileNisal']);
$router->get('/admin/support_tickets', [CommunicationController::class, 'AdminTickets']);
$router->get('/admin/ticket_details', [CommunicationController::class, 'AdminTicketDetails']);
$router->get('/manager/support_tickets', [CommunicationController::class, 'ManagerTickets']);
