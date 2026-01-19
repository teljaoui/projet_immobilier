<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $users = $userModel->where('role', 'admin')->orderBy('created_at', 'DESC')->findAll();

        return view('admin/pages/users', [
            'users' => $users,
            'title' => 'Gestion des utilisateurs'
        ]);
    }

    public function create()
    {
        return view('admin/pages/user_add', [
            'title' => 'Ajouter Un utilisateur ',
        ]);
    }
    public function store()
    {
        helper(['form']);

        $rules = [
            'firstName' => 'required|min_length[2]|max_length[50]',
            'lastName' => 'required|min_length[2]|max_length[50]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $userModel = new UserModel();

        $userData = [
            'firstName' => $this->request->getPost('firstName'),
            'lastName' => $this->request->getPost('lastName'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'admin'
        ];

        $userModel->insert($userData);

        return redirect()->to('admin/utilisateurs')
            ->with('success', 'Utilisateur ajouté avec succès');
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->to('admin/utilisateurs')
                ->with('error', 'Utilisateur introuvable');
        }

        return view('admin/pages/user_up', [
            'user' => $user,
            'title' => 'Modifier un utilisateur'
        ]);
    }

    public function update($id)
    {
        helper(['form']);

        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->to('admin/utilisateurs')
                ->with('error', 'Utilisateur introuvable');
        }

        $rules = [
            'firstName' => 'required|min_length[2]|max_length[50]',
            'lastName' => 'required|min_length[2]|max_length[50]',
            'email' => 'required|valid_email|is_unique[users.email,id,{id}]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $data = [
            'firstName' => $this->request->getPost('firstName'),
            'lastName' => $this->request->getPost('lastName'),
            'email' => $this->request->getPost('email'),
            'role' => 'admin'
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $userModel->update($id, $data);

        return redirect()->to('admin/utilisateurs')
            ->with('success', 'Utilisateur mis à jour avec succès');
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->to('admin/utilisateurs')
                ->with('error', 'Utilisateur introuvable');
        }

        $userModel->delete($id);

        return redirect()->to('admin/utilisateurs')
            ->with('success', 'Utilisateur supprimé avec succès');
    }



}
