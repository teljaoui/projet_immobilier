<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    public function login()
    {
        return view('public/pages/auth/login', [
            'title' => 'Connexion | Agence Immobilière'
        ]);
    }

    public function register()
    {
        return view('public/pages/auth/register', [
            'title' => 'Inscription | Agence Immobilière'
        ]);
    }


    public function register_post()
    {
        helper(['form']);

        $rules = [
            'firstName' => 'required|min_length[2]|max_length[100]',
            'lastName' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('validation', $this->validator);
        }

        $userModel = new UserModel();

        $userModel->insert([
            'firstName' => $this->request->getPost('firstName'),
            'lastName' => $this->request->getPost('lastName'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'role' => 'client'
        ]);

        return redirect()->to('connexion')
            ->with('success', 'Inscription réussie. Vous pouvez vous connecter.');
    }

    public function login_post()
    {
        helper(['form']);

        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('validation', $this->validator);
        }

        $userModel = new UserModel();

        $user = $userModel
            ->where('email', $this->request->getPost('email'))
            ->first();

        if (!$user) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Email ou mot de passe incorrect');
        }

        if (
            !password_verify(
                $this->request->getPost('password'),
                $user['password']
            )
        ) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Email ou mot de passe incorrect');
        }

        session()->set([
            'user_id' => $user['id'],
            'user_name' => $user['firstName'] . ' ' . $user['lastName'],
            'user_email' => $user['email'],
            'role' => $user['role'],
            'isLoggedIn' => true,
        ]);

        if ($user['role'] === 'admin') {
            return redirect()->to('/admin/dashboard');
        }

        return redirect()->to('/client');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')
            ->with('success', 'Déconnexion réussie.');
    }
}
