<?php

require_once __DIR__ . '/../../core/Controller.php';

class CommunicationController extends Controller
{
   public function UserMessages():void
    {
    // Adjust the view helper function to match your project's view-loading convention:
    $this->render('communication_module/user_messages','member-layout');
    
    }    
}