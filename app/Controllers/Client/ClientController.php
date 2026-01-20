<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use App\Models\PropertyModel;
use CodeIgniter\HTTP\ResponseInterface;

class ClientController extends BaseController
{
    public function index()
    {
        $data = [
            'user_name' => session()->get('user_name'),
            'user_email' => session()->get('user_email'),
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

    public function orders()
    {
        $userId = session()->get('user_id'); 

        $orderModel = new OrderModel();
        $propertyModel = new PropertyModel();

        $ordersRaw = $orderModel
            ->where('user_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->findAll();

        $orders = [];
        foreach ($ordersRaw as $order) {
            $property = $propertyModel->find($order['property_id']);

            $orders[] = [
                'order_id' => $order['id'],
                'property_id' => $order['property_id'],
                'property_title' => $property['title'] ?? 'Bien supprimé',
                'client_message' => $order['client_message'],
                'agent_message' => $order['agent_message'] ?? '',
                'status' => $order['status'],
                'created_at' => $order['created_at'],
            ];
        }

        return view('client/pages/orders', [
            'orders' => $orders,
            'title' => 'Mes demandes de visite'
        ]);
    }

}
