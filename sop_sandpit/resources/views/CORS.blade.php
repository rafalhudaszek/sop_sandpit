@extends('layouts.default')

@section('content')
    {{--    <div class="row">--}}
    <div class="col-md-7 col-12">
        <div class="row">
            <div class="col">
                <h3 class="main-h">Cross-Origin-Resource-Sharing</h3>
                <p class="default-paragraph">
                <hr>

                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <h3>Request</h3>
                <div class="input-group button-wrapper">
                    <div class="checkbox-wrap">
                        <input type="checkbox" id="cors" name="cors"  value="cors">
                        <label for="cors">Use CORS</label><br>
                    </div>

                    <button onclick="addHeader()">Add Header</button>
                    <button onclick="removeHeader()">Remove Header</button>
                    <div id="new_header"></div>
                    <div id="new_header_value"></div>
                    <input type="hidden" value="0" id="total_new_header_no">
                    <input type="hidden" value="0" id="total_new_header_value_no">
                </div>
                <br>
                <h3>Response</h3>
                <label for="ACAO">Access-Control-Allow-Origin</label>
                <input type="text" class="form-control" id="ACAO" name="ACAO"><br>
                <label for="ACEH">Access-Control-Expose-Headers</label>
                <input class="form-control" type="text" id="ACEH" name="ACEH"><br>
                <div class=" button-wrapper">
                    <button onclick="saveAccessControl()">Save access option in other origin</button>
                    <button onclick="makeRequest()">Run script from other origin</button>
                </div>

            </div>
            <div class="col-md-6 col-12">
                <h3>Result</h3>
                <p class="text-justify" id="resultTable"></p>
                <h3 class="display" id="resultTitle">Response</h3>
                <p class="text-justify" id="responseDiv"></p>
                <h3 class="display" id="requestTitle">Request Headers</h3>
                <p class="text-justify" id="requestHeaders"></p>
            </div>
        </div>
    </div>

    <script>
        let isPreflightSent = false;
        let isResponseVisible = false
        function showCorsResult(headers)
        {
            checkPreflight(headers);
            checkResponse();
            showCorsTable();
        }

        function checkPreflight(headers)
        {
            isPreflightSent = headers.values().next()['value'] !== undefined;
        }

        function checkResponse()
        {
            isResponseVisible = !$('#responseDiv:empty').length;
        }

        function showCorsTable()
        {
            let table = document.getElementById('resultTable');

            table.innerHTML = '';

            if (isResponseVisible) {
                table.innerHTML += 'Brawo wygrałeś w CORS!<br>';
                table.classList.add("green");
            } else {
                table.innerHTML += 'Ups coś poszło nie tak :(<br>';
            }

            if (isPreflightSent) {
                table.innerHTML += 'Preflight został wysłany <img src="/public/checked-checkbox-24.png" alt=""><br>';
                table.classList.add("green");
            } else {
                table.innerHTML += 'Preflight nie został wysłany (nie był potrzebny)<br>';
            }

            if (isResponseVisible) {
                table.innerHTML += 'Response jest widoczny<br>';
                table.classList.add("green");
            } else {
                table.innerHTML += 'Response nie jest widoczny<br>';
            }
        }

        function addHeader()
        {
            var new_header_no = parseInt($('#total_new_header_no').val())+1;
            var new_header_value_no = parseInt($('#total_new_header_value_no').val())+1;
            var new_input_header="<input type='text' placeholder='name_"+new_header_no+"' required id='new_header_"+new_header_no+"'>";
            var new_input_header_value="<input type='text' required placeholder='value_"+new_header_value_no+"' id='new_header_value_"+new_header_value_no+"'>";
            $('#new_header').append(new_input_header);
            $('#new_header_value').append(new_input_header_value);
            $('#total_new_header_no').val(new_header_no)
            $('#total_new_header_value_no').val(new_header_value_no)
        }
        function removeHeader(){
            var last_header_no = $('#total_new_header_no').val();
            var last_header_value_no = $('#total_new_header_value_no').val();
            if(last_header_no > 0){
                $('#new_header_'+last_header_no).remove();
                $('#total_new_header_no').val(last_header_no-1);
            }
            if(last_header_value_no > 0){
                $('#new_header_value_'+last_header_value_no).remove();
                $('#total_new_header_value_no').val(last_header_value_no-1);
            }
        }

        function makeRequest()
        {
            let headers = getRequestHeaders();
            saveRequestHeaders(headers);
            readRequestHeaders();
            setTimeout(showCorsResult, 150, headers);
        }

        function getRequestHeaders()
        {
            var last_header_no = $('#total_new_header_no').val();
            let header_name;
            let header_value;
            let i;
            let headers = new Headers();
            if(last_header_no > 0) {
                for (i = 0; i < last_header_no; i++) {
                    let d = i + 1;
                    header_name = $('#new_header_'+d).val();
                    header_value = $('#new_header_value_'+d).val();
                    if( !header_name||!header_value ){
                        alert("Prosze uzupełnić poprawnie pola nagłówków");
                        break;
                    }

                    headers.append(header_name, header_value)
                }
            }
            return headers;
        }

        function saveRequestHeaders(headers)
        {
            var requestTitle=document.getElementById("requestTitle");
            var resultTitle=document.getElementById("resultTitle");
            var responseDiv = document.getElementById('logs');
            var corsCheckbox = document.getElementById("cors");
            var fetchMode;
            if (corsCheckbox.checked === true) {
                fetchMode = 'cors';
            } else {
                fetchMode = 'no-cors';
            }
            fetch("http://127.0.0.1:8082/cors_request",
                {
                    mode: fetchMode,
                    headers: headers,
                })
                .then(function(response) {
                    resultTitle.classList.toggle("display");
                    requestTitle.classList.toggle("display");
                    return response.text().then(function(text) {
                        document.getElementById('responseDiv').innerHTML = text;
                    })})
                .catch(error => {
                    responseDiv.innerHTML =
                        "There was a problem with reading response from external api." +
                        "</br>Error:" + error;
                });
        }

        function readRequestHeaders()
        {
            fetch("http://127.0.0.1:8082/cors_request_headers",
                {
                    mode: "cors",
                })
                .then(function(response) {
                    return response.text().then(function(text) {
                        document.getElementById('requestHeaders').innerHTML = text;
                    })
                })
                .catch(err => console.log(err));
        }
        // ACAM: '',
        function saveAccessControl()
        {
            const body = {
                ACAO: document.getElementById('ACAO').value,
                ACAM: '',
                ACEH: document.getElementById('ACEH').value
            }
            fetch("http://127.0.0.1:8082/saveAccess", {
                method: "post",
                body: JSON.stringify(body),
                headers: { "Content-Type": "text/plain" }
            }).catch(err => console.log(err));
        }
    </script>

@endsection

