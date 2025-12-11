<?php



namespace App\Models;
use Codeigniter\Model;

/**
 * Description of $ModelParentsRegistration
 *
 * @author Dell
 */
class ModelParentsRegistration extends Model{
    protected $table = 'parents_registration';
    protected $primaryKey ='parents_registration_id';
    protected $useAutoIncrement ='true';
    protected $returnType     = 'array';
}
