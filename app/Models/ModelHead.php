<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Exceptions\DatabaseException;

/**
 * Description of ModelHead
 *
 * @author Shoeb
 */
class ModelHead extends Model {

    protected $table = 'head';
    protected $primaryKey = 'head_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['head_name', 'added_by', 'updated_by', 'deleted_by', 'is_deleted'];
//    // Validation
    protected $validationRules = [
        'head_name' => 'required|alpha_numeric_space|is_unique[head.head_name]'
    ];
    protected $validationMessages = [
        'head_name' => [
            'required' => 'Head is required',
            'is_unique' => 'Head already exist',
        ]
    ];
//    // Callbacks
    protected $beforeUpdate = ['setUpdateOrDeleteDate', 'captureOldData'];
    protected $afterInsert = ['logInsert'];
    protected $afterUpdate = ['logUpdate'];
    protected $oldData = [];

    public function searchHead(string $term) {
        return $this->select('head_name')
                        ->like('head_name', $term)
                        ->limit(10)
                        ->findAll();
    }

    public function countAllHead() {
        return $this->builder()
                        ->countAllResults();
    }

    public function countFilteredHead($search) {
        $builder = $this->builder();

        if (!empty($search)) {
            $builder->like('head_name', $search);
        }

        return $builder->countAllResults();
    }

    public function getFilteredHead($length, $start, $search) {
        $builder = $this->builder()
                ->orderBy('head_id', 'ASC');

        if (!empty($search)) {
            $builder->like('head_name', $search);
        }

        return $builder->get($length, $start)->getResultArray();
    }

    protected function setUpdateOrDeleteDate(array $data) {
        // If `is_deleted` is being updated → set deleted_dt
        if (array_key_exists('is_deleted', $data['data'])) {
            $data['data']['deleted_at'] = date('Y-m-d H:i:s');
            return $data;
        }

        // Otherwise → set updated_dt
        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    public function rulesForUpdate($id) {
        return [
            'head_id' => 'required|is_natural_no_zero',
            'head_name' => "required|alpha_numeric_space|is_unique[head.head_name,head_id,{$id}]",
        ];
    }

    protected function logInsert(array $data) {
        log_activity([
            'action' => 'insert',
            'table' => $this->table,
            'record_id' => $data['id'],
            'new' => $data['data'],
            'columns' => array_keys($data['data'])
        ]);

        return $data;
    }

    protected function captureOldData(array $data) {
        log_message('debug', __METHOD__ . ' triggered');
        if (!isset($data['id']))
            return $data;

        $id = is_array($data['id']) ? $data['id'][0] : $data['id'];
        $this->oldData = $this->find($id);
        return $data;
    }

    protected function logUpdate(array $data) {
        $newData = $data['data'];
        $oldData = $this->oldData;

        $changedColumns = [];
        $oldValues = [];
        $newValues = [];

        foreach ($newData as $key => $value) {
            if (array_key_exists($key, $oldData) && $oldData[$key] != $value) {
                $changedColumns[] = $key;
                $oldValues[$key] = $oldData[$key];
                $newValues[$key] = $value;
            }
        }

        if (!empty($changedColumns)) {
            log_activity([
                'action' => 'update',
                'table' => $this->table,
                'record_id' => $data['id'],
                'columns' => $changedColumns,
                'old' => $oldValues,
                'new' => $newValues
            ]);
        }

        return $data;
    }
}
