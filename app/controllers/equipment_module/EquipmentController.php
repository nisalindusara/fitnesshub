<?php

/**
 * Gym equipment and the facility map.
 * Not connected to the database yet — shows sample data.
 */
class EquipmentController extends Controller
{
    public function showEquipmentScreen(): void
    {
        $equipment = [
            ['Treadmill #3', 'Cardio zone', 'Sep 12, 2026', 'working'],
            ['Squat rack #2', 'Free weights', 'Aug 30, 2026', 'working'],
            ['Rowing machine #1', 'Cardio zone', 'Sep 20, 2026', 'needs service'],
            ['Cable crossover', 'Machines', 'Jul 18, 2026', 'out of order'],
            ['Spin bike #7', 'Studio C', 'Sep 02, 2026', 'working'],
        ];

        $tones = ['working' => 'success', 'needs service' => 'warning', 'out of order' => 'danger'];

        $this->render('staff/preview-screen', 'staff-layout', [
            'pageTitle' => 'Equipment',
            'subtitle'  => 'Machines and gear on the floor, and their service status.',
            'actions'   => [
                ['label' => 'Facility map', 'href' => '/portal/facility-map', 'primary' => true, 'permission' => 'view_facility_map'],
            ],
            'stats' => [
                ['label' => 'Total items', 'value' => 64, 'meta' => 'Across 5 zones'],
                ['label' => 'Needs service', 'value' => 3, 'meta' => 'Book a technician'],
                ['label' => 'Out of order', 'value' => 1, 'meta' => 'Cable crossover', 'alert' => true],
            ],
            'table' => [
                'columns' => ['Item', 'Zone', 'Last serviced', 'Status'],
                'rows'    => array_map(fn($e) => [
                    ['text' => $e[0]],
                    $e[1],
                    $e[2],
                    ['tag' => ucfirst($e[3]), 'tone' => $tones[$e[3]]],
                ], $equipment),
            ],
        ]);
    }

    public function showFacilityMapScreen(): void
    {
        $zones = [
            ['Cardio zone', 'Ground floor, east', '22 / 30', 'busy'],
            ['Free weights', 'Ground floor, west', '14 / 25', 'normal'],
            ['Machines', 'First floor', '6 / 20', 'quiet'],
            ['Studio A', 'First floor', 'Strength Foundations, 12 / 20', 'class running'],
            ['Studio C', 'First floor', 'Empty until 5:00 PM', 'quiet'],
        ];

        $tones = ['busy' => 'warning', 'normal' => 'neutral', 'quiet' => 'success', 'class running' => 'neutral'];

        $this->render('staff/preview-screen', 'staff-layout', [
            'pageTitle' => 'Facility Map',
            'subtitle'  => 'How busy each zone of the gym is right now.',
            'actions'   => [
                ['label' => 'Equipment', 'href' => '/portal/equipment', 'permission' => 'manage_equipment'],
            ],
            'stats' => [
                ['label' => 'People in the gym', 'value' => 54, 'meta' => 'Checked in right now'],
                ['label' => 'Busiest zone', 'value' => 'Cardio', 'meta' => '73% full'],
                ['label' => 'Classes running', 'value' => 1, 'meta' => 'Studio A'],
            ],
            'table' => [
                'columns' => ['Zone', 'Location', 'In use', 'Right now'],
                'rows'    => array_map(fn($z) => [
                    ['text' => $z[0]],
                    $z[1],
                    $z[2],
                    ['tag' => ucfirst($z[3]), 'tone' => $tones[$z[3]]],
                ], $zones),
            ],
        ]);
    }
}
