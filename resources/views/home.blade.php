{{--We extend from the app blade template. We are using the app.blade.php file here located at emaproject\resources\views\layouts\app.blade.php.--}}
@extends('layouts.app')
{{--Anything in this section will be displayed in the content section of the app.blade.php template.--}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
