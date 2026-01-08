<?php

namespace App\Models;
use CodeIgniter\Model;
/**
 * Description of ModelCountriesData
 *
 * @author Sonal
 */
class ModelCountriesData extends Model {
   protected $table = 'countries_data';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['id','sortname','name','phonecode', ];}
