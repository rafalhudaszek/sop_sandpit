@extends('layouts.default')

@section('content')
    <div class="col-md-7 col-12">
        <div class="row">
            <div class="col">
                <h3 class="main-h">Same-Origin-Policy</h3>
                <p class="default-paragraph">
                    <hr>
                Mechanizm który ogranicza przekazywanie danych innym originą na
                podstawie adresu origina z którego zostało wysłane zapytanie oraz jego trybu.
                <br><br>
                Źródło(ang. Origin) dzili się na trzy części
                <ul class="list">
                    <li><strong>Protokół</strong> <p>Na przykład "https"</p></li>
                    <li><strong>Host</strong> <p>Na przykład "google.com"</p></li>
                    <li><strong>Port</strong> <p>Na przykład "443"</p></li>
                </ul>

                    <ul class="list">
                     <li><strong>Show image from other origin:</strong> <p>Ipsum is simply dummy text of the printing and typesetting industry. </p></li>
                    <li><strong>Call API from other origin: </strong><p>Ipsum is simply dummy text of the printing and typesetting industry. </p></li>
                    <li><strong>Run script in other origin: </strong><p>Ipsum is simply dummy text of the printing and typesetting industry. </p></li>
                    <li><strong>Read file from other origin:</strong> <p>Ipsum is simply dummy text of the printing and typesetting industry. </p></li>
                    <li><strong>Run script from other origin:</strong> <p>Ipsum is simply dummy text of the printing and typesetting industry. </p></li>
                    </ul>
                </p>

            </div>
        </div>
        <div class="row">
            <div class="col-md-7 col-12 button-wrapper">
                <button onclick="show()">Show image from other origin</button>
                <button onclick="callExternalFile()">Run script in other origin</button>
                <button onclick="readExternalFile()">Read file from other origin</button>
                <button onclick="runExternalScript()">Run script from other origin</button>
                <button onclick="callExternalApi()">Call API from other origin</button>
            </div>
            <div class="col-md-5 col-12">
                <pre id="logs"></pre>
                <iframe id="download_iframe" style="display:block;"></iframe>
                <pre id="externalScriptBox"></pre>
                <img src="http://localhost:8082/image.png" class="image-origin" id="image" alt="image" style="display: none;">
            </div>
        </div>
    </div>

    <script>
        function show()
        {
            document.getElementById('image').style.display = "block";
        }
    </script>

    <script>
        function callExternalFile()
        {
            fetch('http://127.0.0.1:8082/file');
        }
    </script>

    <script>
        function readExternalFile()
        {
            document.getElementById('download_iframe').src = "http://127.0.0.1:8082/date_file.txt";
        }
    </script>

    <script src="http://127.0.0.1:8082/script.js"></script>

    <script>
        function callExternalApi()
        {
            var logger = document.getElementById('logs');
            fetch('http://127.0.0.1:8082/api')
                .then(json => logger.innerHTML = json + '<br />')
                .catch(error => {
                    logger.innerHTML = "There was a problem with reading response from external api.</br>Please check error in console.</br>Error:" + error;
                });
        }
    </script>
@endsection
