@extends('layouts/sidebar')

@section('content')
    @if($borrow->count()>0)
    <h2 class="text-center">
        Returned
    </h2>
    <table class="table mt-3">
        <thead class="bg-secondary">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Item</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">Period</th>
            <th scope="col">Late</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($borrow as $index=> $item)
            <?php
                if($item->status === 'Returned'){
                    $pinjam = strtotime(date_format($item->created_at,"Y/m/d"));
                    $now = strtotime(date_format($item->updated_at,"Y/m/d"));
                }else{
                    $pinjam = strtotime(date_format($item->created_at,"Y/m/d"));
                    $now = strtotime(date("Y/m/d"));
                }

                $datediff = $now - $pinjam;
                $resultDiff = ($datediff / (60 * 60 * 24));
                $late = 0;
                if(ceil($resultDiff)>$item->period){
                    $late = ceil($resultDiff)-$item->period;
                }

            ?>
                <tr>
                    <th scope="row">{{$index+1}}</th>
                    <td>{{$item->item->name}}</td>
                    <td>{{$item->borrower_name}}</td>
                    <td>{{date_format($item->created_at,"Y/m/d")}}</td>
                    <td>{{$item->period}}</td>
                    <td>{{$late}} Days</td>
                    <td>
                        @if($item->status === 'Returned')
                            Item Returned
                        @else
                            <a href="{{route('returned',$item->id)}}" class="btn btn-success">Returned</a>
                        @endif
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <h4>There is no data</h4>
    @endif
@endsection
