<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;

final class AuthController extends \App\Core\Controller
{


    private User $user;


    public function __construct()
    {

        $this->user = new User(null, null, '', '', null);
    }
    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->view('auth/login');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Validate the input
            if (empty($username) || empty($password)) {
                $error = 'Please enter both username and password.';
                $this->view('auth/login', compact('error'));
                return;
            }


            if ($this->user->login($username, $password)) {


               // $token = bin2hex(random_bytes(32));
               session_regenerate_id(true);
                $_SESSION['user_email'] = $username;
                $user= $this->user->getuserbyemail($username);
                $_SESSION['user_id'] = $user['id'];

                header('Location: /ecommerce-mvc/public/index.php?route=index');
                exit;
            } else {
                $error = 'Invalid username or password.';
                $this->view('auth/login', compact('error'));
                return;
            }
        }
    }



    public function RIGSTER(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->view('auth/register');
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($name) || empty($email) || empty($password)) {
                $error = 'Please fill in all fields.';
                $this->view('auth/register', compact('error'));
                return;
            }

            $user = new User(null, $name, $email, password_hash($password, PASSWORD_DEFAULT), 'customer');
            $user->save();

           
            header('Location: /ecommerce-mvc/public/login.php');
            exit;
        }
    }
}
