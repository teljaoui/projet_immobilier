<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use CodeIgniter\HTTP\ResponseInterface;

class ClientController extends BaseController
{
    public function index()
    {
        if (session()->get('role') !== 'client') {
            return redirect()->to('/login');
        }

        $data = [
            'user_id' => session()->get('user_id'),
            'user_name' => session()->get('user_name'),
            'user_email' => session()->get('user_email'),
            'role' => session()->get('role'),
            'title' => 'Mon profil'
        ];

        return view('client/pages/profile', $data);
    }

    public function store()
    {
        $rules = [
            'property_id' => 'required|integer',
            'message' => 'required|min_length[10]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Veuillez remplir correctement le message');
        }

        $orderModel = new OrderModel();

        $orderModel->insert([
            'user_id' => session()->get('user_id'),
            'property_id' => $this->request->getPost('property_id'),
            'client_message' => $this->request->getPost('message'),
        ]);

        return redirect()->back()
            ->with('success', 'Votre demande de visite a été envoyée avec succès');
    }

}
