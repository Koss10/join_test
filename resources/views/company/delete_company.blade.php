@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('company.destroy', ['company' =>$company]) }}" method="POST">
                @method('DELETE')
                @csrf
                <h4>@lang('APP.Are you sure you want to delete a Company')</h4> <h3><b>{{ $company->name}}</b>?</h3>
                <div>
                    <button type="submit" class="btn btn-danger">
                        @lang('app.Delete')
                    </button>
                    <a href="{{route('index')}}" class="btn btn-default">
                        @lang('app.Cancel')
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

