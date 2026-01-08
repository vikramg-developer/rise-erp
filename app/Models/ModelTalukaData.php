<?php

namespace App\Models;
use CodeIgniter\Model;
/**
 * Description of ModelCountriesData
 *
 * @author Sonal
 */
class ModelTalukaData extends Model {
   protected $table = 'taluka_data';
    protected $primaryKey = 'taluka_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'taluka_id',
        'taluka_name',   
        'district_id',   
    ];}
