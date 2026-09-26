<?php

$router->get('/communication/user-messages', [CommunicationController::class, 'UserMessages']);
$router->get('/communication/PTmember-messages',[CommunicationController::class, 'PTMemberMessages']);
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