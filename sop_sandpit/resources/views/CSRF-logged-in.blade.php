@extends('layouts.default')
@section('content')
    <div class="col-md-7 col-12">
        <div class="row">
            <div class="col">
                <h3 class="main-h">Control Panel - jesteś zalogowany</h3>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" class="logout"
                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </div>
            <div class="col external">
                <h4 class="main-h ">Linki zewnętrzne</h4>
                <a href="http://localhost:8082/evil-logout-with-crsf">"Bezpieczny" link nie omijający CSRF</a><br>
                <a href="http://localhost:8082/evil-logout-without-crsf">"Bezpieczny" link omijający CSRF</a>
            </div>
        </div>
    </div>
@endsection
