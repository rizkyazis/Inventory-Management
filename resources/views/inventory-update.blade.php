@extends('layouts.sidebar')

@section('content')
    <h2 class="text-center">
        Add Item
    </h2>
    <div class="container mt-3 pl-5 pr-5">
        <form action="{{route('inventory.update',$inventory->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-9">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >Name</span>
                        </div>
                        <input value="{{$inventory->name}}" type="text" name="name" class="form-control"  >
                    </div>
                </div>
                <div class="col-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >Quantity</span>
                        </div>
                        <input value="{{$inventory->quantity}}" type="number" name="quantity" class="form-control"  >
                    </div>
                </div>
            </div>
            <div class="input-group">
                <div class="custom-file">
                    <input type="hidden" value="{{$inventory->photo}}" name="photo">
                    <input type="file" name="photoChange" class="custom-file-input" id="inputGroupFile" aria-describedby="inputGroupFileAddon">
                    <label class="custom-file-label" for="inputGroupFile">Choose Image</label>
                </div>
            </div>
            <div class="pt-5 text-right">
                <button type="submit" class="btn btn-success">
                    Save
                </button>
                <a href="{{route('inventory.index')}}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
@endsection
