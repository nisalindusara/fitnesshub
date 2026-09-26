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
}