<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use App\Models\PropertyImageModel;
use App\Models\PropertyModel;
use App\Models\PropertyTypeModel;
use CodeIgniter\HTTP\ResponseInterface;

class HomeController extends BaseController
{
    public function index()
    {
        $propertyModel = new PropertyModel();
        $imageModel = new PropertyImageModel();
        $typeModel = new PropertyTypeModel();
        $properties = $propertyModel->orderBy('created_at', 'DESC')->findAll(6);

        foreach ($properties as &$property) {
            $image = $imageModel->where('property_id', $property['id'])->first();
            $property['image'] = $image['image'] ?? null;

            $type = $typeModel->find($property['type_id']);
            $property['type_name'] = $type['name'] ?? 'Non défini';
        }

        return view('public/pages/home', [
            'title' => 'Accueil',
            'properties' => $properties
        ]);
    }
}
