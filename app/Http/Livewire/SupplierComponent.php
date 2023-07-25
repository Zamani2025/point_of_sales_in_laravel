<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Supplier;

class SupplierComponent extends Component
{
    public $supplierDetails;
    public $searchSupplier = [];
    public $searchByName;
    public $searchByPhone;

    public function SupplierDetail($supplier_id){
        $this->supplierDetails = Supplier::find($supplier_id);
    }

    public function searchSupplierByName(){
        $this->searchSupplier = Supplier::where('name', 'like', '%' . $this->searchByName . '%')->get();
    }
    public function searchSupplierByPhone(){
        $this->searchSupplier = Supplier::where('phone', 'like', '%' . $this->searchByPhone . '%')->get();
    }
    public function render()
    {
        $suppliers = Supplier::paginate(10);
        return view('livewire.supplier-component', compact('suppliers'));
    }
}
