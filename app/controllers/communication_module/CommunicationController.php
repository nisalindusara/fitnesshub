<?php

require_once __DIR__ . '/../../core/Controller.php';

class CommunicationController extends Controller
{
   public function UserMessages():void
    {
    // Adjust the view helper function to match your project's view-loading convention:
    $this->render('communication_module/user_messages','member-layout');
    
    } 
    public function PTMemberMessages():void
    {
        $this->render('communication_module/Member_withPT_messages','member-layout');
    } 
    public function chatMarcus()
    {
        $name = 'Coach Marcus';
        $role = 'PERSONAL INSTRUCTOR';
        $avatar = '/uploads/profiles/profile_1.jpg';
        $profile_url ='/instructor/profile/marcus';
        $user_name = $_SESSION['user_name'] ?? 'Member';
        $messages = [
            ['type' => 'incoming', 'text' => "That's totally normal! DOMS usually peaks around 24–48 hours post–workout.", 'time' => '10:48 AM'],
            ['type' => 'incoming', 'text' => 'Make sure to hydrate well today and try to get in some light movement. Active recovery is key.', 'time' => '10:48 AM'],
            ['type' => 'outgoing', 'text' => "Thanks! I'll do that routine on my lunch break.", 'time' => '10:52 AM'],
            ['type' => 'outgoing', 'text' => 'Are we still on for Thursday at 6 AM?', 'time' => '10:52 AM']
        ];
        $this->render('communication_module/chat_conversation','member-layout',compact('name', 'role', 'avatar', 'profile_url', 'messages', 'user_name'));
    }

    public function chatSarah()
    {
        $name = 'Sarah Miller';
        $role = 'NUTRITIONIST';
        $avatar = '/uploads/profiles/profile_2.jpg';
        $profile_url ='/instructor/profile/sarah';
        $user_name = $_SESSION['user_name'] ?? 'Member';
        $messages = [
            ['type' => 'incoming', 'text' => "Hey! How is your protein intake looking this week?", 'time' => 'Yesterday'],
            ['type' => 'incoming', 'text' => "Don't forget to track your hydration targets today.", 'time' => 'Yesterday'],
            ['type' => 'outgoing', 'text' => 'Hit 140g yesterday, feeling much more energetic!', 'time' => '8:15 AM'],
            ['type' => 'incoming', 'text' => 'Awesome work! Keep that momentum going through the weekend.', 'time' => '8:20 AM'],
            ['type' => 'outgoing', 'text' => 'Will do! Should I adjust carbs on Saturday?', 'time' => '9:00 AM'],
            ['type' => 'incoming', 'text' => 'Keep them moderate if you plan on doing high intensity training.', 'time' => '9:15 AM'],
        ];
        $this->render('communication_module/chat_conversation','member-layout',compact('name', 'role', 'avatar', 'profile_url', 'messages', 'user_name'));
    }

    public function chatSupport()
    {
        $name = 'FitnessHub Support Desk';
        $role = 'CUSTOMER SUPPORT';
        $avatar = '/uploads/Communication/SupportTeam.png';
        $profile_url = null;
        $user_name = $_SESSION['user_name'] ?? 'Member';
        $messages = [
            ['type' => 'incoming', 'text' => 'Welcome to FitnessHub! Let us know if you need any assistance getting started.', 'time' => 'Sep 24'],
            ['type' => 'outgoing', 'text' => 'Could you help me change my default subscription payment method?', 'time' => 'Sep 24'],
            ['type' => 'incoming', 'text' => 'Certainly, head over to your Account > Payment settings to update your card.', 'time' => 'Sep 24']
        ];
        $this->render('communication_module/chat_conversation','member-layout',compact('name', 'role', 'avatar', 'profile_url', 'messages', 'user_name')); 
    } 
    public function chatElena()
    {
        $name = 'Coach Elena';
        $role = 'MEAL PLAN INSTRUCTOR';
        $avatar = '/uploads/profiles/profile_5.jpg';
        $profile_url = '/instructor/profile/elena';
        $user_name = $_SESSION['user_name'] ?? 'Member';

        $messages = [
            ['type' => 'incoming', 'text' => "Hi there! I reviewed your progress log from this past week.", 'time' => 'Yesterday'],
            ['type' => 'incoming', 'text' => "I've updated your macros for the week to keep you energized for your sessions.", 'time' => 'Yesterday'],
            ['type' => 'outgoing', 'text' => "Thanks Elena! Should I still keep carbs lower on rest days?", 'time' => '8:20 AM'],
            ['type' => 'incoming', 'text' => "Yes, slightly lower on rest days, but keep protein steady.", 'time' => '9:05 AM']
        ];

        $this->render('communication_module/chat_conversation', 'member-layout', compact('name', 'role', 'avatar', 'profile_url', 'messages', 'user_name')); 
    }

