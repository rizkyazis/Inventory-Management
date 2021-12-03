@extends('layouts/sidebar')

@section('content')
    @if($inventory->count()>0)
    <h2 class="text-center">
        Borrow
    </h2>
    <table class="table mt-3">
        <thead class="bg-secondary">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($inventory as $index=> $item)
            @if(($item->quantity)>0)
            <tr>
                <th scope="row">{{$index+1}}</th>
                <td>
                    <img src="{{asset('images/upload/'.$item->photo)}}" alt="" style="width: 150px">
                </td>
                <td>{{$item->name}}</td>
		<td>{{$item->quantity}}</td>
                <td>
                    <a href="{{route('borrow.index',$item->id)}}" class="btn btn-success">Borrow</a>
                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    @else
        <h4>There is no data</h4>
    @endif
@endsection
