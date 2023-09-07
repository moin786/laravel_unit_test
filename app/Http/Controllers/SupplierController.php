<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Http\Requests\SupplierRequest;
use Illuminate\Http\Request;
use Peal\CorePackages\Suppliers\Contracts\SupplierContract;

class SupplierController extends Controller
{
    protected $supplier;

    public function __construct(SupplierContract $supplier)
    {
        $this->supplier = $supplier;
    }

    public function create_supplier()
    {
        
        
        return Inertia::render('Supplier/Supplier');
    }

    public function suppliers_record()
    {
        echo $suppliers = $this->supplier->get_suppliers();
    }

    public function store(SupplierRequest $request)
    {
        $this->supplier->add($request->all());
        return redirect('create-supplier')->with('success', 'Supplier inserted Successfully');
    }

    public function update(Request $request)
    {
        $this->supplier->update($request->all(), $request->id);
        return redirect('create-supplier')->with('success', 'Supplier updated Successfully');
    }

    public function destroy($id)
    {
        $this->supplier->delete($id);
        return redirect('create-supplier')->with('success', 'Supplier deleted Successfully');
    }
}
