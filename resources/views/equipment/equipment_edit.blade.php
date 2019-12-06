{{--We extend from the master blade template. We are using the master.blade.php file here located at emaproject\resources\views\master.blade.php.--}}
@extends('master')
{{--Anything in this section will be displayed in the content section of the master.blade.php template.--}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <br />
            <h3>Edit Equipment Info</h3>
            <br />
{{--        Display errors for user input (Ex: User enters blank name. Show error.)--}}
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
{{--        Call the update method from CatagoriesController to update information in the SQL database based on id.--}}
            <form method="post" action="{{action('EquipmentController@update', $id)}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH" />
                <div class="form-group">
                    <input type="text" name="given_id" class="form-control"
                           value="{{$equipment->given_id}}" placeholder="Enter New Equipment ID" />
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control"
                           value="{{$equipment->name}}" placeholder="Enter New Equipment Name" />
                </div>
                <div class="form-group">
                    <input type="text" name="description" class="form-control"
                           value="{{$equipment->description}}" placeholder="Enter New Equipment Description" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
            </form>
        </div>
    </div>
@endsection
