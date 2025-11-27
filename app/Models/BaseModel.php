<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Models;
use CodeIgniter\Model;
/**
 * Description of BaseModel
 *
 * @author Dell
 */
class BaseModel extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        // Database connection is created only once
        $this->db = \Config\Database::connect();
    }
}