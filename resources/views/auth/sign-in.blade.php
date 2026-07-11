@extends('auth.auth-layout')

@section('auth-form')

    <form action="#" method="post" class="auth-form space-y-6">
        @csrf
        <x-form-group name="email" type="email" id="email"/>
        <x-form-group name="password" type="password" id="password" text="Mot de passe" :showForgot="true"/>

        <x-button type="submit" class="mt-[.5em] w-full">Creer</x-button>

        <p class="have-account">Vous n'avez pas de compte ? <a href="#">Creez un compte</a> </p>
    </form>

@endsection