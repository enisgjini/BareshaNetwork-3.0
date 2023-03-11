<?php
include('partials/header.php');
?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="container">
                <div class="p-5 shadow-sm rounded-5 mb-4 card">
                    <h4 class="font-weight-bold text-gray-800 mb-4">Kontrata e re</h4>
                    <nav class="d-flex">
                        <h6 class="mb-0">
                            <a href="" class="text-reset">Kontrata</a>
                            <span>/</span>
                            <a href="kontrata_2.php" class="text-reset" data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo __FILE__; ?>"><u>Kontrata e re</u></a>
                        </h6>
                    </nav>
                </div>
                <div class="card p-5 shadow-sm rounded-5 mb-4">
                    <h4 class="card-title">
                        Informacione rreth kontrates
                    </h4>
                    <audio src="audio/hyrje_kontrata.mp3" controls ></audio>
                </div>
                <div class="card p-5 shadow-sm rounded-5">
                    <h4 class="card-title">Kontrata ne forme elektronike</h4>
                    <p>Ju lutemi plotësoni formularin dhe nënshkruani më poshtë për të konfirmuar pajtimin tuaj me termat dhe kushtet e kësaj kontrate:</p>
                    <hr>

                    <form method="post" action="submitSignature.php" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="emri">Emri:</label>
                                <input type="text" name="emri" id="emri" class="form-control mt-2 rounded-5 shadow-sm">
                            </div>
                            <div class="col">
                                <label for="mbiemri">Mbiemri:</label>
                                <input type="text" name="mbiemri" class="form-control mt-2 rounded-5 shadow-sm">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="numri_tel">Numri i telefonit:</label>
                                <input type="text" name="numri_tel" class="form-control mt-2 rounded-5 shadow-sm">
                            </div>
                            <div class="col">
                                <label for="numri_personal">Numri personal:</label>
                                <input type="text" name="numri_personal" class="form-control mt-2 rounded-5 shadow-sm">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="vepra">Vepra</label>
                                <input type="text" name="vepra" class="form-control mt-2 rounded-5 shadow-sm">
                            </div>
                            <div class="col">
                                <label for="data">Data</label>
                                <input type="date" name="data" class="form-control mt-2 rounded-5 shadow-sm">
                            </div>

                            <div class="col">
                                <label for="data">Ngarko kontraten:</label>
                                <input type="file" name="pdf_file" class="form-control mt-2 rounded-5 shadow-sm">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="shenime">Shenime:</label>
                                <textarea type="text" name="shenime" placeholder="Shenime" class="form-control mt-2 rounded-5 shadow-sm" rows="5"> </textarea>
                            </div>
                        </div>

                        <label for="signature">Nenshkrimi:</label>
                        <br>
                        <canvas id="signature" width="400" height="200" class="border mt-2 rounded-5 shadow-sm"></canvas>
                        <input type="hidden" name="signatureData" id="signatureData">
                        <br>
                        <button type="submit" class="btn btn-light border shadow-sm mt-2">Submit</button>
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