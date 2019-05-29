@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <table border="2">
                <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Logo</th>
                <th>Website</th>
                <th>Actions</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$company->id}}</td>
                        <td>{{$company->name}}</td>
                        <td><img width="300" src="{{ asset($company->logo)}}" alt="{{$company->name}}_logo"></td>
                        <td>{{$company->website}}</td>
                        <td>
                            <a href="{{ route('company.edit', ['company' => $company])}}" class="fa fa-edit"></a> &nbsp;
                            <a href="{{ route('company.delete', ['company' => $company])}}" class="fa fa-trash"></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <a href="{{route('index')}}" class="btn btn-primary">Home</a>
        </div>
    </div>

</div>
@endsection