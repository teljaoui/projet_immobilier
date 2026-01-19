<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PropertyImageModel;
use App\Models\PropertyModel;
use App\Models\PropertyTypeModel;
use CodeIgniter\HTTP\ResponseInterface;

class PropertyController extends BaseController
{
    public function index()
    {
        $propertyModel = new PropertyModel();
        $imageModel = new PropertyImageModel();
        $typeModel = new PropertyTypeModel();
        $properties = $propertyModel->orderBy('created_at', 'DESC')->findAll(6);

        foreach ($properties as &$property) {
            $image = $imageModel
                ->where('property_id', $property['id'])
                ->where('is_main', 1)
                ->first();

            $property['image'] = $image['image'] ?? null;

            $type = $typeModel->find($property['type_id']);
            $property['type_name'] = $type['name'] ?? 'Non défini';
        }
        return view('admin/pages/property', [
            'title' => 'Gestion des Biens',
            'properties' => $properties
        ]);
    }

    public function create()
    {
        $propertyTypeModel = new PropertyTypeModel();
        return view('admin/pages/property_add', [
            'title' => 'Ajouter des Biens',
            'properties_type' => $propertyTypeModel->findAll()
        ]);
    }

    public function store()
    {
        helper(['form']);

        $rules = [
            'title' => 'required|min_length[3]|max_length[150]',
            'description' => 'required|min_length[10]',
            'price' => 'required|decimal',
            'transaction_type' => 'required|in_list[vente,location]',
            'type_id' => 'required|is_not_unique[property_types.id]',
            'surface' => 'required|integer',
            'city' => 'required|max_length[255]',
            'address' => 'required|max_length[255]',
            'main_image' => [
                'rules' => 'uploaded[main_image]|max_size[main_image,5120]|is_image[main_image]',
                'errors' => [
                    'uploaded' => 'Veuillez ajouter l’image principale',
                    'is_image' => 'Le fichier doit être une image',
                    'max_size' => 'Image trop grande (max 5MB)'
                ]
            ],
            'images' => [
                'rules' => 'max_size[images,5120]|is_image[images]',
                'errors' => [
                    'is_image' => 'Tous les fichiers doivent être des images',
                    'max_size' => 'Image trop grande (max 5MB)'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $propertyModel = new PropertyModel();

        $propertyData = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'transaction_type' => $this->request->getPost('transaction_type'),
            'type_id' => $this->request->getPost('type_id'),
            'surface' => $this->request->getPost('surface'),
            'rooms' => $this->request->getPost('rooms'),
            'bedrooms' => $this->request->getPost('bedrooms'),
            'bathrooms' => $this->request->getPost('bathrooms'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
            'city' => $this->request->getPost('city'),
            'address' => $this->request->getPost('address'),
        ];

        $propertyId = $propertyModel->insert($propertyData, true);

        if (!$propertyId) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erreur lors de l’enregistrement du bien');
        }

        $imageModel = new PropertyImageModel();

        $mainImage = $this->request->getFile('main_image');
        if ($mainImage && $mainImage->isValid() && !$mainImage->hasMoved()) {
            $mainName = $mainImage->getRandomName();
            $mainImage->move('assets/img/uploads/', $mainName);

            $imageModel->insert([
                'property_id' => $propertyId,
                'image' => 'assets/img/uploads/' . $mainName,
                'is_main' => 1,
            ]);
        }

        $otherImages = $this->request->getFiles()['images'] ?? [];
        foreach ($otherImages as $image) {
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move('assets/img/uploads/', $newName);

                $imageModel->insert([
                    'property_id' => $propertyId,
                    'image' => 'assets/img/uploads/' . $newName,
                    'is_main' => 0
                ]);
            }
        }

        return redirect()->to('admin/biens')
            ->with('success', 'Bien ajouté avec succès');
    }

    public function edit($id)
    {
        $propertyModel = new PropertyModel();
        $imageModel = new PropertyImageModel();
        $property = $propertyModel->find($id);

        if (!$property) {
            return redirect()->to('admin/biens')
                ->with('error', 'Bien introuvable');
        }

        $propertyTypeModel = new PropertyTypeModel();
        $properties_type = $propertyTypeModel->findAll();

        $images = $imageModel->where('property_id', $property['id'])->findAll();
        $property['images'] = $images;


        return view('admin/pages/property_up', [
            'title' => 'Modifier le bien',
            'property' => $property,
            'properties_type' => $properties_type
        ]);
    }

    public function update($id)
    {
        helper(['form']);

        $propertyModel = new PropertyModel();
        $property = $propertyModel->find($id);

        if (!$property) {
            return redirect()->to('admin/biens')
                ->with('error', 'Bien introuvable');
        }

        $rules = [
            'title' => 'required|min_length[3]|max_length[150]',
            'description' => 'required|min_length[10]',
            'price' => 'required|decimal',
            'transaction_type' => 'required|in_list[vente,location]',
            'type_id' => 'required|is_not_unique[property_types.id]',
            'surface' => 'required|integer',
            'city' => 'required|max_length[255]',
            'address' => 'required|max_length[255]',
            'main_image' => [
                'rules' => 'max_size[main_image,5120]|is_image[main_image]',
                'errors' => [
                    'is_image' => 'Le fichier doit être une image',
                    'max_size' => 'Image trop grande (max 5MB)'
                ]
            ],
            'images.*' => [
                'rules' => 'max_size[images,5120]|is_image[images]',
                'errors' => [
                    'is_image' => 'Tous les fichiers doivent être des images',
                    'max_size' => 'Image trop grande (max 5MB)'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $propertyData = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'transaction_type' => $this->request->getPost('transaction_type'),
            'type_id' => $this->request->getPost('type_id'),
            'surface' => $this->request->getPost('surface'),
            'rooms' => $this->request->getPost('rooms'),
            'bedrooms' => $this->request->getPost('bedrooms'),
            'bathrooms' => $this->request->getPost('bathrooms'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
            'city' => $this->request->getPost('city'),
            'address' => $this->request->getPost('address'),
        ];

        $propertyModel->update($id, $propertyData);

        $imageModel = new PropertyImageModel();

        $mainImage = $this->request->getFile('main_image');
        if ($mainImage && $mainImage->isValid() && !$mainImage->hasMoved()) {
            $imageModel->where('property_id', $id)->set(['is_main' => 0])->update();

            $mainName = $mainImage->getRandomName();
            $mainImage->move('assets/img/uploads/', $mainName);

            $imageModel->insert([
                'property_id' => $id,
                'image' => 'assets/img/uploads/' . $mainName,
                'is_main' => 1
            ]);
        }

        $otherImages = $this->request->getFiles()['images'] ?? [];
        foreach ($otherImages as $image) {
            if ($image && $image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move('assets/img/uploads/', $newName);

                $imageModel->insert([
                    'property_id' => $id,
                    'image' => 'assets/img/uploads/' . $newName,
                    'is_main' => 0
                ]);
            }
        }

        return redirect()->to('admin/biens')
            ->with('success', 'Bien mis à jour avec succès');
    }

    public function delete($id)
    {
        $propertyModel = new PropertyModel();
        $imageModel = new PropertyImageModel();

        $property = $propertyModel->find($id);
        if (!$property) {
            return redirect()->to('admin/biens')->with('error', 'Bien introuvable.');
        }

        $images = $imageModel->where('property_id', $id)->findAll();
        foreach ($images as $img) {
            $filePath = WRITEPATH . '../public/img/uploads/' . $img['image'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $imageModel->where('property_id', $id)->delete();

        $propertyModel->delete($id);

        return redirect()->to('admin/biens')->with('success', 'Bien supprimé avec succès.');
    }

    public function delete_image($id)
    {
        $imageModel = new PropertyImageModel();

        $image = $imageModel->find($id);

        if (!$image) {
            return redirect()->back()->with('error', 'Image introuvable');
        }

        $filePath = $image['image'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $imageModel->delete($id);

        return redirect()->back()->with('success', 'Image supprimée avec succès');
    }


}
