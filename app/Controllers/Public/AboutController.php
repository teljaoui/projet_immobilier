<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AboutController extends BaseController
{
    public function index()
    {
         return view('public/pages/about' , [
        'title' => 'À propos de nous | Agence Immobilière'
    ]);
    }
}
