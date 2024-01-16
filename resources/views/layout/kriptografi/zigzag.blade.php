@extends('layout.main')

@section('judul')
    Zig Zag Cipher
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
            <div id="options" class="form-group">
                <div class="form-group">
                    <label for="rails" class="h4">Rails</label>
                    <input class="form-control" min="2" max="20" value="3" type="number" id="rails"
                        style="max-width: 8em;" oninput="updateTexts()" />
                </div>
            </div>
            <label for="plaintext" class="h3" id="resultlabel">Result</label>
            <textarea class="form-control text-monospace" rows="3" id="outputtext" spellcheck="false"
                readonly></textarea>
            <div class="form-group">
                <button class="btn btn-warning mt-1" data-toggle="collapse" data-target="#gridwrapper"
                    aria-expanded="false" aria-controls="gridwrapper">Show grid</button>
            </div>
            <div id="gridwrapper" class="collapse">
                <h3>Zig Zag layout</h3>
                <pre style=" color: rgb(255, 255, 255);" id="layout" class="text-monospace"></pre>
            </div>
    </div>
</main>
<script>
updateTexts();
function clearText() {
    document.getElementById("inputtext").value = '';
    document.getElementById("outputtext").value = '';
}

function encrypt() {
    var src = document.getElementById("inputtext").value;
    var rails = parseInt(document.getElementById("rails").value);
    var offset = 0;

    var result = '';
    for (var i = 0; i < rails; i++) {
        for (var j = 0; j < src.length; j++)
            if (railnumber(j, rails, offset) == i)
                result += src[j];
    }

    document.getElementById("outputtext").value = result;
    updateLayout(src);
}

function decrypt() {
    var src = document.getElementById("inputtext").value;
    var rails = parseInt(document.getElementById("rails").value);
    var offset = 0;

    var result = new Array(src.length);
    var k = 0;
    for (var i = 0; i < rails; i++) {
        for (var j = 0; j < src.length; j++)
            if (railnumber(j, rails, offset) == i)
                result[j] = src[k++];
    }

    document.getElementById("outputtext").value = result.join("");
    updateLayout(result.join(""));
}

function railnumber(pos, rails, offset) {
    pos = (pos + offset) % (rails * 2 - 2);
    return pos < rails ? pos : 2 * rails - pos - 2;
}

function updateLayout(src) {
    var rails = parseInt(document.getElementById("rails").value);
    var offset = 0;

    var result = '';
    for (var i = 0; i < rails; i++) {
        for (var j = 0; j < src.length; j++)
            result += railnumber(j, rails, offset) == i ? src[j] : ' ';
        result += '<br/>';
    }

    document.getElementById("layout").innerHTML = result;
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
