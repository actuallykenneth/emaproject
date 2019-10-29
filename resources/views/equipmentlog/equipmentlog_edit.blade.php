@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <br />
            <h3>Edit Equipment Log</h3>
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

            <form method="post" action="{{action('EquipmentLogController@update', $id)}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH" />
                <div class="form-group">
                    <input type="text" name="name" class="form-control"
                           value="{{$equipmentlog->name}}" placeholder="Enter New Equipment Name" />
                </div>
                <div class="form-group">
                    <input type="text" name="equipment_description" class="form-control"
                           value="{{$equipmentlog->equipment_description}}" placeholder="Enter New Equipment Description" />
                </div>
                <div class="form-group">
                    <input type="text" name="user_name" class="form-control"
                           value="{{$equipmentlog->user_name}}" placeholder="Enter New User Name" />
                </div>
                <div class="form-group">
                    <input type="text" name="use_description" class="form-control"
                           value="{{$equipmentlog->use_description}}" placeholder="Enter New Use Description" />
                </div>
                <div class="form-group">
                    <input type="text" name="time_in" class="form-control"
                           value="{{$equipmentlog->time_in}}" placeholder="Enter New Time In" />
                </div>
                <div class="form-group">
                    <input type="text" name="time_out" class="form-control"
                           value="{{$equipmentlog->time_out}}" placeholder="Enter New Time Out" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
            </form>
        </div>
    </div>
@endsection
