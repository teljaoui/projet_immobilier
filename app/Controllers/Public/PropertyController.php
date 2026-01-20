<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use App\Models\PropertyImageModel;
use App\Models\PropertyModel;
use App\Models\PropertyTypeModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;

class PropertyController extends BaseController
{
    public function index()
    {
        $propertyModel = new PropertyModel();
        $imageModel = new PropertyImageModel();
        $typeModel = new PropertyTypeModel();
        $cities = $propertyModel->select('city')->distinct()->orderBy('city', 'ASC')->findAll();


        $transaction_type = $this->request->getGet('transaction_type');
        $type_id = $this->request->getGet('type_id');
        $city = $this->request->getGet('city');
        $price_min = $this->request->getGet('price_min');
        $price_max = $this->request->getGet('price_max');
        $surface_min = $this->request->getGet('surface_min');
        $bedrooms_min = $this->request->getGet('bedrooms_min');
        $bathrooms_min = $this->request->getGet('bathrooms_min');
        $rooms_min = $this->request->getGet('rooms_min');

        $builder = $propertyModel;

        if (!empty($transaction_type)) {
            $builder = $builder->where('transaction_type', $transaction_type);
        }
        if (!empty($type_id)) {
            $builder = $builder->where('type_id', $type_id);
        }
        if (!empty($city)) {
            $builder = $builder->where('city', $city);
        }
        if (!empty($price_min)) {
            $builder = $builder->where('price >=', $price_min);
        }
        if (!empty($price_max)) {
            $builder = $builder->where('price <=', $price_max);
        }
        if (!empty($surface_min)) {
            $builder = $builder->where('surface >=', $surface_min);
        }
        if (!empty($bedrooms_min)) {
            $builder = $builder->where('bedrooms >=', $bedrooms_min);
        }
        if (!empty($bathrooms_min)) {
            $builder = $builder->where('bathrooms >=', $bathrooms_min);
        }
        if (!empty($rooms_min)) {
            $builder = $builder->where('rooms >=', $rooms_min);
        }

        $properties = $builder->orderBy('created_at', 'DESC')->findAll();

        foreach ($properties as &$property) {
            $image = $imageModel
                ->where('property_id', $property['id'])
                ->where('is_main', 1)
                ->first();
            $property['image'] = $image['image'] ?? null;

            $type = $typeModel->find($property['type_id']);
            $property['type_name'] = $type['name'] ?? 'Non défini';
        }

        $propertyTypes = $typeModel->findAll();

        return view('public/pages/property', [
            'title' => 'Nos biens immobiliers',
            'properties' => $properties,
            'propertyTypes' => $propertyTypes,
            'cities' => $cities
        ]);
    }

    public function index_cart()
    {
        $propertyModel = new PropertyModel();
        $imageModel = new PropertyImageModel();
        $typeModel = new PropertyTypeModel();

        $properties = $propertyModel->findAll();
        foreach ($properties as &$property) {
            $image = $imageModel->where('property_id', $property['id'])
                ->orderBy('created_at', 'DESC')
                ->first();
            $property['image'] = $image['image'] ?? null;

            $type = $typeModel->find($property['type_id']);
            $property['type_name'] = $type['name'] ?? 'Non défini';
        }

        return view('public/pages/property_cart', [
            'title' => 'Nos biens immobiliers',
            'properties' => $properties
        ]);
    }

    public function show($id)
    {
        $propertyModel = new PropertyModel();
        $imageModel = new PropertyImageModel();
        $typeModel = new PropertyTypeModel();

        $property = $propertyModel->find($id);

        if (!$property) {
            throw PageNotFoundException::forPageNotFound("Bien immobilier introuvable");
        }

        $images = $imageModel->where('property_id', $property['id'])->findAll();
        $property['images'] = array_map(function ($img) {
            return $img['image'];
        }, $images);

        $type = $typeModel->find($property['type_id']);
        $property['type_name'] = $type['name'] ?? 'Non défini';

        return view('public/pages/property_show', [
            'title' => $property['title'],
            'property' => $property
        ]);
    }

}
