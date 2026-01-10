<?php

namespace App\Controllers;

class PincodeData extends BaseController {

    protected $modelpincodedata;

    public function __construct() {
        $this->modelpincodedata = model('modelPincodeData');
    }


public function fetchPincode($pincode)
{
    $data = $this->modelpincodedata->select('pincode_data.pincode_data_id,pincode_data.pincode,pincode_data.locality_id,pincode_data.locality_name,countries_data.name AS country_name,state_data.state_name,district_data.district_name,taluka_data.taluka_name')
        ->join('countries_data', 'countries_data.id = pincode_data.country_id')
        ->join('state_data', 'state_data.state_id = pincode_data.state_id')
        ->join('district_data', 'district_data.district_id = pincode_data.district_id')
        ->join('taluka_data', 'taluka_data.taluka_id = pincode_data.taluka_id')
        ->where('pincode_data.pincode', $pincode)->findAll();

    if (!empty($data)) {
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
