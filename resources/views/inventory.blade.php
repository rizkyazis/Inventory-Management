@extends('layouts.sidebar')

@section('content')
    @if($inventory->count()>0)
    <h2 class="text-center">
        Inventory
    </h2>
    <table class="table mt-3">
        <thead class="bg-danger">
        <tr class="text-white">
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($inventory as $index=> $item)
        <tr>
            <th scope="row">{{$index+1}}</th>
            <td>
                <img src="{{asset('images/upload/'.$item->photo)}}" alt="" style="width: 150px">
            </td>
            <td>{{$item->name}}</td>
            <td>{{$item->quantity}}</td>
            <td>
                <a href="{{route('inventory.update.index',$item->id)}}" class="btn btn-success p-2">Update</a>
                <form action="{{route('inventory.delete')}}" class="mt-2" method="post">
                    @csrf
                    <input type="hidden" value="{{$item->id}}" name="id">
                    <button class="btn btn-danger p-2">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <h4>There is no data</h4>
    @endif
@endsection
