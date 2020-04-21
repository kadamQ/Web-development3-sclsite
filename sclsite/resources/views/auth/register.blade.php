@extends('_layout.master')

@section('content')
<h1>{{ __("Register") }}</h1>
<?php
    //dd($errors);
?>
@if ($errors->count() > 0)
    <div class="alert alert-danger" role = "alert">
        <ul>
         @foreach ($errors->all() as $error)
            <li> {{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
<form action="{{ route("register") }}" method="POST">
    @csrf
        <div class="form-group">
            <label for="firstname">{{ __("First name") }}</label>
            <input class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" type="text" name ="firstname" value="{{ old('firstname') }}">
            @if ($errors ->has('firstname'))
                @foreach ($errors->get('firstname') as $error)
                    <p class="invalid-feedback">{{ $error }}</p>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label for="lastname">{{ __("Last name") }}</label>
            <input class="form-control" type="text" name ="lastname">
        </div>
        <div class="form-group">
            <label for="nickname">{{ __("Nickname") }}</label>
            <input class="form-control" type="text" name ="nickname">
        </div>
        <div class="form-group">
            <label for="email">{{ __("Email address") }}</label>
            <input class="form-control" type="text" name ="email">
        </div>
        <div class="form-group">
            <label for="password">{{ __("Password") }}</label>
            <input class="form-control" type="password" name ="password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">{{  __("Password confirmation") }}</label>
            <input class="form-control" type="password" name ="password_confirmation">
        </div>
        <div class="form-group text-right">
            <button class="btn btn-primary" type="submit">{{  __("Register") }}</button>
        </div>       
    </form>
@endsection