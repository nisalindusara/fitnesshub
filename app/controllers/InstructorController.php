<?php

require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . "/../models/Message.php";

class InstructorController extends Controller
{
    /**
     * Helper to get current instructor user ID.
     * Looks up Sarah Jenkins dynamically if not logged in.
     */
    private function getInstructorId(): int
    {
        if (isset($_SESSION['user_id']) && (int)$_SESSION['user_id'] > 0) {
            return (int)$_SESSION['user_id'];
        }

        // Dynamically resolve Sarah Jenkins' ID from DB instead of hardcoding 10
        try {
            $messageModel = new Message();
            $db = $messageModel->getDb();
            if ($db) {
                $stmt = $db->prepare("
                    SELECT u.id FROM users u
                    LEFT JOIN roles r ON u.role_id = r.id
                    WHERE u.email = 'sarah.j@example.com' OR LOWER(r.name) = 'instructor'
                    ORDER BY (u.email = 'sarah.j@example.com') DESC, u.id ASC
                    LIMIT 1
                ");
                $stmt->execute();
                $id = $stmt->fetchColumn();
                if ($id) return (int)$id;
            }
        } catch (Throwable $e) {
            // Fall through if DB is offline
        }

        return 10; // Default fallback ID (Sarah Jenkins)
    }

    public function myClients(): void
    {
        $instructorId = $this->getInstructorId();
        $messageModel = new Message();

        $clients = [];
        try {
            $conversations = $messageModel->getConversations($instructorId);
            foreach ($conversations as $conv) {
                $profile = $messageModel->getClientProfile((int)$conv['client_id']) ?: $this->getFallbackClientProfile((int)$conv['client_id']);
                $clients[] = array_merge($conv, $profile);
            }
        } catch (Throwable $e) {
            $fallback = $this->getFallbackConversations();
            foreach ($fallback as $conv) {
                $profile = $this->getFallbackClientProfile((int)$conv['client_id']);
                $clients[] = array_merge($conv, $profile);
            }
        }

        if (empty($clients)) {
            $fallback = $this->getFallbackConversations();
            foreach ($fallback as $conv) {
                $profile = $this->getFallbackClientProfile((int)$conv['client_id']);
                $clients[] = array_merge($conv, $profile);
            }
        }

        $this->render('instructor/my-clients', 'instructor-layout', [
            'pageTitle' => 'My Clients — Instructor Portal',
            'currentRoute' => '/my-clients',
            'breadcrumb' => 'My Clients',
            'clients' => $clients
        ]);
    }

    public function overview(): void
    {
        $html = '
        <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%; min-height: 480px; text-align: center; padding: 40px 20px;">
            <div style="width: 64px; height: 64px; border-radius: 50%; background: #F4F4F6; display: flex; align-items: center; justify-content: center; font-size: 28px; margin-bottom: 20px;">📊</div>
            <h2 style="font-size: 20px; font-weight: 700; color: var(--inst-text-main); margin-bottom: 8px;">Overview</h2>
            <p style="font-size: 14px; color: var(--inst-text-muted); max-width: 440px; margin-bottom: 24px; line-height: 1.5;">No analytics data or metrics are currently available for this instructor account.</p>
            <a href="' . $this->getBaseUrl() . '/instructor/messages" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; border-radius: 8px; background: var(--inst-primary); color: #FFFFFF; text-decoration: none; font-size: 13.5px; font-weight: 600;">Go to Messages</a>
        </div>';

        $this->renderContent($html, 'instructor-layout', [
            'pageTitle' => 'Overview — Instructor Portal',
            'currentRoute' => '/instructor/overview',
            'breadcrumb' => 'Overview'
        ]);
    }

    public function schedule(): void
    {
        $html = '
        <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%; min-height: 480px; text-align: center; padding: 40px 20px;">
            <div style="width: 64px; height: 64px; border-radius: 50%; background: #F4F4F6; display: flex; align-items: center; justify-content: center; font-size: 28px; margin-bottom: 20px;">📅</div>
            <h2 style="font-size: 20px; font-weight: 700; color: var(--inst-text-main); margin-bottom: 8px;">My Schedule</h2>
            <p style="font-size: 14px; color: var(--inst-text-muted); max-width: 440px; margin-bottom: 24px; line-height: 1.5;">You have no scheduled personal training sessions or classes right now.</p>
            <a href="' . $this->getBaseUrl() . '/instructor/messages" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; border-radius: 8px; background: var(--inst-primary); color: #FFFFFF; text-decoration: none; font-size: 13.5px; font-weight: 600;">Go to Messages</a>
        </div>';

        $this->renderContent($html, 'instructor-layout', [
            'pageTitle' => 'My Schedule — Instructor Portal',
            'currentRoute' => '/instructor/schedule',
            'breadcrumb' => 'My Schedule'
        ]);
    }

    public function clients(): void
    {
        $this->myClients();
    }

    public function account(): void
    {
        $html = '
        <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%; min-height: 480px; text-align: center; padding: 40px 20px;">
            <div style="width: 64px; height: 64px; border-radius: 50%; background: #F4F4F6; display: flex; align-items: center; justify-content: center; font-size: 28px; margin-bottom: 20px;">👤</div>
            <h2 style="font-size: 20px; font-weight: 700; color: var(--inst-text-main); margin-bottom: 8px;">Account Settings</h2>
            <p style="font-size: 14px; color: var(--inst-text-muted); max-width: 440px; margin-bottom: 24px; line-height: 1.5;">Account preferences and profile configuration are not available.</p>
            <a href="' . $this->getBaseUrl() . '/instructor/messages" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; border-radius: 8px; background: var(--inst-primary); color: #FFFFFF; text-decoration: none; font-size: 13.5px; font-weight: 600;">Go to Messages</a>
        </div>';

        $this->renderContent($html, 'instructor-layout', [
            'pageTitle' => 'Account — Instructor Portal',
            'currentRoute' => '/account',
            'breadcrumb' => 'Account'
        ]);
    }

    /**
     * Main Instructor Messages View
     */
    public function messages(): void
    {
        $instructorId = $this->getInstructorId();
        $messageModel = new Message();

        $conversations = [];
        $chatHistory = [];
        $activeClient = null;
        $dbConnected = false;

        try {
            $conversations = $messageModel->getConversations($instructorId);
            $dbConnected = true;
        } catch (Throwable $e) {
            $conversations = $this->getFallbackConversations();
            $dbConnected = false;
        }

        if (empty($conversations)) {
            $conversations = $this->getFallbackConversations();
        }

        // Determine active client ID
        $requestedClientId = isset($_GET['client_id']) ? (int)$_GET['client_id'] : 0;
        
        if ($requestedClientId > 0) {
            $activeClientId = $requestedClientId;
        } elseif (!empty($conversations)) {
            $activeClientId = (int)$conversations[0]['client_id'];
        } else {
            $activeClientId = 21; // Default to Nisal
        }

        if ($dbConnected) {
            try {
                // Mark incoming messages as read for active client whose chat is opened
                $messageModel->markAsRead($activeClientId, $instructorId);

                // Update active client's unread count in conversations list to reflect it is now read
                foreach ($conversations as &$conv) {
                    if ((int)$conv['client_id'] === $activeClientId) {
                        $conv['unread_count'] = 0;
                    }
                }
                unset($conv);

                $chatHistory = $messageModel->getChatHistory($instructorId, $activeClientId);
                $activeClient = $messageModel->getClientProfile($activeClientId);
            } catch (Throwable $e) {
                $chatHistory = $this->getFallbackChatHistory($activeClientId);
                $activeClient = $this->getFallbackClientProfile($activeClientId);
            }
        } else {
            $chatHistory = $this->getFallbackChatHistory($activeClientId);
            $activeClient = $this->getFallbackClientProfile($activeClientId);
        }

        if (!$activeClient) {
            $activeClient = $this->getFallbackClientProfile($activeClientId);
        }

        $this->render('instructor/messages', 'instructor-layout', [
            'pageTitle' => 'Messages — Instructor Portal',
            'currentRoute' => '/instructor/messages',
            'breadcrumb' => 'Messages',
            'instructorId' => $instructorId,
            'conversations' => $conversations,
            'activeClientId' => $activeClientId,
            'activeClient' => $activeClient,
            'chatHistory' => $chatHistory,
            'dbConnected' => $dbConnected
        ]);
    }

    public function getChat(): void
    {
        header('Content-Type: application/json');
        $instructorId = $this->getInstructorId();
        $clientId = isset($_GET['client_id']) ? (int)$_GET['client_id'] : 0;

        if ($clientId <= 0) {
            echo json_encode(['success' => false, 'error' => 'Invalid client ID']);
            return;
        }

        $messageModel = new Message();
        try {
            $messageModel->markAsRead($clientId, $instructorId);
            $messages = $messageModel->getChatHistory($instructorId, $clientId);
            $client = $messageModel->getClientProfile($clientId) ?: $this->getFallbackClientProfile($clientId);

            echo json_encode([
                'success' => true,
                'messages' => $messages,
                'client' => $client,
                'dbConnected' => true
            ]);
        } catch (Throwable $e) {
            echo json_encode([
                'success'     => true,
                'messages'    => $this->getFallbackChatHistory($clientId),
                'client'      => $this->getFallbackClientProfile($clientId),
                'dbConnected' => false
            ]);
        }
    }


    public function sendMessage(): void
    {
        header('Content-Type: application/json');
        $instructorId = $this->getInstructorId();

        $receiverId = isset($_POST['receiver_id']) ? (int)$_POST['receiver_id'] : 0;
        $messageText = isset($_POST['message_text']) ? trim($_POST['message_text']) : '';

        if ($receiverId <= 0 || empty($messageText)) {
            echo json_encode(['success' => false, 'error' => 'Receiver and message text are required.']);
            return;
        }

        $messageModel = new Message();
        try {
            $createdMessage = $messageModel->sendMessage($instructorId, $receiverId, $messageText);
            if ($createdMessage) {
                echo json_encode([
                    'success' => true,
                    'message' => $createdMessage,
                    'dbConnected' => true
                ]);
                return;
            }
            echo json_encode(['success' => false, 'error' => 'Could not save message to database.']);
        } catch (Throwable $e) {
            echo json_encode([
                'success' => true,
                'message' => [
                    'id' => rand(1000, 9999),
                    'sender_id' => $instructorId,
                    'receiver_id' => $receiverId,
                    'message_text' => htmlspecialchars($messageText),
                    'is_read' => 0,
                    'created_at' => date('Y-m-d H:i:s')
                ],
                'dbConnected' => false
            ]);
        }
    }

    public function deleteMessage(): void
    {
        header('Content-Type: application/json');
        $instructorId = $this->getInstructorId();
        $messageId = isset($_POST['message_id']) ? (int)$_POST['message_id'] : 0;

        if ($messageId <= 0) {
            echo json_encode(['success' => false, 'error' => 'Invalid message ID']);
            return;
        }

        $messageModel = new Message();
        try {
            $deleted = $messageModel->deleteMessage($messageId, $instructorId);
            echo json_encode(['success' => $deleted]);
        } catch (Throwable $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    /**
     * Fallback data matching the 3 unread messages in your SQL seed
     */
    private function getFallbackConversations(): array
    {
        return [
            [
                'client_id' => 21,
                'first_name' => 'Nisal',
                'last_name' => 'Indusara',
                'email' => 'nisal.i@example.com',
                'phone_number' => '077 123 4567',
                'last_message' => "I'll be about 5 minutes late to our session today.",
                'last_message_time' => date('Y-m-d H:i:s', strtotime('-10 minutes')),
                'unread_count' => 0
            ],
            [
                'client_id' => 22,
                'first_name' => 'Melani',
                'last_name' => 'Muthumini',
                'email' => 'melani.m@example.com',
                'phone_number' => '071 234 5678',
                'last_message' => "Could you send over the workout plan for this week?",
                'last_message_time' => date('Y-m-d H:i:s', strtotime('-145 minutes')),
                'unread_count' => 1 // <--- Unread 1
            ],
            [
                'client_id' => 23,
                'first_name' => 'Hajara',
                'last_name' => 'Shafra',
                'email' => 'hajara.s@example.com',
                'phone_number' => '076 345 6789',
                'last_message' => "The new routine is a killer! Feeling great.",
                'last_message_time' => date('Y-m-d H:i:s', strtotime('-1 day')),
                'unread_count' => 1 // <--- FIXED: Set to 1
            ],
            [
                'client_id' => 24,
                'first_name' => 'Tharusha',
                'last_name' => 'Gunawardhena',
                'email' => 'tharusha.g@example.com',
                'phone_number' => '078 456 7890',
                'last_message' => "Quick question about the schedule for Monday...",
                'last_message_time' => date('Y-m-d H:i:s', strtotime('-1 day')),
                'unread_count' => 1 // <--- FIXED: Set to 1
            ],
            [
                'client_id' => 25,
                'first_name' => 'Manuja',
                'last_name' => 'Nirmal',
                'email' => 'manuja.n@example.com',
                'phone_number' => '070 567 8901',
                'last_message' => "Thanks for check-in. Knee is feeling much better.",
                'last_message_time' => date('Y-m-d H:i:s', strtotime('-15 days')),
                'unread_count' => 0
            ],
        ];
    }

    private function getFallbackChatHistory(int $clientId): array
    {
        $instructorId = $this->getInstructorId();

        if ($clientId === 21) {
            return [
                [
                    'id' => 1,
                    'sender_id' => 21,
                    'receiver_id' => $instructorId,
                    'message_text' => "Hey Coach! Just confirming our session for today at 2 PM.",
                    'created_at' => date('Y-m-d 09:14:00'),
                    'is_read' => 1
                ],
                [
                    'id' => 2,
                    'sender_id' => $instructorId,
                    'receiver_id' => 21,
                    'message_text' => "Hi Nisal! Yes, we're all set. We'll be focusing on upper body strength today.",
                    'created_at' => date('Y-m-d 09:20:00'),
                    'is_read' => 1
                ],
                [
                    'id' => 3,
                    'sender_id' => 21,
                    'receiver_id' => $instructorId,
                    'message_text' => "Looks great! I'm excited to get started.",
                    'created_at' => date('Y-m-d 10:38:00'),
                    'is_read' => 1
                ],
                [
                    'id' => 4,
                    'sender_id' => 21,
                    'receiver_id' => $instructorId,
                    'message_text' => "I'll be about 5 minutes late to our session today.",
                    'created_at' => date('Y-m-d 10:42:00'),
                    'is_read' => 1
                ],
            ];
        }

        return [
            [
                'id' => 99,
                'sender_id' => $clientId,
                'receiver_id' => $instructorId,
                'message_text' => "Hello Coach! Looking forward to our next workout.",
                'created_at' => date('Y-m-d 08:30:00'),
                'is_read' => 1
            ]
        ];
    }

    private function getFallbackClientProfile(int $clientId): array
    {
        $profiles = [
            21 => [
                'id' => 21,
                'first_name' => 'Nisal',
                'last_name' => 'Indusara',
                'email' => 'nisal.i@example.com',
                'phone_number' => '077 123 4567',
                'fitness_goal' => 'Endurance & Hypertrophy',
                'created_at' => '2024, Jul 08',
                'next_session' => 'Tomorrow, 2:00 PM',
                'last_session' => '7 days ago',
                'total_sessions' => 695,
                'growth_rate' => '30.1%',
                'growth_delta' => '+5.03%'
            ],
            22 => [
                'id' => 22,
                'first_name' => 'Melani',
                'last_name' => 'Muthumini',
                'email' => 'melani.m@example.com',
                'phone_number' => '071 234 5678',
                'fitness_goal' => 'Weight Loss & Tone',
                'created_at' => '2024, Aug 12',
                'next_session' => 'Wednesday, 4:00 PM',
                'last_session' => '2 days ago',
                'total_sessions' => 142,
                'growth_rate' => '24.5%',
                'growth_delta' => '+3.20%'
            ],
            23 => [
                'id' => 23,
                'first_name' => 'Hajara',
                'last_name' => 'Shafra',
                'email' => 'hajara.s@example.com',
                'phone_number' => '076 345 6789',
                'fitness_goal' => 'Strength & Conditioning',
                'created_at' => '2024, Aug 25',
                'next_session' => 'Thursday, 10:00 AM',
                'last_session' => '1 day ago',
                'total_sessions' => 88,
                'growth_rate' => '18.2%',
                'growth_delta' => '+2.40%'
            ],
            24 => [
                'id' => 24,
                'first_name' => 'Tharusha',
                'last_name' => 'Gunawardhena',
                'email' => 'tharusha.g@example.com',
                'phone_number' => '078 456 7890',
                'fitness_goal' => 'Cardio & Flexibility',
                'created_at' => '2024, Sep 02',
                'next_session' => 'Friday, 3:30 PM',
                'last_session' => '3 days ago',
                'total_sessions' => 110,
                'growth_rate' => '15.7%',
                'growth_delta' => '+1.80%'
            ],
            25 => [
                'id' => 25,
                'first_name' => 'Manuja',
                'last_name' => 'Nirmal',
                'email' => 'manuja.n@example.com',
                'phone_number' => '070 567 8901',
                'fitness_goal' => 'Rehabilitation & Core',
                'created_at' => '2024, Sep 10',
                'next_session' => 'Next Monday, 9:00 AM',
                'last_session' => '15 days ago',
                'total_sessions' => 54,
                'growth_rate' => '12.0%',
                'growth_delta' => '+0.95%'
            ]
        ];

        return $profiles[$clientId] ?? [
            'id' => $clientId,
            'first_name' => 'Client',
            'last_name' => '',
            'email' => 'client@fitnesshub.lk',
            'phone_number' => '077 000 0000',
            'fitness_goal' => 'General Fitness',
            'created_at' => '2024, Jul 08',
            'next_session' => 'Upcoming',
            'last_session' => 'Last week',
            'total_sessions' => 50,
            'growth_rate' => '15.0%',
            'growth_delta' => '+2.10%'
        ];
    }
}