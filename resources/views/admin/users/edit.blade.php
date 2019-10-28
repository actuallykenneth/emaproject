@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit {{ $user->name }}</div>


                <div class="card-body"></div>
                <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST">
                    {{ method_field('PUT') }}
                    @csrf
                    @foreach($roles as $role)
                    <div class="form-check">
                        <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                            {{ $user->hasAnyRole($role->name)?'checked':''}}>
                            <label>{{ $role->name }}</label>
                    @endforeach
                    <button type="submit" class="btn btn-primary">
                        UPDATE
                    </button>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
