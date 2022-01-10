@extends('layouts.default')

@section('content')
{{--    <div class="row">--}}
        <div class="col-7">
            <div class="row">
                <div class="col">
                    <h3 class="main-h">Same-Origin-Policy</h3>
                    <p class="default-paragraph">
                        <hr>
                        Od początku istnienia internetu dla szerszego grona użytkowników, istniał problem bezpieczeństwa w sieci.
                        Naturalną koleją rzeczy było zadbanie o uszczelnienie luk pozwalających na np.
                        wykradanie danych użytkowników.
                        <br>
                        Role tą w dzisiejszych czasach spełniają przeglądarki internetowe
                        czyli podstawowe narzędzia służące do serfowania w sieci.
                        <br>
                        W dalszej częsci projektu, w kontekscie mechanizmów bezpieczeństwa oraz przeglądarek internetowych, będe omawiać poniższe zagadnienia:
                    <ul class="list">
                        <li><strong>Same-origin policy:</strong> <p>Podstawowy mechanizm bezpieczeństwa nowoczesnych przeglądarek. Określa zasady wymiany danych oraz plików między "originami". </p></li>
                        <li><strong>Cross-origin resource sharing:</strong><p>Mechanizm umożliwiajacy konkretnym zewnętrznym "origina" dostęp do zasobów strony. </p></li>
                        <li><strong>Cross-site request forgery:</strong><p>Atak z zewnętrznego "origina" zmuszający użytkownika do wysłania zapytania do "origina" na której obecnie jest zalogowany.</p></li>
                        <li><strong>Cross-site scripting:</strong> <p>Atak polegający na wstrzyknięciu do przeglądarki ofiary fragmentu języka skryptowego, który może być uruchomiony w przeglądarce.</p></li>
                    </ul>
                    </p>
                </div>
            </div>
{{--            <div class="row">--}}
{{--                <div class="col">--}}
{{--                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's--}}
{{--                    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.--}}
{{--                    It has survived not only five centuries, but also the leap into electronic typesetting,--}}
{{--                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum--}}
{{--                    passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's--}}
{{--                    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.--}}
{{--                    It has survived not only five centuries, but also the leap into electronic typesetting,--}}
{{--                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum--}}
{{--                    passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
{{--    </div>--}}
@endsection
