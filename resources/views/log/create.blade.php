@extends('master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">New Log Entry</h3>
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

        <form method="post" action="{{url('log')}}">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" />
            </div>
            <div class="form-group">
                <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" />
            </div>
            <div class="form-group">
                <input type="text" name="role" class="form-control" placeholder="Enter Your Role" />
            </div>
            <div class="form-group">
                <input type="text" name="activity" class="form-control" placeholder="Enter Your Activity" />
            </div>
            <div class="form-group">
                <input type="text" name="time_in" class="form-control" placeholder="Enter the time you started" />
            </div>
            <div class="form-group">
                <input type="text" name="time_out" class="form-control" placeholder="Enter the time you ended" />
            </div>
            <div class="form-group">
                <input type="text" name="description" class="form-control" placeholder="Enter a brief description of activity" />
             </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>
@endsection