    public function profileMarcus()
    {
        $instructor = [
            'name' => 'Coach Marcus',
            'title' => 'Senior Fitness Instructor',
            'experience' => '8 years experience',
            'avatar' => '/uploads/profiles/profile_1.jpg',
            'chat_route' => '/communication/chat-marcus',
            'tags' => [
                ['name' => 'Yoga', 'color' => 'tag-purple'],
                ['name' => 'Strength Training', 'color' => 'tag-orange'],
                ['name' => 'Cardio', 'color' => 'tag-pink'],
                ['name' => 'Personal Training', 'color' => 'tag-blue'],
                ['name' => 'HIIT', 'color' => 'tag-green']
            ],
            'stats' => ['exp_years' => '8', 'years_with_us' => '3', 'clients' => '120+'],
            'about_paragraphs' => [
                "Marcus began his fitness journey as a competitive athlete and quickly discovered a passion for helping others unlock their physical potential. With over eight years of hands-on experience spanning group classes and one-on-one coaching, he blends evidence-based programming with mindfulness principles.",
                "His coaching philosophy centers on sustainable progress — he believes that consistency, proper form, and enjoying the process matter far more than short-term intensity. Whether you're stepping into the gym for the first time or chasing a personal record, Marcus meets you exactly where you are."
            ],
            'certification' => 'Certified Personal Trainer (CPT)'
        ];
        require_once "../app/views/communication_module/instructor_profile_view.php";
    }

    public function profileSarah()
    {
        $instructor = [
            'name' => 'Sarah Miller',
            'title' => 'Clinical Nutritionist & Trainer',
            'experience' => '6 years experience',
            'avatar' => '/uploads/profiles/profile_2.jpg',
            'chat_route' => '/communication/chat-sarah',
            'tags' => [
                ['name' => 'Diet Planning', 'color' => 'tag-green'],
                ['name' => 'Strength Training', 'color' => 'tag-orange'],
                ['name' => 'Cardio', 'color' => 'tag-pink']
            ],
            'stats' => ['exp_years' => '6', 'years_with_us' => '2', 'clients' => '95+'],
            'about_paragraphs' => [
                "Sarah specializes in evidence-based metabolic health and custom nutritional protocols to support high-performance training goals."
            ],
            'certification' => 'Registered Dietitian & CPT'
        ];
        require_once "../app/views/communication_module/instructor_profile_view.php";
    }

    public function profileKavindu()
    {
        $instructor = [
            'name' => 'Kavindu Perera',
            'title' => 'Clinical Nutritionist & Trainer',
            'experience' => '6 years experience',
            'avatar' => '/uploads/profiles/profile_3.jpg',
            'chat_route' => '/communication/chat-sarah',
            'tags' => [
                ['name' => 'Diet Planning', 'color' => 'tag-green'],
                ['name' => 'Strength Training', 'color' => 'tag-orange'],
                ['name' => 'Cardio', 'color' => 'tag-pink']
            ],
            'stats' => ['exp_years' => '6', 'years_with_us' => '2', 'clients' => '95+'],
            'about_paragraphs' => [
                "Sarah specializes in evidence-based metabolic health and custom nutritional protocols to support high-performance training goals."
            ],
            'certification' => 'Registered Dietitian & CPT'
        ];
        require_once "../app/views/communication_module/instructor_profile_view.php";
    }

