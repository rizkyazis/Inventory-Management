<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Inventory;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function list(){
        $inventory = Inventory::all();
        return view('borrow',compact('inventory'));
    }

    public function returnedIndex(){
        $borrow = Borrow::all();
        return view('returned',compact('borrow'));
    }

    public function index($id){
        $inventory = Inventory::find($id);
        return view('borrow-new',compact('inventory'));
    }

    public function borrow($id, Request $request){
        $borrow = new Borrow();
        $borrow->id_item = $id;
        $borrow->borrower_name = $request->name;
        $borrow->period = $request->period;
        $borrow->save();

        $inventory = Inventory::find($id);

        $inventory->quantity = $inventory->quantity - 1;
        $inventory->save();

        return redirect(route('returned.index'));
    }

    public function returned($id){
        $borrow = Borrow::find($id);
        $borrow->status = 'Returned';
        $id_item = $borrow->id_item;
        $borrow->save();

        $inventory = Inventory::find($id_item);
        $inventory->quantity = $inventory->quantity + 1;
        $inventory->save();

        return redirect(route('returned.index'));
    }
}
