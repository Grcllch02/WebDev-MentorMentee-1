<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Mentoring Department</title>
</head>

<body>
    <div class="container p-3">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="view_mentor.php">Mentor List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="true" href="view_mentee.php">Mentee List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_mentorMentee.php">Mentor-Mentee</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h1>New Mentee</h1>
                <form method="POST" action="controller.php" class="w-75 mx-auto">
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="inputNama">
                    </div>
                    <div class="mb-3">
                        <label for="inputJurusan" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" name="inputJurusan">
                    </div>
                    <div class="mb-3">
                        <label for="inputTelepon" class="form-label">Nomor Telepon</label>
                        <input type="tel" class="form-control" name="inputTelepon">
                    </div>
                    
                    <a href="view_mentee.php" class="btn btn-danger">Back</a>
                    <button name="button_registerMentee" type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>