@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="POST" action="{{route('employee.update', ['employee' => $employee])}}">

                @csrf
                 {{ method_field('PUT') }}

                <div class="form-group">
                    <label class="col-sm-8 col-form-label">@lang('app.First Name')</label>
                    <div class="col-5">
                        <input name="first_name" type="text" class="form-control" required value="{{$employee->first_name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-8 col-form-label">@lang('app.Last Name')</label>
                    <div class="col-5">
                        <input name="last_name" type="text" class="form-control" required value="{{$employee->last_name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-8 col-form-label">@lang('app.Company')</label>
                    <div class="col-5">
                        <select name="company_id">
                            @for($i = 0; $i < count($companies); $i++)
                            <option value="{{$companies[$i]->id}}" @if($companies[$i]->id == $employee->company_id) selected @endif>{{$companies[$i]->name}}</option>
                            @endfor
                        </select>  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-8 col-form-label">@lang('app.Email')</label>
                    <div class="col-5">
                        <input name="email" type="email" class="form-control" value="{{$employee->email}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-8 col-form-label">@lang('app.Phone')</label>
                    <div class="col-5">
                        <input name="phone" type="text" class="form-control" value="{{$employee->phone}}">
                    </div>
                </div>
                <div class="form-group">    
                    <button type="submit" class="btn btn-primary">@lang('app.Edit')</button>
                    <a href="{{route('index')}}" class="btn btn-default">@lang('app.Cancel')</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

