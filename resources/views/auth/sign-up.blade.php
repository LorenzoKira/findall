@extends('auth.auth-layout')

@section('auth-form')

    <form action="#" method="post" class="auth-form space-y-4">
        @csrf
        <x-form-group name="nom" type="text" id="name"/>
        <x-form-group name="email" type="email" id="email"/>
        <x-form-group name="password" type="password" id="password" text="Mot de passe"/>
        <x-checkbox name="name" id="id" />

        <x-button type="submit" class="mt-[.5em] w-full bg-primary text-white hover:bg-primary-hover ">Creer</x-button>

        <p class="have-account">Vous avez un compte ? <a href="#">Connectez-vous</a> </p>
    </form>

@endsection