<?php

namespace App\Models;
use CodeIgniter\Model;
/**
 * Description of ModelCountriesData
 *
 * @author Sonal
 */
class ModelDistrictData extends Model {
   protected $table = 'district_data';
    protected $primaryKey = 'district_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['district_id','district_name',   'state_id',];
    
}
