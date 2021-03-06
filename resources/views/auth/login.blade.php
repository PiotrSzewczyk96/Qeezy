@extends('layouts.auth')

@section('desc')
<p class="mb-10 text-muted font-weight-bold">Jeśli nie posiadasz konta w serwisie Baza Wiedzy - <a href="{{ route('register') }}">Zarejestruj się</a>. Możesz również <a href="{{ route('home.index') }}">Wejść jako użytkownik niezalogowany</a>.</p>
<a href="{{ route('register') }}" class="btn btn-outline-primary btn-pill py-4 px-9 font-weight-bold mr-3">Zarejestruj się</a>
<a href="{{ route('home.index') }}" class="btn btn-outline-primary btn-pill py-4 px-9 font-weight-bold">Wejdź bez logowania</a>
@stop

@section('content')
<div class="text-center mb-10">
	<h2 class="font-weight-bold">Zaloguj się</h2>
	<p class="text-muted font-weight-bold">Zaloguj się do swojego konta w Bazie Wiedzy</p>
</div>
<form method="POST" action="{{ route('login') }}" class="form text-left">
@csrf
	<div class="form-group py-2 m-0">
		<input class="form-control h-auto border-0 px-0 placeholder-dark-75 @error('email') is-invalid @enderror" placeholder="E-mail" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <div class="fv-plugins-message-container">
                <div class="fv-help-block">{{ $message }}</div>
            </div>
        @enderror
    </div>
	<div class="form-group py-2 border-top m-0">
		<input class="form-control h-auto border-0 px-0 placeholder-dark-75 @error('password') is-invalid @enderror" type="Password" placeholder="Hasło" id="password" type="password" name="password" required autocomplete="current-password">
        @error('password')
            <div class="fv-plugins-message-container">
                <div class="fv-help-block">{{ $message }}</div>
            </div>
        @enderror
    </div>
    <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-5">
        <div class="checkbox-inline">
            <label class="checkbox m-0 text-muted font-weight-bold" for="remember">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <span></span>Zapamiętaj mnie</label>
        </div>
         @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-muted text-hover-primary font-weight-bold">Zapomniałeś hasła?</a>
        @endif
    </div>

	<div class="text-center mt-10">
		<button type="submit" class="btn btn-primary btn-pill shadow-sm py-4 px-9 font-weight-bold">Zaloguj</button>
	</div>
</form>
@stop