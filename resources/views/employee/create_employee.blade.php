@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="POST" action="{{route('employee.store')}}" enctype="multipart/form-data">

                @csrf
                @if(count($companies) < 1)
                <h5>First create a company</h5>
                <a href="{{route('company.create')}}" class="btn btn-primary">Add Company</a>
                @else
                <div class="form-group">
                    <label class="col-sm-8 col-form-label">@lang('app.First Name')</label>
                    <div class="col-5">
                        <input name="first_name" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-8 col-form-label">@lang('app.Last Name')</label>
                    <div class="col-5">
                        <input name="last_name" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-8 col-form-label">@lang('app.Company')</label>
                    <div class="col-5">
                        <select name="company_id">
                            @for($i = 0; $i < count($companies); $i++)
                            <option value="{{$companies[$i]->id}}">{{$companies[$i]->name}}</option>
                            @endfor
                        </select>  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-8 col-form-label">@lang('app.Email')</label>
                    <div class="col-5">
                        <input name="email" type="email" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-8 col-form-label">@lang('app.Phone')</label>
                    <div class="col-5">
                        <input name="phone" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">    
                    <button type="submit" class="btn btn-primary">@lang('app.Add')</button>
                    <a href="{{route('index')}}" class="btn btn-default">@lang('app.Cancel')</a>
                </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection

