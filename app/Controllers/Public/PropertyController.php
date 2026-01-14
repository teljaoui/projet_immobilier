<?php

namespace App\Controllers\Public;

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

        $properties = $propertyModel->findAll();
        foreach ($properties as &$property) {
            $image = $imageModel->where('property_id', $property['id'])->first();
            $property['image'] = $image['image'] ?? null;

            $type = $typeModel->find($property['type_id']);
            $property['type_name'] = $type['name'] ?? 'Non défini';
        }

        return view('public/pages/property', [
            'title' => 'Nos biens immobiliers',
            'properties' => $properties
        ]);
    }
}
