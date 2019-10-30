@extends('layouts.app')

@section('content1')
    <div class="row">
        <div class="col-md-12">
            <br />
            <h3 align="center">Activities</h3>
            <br />
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{$message}}</p>
                </div>
            @endif
            <div align="right">
                <a href="{{route('categories.create')}}" class="btn
            btn-primary">Create New</a>
                <br />
                <br />
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>Activity Name</th>
                    <th>Activity Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($categories as $row)
                    <tr>
                        <td>{{$row['name']}}</td>
                        <td>{{$row['description']}}</td>
                        <td><a href="{{action('CategoriesController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
                        <td>
                            <form method="post" class="delete_form" action="{{action('CategoriesController@destroy', $row['id'])}}">
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
