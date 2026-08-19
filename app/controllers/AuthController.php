<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/User.php';

class AuthController extends Controller 
{
    // Renders the form
    public function personalDetails(): void 
    {
        $this->render('landing/personal-details', 'landing-layout'); 
    }

    // Handles the form submission
    public function storeUser(): void 
    {
        // 1. Check if the request is a POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // 2. Sanitize and collect the input data
            $firstName = htmlspecialchars(trim($_POST['first_name'] ?? ''));
            $lastName  = htmlspecialchars(trim($_POST['last_name'] ?? ''));
            $email     = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
            $phone     = htmlspecialchars(trim($_POST['phone_number'] ?? ''));
            $password  = $_POST['password'] ?? '';

            // 3. Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // 4. Prepare data for the model
            $userData = [
                'first_name'    => $firstName,
                'last_name'     => $lastName,
                'email'         => $email,
                'phone_number'  => $phone,
                'password_hash' => $hashedPassword
            ];

            // 5. Instantiate the model and save to the database
            $userModel = new User();
            $newUserId = $userModel->register($userData);

            if ($newUserId) {
                session_regenerate_id(true);
                $_SESSION['user_id']   = $newUserId;
                $_SESSION['user_name'] = $firstName;

                header("Location: /dashboard");
                exit;
            } else {
                // Registration failed, handle the error (e.g., show an error message)
                echo "Registration failed. Please try again.";
            }
        }
    }

    public function login() : void {
        $data['error'] = $_SESSION['error'] ?? null;
        unset($_SESSION['error']); // clear it so it only shows once

        $this->render('landing/login', 'landing-layout', $data);
    }

    public function authenticate(): void
    {
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        $user = $userModel->findByEmail($email); 

        if ($user && password_verify($password, $user['password_hash'])) {
            session_regenerate_id(true);
            $_SESSION['user_id']   = $user['id'];
            $_SESSION['user_name'] = $user['first_name'];

            header('Location: /dashboard');
            exit;
        }

        // Failed login — store the error in session, then redirect (not render)
        $_SESSION['error'] = 'Invalid email or password';
        header('Location: /login');
        exit;
    }
}