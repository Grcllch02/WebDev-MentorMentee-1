<?php require("controller.php"); 
$mentors = viewMentor();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Mentoring Department</title>
</head>

<body>
    <div class="container p-3">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="true" href="view_mentor.php">Mentor List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_mentee.php">Mentee List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  active" href="view_mentorMentee.php">Mentor-Mentee</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Nomor Telepon</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                <a href="view_addmentor.php" class="btn btn-success">Save</a>
            </div>
        </div>
</body>

</html>