<?php
ob_start(); // start output buffering
$emri = $_POST['emri'];
$mbiemri = $_POST['mbiemri'];
$numri_tel = $_POST['numri_tel'];
$shenime = $_POST['shenime'];
$signatureData = $_POST['signatureData'];
$conn = mysqli_connect('localhost', 'root', '', 'bareshao_f');
$sql = "INSERT INTO kontrata (emri, mbiemri, numri_i_telefonit, shenim,nenshkrimi) VALUES ('$emri', '$mbiemri', '$numri_tel','$shenime' ,'$signatureData')";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo 'Signature submitted successfully';
} else {
    echo 'There was an error submitting the signature';
}


ob_end_flush(); // send the output to the browser

?>