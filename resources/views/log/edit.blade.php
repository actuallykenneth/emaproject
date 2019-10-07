@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <br />
            <h3>Edit Record</h3>
            <br />

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{action('LogController@update', $id)}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH" />
                <div class="form-group">
                    <input type="text" name="first_name" class="form-control"
                           value="{{$logs->first_name}}" placeholder="Enter First Name" />
                </div>
                <div class="form-group">
                    <input type="text" name="last_name" class="form-control"
                           value="{{$logs->last_name}}" placeholder="Enter Last Name" />
                </div>
                <div class="form-group">
                    <input type="text" name="role" class="form-control"
                           value="{{$logs->role}}" placeholder="Enter Your Role" />
                </div>
                <div class="form-group">
                    <input type="text" name="activity" class="form-control"
                           value="{{$logs->activity}}" placeholder="Enter Your Activity" />
                </div>
                <div class="form-group">
                    <input type="text" name="time_in" class="form-control"
                           value="{{$logs->time_in}}" placeholder="Enter the time you started" />
                </div>
                <div class="form-group">
                    <input type="text" name="time_out" class="form-control"
                           value="{{$logs->time_out}}" placeholder="Enter the time you ended" />
                </div>
                <div class="form-group">
                    <input type="text" name="description" class="form-control"
                           value="{{$logs->description}}" placeholder="Enter a brief description of activity" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
            </form>
        </div>
    </div>
@endsection
