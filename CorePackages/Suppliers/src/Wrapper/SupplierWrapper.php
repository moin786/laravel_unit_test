<?php

namespace Peal\CorePackages\Suppliers\Wrapper;

use Peal\CorePackages\Suppliers\Models\Supplier;
use Peal\CorePackages\Utility\Classes\DataTable;
use Peal\CorePackages\Suppliers\Contracts\SupplierContract;
use Peal\CorePackages\Suppliers\Resources\SupplierResource;

abstract Class SupplierWrapper implements SupplierContract
{

    /**
     * Add Supplier data
     *
     * @param array $data
     * @return mixed
     */
    public function add($data)
    {
        
        $response = $this->validate_supplier_data($data);

        if($response->getData() !== null && 
           $response->getData()->success === false) 
        {

            return response()->json(['success' => $response->getData()->success, 'msg' => $response->getData()->msg], 406);
        
        }
        
        
        if (count($data) > 0) {

            $response = new SupplierResource(Supplier::create($data));

            return response()->json(['success' =>true, 'data' => $response, 'msg' =>'Supplier insertd successfully'], 201);
        }

        return response()->json(['success' => false, 'msg' => 'Something wrong! please check your data'], 406);
    }

    /**
     * Get supplier list
     *
     * @return mixed
     */
    public function get_suppliers()
    {
        $table = 'Suppliers';
        // Table's primary key
        $primaryKey = 'id';

        $columns = array(
            array('db' => 'id', 'dt' => 0),
            array('db' => 'name', 'dt' => 1),
            array('db' => 'mobile', 'dt' => 2),
            array('db' => 'email', 'dt' => 3),
            array('db' => 'address', 'dt' => 4),
            array('db' => 'landphone', 'dt' => 5),
            array('db' => 'contact_person', 'dt' => 6),
            array('db' => 'contact_person_mobile', 'dt' => 7),
            array('db' => 'contact_person_email', 'dt' => 8)

        );


        echo json_encode(DataTable::simple(request(), $table, $primaryKey, $columns));
    }

    /**
     * update supplier record
     *
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update($data, $id)
    {
        $response = $this->validate_supplier_data($data);

        if($response->getData() !== null && 
           $response->getData()->success === false) 
        {

            return response()->json(['success' => $response->getData()->success, 'msg' => $response->getData()->msg], 406);
        
        }

        if (! isset($id)) {
            return response()->json(['success' => false, 'msg' => 'Invalid Record Information'], 404);
        }

        if(! Supplier::where('id', $id)->exists()) {
            return response()->json(['success' => false, 'msg' => 'No Data Found'], 404);
        }

        new SupplierResource(Supplier::where('id', $id)->update([
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'address' => $data['address'],
            'landphone' => $data['landphone'],
            'contact_person' => $data['contact_person'],
            'contact_person_mobile' => $data['contact_person_mobile'],
            'contact_person_email' => $data['contact_person_email']
        ]));

        return response()->json(['success' => true, 'msg' => 'Supplier updated successfully'], 200);
    }


     /**
     * Delete supplier record
     *
     * @param int $id
     * @return mixed
     */
    public function delete($id)
    {
        if (! isset($id)) {
            return response()->json(['success' => false, 'msg' => 'Invalid Record Information'], 404);
        }

        if (! Supplier::where('id', $id)->exists()) {
            return response()->json(['success' => false, 'msg' => 'No Record Found'], 404);
        }

        new SupplierResource(Supplier::where('id', $id)->delete());

        return response()->json(['success' => true, 'msg' => 'Supplier updated successfully'], 200);
    }

    /**
     * Get supplier record
     *
     * @param int $id
     * @return mixed
     */
    public function getSupplierById($id)
    {
        return 'supplier viewed';
    }


    /**
     * Validate supplier record has valid email and contains valid name
     *
     * @param array $data
     * @return void
     */
    public function validate_supplier_data($data)
    {
        if (! is_array($data)) {
            return response()->json(['success' => false, 'msg' => 'Data must be an array'], 406);
        }


        if (! filter_var($data['email'], FILTER_VALIDATE_EMAIL) || 
            ! filter_var($data['contact_person_email'], FILTER_VALIDATE_EMAIL)) 
        {
            return response()->json(['success' => false, 'msg' => 'Email address not valid'], 406);
        }

        $name=str_replace(" ", "", $data['name']);

        if (! ctype_alpha($name)) {

            return response()->json(['success' => false, 'msg' => 'Supplier name must be a valid name, only letter allowed'], 406);

        }

        return response()->json(['success' => true], 200);
    }
}