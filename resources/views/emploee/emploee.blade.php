@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('emploee.store')}}" enctype="multipart/form-data">
    
    @csrf
    
    <div class="form-group">
        <label class="col-sm-2 col-form-label">@lang('app.First Name')</label>
        <div class="col-5">
            <input name="first_name" type="text" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 col-form-label">@lang('app.Last Name')</label>
        <div class="col-5">
            <input name="last_name" type="email" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 col-form-label">@lang('app.Company')</label>
        <div class="col-5">
            <select>
                <option value="1">in db</option>>
              </select>  
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 col-form-label">@lang('app.Email')</label>
        <div class="col-5">
            <input name="email" type="email" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 col-form-label">@lang('app.Phone')</label>
        <div class="col-5">
            <input name="phone" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group">    
        <button type="submit" class="btn btn-primary">@lang('app.Add')</button>
        <a href="{{route('index')}}" class="btn btn-default">@lang('app.Cancel')</a>
    </div>

</form>
@endsection

