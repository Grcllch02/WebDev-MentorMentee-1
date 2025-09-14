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
include("model_mentee.php");

function createMentor(){
    $conn = my_connectDB();

    $mentor = new model_mentor();
    $mentor->nama = $_POST['inputNama'];
    $mentor->jurusan = $_POST['inputJurusan'];
    $mentor->no_tlpn= $_POST['inputTelepon'];

    $sql = "INSERT INTO mentor(nama, jurusan, no_telepon) VALUES ('$mentor->nama', '$mentor->jurusan', '$mentor->no_tlpn')";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        // echo "Data mentor berhasil disimpan!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
}

if (isset($_POST['button_registerMentor'])) {
    createMentor();
    header("Location:view_mentor.php");  
}

function viewMentor(){
    $conn = my_connectDB();

    $sql = "SELECT * FROM mentor";
    $result = mysqli_query($conn, $sql);

    $mentorlist = [];
    if($result && mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $mentorList[] = $row;
        }
    }

    mysqli_close($conn);
    return $mentorList;
}

function deleteMentor($id){
    $conn = my_connectDB();

    $sql = "DELETE from mentor WHERE mentor_id = $id";

    if(mysqli_query($conn, $sql)){
        
    }else{
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

if(isset($_GET['deleteID'])){
    $id = $_GET['deleteID'];
    deleteMentor($id);
    header("Location:view_mentor.php");
}

function getMentorWithID($mentorID){
    $conn = my_connectDB();

    $sql = "SELECT * FROM mentor WHERE mentor_id = $mentorID";
    $result = mysqli_query($conn, $sql);

    $mentor = null;
    if ($result && mysqli_num_rows($result) > 0) {
        $mentor = mysqli_fetch_assoc($result); 
    }

    mysqli_close($conn);
    return $mentor;
}

function updateMentor($mentor_id){
    $conn = my_connectDB();

    $mentor = new model_mentor();
    $mentor->nama = $_POST['inputNama'];
    $mentor->jurusan = $_POST['inputJurusan'];
    $mentor->no_tlpn= $_POST['inputTelepon'];

    $sql = "UPDATE mentor set nama='$mentor->nama', jurusan='$mentor->jurusan', no_telepon='$mentor->no_tlpn' WHERE mentor_id = $mentor_id";

    if(mysqli_query($conn, $sql)) {
        mysqli_close($conn);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if(isset($_POST['button_updateMentor'])){
    $id = $_POST['input_id'];
    updateMentor($id);
    header("Location:view_mentor.php");
}

// MENTEEE
function createMentee(){
    $conn = my_connectDB();

    $mentee = new model_mentee();
    $mentee->nama = $_POST['inputNama'];
    $mentee->jurusan = $_POST['inputJurusan'];
    $mentee->no_tlpn= $_POST['inputTelepon'];

    $sql = "INSERT INTO mentee(nama, jurusan, no_telepon) VALUES ('$mentee->nama', '$mentee->jurusan', '$mentee->no_tlpn')";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
}

if (isset($_POST['button_registerMentee'])) {
    createMentee();
    header("Location:view_mentee.php");  
}

function viewMentee(){
    $conn = my_connectDB();

    $sql = "SELECT * FROM mentee";
    $result = mysqli_query($conn, $sql);

    $menteelist = [];
    if($result && mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $menteelist[] = $row;
        }
    }

    mysqli_close($conn);
    return $menteelist;
}

function deleteMentee($id){
    $conn = my_connectDB();

    $sql = "DELETE from mentee WHERE mentee_id = $id";

    if(mysqli_query($conn, $sql)){
        
    }else{
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

if(isset($_GET['deleteIDmentee'])){
    $id = $_GET['deleteIDmentee'];
    deleteMentee($id);
    header("Location:view_mentee.php");
}

?>