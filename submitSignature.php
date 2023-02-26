<script src="sweetalert2.all.min.js"></script>

<?php
ob_start(); // Nisni buferimin e daljes

$emri = isset($_POST['emri']) ? $_POST['emri'] : '';
$mbiemri = isset($_POST['mbiemri']) ? $_POST['mbiemri'] : '';
$numri_tel = isset($_POST['numri_tel']) ? $_POST['numri_tel'] : '';
$numri_personal = isset($_POST['numri_personal']) ? $_POST['numri_personal'] : '';
$vepra = isset($_POST['vepra']) ? $_POST['vepra'] : '';
$data = isset($_POST['data']) ? $_POST['data'] : '';
$shenime = isset($_POST['shenime']) ? $_POST['shenime'] : '';
$signatureData = isset($_POST['signatureData']) ? $_POST['signatureData'] : '';


if (!empty($emri) && !empty($mbiemri) && !empty($numri_tel) && !empty($numri_personal) && !empty($vepra) && !empty($data) && !empty($shenime) && !empty($signatureData)) {
    // If all variables are not empty, insert data into the database
    $conn = mysqli_connect('localhost', 'root', '', 'bareshao_f');

    if ($_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
        // Get the uploaded file name and extension
        $pdf_name = $_FILES['pdf_file']['name'];
        $pdf_ext = pathinfo($pdf_name, PATHINFO_EXTENSION);

        // Get the PDF file contents
        $pdf_content = mysqli_real_escape_string($conn, file_get_contents($_FILES['pdf_file']['tmp_name']));

        // Save the PDF file to a folder in your server
        $folder_path = "pdf_files/";
        $file_path = $folder_path . $pdf_name;
        file_put_contents($file_path, $pdf_content);
    }

    $sql = "INSERT INTO kontrata (emri, mbiemri, numri_i_telefonit, numri_personal, vepra, data, shenim, nenshkrimi,kontrata_PDF) VALUES ('$emri', '$mbiemri', '$numri_tel', '$numri_personal','$vepra', '$data','$shenime', '$signatureData','$pdf_content')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>alert("Signature submitted successfully"); window.location.href = "kontrata_2.php";</script>';
    } else {
        echo '<script>alert("There was an error submitting the signature");</script>';
    }
} else {
    // If any variable is empty, display an error message
    echo 'Please fill in all the fields.';
}



ob_end_flush(); // Dërgoni daljen në shfletues
