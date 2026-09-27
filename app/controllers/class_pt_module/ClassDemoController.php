<?php

class ClassDemoController extends Controller
{
    public function index(): void
    {
        $classes = [
            [
                'id' => 1,
                'name' => 'Yoga',
                'description' => 'Improve flexibility and mindfulness',
                'capacity' => 25,
                'duration' => 60,
                'status' => 'ACTIVE'
            ],
            [
                'id' => 2,
                'name' => 'Zumba',
                'description' => 'High-energy dance fitness',
                'capacity' => 30,
                'duration' => 45,
                'status' => 'ACTIVE'
            ],
            [
                'id' => 3,
                'name' => 'HIIT',
                'description' => 'Intense interval training',
                'capacity' => 20,
                'duration' => 30,
                'status' => 'ACTIVE'
            ],
            [
                'id' => 4,
                'name' => 'Strength Training',
                'description' => 'Build muscle and endurance',
                'capacity' => 15,
                'duration' => 50,
                'status' => 'INACTIVE'
            ]
        ];

        $this->render(
            'class_pt_module/classes/index',
            'staff-layout',
            [
                'classes' => $classes,
                'pageTitle' => 'Classes'
            ]
        );
    }


    public function create(): void
    {
        $this->render(
            'class_pt_module/classes/create',
            'staff-layout',
            [
                'pageTitle' => 'Add New Class'
            ]
        );
    }


    public function show(): void
    {
        $class = [
            'id' => 1,
            'name' => 'Yoga',
            'description' => 'Improve flexibility and mindfulness through guided poses and breathing exercises.',
            'capacity' => 25,
            'duration' => 60,
            'status' => 'ACTIVE'
        ];

        $sessions = [
            [
                'date' => 'Oct 5, 2026',
                'time' => '9:00 AM',
                'instructor' => 'Sarah Johnson',
                'booked' => 18,
                'capacity' => 25,
                'status' => 'SCHEDULED'
            ],
            [
                'date' => 'Oct 7, 2026',
                'time' => '6:00 PM',
                'instructor' => 'Mike Chen',
                'booked' => 25,
                'capacity' => 25,
                'status' => 'FULL'
            ],
            [
                'date' => 'Oct 10, 2026',
                'time' => '9:00 AM',
                'instructor' => 'Sarah Johnson',
                'booked' => 5,
                'capacity' => 25,
                'status' => 'OPEN'
            ],
            [
                'date' => 'Oct 12, 2026',
                'time' => '6:00 PM',
                'instructor' => 'Mike Chen',
                'booked' => 0,
                'capacity' => 25,
                'status' => 'SCHEDULED'
            ]
        ];

        $this->render(
            'class_pt_module/classes/show',
            'staff-layout',
            [
                'class' => $class,
                'sessions' => $sessions,
                'pageTitle' => 'Yoga'
            ]
        );
    }
public function sessions(): void
{
    $sessions = [

        [
            'id' => 1,
            'class_name' => 'Yoga Flow',
            'date' => 'Oct 15, 2026',
            'start_time' => '8:00 AM',
            'end_time' => '9:00 AM',
            'instructor' => 'Sarah Johnson',
            'capacity' => 20,
            'bookings' => 18,
            'status' => 'SCHEDULED'
        ],

        [
            'id' => 2,
            'class_name' => 'HIIT Express',
            'date' => 'Oct 15, 2026',
            'start_time' => '12:00 PM',
            'end_time' => '12:45 PM',
            'instructor' => 'Mike Chen',
            'capacity' => 16,
            'bookings' => 16,
            'status' => 'SCHEDULED'
        ],

        [
            'id' => 3,
            'class_name' => 'Core Pilates',
            'date' => 'Oct 14, 2026',
            'start_time' => '5:30 PM',
            'end_time' => '6:30 PM',
            'instructor' => 'Emma Wilson',
            'capacity' => 18,
            'bookings' => 15,
            'status' => 'COMPLETED'
        ],

        [
            'id' => 4,
            'class_name' => 'Power Cycle',
            'date' => 'Oct 14, 2026',
            'start_time' => '6:30 PM',
            'end_time' => '7:15 PM',
            'instructor' => 'Jordan Lee',
            'capacity' => 22,
            'bookings' => 20,
            'status' => 'COMPLETED'
        ],

        [
            'id' => 5,
            'class_name' => 'Strength Basics',
            'date' => 'Oct 16, 2026',
            'start_time' => '7:00 AM',
            'end_time' => '8:00 AM',
            'instructor' => 'Alex Rivera',
            'capacity' => 14,
            'bookings' => 9,
            'status' => 'SCHEDULED'
        ],

        [
            'id' => 6,
            'class_name' => 'Mobility Reset',
            'date' => 'Oct 13, 2026',
            'start_time' => '4:00 PM',
            'end_time' => '4:45 PM',
            'instructor' => 'Taylor Brooks',
            'capacity' => 12,
            'bookings' => 6,
            'status' => 'CANCELLED'
        ]

    ];

    $this->render(
        'class_pt_module/sessions/index',
        'staff-layout',
        [
            'sessions' => $sessions,
            'pageTitle' => 'Class Sessions'
        ]
    );
}


public function createSession(): void
{
    $this->render(
        'class_pt_module/sessions/create',
        'staff-layout',
        [
            'pageTitle' => 'Schedule Class Session'
        ]
    );
}


public function showSession(): void
{
    $session = [
        'id' => 1,
        'class_name' => 'Yoga Flow',
        'date' => 'Oct 22, 2026',
        'day' => 'Thursday',
        'start_time' => '8:00 AM',
        'end_time' => '9:00 AM',
        'instructor' => 'Sarah Johnson',
        'capacity' => 20,
        'bookings' => 18,
        'status' => 'SCHEDULED',
        'location' => 'Studio A'
    ];


    $members = [

        [
            'name' => 'Olivia Martinez',
            'email' => 'olivia.martinez@example.com',
            'booked_date' => 'Oct 4, 2026 · 10:24 AM',
            'status' => 'CONFIRMED'
        ],

        [
            'name' => 'Daniel Kim',
            'email' => 'daniel.kim@example.com',
            'booked_date' => 'Oct 5, 2026 · 2:18 PM',
            'status' => 'CONFIRMED'
        ],

        [
            'name' => 'Ava Thompson',
            'email' => 'ava.thompson@example.com',
            'booked_date' => 'Oct 7, 2026 · 9:42 AM',
            'status' => 'WAITLISTED'
        ],

        [
            'name' => 'Noah Williams',
            'email' => 'noah.williams@example.com',
            'booked_date' => 'Oct 8, 2026 · 4:05 PM',
            'status' => 'CONFIRMED'
        ]

    ];


    $this->render(
        'class_pt_module/sessions/show',
        'staff-layout',
        [
            'session' => $session,
            'members' => $members,
            'pageTitle' => 'Class Session Details'
        ]
    );
}
}