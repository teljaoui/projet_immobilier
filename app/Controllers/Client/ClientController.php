<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ClientController extends BaseController
{
    public function index()
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        if (session()->get('role') !== 'client') {
            return redirect()->to('/login');
        }

        $data = [
            'user_id'    => session()->get('user_id'),
            'user_name'  => session()->get('user_name'),
            'user_email' => session()->get('user_email'),
            'role'       => session()->get('role'),
            'title'      => 'Mon profil'
        ];

        return view('client/pages/profile', $data);
    }

}
