<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FavoritesController extends BaseController
{
    public function index()
    {
        return view('public/pages/favorites', [
            'title' => 'Favorites | Agence Immobilière'
        ]);

    }
}
