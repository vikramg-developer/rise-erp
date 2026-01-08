<?php

namespace App\Controllers;

class PincodeData extends BaseController {

    protected $modelpincodedata;

    public function __construct() {
        $this->modelpincodedata = model('modelPincodeData');
    }

    public function getPincode($pincode) {
        
        $data = $this->modelpincodedata->select('pincode, country_id, state_id, district_id, taluka_id')->where('pincode', $pincode)->first();
        if ($data) {
            return $this->response->setJSON([
                        'status' => true,
                        'data' => $data
            ]);
        }

        return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Invalid Pincode'
        ]);
    }
}
