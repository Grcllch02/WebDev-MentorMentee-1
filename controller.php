<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function my_connectDB()
{
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "Mentoring_Department";
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
    $mentor->no_tlpn = $_POST['inputTelepon'];

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
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $mentorlist[] = $row;
        }
    }

    mysqli_close($conn);
    return $mentorlist;
}

function deleteMentor($id){
    $conn = my_connectDB();
    $sql = "DELETE from mentor WHERE mentor_id = $id";

    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

if (isset($_GET['deleteID'])) {
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

    // $mentor = new model_mentor();
    $nama = $_POST['inputNama'];
    $jurusan = $_POST['inputJurusan'];
    $no_tlpn = $_POST['inputTelepon'];

    $sql = "UPDATE mentor set nama='$nama', jurusan='$jurusan', no_telepon='$no_tlpn' WHERE mentor_id = $mentor_id";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['button_updateMentor'])) {
    $id = $_POST['input_id'];
    updateMentor($id);
    header("Location:view_mentor.php");
}


// MENTEEEEEEEEEEEEEEEEEE
function createMentee()
{
    $conn = my_connectDB();

    $mentee = new model_mentee();
    $mentee->nama = $_POST['inputNama'];
    $mentee->jurusan = $_POST['inputJurusan'];
    $mentee->no_tlpn = $_POST['inputTelepon'];

    $sql = "INSERT INTO mentee(nama, jurusan, no_telepon) VALUES ('$mentee->nama', '$mentee->jurusan', '$mentee->no_tlpn')";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        // echo "Data mentor berhasil disimpan!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

//isset itu cek kek bnr ga ad variabel nm e button_registerMentee
//jika button regis di klik
if (isset($_POST['button_registerMentee'])) {
    createMentee();
    header("Location:view_mentee.php");  //kembali ke halaman lain
}

function getAllMentee()
{
    $conn = my_connectDB();
    $sql = "SELECT * FROM mentee";

    $result = mysqli_query($conn, $sql); //eksekusi querry ke database, hasil disimpen di result

    $menteeList = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { //cek hasil querry ada data e ga
            $menteeList[] = $row;
        }
    }

    mysqli_close($conn);
    return $menteeList;
}

function deleteMentee($id)
{
    $conn = my_connectDB();
    $sql = "DELETE FROM mentee WHERE mentee_id = $id";

    if (mysqli_query($conn, $sql)) { // berhasil hapus
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

//jika button delete di klik
if (isset($_GET['deleteMenteeID'])) { //jika ada pengiriman data dgn nm variabel deleteMenteeID
    $id = $_GET['deleteMenteeID'];
    deleteMentee($id);
    header("Location:view_mentee.php"); //kembali ke halaman lain
}

function getMenteeWithID($menteeID)
{
    $conn = my_connectDB();

    $sql = "SELECT * FROM mentee WHERE mentee_id = $menteeID";
    $result = mysqli_query($conn, $sql);

    $mentee = null;
    if ($result && mysqli_num_rows($result) > 0) {
        $mentee = mysqli_fetch_assoc($result);
    }

    mysqli_close($conn);
    return $mentee;
}

function updateMentee($mentee_id)
{
    $conn = my_connectDB();

    $nama = $_POST['inputNama'];
    $jurusan = $_POST['inputJurusan'];
    $no_tlpn = $_POST['inputTelepon'];

    $sql = "UPDATE mentee set nama='$nama', jurusan='$jurusan', no_telepon='$no_tlpn' WHERE mentee_id = $mentee_id";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        // echo "Data mentor berhasil disimpan!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['button_updateMentee'])) {
    $id = (int)$_POST['input_id']; //hidden input di form
    updateMentee($id);
    header("Location:view_mentee.php");
}

// ---------------- VIEW FUNCTION ----------------
function viewMentorMentee() {
    $conn = my_connectDB();
    $sql = "SELECT me.mentee_id, me.nama AS mentee_nama, m.nama AS mentor_nama
            FROM mentee me
            JOIN mentor m ON me.mentor_id = m.mentor_id
            WHERE me.mentor_id IS NOT NULL";
    $result = mysqli_query($conn, $sql);

    $mentorMenteeList = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $mentorMenteeList[] = $row;
        }
    }

    mysqli_close($conn);
    return $mentorMenteeList;
}
//punten cel
// ---------------- SAVE PAIRING ----------------
if (isset($_POST['saveMentorMentee'])) {
    $conn = my_connectDB();
    $mentor_id = $_POST['mentor_id']; // id mentor yang dipilih
    $mentee_id = $_POST['mentee_id']; // id mentee yang akan dipasangkan

    // Validasi input
    if (!empty($mentor_id) && !empty($mentee_id)) {
        $sql = "UPDATE mentee SET mentor_id = ? WHERE mentee_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $mentor_id, $mentee_id);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: view_mentorMentee.php"); 
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Mentor dan Mentee harus dipilih!";
    }
}

// ---------------- DELETE PAIRING ----------------
if (isset($_POST['deleteMentorMentee'])) {
    $mentee_id = $_POST['mentee_id'] ?? null; // ambil mentee_id yang mau dihapus relasinya

    if (!empty($mentee_id)) {
        $conn = my_connectDB(); 

        // Update mentor_id jadi NULL
        $sql = "UPDATE mentee SET mentor_id = NULL WHERE mentee_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $mentee_id);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: view_mentorMentee.php"); 
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Mentee ID tidak ditemukan!";
    }
}
?>
