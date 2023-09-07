<?php
namespace Peal\CorePackages\Category\Wrapper;

use Peal\CorePackages\Category\Models\Category;
use Peal\CorePackages\Utility\Classes\DataTable;
use Peal\CorePackages\Category\Contracts\CategoryContract;
use Peal\CorePackages\Category\Resources\CategoryResource;

abstract class CategoryWrapper implements CategoryContract
{
    public function add($data) : ?string
    {
        if (! is_array($data)) {
            return response()->json(['success' => false, 'msg' => 'Data must be an array'], 406);
        }
        
        if (count($data) > 0) {

            new CategoryResource(Category::create($data));

            return response()->json(['success' => true, 'msg' => 'Category insertd successfully'], 201);
        }

        return response()->json(['success' => false, 'msg' => 'Something wrong! please check your data'], 406);
    }
    public function get_categories() : void
    {
        $table = 'categories';
        // Table's primary key
        $primaryKey = 'id';

        $columns = array(
            array('db' => 'id', 'dt' => 0),
            array('db' => 'name', 'dt' => 1),

        );

        //if (!empty($where)) {
        //    echo json_encode(DataTableClass::complex($request, $table, $primaryKey, $columns, null, $where));
       // } else {

            echo json_encode(DataTable::simple(request(), $table, $primaryKey, $columns));
        //}
    }
    public function update($data, $id) : string
    {
        if (! is_array($data)) {
            return response()->json(['success' => false, 'msg' => 'Data must be an array'], 406);
        }

        if (! isset($id)) {
            return response()->json(['success' => false, 'msg' => 'Invalid Record Information'], 404);
        }

        if(! Category::where('id', $id)->exists()) {
            return response()->json(['success' => false, 'msg' => 'No Data Found'], 404);
        }

        new CategoryResource(Category::where('id', $id)->update([
            'name' => $data['name']
        ]));

        return response()->json(['success' => true, 'msg' => 'Category updated successfully'], 200);
    }
    public function delete($id) : string
    {
        if (! isset($id)) {
            return response()->json(['success' => false, 'msg' => 'Invalid Record Information'], 404);
        }

        if (! Category::where('id', $id)->exists()) {
            return response()->json(['success' => false, 'msg' => 'No Record Found'], 404);
        }

        new CategoryResource(Category::where('id', $id)->delete());

        return response()->json(['success' => true, 'msg' => 'Category updated successfully'], 200);
    }
    public function getCategoryById($id) : string
    {
        return '';
    }
}