<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(){
        //get all data from table inventories through model
        $inventory = Inventory::all();

        //return view with inventory data that we get
        return view('inventory',compact('inventory'));
    }

    public function addIndex(){
        //return view to inventory-add.blade.php
        return view('inventory-add');
    }

    public function add(Request $request){
        //set file with new name
        $photo = time().'.'.$request->photo->extension();

        //move file to path /public/images/upload/ and the rename the file with new name ($photo)
        $request->photo->move(public_path('images/upload'), $photo);

        //create new data in inventories table
        $inventory = new Inventory();

        //fill column with data
        $inventory->name = $request->name;
        $inventory->quantity = $request->quantity;
        $inventory->photo = $photo;

        //save data that just got filled 
        $inventory->save();

        //redirect to another router with name inventory-index
        return redirect(route('inventory.index'));
    }

    public function delete(Request $request){
        //find data from inventories table with id = $id
        $inventory = Inventory::find($request->id);

        //delete the data that found
        $inventory->delete();

        //redirect to another router with name inventory-index
        return redirect(route('inventory.index'));
    }
    
    public function updateIndex($id){
        //find data from inventories table with id = $id
        $inventory = Inventory::find($id);

       //redirect to another router with name inventory-update with inventory data that we get 
        return view('inventory-update',compact('inventory'));
    }

    public function update($id,Request $request){
        //find data from inventories table with id = $id
        $inventory = Inventory::find($id);

        //fill column with data
        $inventory->name = $request->name;
        $inventory->quantity = $request->quantity;

        //check if the input file is null
        if ($request->photoChange == null){
            
        }else{
            //set file with new name
            $photo = time().'.'.$request->photoChange->extension();
            //move file to path /public/images/upload/ and the rename the file with new name ($photo
            $request->photoChange->move(public_path('images/upload'), $photo);
            //fill column with data
            $inventory->photo = $photo;
        }
        
        //save data
        $inventory->save();

        //redirect to another router with name inventory-index
        return redirect(route('inventory.index'));

    }
}
