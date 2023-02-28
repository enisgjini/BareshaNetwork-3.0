<?php
include('partials/header.php');
?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="container">
                <div class="p-5 bg-light mb-4 card">
                    <h4 class="font-weight-bold text-gray-800 mb-4">Kontrata e re</h4>
                    <nav class="d-flex">
                        <h6 class="mb-0">
                            <a href="" class="text-reset">Kontrata</a>
                            <span>/</span>
                            <a href="kontrata_2.php" class="text-reset" data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo __FILE__; ?>"><u>Kontrata e re</u></a>
                        </h6>
                    </nav>
                </div>
                <div class="card p-5 ">
                    <h2>Contract</h2>
                    <p>Please fill out the form and sign below to confirm your agreement to the terms and conditions of
                        this
                        contract:</p>

                    <form method="post" action="submitSignature.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <label for="emri">Emri:</label>
                                <input type="text" name="emri" id="emri" class="form-control">
                            </div>
                            <div class="col">
                                <label for="mbiemri">Mbiemri:</label>
                                <input type="text" name="mbiemri" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="numri_tel">Numri i telefonit:</label>
                                <input type="text" name="numri_tel" class="form-control">
                            </div>
                            <div class="col">
                                <label for="numri_personal">Numri personal:</label>
                                <input type="text" name="numri_personal" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="vepra">Vepra</label>
                                <input type="text" name="vepra" class="form-control">
                            </div>
                            <div class="col">
                                <label for="data">Data</label>
                                <input type="date" name="data" class="form-control">
                            </div>

                            <div class="col">
                                <label for="data">Ngarko kontraten:</label>
                                <input type="file" name="pdf_file" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="shenime">Shenime:</label>
                                <textarea type="text" name="shenime" placeholder="Shenime" class="form-control"> </textarea>
                            </div>
                        </div>

                        <label for="signature">Nenshkrimi:</label>
                        <br>
                        <canvas id="signature" width="400" height="200" class="border border-1 shadow-1 rounde"></canvas>

                        <input type="hidden" name="signatureData" id="signatureData">

                        <br>
                        <button type="submit" class="btn btn-light border border-1 shadow-1">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

<?php include('partials/footer.php') ?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>s -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

<script>
    var canvas = document.getElementById('signature');
    var signaturePad = new SignaturePad(canvas);

    document.querySelector('form').addEventListener('submit', function(event) {
        var signatureData = signaturePad.toDataURL();
        document.getElementById('signatureData').value = signatureData;
    });
</script>

<!-- <script>
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
</script> -->