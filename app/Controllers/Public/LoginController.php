<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
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

}
