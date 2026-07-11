@extends('welcome')


@section('body')
    <main class="auth-main grid place-items-center">
        <div class="auth-layout-container">
            <div class="form-container">
                <div class="auth-layout-title-container">
                    <h1 class="auth-layout-title">Commencez Maintenant</h1>
                    <p class="auth-layout-subtitle">Profiter de nos services dès maintenant</p>
                </div>

                <div class="auth-layout-login-buttons">
                    <a href="#">
                        <x-button class="action-btn auth-btn">Google</x-button>
                    </a>

                    <a href="#">
                        <x-button class="action-btn auth-btn">Facebook</x-button>
                    </a>
                </div>

                <x-separator text="OU"/>

                @yield('auth-form')
            </div>

            <div>

            </div>
        </div>
    </main>
@endsection

