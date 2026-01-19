<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ContactModel;
use CodeIgniter\HTTP\ResponseInterface;

class MessageController extends BaseController
{
    public function index()
    {
        $contactModel = new ContactModel();

        $messages = $contactModel->orderBy('created_at', 'DESC')->findAll();

        return view('admin/pages/messages', [
            'title' => 'Gestion des Messages',
            'messages' => $messages
        ]);
    }
}
