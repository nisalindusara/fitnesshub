<?php

require_once __DIR__ . "/../../core/Controller.php";

class InstructorController extends Controller
{
    public function myClients(): void
    {
        $this->render('class_pt_module/my-clients', 'instructor-layout');
    }
}
