<?php
function my_connectDB(){
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "mentoring_department";
    $conn = mysqli_connect($host, $user, $pwd, $db) or die("ERROR CONNECT TO DATABASE");
    return $conn;
}

include("model_mentor.php");

function createMentor(){
    $conn = my_connectDB();

    $mentor = new model_mentor();
    $mentor->nama = $_POST['inputNama'];
    $mentor->jurusan = $_POST['inputJurusan'];
    $mentor->no_tlpn= $_POST['inputTelepon'];

    $sql = "INSERT INTO mentor(nama, jurusan, no_telepon) VALUES ('$mentor->nama', '$mentor->jurusan', '$mentor->no_tlpn')";

    if (mysqli_query($conn, $sql)) {
        echo "Data mentor berhasil disimpan!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

if (isset($_POST['button_registerMentor'])) {
    createMentor();
    header("Location:view_mentor.php");  
}
?>