        // 1. Non-PT Member Message Overview
    public function NonPTMessages()
    {
        $this->render('communication_module/NonPT_messages','member-layout');
    }

    // 3. Coach Elena's Profile Screen (reusing instructor_profile.php)
    public function profileElena()
    {
        $instructor = [
            'name' => 'Elena Rostova',
            'title' => 'Certified Nutrition & Meal Plan Specialist',
            'experience' => '6 years experience',
            'avatar' => '/uploads/profiles/profile_5.jpg',
            'chat_route' => '/communication/chat-elena',
            'tags' => [
                ['name' => 'Meal Planning', 'color' => 'tag-green'],
                ['name' => 'Sports Nutrition', 'color' => 'tag-orange'],
                ['name' => 'Habit Coaching', 'color' => 'tag-blue'],
                ['name' => 'Weight Management', 'color' => 'tag-purple']
            ],
            'stats' => ['exp_years' => '6', 'years_with_us' => '2', 'clients' => '95+'],
            'about_paragraphs' => [
                "Elena specializes in evidence-based metabolic health and custom nutritional protocols to support high-performance training goals.",
                "She believes in sustainable, enjoyable eating habits rather than restrictive dieting, ensuring you fuel your workouts while still hitting your body composition targets."
            ],
            'certification' => 'Precision Nutrition Level 2 (Pn2) & Registered Dietitian'
        ];

        require_once "../app/views/communication_module/instructor_profile_view.php";
    }

    public function availableInstructors()
    {
        $instructors = [
            [
                'name' => 'Coach Marcus',
                'title' => 'Personal Instructor',
                'experience' => '8 years exp',
                'avatar' => '/uploads/profiles/profile_1.jpg',
                'profile_url' => '/instructor/profile/marcus',
                'chat_url' => '/communication/chat-marcus',
                'tags' => ['Strength Training', 'Personal Training', 'HIIT']
            ],
            [
                'name' => 'Sarah Miller',
                'title' => 'Clinical Nutritionist & Trainer',
                'experience' => '6 years exp',
                'avatar' => '/uploads/profiles/profile_2.jpg',
                'profile_url' => '/instructor/profile/sarah',
                'chat_url' => '/communication/chat-sarah',
                'tags' => ['Meal Planning', 'Habit Coaching', 'Weight Loss']
            ],
            [
                'name' => 'Kavindu Perera',
                'title' => 'Senior Fitness Instructor',
                'experience' => '8 years exp',
                'avatar' => '/uploads/profiles/profile_3.jpg',
                'profile_url' => '/instructor/profile/kavindu',
                'chat_url' => '/communication/chat-marcus', // links to active chat
                'tags' => ['Yoga', 'Cardio', 'Mobility']
            ]
        ];

        require_once "../app/views/communication_module/available_instructors.php";
    }

    public function EmptySupportTickets()
    {
      $this->render('communication_module/empty_user_submit_ticket','member-layout');  
    }

    public function userTicketForm()
    {
      $this->render('communication_module/user_ticketForm','member-layout');  
    }

    public function UserSupportTickets()
    {
      $this->render('communication_module/user_submit_ticket','member-layout');  
    }
    public function InstructorTickets()
    {
        $user_name = 'Instructor';
        $data = [
            'user_name' => $user_name
        ];

        // Pass $data or compact('user_name') depending on your Base Controller's render method
        $this->render('communication_module/instructor_ticket', 'staff-layout', $data);
    }      
}