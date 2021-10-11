<?php

 namespace App\Models;

 use CodeIgniter\Model;

class RestaurantModel extends Model{
    protected $table = 'restaurants'; //เข้าถึงตารางชื่อ restaurants
    protected $primaryKey = 'id'; //กำหนด primaryKey
    protected $allowsFields = ['id', 'name', 'type', 'imageurl']; //อนุญาตให้เข้าถึงฟิวเหล่านี้ได้
}
