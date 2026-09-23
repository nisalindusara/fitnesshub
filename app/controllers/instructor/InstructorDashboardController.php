<?php

class InstructorDashboardController extends Controller
{
    public function showInstructorOverviewScreen(): void
    {
        $this->render('instructor/instructor-overview', 'staff-layout');
    }
}
