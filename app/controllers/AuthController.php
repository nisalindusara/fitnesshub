<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Role.php';
require_once __DIR__ . '/../services/AuthorizationService.php';

/**
 * Handles registration and login for all account types.
 *
 * Note: public self-registration (storeUser) only ever creates Customer
 * accounts — role_id stays NULL by default. Staff accounts (Manager, Super
 * Admin, etc.) are provisioned separately and never go through this flow.
 */
class AuthController extends Controller
{
    public function personalDetails(): void
    {
        $this->render('landing/personal-details', 'minimal');
    }

    public function storeUser(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $firstName = htmlspecialchars(trim($_POST['first_name'] ?? ''));
            $lastName  = htmlspecialchars(trim($_POST['last_name'] ?? ''));
            $email     = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
            $phone     = htmlspecialchars(trim($_POST['phone_number'] ?? ''));
            $password  = $_POST['password'] ?? '';

            // Never store raw passwords — password_hash() applies bcrypt by default.
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

            // register() returns int|false — falsy check catches both `false`
            // and (defensively) `0`, though lastInsertId() never legitimately returns 0.
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

    public function login(): void
    {
        // Flash-style error: read once, then clear, so a page refresh
        // doesn't keep re-showing a stale login error.
        $data['error'] = $_SESSION['error'] ?? null;
        unset($_SESSION['error']);

        $this->render('landing/login', 'minimal', $data);
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

            // Permissions are computed once, here, at login — not re-queried
            // on every request. Gate reads this cached array for the rest of
            // the session. Accepted trade-off: a permission change won't take
            // effect until the affected staff member logs in again.
            $authService = new AuthorizationService(new Role());
            $_SESSION['permissions'] = $authService->computePermissionsForRole($user['role_id'] ?? null);

            if (($user['role_id'] ?? null) !== null) {
                $roleModel = new Role();
                $role = $roleModel->findById($user['role_id']);

                $sidebarShellRoles = ['receptionist', 'ecommerce_admin', 'super_admin', 'manager'];
                $_SESSION['is_staff'] = in_array($role['name'], $sidebarShellRoles, true);
                $_SESSION['role_name'] = $role['name'];

                $redirects = [
                    'receptionist'     => '/members',
                    'ecommerce_admin'  => '/dashboard-ecom',
                    'super_admin'      => '/dashboard-super-admin',
                    'manager'          => '/dashboard-manager',
                    'instructor'       => '/my-clients',
                ];
                header('Location: ' . ($redirects[$role['name']] ?? '/dashboard'));
            } else {
                header('Location: /dashboard');
            }
            exit;
        }
        $_SESSION['error'] = 'Invalid email or password';
        header('Location: /login');
        exit;
    }
}
