@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @foreach($companies as $company)
            {{$company}} <br>
            @endforeach
            <a href="{{route('company.create')}}" class="btn btn-primary">Add Company</a>
        </div>
        <div class="col-md-6">
            @foreach($emploees as $emplee)
            {{$emploee}} <br>
            @endforeach
            <a href="{{route('emploee.create')}}" class="btn btn-primary">Add Emploee</a>
        </div>
    </div>
</div>
@endsection
