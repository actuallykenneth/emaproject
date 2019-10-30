@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <br />
            <h3>Edit Activity</h3>
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

            <form method="post" action="{{action('CategoriesController@update', $id)}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH" />
                <div class="form-group">
                    <input type="text" name="name" class="form-control"
                           value="{{$categories->name}}" placeholder="Enter First Name" />
                </div>
                <div class="form-group">
                    <input type="text" name="description" class="form-control"
                           value="{{$categories->description}}" placeholder="Enter Last Name" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
            </form>
        </div>
    </div>
@endsection
