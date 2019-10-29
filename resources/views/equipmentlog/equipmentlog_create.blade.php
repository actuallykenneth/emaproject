@extends('master')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Checkout Equipment</h3>
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

        <form method="post" action="{{url('equipmentlog')}}">
            {{csrf_field()}}


            <div class="form group" id='form-equip'>
                <select class="form-control input-lg-dynamic" id="equipment-name">
                    @foreach($equipment as $e)
                    <option value="{{ $e }}">{{ $e }}</option>
                    @endforeach
                    {{csrf_field()}}
            </div>


            <script>
                $(document).ready(function () {
                    $("#equipment-name").change(function () {
                        var equipName = $("#equipment-name :selected").text();
                        // alert(equipName + " selected!");
                        $.ajax({
                            url: "{{ route('ajaxPit') }}",
                            method: "POST",
                            data: {
                                equipName: equipName,
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function (data) {
                                $("#desc").val(data.desc);


                                // alert(data.desc);
                                // var output = '';
                                // for (var entry in data) {
                                //     output += 'key: ' + entry + ' | value: ' + data[entry] + '\n';
                                // }
                                // alert(output);

                                // var output = '';
                                // for (var entry in data[0]) {
                                //     output += 'key: ' + entry + ' | value: ' + data[entry] + '\n';
                                // }
                                // alert(output);
                                // alert(JSON.stringify(data));
                                // console.log(data.yeh);
                                // alert(data);
                                // alert(result->row->name);
                                // console.log(data['desc']);
                                // alert(data.row.toSource());
                                // dd(data);
                            }
                        })

                    });
                });






            </script>


            <div class="form-group">
                <input id="desc" type="text" name="equipment_description" class="form-control"
                    placeholder="Equipment Description" /> //TODO: Get equipment from equipment table.
            </div>
            <div class="form-group">
                <input type="text" name="user_name" class="form-control" placeholder="User Name" /> //TODO: Get user
                name from users table
            </div>
            <div class="form-group">
                <input type="text" name="use_description" class="form-control"
                    placeholder="Please enter what the equipment will be used for" />
            </div>
            <div class="form-group">
                <input type="text" name="time_in" class="form-control" placeholder="Current Time" /> //TODO: Get time of
                entry.
            </div>
            <div class="form-group">
                <input type="text" name="time_out" class="form-control" placeholder="Fill when you check item out" />
                //TODO: just remove this field then use controller@edit to populate it.
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>
@endsection
