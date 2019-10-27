@extends('master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">New Equipment Entry</h3>
        <br />
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif

        <form method="post" action="{{url('equipment')}}">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="given_id" class="form-control" placeholder="Enter Equipment ID" />
            </div>
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Enter Equipment Name" />
            </div>
            <div class="form-group">
                <input type="text" name="description" class="form-control" placeholder="Enter Equipment Description" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>
@endsection
