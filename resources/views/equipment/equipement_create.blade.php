{{--We extend from the master blade template. We are using the master.blade.php file here located at emaproject\resources\views\master.blade.php.--}}
@extends('master')
{{--Anything in this section will be displayed in the content section of the master.blade.php template.--}}
@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">New Equipment Entry</h3>
        <br />
{{--        Display errors for user input (Ex: User enters blank name. Show error.)--}}
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                    <li>{{$error}}</li> {{--output Error--}}
                @endforeach
            </ul>
        </div>
        @endif
{{--        Display success message if post method is successful.--}}
        @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
{{--        Post method tied to to emaproject/resources/views/catagories. catagories_index.blade.php will be default for file.--}}
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
