@extends('layouts.app')

@section('content1')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Log Data</h3>
        <br />
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        <div align="right">
            <a href="{{route('log.create')}}" class="btn
            btn-primary">Punch In</a>
            <br />
            <br />
        </div>
        <table class="table table-bordered">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Activity</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($logs as $row)
                <tr>
                    <td>{{$row['first_name']}}</td>
                    <td>{{$row['last_name']}}</td>
                    <td>{{$row['activity']}}</td>
                    <td>{{$row['time_in']}}</td>
                    <td>{{$row['time_out']}}</td>
                    <td><a href="{{action('LogController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
                    <td>
                        <form method="post" class="delete_form" action="{{action('LogController@destroy', $row['id'])}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
<script>
$(document).ready(function(){
    $('.delete_form').on('submit', function(){
        if(confirm("Are you sure you want to delete this record?"))
        {
            return true;
        }
        else
        {
            return false;
        }
    })
});
</script>
@endsection
