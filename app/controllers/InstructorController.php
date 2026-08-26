<?php

require_once __DIR__ . "/../core/Controller.php";

class InstructorController extends Controller
{
    public function myClients(): void
    {
        $this->render('instructor/my-clients', 'instructor-layout');
    }
}
