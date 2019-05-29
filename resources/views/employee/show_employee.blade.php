@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <table border="2">
                <thead>
                <th>ID</th>
                <th>Fierst Name</th>
                <th>Last Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$employee->id}}</td>
                        <td>{{$employee->first_name}}</td>
                        <td>{{$employee->last_name}}</td>
                        <td>{{$employee->company}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>
                            <a href="{{ route('employee.edit', ['employee' => $employee])}}" class="fa fa-edit"></a> &nbsp;
                            <a href="{{ route('employee.delete', ['employee' => $employee])}}" class="fa fa-trash"></a>
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