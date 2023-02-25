<?php
include('partials/header.php');
?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="container">
                <h2>Contract</h2>
                <p>Please fill out the form and sign below to confirm your agreement to the terms and conditions of this
                    contract:</p>

                <form id="myForm" method="post">
                    <div>
                        <label for="emri">Emri:</label>
                        <input type="text" name="emri" id="emri">
                    </div>
                    <div>
                        <label for="mbiemri">Mbiemri:</label>
                        <input type="text" name="mbiemri" id="mbiemri">
                    </div>
                    <div>
                        <label for="numri_tel">Numri i telefonit:</label>
                        <input type="text" name="numri_tel" id="numri_tel">
                    </div>
                    <div>
                        <label for="shenime">Shenime</label>
                        <textarea type="text" name="shenime" id="shenime"></textarea>
                    </div>
                    <canvas id="signatureCanvas" width="400" height="200"
                        class="border border-1 shadow-2 bg-white"></canvas>
                    <button type="submit">Submit</button>
                </form>


            </div>
        </div>
    </div>
</div>

<?php include('partials/footer.php') ?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>s -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script>
    var canvas = document.getElementById('signatureCanvas');
    var signaturePad = new SignaturePad(canvas);
</script>
<script>
    document.getElementById('myForm').addEventListener('submit', function (event) {
        event.preventDefault();
        var signatureData = signaturePad.toDataURL();
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'submitSignature.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                alert('Signature submitted successfully');
            } else {
                alert('There was an error submitting the signature');
            }
        };
        xhr.send('signatureData=' + encodeURIComponent(signatureData));
    });
</script>