<?php

class InstructorScheduleController extends Controller
{
    public function mySchedule(): void
    {
        /*
         * Hardcoded demo data only.
         * Later this can be replaced by a WorkScheduleService / models.
         */

        $week = [
            'start' => 'Oct 21',
            'end'   => 'Oct 27',
            'year'  => '2024'
        ];

        $days = [
            [
                'key'   => 'mon',
                'name'  => 'Mon',
                'date'  => '21',
                'today' => true
            ],
            [
                'key'   => 'tue',
                'name'  => 'Tue',
                'date'  => '22',
                'today' => false
            ],
            [
                'key'   => 'wed',
                'name'  => 'Wed',
                'date'  => '23',
                'today' => false
            ],
            [
                'key'   => 'thu',
                'name'  => 'Thu',
                'date'  => '24',
                'today' => false
            ],
            [
                'key'   => 'fri',
                'name'  => 'Fri',
                'date'  => '25',
                'today' => false
            ],
            [
                'key'   => 'sat',
                'name'  => 'Sat',
                'date'  => '26',
                'today' => false
            ],
            [
                'key'   => 'sun',
                'name'  => 'Sun',
                'date'  => '27',
                'today' => false
            ]
        ];

        /*
         * top / height represent calendar positioning.
         *
         * Calendar starts at 07:00.
         * Each hour = 88px.
         */

        $schedule = [
            [
                'day'      => 'mon',
                'type'     => 'class',
                'title'    => 'HIIT Bootcamp',
                'subtitle' => 'Studio A · 12 Attendees',
                'start'    => '08:00',
                'end'      => '09:00',
                'status'   => 'Confirmed',
                'top'      => 88,
                'height'   => 78
            ],
            [
                'day'      => 'mon',
                'type'     => 'pt',
                'title'    => 'Marcus Johnson',
                'subtitle' => 'Strength & Conditioning',
                'start'    => '10:00',
                'end'      => '11:00',
                'status'   => 'Confirmed',
                'top'      => 264,
                'height'   => 78
            ],
            [
                'day'      => 'tue',
                'type'     => 'class',
                'title'    => 'Yoga Flow',
                'subtitle' => 'Studio B · 8 Attendees',
                'start'    => '09:00',
                'end'      => '10:30',
                'status'   => 'Confirmed',
                'top'      => 176,
                'height'   => 108
            ],
            [
                'day'      => 'tue',
                'type'     => 'floor',
                'title'    => 'Floor Duty',
                'subtitle' => 'Main Gym Floor',
                'start'    => '14:00',
                'end'      => '16:00',
                'status'   => 'Scheduled',
                'top'      => 616,
                'height'   => 132
            ],
            [
                'day'      => 'wed',
                'type'     => 'leave',
                'title'    => 'Approved Leave',
                'subtitle' => 'Holiday Break',
                'start'    => 'Full Day',
                'end'      => '',
                'status'   => 'Approved',
                'top'      => 20,
                'height'   => 130
            ],
            [
                'day'      => 'thu',
                'type'     => 'pt',
                'title'    => 'Sarah Chen',
                'subtitle' => 'Mobility Assessment',
                'start'    => '08:00',
                'end'      => '09:00',
                'status'   => 'Confirmed',
                'top'      => 88,
                'height'   => 78
            ],
            [
                'day'      => 'thu',
                'type'     => 'replacement',
                'title'    => 'Replacement',
                'subtitle' => 'Coach Mike · Spin',
                'start'    => '11:00',
                'end'      => '12:00',
                'status'   => 'Pending',
                'top'      => 352,
                'height'   => 78
            ],
            [
                'day'      => 'fri',
                'type'     => 'pt',
                'title'    => 'Elena Rostova',
                'subtitle' => 'Nutrition Check-in',
                'start'    => '09:00',
                'end'      => '10:00',
                'status'   => 'Confirmed',
                'top'      => 176,
                'height'   => 78
            ],
            [
                'day'      => 'fri',
                'type'     => 'floor',
                'title'    => 'Floor Duty',
                'subtitle' => 'Weight Room',
                'start'    => '13:00',
                'end'      => '15:00',
                'status'   => 'Scheduled',
                'top'      => 528,
                'height'   => 132
            ]
        ];

        $this->render(
            'work_schedule_module/instructor/my_schedule',
            'staff-layout',
            [
                'week'     => $week,
                'days'     => $days,
                'schedule' => $schedule
            ]
        );
    }
}