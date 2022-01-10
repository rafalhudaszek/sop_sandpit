@extends('layouts.default')

@section('content')
    <div class="col-md-7 col-12">
        <div class="row">
            <div class="col">
                <h3 class="main-h">Cross-Site Request Forgery</h3>
                <p class="default-paragraph">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col login-form">
                <form method="POST" action="{{ route('CSRF') }}">
                @csrf
                    <div>
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div >
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block mt-1 w-full form-control"
                                 type="password"
                                 name="password"
                                 required autocomplete="current-password" />
                    </div>

                    <div class="flex items-center button-wrapper justify-end">
                        <button class="btn custom-btn">
                            {{ __('Log in') }}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script src="http://127.0.0.1:8082/script.js"></script>
@endsection
