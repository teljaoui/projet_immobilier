<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PropertyController extends BaseController
{
    public function index()
    {
        return view('public/pages/property', [
            'title' => 'Nos biens immobiliers'
        ]);
    }
}
