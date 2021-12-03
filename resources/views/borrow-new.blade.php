@extends('layouts.sidebar')

@section('content')
    <h2 class="text-center">
        Borrow
    </h2>
    <div class="container mt-3 pl-5 pr-5">
        <div class="row">
            <div class="col-4">
                <div class="card" >
                    <img src="{{asset('images/upload/'.$inventory->photo)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">{{$inventory->name}}</p>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <form action="{{route('borrow',$inventory->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            Borrower Data
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" >Name</span>
                                </div>
                                <input type="text" name="name" class="form-control"  >
                            </div>
                            <div class="input-group w-50">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Period</span>
                                </div>
                                    <input type="number" name="period" class="form-control"  >
                                    <div class="input-group-append">
                                    <span class="input-group-text">Day</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4 text-left">
                        <button type="submit" class="btn btn-success">
                            Save
                        </button>
                        <a href="{{route('list')}}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
