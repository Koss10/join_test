@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('employee.destroy', ['employee' =>$employee]) }}" method="POST">
                @method('DELETE')
                @csrf
                <h4>@lang('app.Are you sure you want to delete a Employee')</h4> <h4><b>{{ $employee->first_name}} &nbsp; {{ $employee->last_name}}</b>?</h4>
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