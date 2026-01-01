<?php

namespace App\Traits;

trait ActivityLoggerTrait {

    protected array $oldData = [];

    protected function logInsert(array $data) {
        log_activity([
            'action' => 'insert',
            'table' => $this->table,
            'record_id' => $data['id'] ?? null,
            'new' => $data['data'],
            'columns' => array_keys($data['data']),
        ]);

        return $data;
    }

    protected function captureOldData(array $data) {

        if (!isset($data['id'])) {
            return $data;
        }

        $id = is_array($data['id']) ? $data['id'][0] : $data['id'];
        $this->oldData = $this->find($id);

        return $data;
    }

    protected function logUpdate(array $data) {
        if (empty($this->oldData)) {
            return $data;
        }

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
                'new' => $newValues,
            ]);
        }

        return $data;
    }
}
