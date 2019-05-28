@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('company.store')}}" enctype="multipart/form-data">
    
    @csrf
    
    <div class="form-group">
        <label class="col-sm-2 col-form-label">@lang('app.Name')</label>
        <div class="col-5">
            <input name="name" type="text" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 col-form-label">@lang('app.Email')</label>
        <div class="col-5">
            <input name="email" type="email" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 col-form-label">@lang('app.Logo')</label>
        <div class="col-5">
            <input name="logo" type="file" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 col-form-label">@lang('app.website')</label>
        <div class="col-5">
            <input name="website" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group">    
        <button type="submit" class="btn btn-primary">@lang('app.Add')</button>
        <a href="{{route('index')}}" class="btn btn-default">@lang('app.Cancel')</a>
    </div>

</form>
@endsection

