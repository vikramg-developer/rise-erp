<?php

namespace App\Models;
use CodeIgniter\Model;
/**
 * Description of ModelCountriesData
 *
 * @author Sonal
 */
class ModelStateData extends Model {
   protected $table = 'state_data';
    protected $primaryKey = 'state_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'state_id',
        'state_name',   
    ];}
