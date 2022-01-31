@extends('layouts.admin-lte.main')
@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit User</div>

            <div class="card-body">
                <form method="POST" action="{{ route('user.update', $user->id) }}">
                    {{ method_field('PATCH') }}
                    @csrf
                    <x-input globalAttribute="name" label="Name" :defaultValue="$user->name" customAttribute="required disabled" />
                    
                    <x-input globalAttribute="email" type="email" label="E-Mail Address" :defaultValue="$user->email" customAttribute="required disabled" />
   
                    <x-select globalAttribute="role_id" label="Role" customAttribute="required">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @if($user->role_id == $role->id) selected @endif>{{ $role->name }}</option>
                        @endforeach
                    </x-select>

                    <x-input globalAttribute="password" type="password" label="Password" :defaultValue="old('password')" customAttribute="required" />

                    <x-submit-button label="Update" />
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
