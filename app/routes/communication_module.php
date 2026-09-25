<?php

$router->get('/communication/user-messages', [CommunicationController::class, 'UserMessages']);
$router->get('/communication/PTmember-messages',[CommunicationController::class, 'PTMemberMessages']);
$router->get('/communication/chat-marcus', [CommunicationController::class, 'chatMarcus']);
$router->get('/communication/chat-sarah', [CommunicationController::class, 'chatSarah']);
$router->get('/communication/chat-support', [CommunicationController::class, 'chatSupport']);
$router->get('/instructor/profile/marcus', [CommunicationController::class, 'profileMarcus']);
$router->get('/instructor/profile/sarah', [CommunicationController::class, 'profileSarah']);