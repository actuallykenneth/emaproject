{{--We extend from the app blade template. We are using the app.blade.php file here located at emaproject\resources\views\layouts\app.blade.php.--}}
@extends('layouts.app')
{{--Anything in this section will be displayed in the content1 section of the app.blade.php template.--}}
@section('content1')

{{--For AJAX     --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/css/theme.blue.css">
{{--For Jquery--}}
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
{{--For jquary tables--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.29.0/js/jquery.tablesorter.combined.js"
    integrity="sha256-AQTn9CwiNvZG2zsoT0gswugjZp0alCQySLyt9brT9Cg=" crossorigin="anonymous"></script>


    <div class="row">
        <div class="col-md-12">
            <br />
            <h3 align="center">Activities</h3>
            <br />
{{--        Display success message--}}
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{$message}}</p>
                </div>
            @endif
{{--        Send user to categories.create page to create new entry--}}
            <div align="right">
                <a href="{{route('categories.create')}}" class="btn
            btn-primary">Create New</a>
                <br />
                <br />
            </div>
{{--        This is where the display is done for our table--}}
            <table class="table table-bordered" id="myTable">
                <thead>
                <tr>
                    <th>Activity Name</th>
                    <th>Activity Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                {{--This is where we get content from SQL tabel and display it ours.--}}
                    @foreach($categories as $row)
                    <tr>
                        <td>{{$row['name']}}</td>
                        <td>{{$row['description']}}</td>
{{--                        Button used to edit record. We must get the record that we want to edit using the CatagoriesController edit function and we need
                            to pass id of the record that we want to edit. --}}
                        <td><a href="{{action('CategoriesController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
                        <td>
{{--                            Button used to delete a record. We use CatagorieController delete function and ID of record must be passed.--}}
                            <form method="post" class="delete_form" action="{{action('CategoriesController@destroy', $row['id'])}}">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE" />
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
{{--Function call--}}
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

<script>
    // make these tables sortable!
        $(document).ready(function($){
            $("#myTable").tablesorter({
              theme: 'blue',
              widgets: ["zebra", "filter"],
              widgetOptions: {
                  zebra : ["normal-row", "alt-row"]
              },
            });
            });
</script>


<style>
    /* table.tablesorter tbody tr.normal-row td {
            background: #888;
            color: #fff;
        } */

    table.tablesorter tbody tr.alt-row td {
        background: #e6eaff;
        /* color: #fff; */
    }
</style>

@endsection
