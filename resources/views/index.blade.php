{{-- Show this file will use sidebar template --}}
@extends('layouts/sidebar')

{{-- to start fill teh template, use @section --}}
@section('content')
<div class="text-center">
    <img src="{{asset('images/ead.png')}}" alt="" style="width: 400px;height: 400px">
    <h1>EAD</h1>
    <h4>Inventory Management</h4>
</div>
@endsection
{{-- if already finished fill the template, use @endsection --}}
