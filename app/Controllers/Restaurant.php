<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
//use App\Models\RestaurantModel;

class Restaurant extends ResourceController {
    use ResponseTrait;
    protected $modelName = 'App\Models\RestaurantModel';
    protected $format = 'json';

    //Get All Restaurants
    public function index() {
        //$model = new RestaurantModel();
        $data['restaurants'] = $this->model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }
}