@extends('layout.main')

@section('judul')
    Atbash Cipher
@endsection

@section('isi')
<main style="flex: 1;">
    <div class="container">
            <div class="btn-group btn-group-toggle mb-1" data-toggle="buttons">
                <label class="btn btn-outline-success active">
                    <input type="radio" name="options" id="encryptbtn" autocomplete="off"
                        onchange="updateTexts();" checked> Encrypt
                </label>
                <label class="btn btn-outline-success">
                    <input type="radio" name="options" id="decryptbtn" autocomplete="off"
                        onchange="updateTexts();"> Decrypt
                </label>
            </div>
            <div class="form-group">
                <textarea class="form-control text-monospace" rows="4" id="inputtext" oninput="updateTexts();"
                    spellcheck="false" placeholder="Type here..."></textarea>
                <button class="btn btn-warning mt-1" onclick="clearText();">Clear</button>
            </div>
            <label for="plaintext" class="h3" id="resultlabel">Result</label>
            <textarea class="form-control text-monospace" rows="3" id="outputtext" spellcheck="false"
                readonly></textarea>
    </div>
</main>
<script>
updateTexts();
function clearText() {
    document.getElementById("inputtext").value = '';
    document.getElementById("outputtext").value = '';
}

function encrypt() {
    let inputText = document.getElementById('inputtext').value;
    let outputText = '';

    for (let i = 0; i < inputText.length; i++) {
        let charCode = inputText.charCodeAt(i);

        if (charCode >= 65 && charCode <= 90) {
            outputText += String.fromCharCode(90 - (charCode - 65));
        } else if (charCode >= 97 && charCode <= 122) {
            outputText += String.fromCharCode(122 - (charCode - 97));
        } else {
            outputText += inputText[i];
        }
    }

    document.getElementById('outputtext').value = outputText;
}

function decrypt() {
    let inputText = document.getElementById('inputtext').value;
    let outputText = '';

    for (let i = 0; i < inputText.length; i++) {
        let charCode = inputText.charCodeAt(i);

        if (charCode >= 65 && charCode <= 90) {
            outputText += String.fromCharCode(90 - (charCode - 65));
        } else if (charCode >= 97 && charCode <= 122) {
            outputText += String.fromCharCode(122 - (charCode - 97));
        } else {
            outputText += inputText[i];
        }
    }

    document.getElementById('outputtext').value = outputText;
}

function updateTexts() {
    document.getElementById("encryptbtn").checked ? encrypt() : decrypt();
}

</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
@endsection
