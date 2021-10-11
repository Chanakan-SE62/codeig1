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

    //Get Restaurant by id
    public function show($id = null){
        $data = $this->model->getWhere(['id'=>$id])->getResult();
        if($data){
            return $this->respond($data);
        }
        else{
            return $this->failNotFound('No Restaurant found with id : ' . $id);
        }
    }

    //insert new restaurant
    public function create(){
        $param = [
            'name' => $this->request->getVar('name'),
            'type' => $this->request->getVar('type'),
            'imageurl' => $this->request->getVar('imageurl'),
        ];
        $this->model->insert($param);
        return $this->respondCreated("Restaurant created");
    }

    //update restaurant info
    public function update($id = null){
        $param = [
            'name' => $this->request->getVar('name'),
            'type' => $this->request->getVar('type'),
            'imageurl' => $this->request->getVar('imageurl'),
        ];
        $this->model->update($id , $param);
        $response = [
            'status' => 200,
            'error' => null,
            'message' => [
                'success' => 'Restaurant updated successfully'
            ]
        ];
        return $this->respond($response);
    }

    //delete restaurant
    public function delete($id = null){
        $data = $this->model->find($id);
        if($data){
            $this->model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'message' => [
                'success' => 'Restaurant deleted successfully'
                ]
            ];
            return $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('No Restaurant found with id : ' . $id);
        }
    }
}