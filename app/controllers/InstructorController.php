<?php

require_once __DIR__ . "../core/Controller.php";

class InstructorController extends Controller
{
    public function myClients(): void
    {
        $instructorId = $_SESSION['user_id'];
        // query members/bookings WHERE instructor_id = $instructorId
        // (or however your schema links a member to their assigned instructor)
        $this->render('instructor/my-clients', 'instructor-layout');
    }
}
