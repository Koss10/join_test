@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{route('company.update', ['company' => $company])}}" enctype="multipart/form-data">

                @csrf
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label class="col-sm-2 col-form-label">@lang('app.Name')</label>
                    <div class="col-5">
                        <input name="name" type="text" class="form-control" required  value="{{$company->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label">@lang('app.Email')</label>
                    <div class="col-5">
                        <input name="email" type="email" class="form-control" value="{{$company->email}}" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label">@lang('app.Logo')</label>
                    <div class="col-5">
                        <input id="logo" name="logo" type="file" class="form-control">
                        @if ($errors->has('logo'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('logo') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label">@lang('app.website')</label>
                    <div class="col-5">
                        <input name="website" type="text" class="form-control" value="{{$company->website}}" >
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

