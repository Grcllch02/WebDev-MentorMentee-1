<?php
require('controller.php');

if(isset($_GET["updateID"])){
    $mentor_id = $_GET['updateID'];
    $mentor = getMentorWithID($mentor_id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>New Member</title>
</head>

<body>
    <div class="container p-3">
        <div class="card text-center">
            <div class="card-body">
                <h1>New Mentor</h1>
                <form method="POST" action="controller.php">
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="inputNama" value="<?=$mentor['nama']?>">
                    </div>
                    <div class="mb-3">
                        <label for="inputJurusan" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" name="inputJurusan" value="<?=$mentor['jurusan']?>">
                    </div>
                    <div class="mb-3">
                        <label for="inputTelepon" class="form-label">Nomor Telepon</label>
                        <input type="tel" class="form-control" name="inputTelepon" value="<?=$mentor['no_telepon']?>">
                    </div>
                    
                    <a href="view_mentor.php" class="btn btn-danger">Back</a>
                    <button name="button_updateMentor" type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>