<?php require("controller.php"); ?> <!--require itu buat ngenali doang. include itu smua ditambain ke view mentee -->

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
                        <a class="nav-link " aria-current="true" href="view_mentor.php">Mentor List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="view_mentee.php">Mentee List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_mentorMentee.php">Mentor-Mentee</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h1>Mentee</h1>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Nomor Telepon</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $allmemntee = getAllMentee();
                        foreach ($allmemntee as $mentee): ?>
                            <tr>
                                <td><?= $mentee['mentee_id'] ?></td>
                                <td><?= $mentee['nama'] ?></td>
                                <td><?= $mentee['jurusan'] ?></td>
                                <td><?= $mentee['no_telepon'] ?></td>
                                <td>
                                    <a href="view_updatementee.php?updateMenteeID=<?=$mentee['mentee_id']?>" class="btn btn-warning">Update</a>
                                    <a href="controller.php?deleteMenteeID=<?=$mentee['mentee_id']?>"><button class="btn btn-danger" onclick="return confirm('Yakin mau hapus mentee ini?');">Delete</button></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    
                </table>
                <a href="view_addmentee.php" class="btn btn-success">Add Mentee</a>
            </div>
        </div>
    </div>
</body>

</html>