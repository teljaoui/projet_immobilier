<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class DashboardController extends BaseController
{
    public function index()
    {
        $orderModel = new OrderModel();

        $orders = $orderModel
            ->select('orders.*, users.lastName as client_name, users.email as client_email, users.phone_number as client_phone')
            ->join('users', 'users.id = orders.user_id')
            ->orderBy('orders.created_at', 'DESC')
            ->findAll();

        return view('admin/pages/index', [
            'title' => 'Gestion des demandes',
            'orders' => $orders,
        ]);
    }

    public function show($id)
    {
        $orderModel = new OrderModel();

        $order = $orderModel
            ->select('orders.*, users.lastName as client_name, users.email as client_email, users.phone_number as client_phone, properties.title as property_title')
            ->join('users', 'users.id = orders.user_id')
            ->join('properties', 'properties.id = orders.property_id')
            ->where('orders.id', $id)
            ->first();

        if (!$order) {
            return redirect()->to('admin/demandes')->with('error', 'Demande introuvable');
        }

        return view('admin/pages/order_details', [
            'title' => 'Détail de la demande',
            'order' => $order
        ]);
    }

    public function update($id)
    {
        $orderModel = new OrderModel();

        $order = $orderModel->find($id);
        if (!$order) {
            return redirect()->to('admin/demandes')->with('error', 'Demande introuvable');
        }

        $agent_message = $this->request->getPost('agent_message');
        $status = $this->request->getPost('status');

        $validation = Services::validation();
        $validation->setRules([
            'status' => 'required|in_list[pending,accepted,rejected]'
        ]);

        if (!$validation->run(['agent_message' => $agent_message, 'status' => $status])) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $orderModel->update($id, [
            'agent_message' => $agent_message,
            'status' => $status
        ]);

        return redirect()->to('admin/demandes/detail/' . $id)->with('success', 'Demande mise à jour avec succès');
    }



}
