<?php require("controller.php"); ?>

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
                        $counter = 0;
                        $allmemntee = getAllMentee();
                        foreach ($allmemntee as $index => $mentee) {
                            $counter++;
                        ?>

                            <tr>
                                <th scope="row"><?= $counter ?></th>
                                <td><?= $mentee['nama'] ?></td> <!-- sm kek yg di model name,dkk -->
                                <td><?= $mentee['jurusan'] ?></td>
                                <td><?= $mentee['no_telepon'] ?></td>
                                <td>
                                    <a href="view_updatementee.php?updateMenteeID=<?= $mentee['mentee_id'] ?>">
                                        <button class="btn btn-warning">Update</button>
                                    </a>
                                    <a href="controller.php?deleteMenteeID=<?= $mentee['mentee_id'] ?>"> <!-- klo lgsg tulis ?deleteID gitu itu pake method get yg bakal tampil di url -->
                                        <button class="btn btn-danger">Delete</button>
                                    </a>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>
                </table>
                <a href="view_addmentee.php" class="btn btn-success">Add Mentee</a>
            </div>
        </div>
    </div>
</body>

</html>