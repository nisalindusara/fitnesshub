<?php

class AuthController extends Controller
{
    public function showPersonalDetailsScreen(): void
    {
        $this->render('landing/personal-details', 'minimal');
    }

    public function registerNewUserAccount(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $firstName = htmlspecialchars(trim($_POST['first_name'] ?? ''));
            $lastName  = htmlspecialchars(trim($_POST['last_name'] ?? ''));
            $email     = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
            $phone     = htmlspecialchars(trim($_POST['phone_number'] ?? ''));
            $password  = $_POST['password'] ?? '';

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $userData = [
                'first_name'    => $firstName,
                'last_name'     => $lastName,
                'email'         => $email,
                'phone_number'  => $phone,
                'password_hash' => $hashedPassword
            ];

            $userModel = new User();
            $newUserId = $userModel->register($userData);

            if ($newUserId) {
                session_regenerate_id(true);
                $_SESSION['user_id']   = $newUserId;
                $_SESSION['user_name'] = $firstName;

                header("Location: /dashboard");
                exit;
            } else {
                echo "Registration failed. Please try again.";
            }
        }
    }

    public function showLoginScreen(): void
    {
        $data['error'] = $_SESSION['error'] ?? null;
        unset($_SESSION['error']);

        $this->render('landing/login', 'minimal', $data);
    }

    public function authenticateUserOnLogin(): void
    {
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password_hash'])) {
            session_regenerate_id(true);
            $_SESSION['user_id']       = $user['id'];
            $_SESSION['user_name']     = $user['first_name'];
            $_SESSION['user_last_name'] = $user['last_name'];
            $_SESSION['user_avatar']   = $user['profile_image'];

            $authService = new AuthorizationService(new Role());
            $_SESSION['permissions'] = $authService->computePermissionsForRole($user['role_id'] ?? null);

            if (($user['role_id'] ?? null) !== null) {
                $roleModel = new Role();
                $role = $roleModel->findById($user['role_id']);

                $sidebarShellRoles = ['receptionist', 'ecommerce_admin', 'super_admin', 'manager', 'instructor'];
                $_SESSION['is_staff']  = in_array($role['name'], $sidebarShellRoles, true);
                $_SESSION['role_name'] = $role['name'];

                header('Location: ' . SessionHelper::resolveHomeRouteForSession());
            } else {
                header('Location: /member');
            }
            exit;
        }
        $_SESSION['error'] = 'Invalid email or password';
        header('Location: /login');
        exit;
    }

    public function userLogout(): void
    {
        $_SESSION = [];

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }


        session_destroy();

        header('Location: /login');
        exit;
    }
}
