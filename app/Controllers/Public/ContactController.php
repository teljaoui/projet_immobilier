<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use App\Models\ContactModel;
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
    public function store()
    {
        helper(['form']);

        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|valid_email',
            'phone_number' => 'required|numeric|min_length[8]|max_length[15]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $contactModel = new ContactModel();

        $contactData = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone_number' => $this->request->getPost('phone_number'),
            'message' => $this->request->getPost('message'),
        ];

        $contactModel->insert($contactData);

        return redirect()->to('/contact')
            ->with('success', 'Message envoyé avec succès !');
    }

}
