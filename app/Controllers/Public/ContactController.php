<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ContactController extends BaseController
{
    public function index()
    {
        return view('public/pages/contact', [
            'title' => 'Contact | Agence Immobilière'
        ])
        ;
    }
}
