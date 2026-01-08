<?php

namespace App\Models;
use CodeIgniter\Model;
/**
 * Description of ModelCountriesData
 *
 * @author Sonal
 */
class ModelPincodeData extends Model {
   protected $table = 'pincode_data';
    protected $primaryKey = 'pincode_data_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['pincode_data_id','pincode','locality_id ','locality_name','taluka_id','district_id','state_id'];}
