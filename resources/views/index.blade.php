@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h4>Companies</h4>
            <table id="company" border="2">
                <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Website</th>
                <th>Actios</th>
                </thead>
                @foreach($companies as $company)
                <tr>
                    <td><a href="{{route('company.show', ['company' => $company])}}">{{$company->name}} </a></td>
                    <td>{{$company->email}} </td>
                    <td> <img width="100" src="{{ asset($company->logo)}}" alt="{{$company->name}}_logo"> </td>
                    <td><a href="{{$company->website}}">{{$company->website}}</a> </td>
                    <td>
                        <a href="{{ route('company.edit', ['company' => $company])}}" class="fa fa-edit"></a> &nbsp;
                        <a href="{{ route('company.delete', ['company' => $company])}}" class="fa fa-trash"></a>
                    </td>
                </tr>
                @endforeach
            </table>
            <br>
            {{$companies->appends(['employee' => $employees->currentPage()])->links()}}

            <a href="{{route('company.create')}}" class="btn btn-primary">Add Company</a>
            
            <br><br>
            
            <h4>Employees</h4>
            <table id="employee" border="2">
                <thead>
                <th>First name</th>
                <th>Last Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actios</th>
                </thead>
                @foreach($employees as $employee)
                <tr>
                    <td><a href="{{route('employee.show', ['employee' => $employee])}}">{{$employee->first_name}} </a></td>
                    <td>{{$employee->last_name}} </td>
                    <td>{{$employee->company}} </td>
                    <td>{{$employee->email}} </td>
                    <td>{{$employee->phone}} </td>
                    <td>
                        <a href="{{ route('employee.edit', ['employee' => $employee])}}" class="fa fa-edit"></a> &nbsp;
                        <a href="{{ route('employee.delete', ['employee' => $employee])}}" class="fa fa-trash"></a>
                    </td>
                </tr>
                @endforeach
            </table>
            <br>
            {{$employees->appends(['company' => $companies->currentPage()])->links()}}

            <a href="{{route('employee.create')}}" class="btn btn-primary">Add Employee</a>
        </div>

    </div>

</div>
@endsection
