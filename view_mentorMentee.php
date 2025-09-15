<?php require("controller.php");
$mentors = viewMentor();
$mentees = getAllMentee();
$mentormentee = viewMentorMentee();
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
                        <a class="nav-link" href="view_mentor.php">Mentor List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_mentee.php">Mentee List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="true" href="view_mentorMentee.php">Mentor-Mentee</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <!-- Table daftar pairing -->
                <table class="table table-bordered mt-3">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Mentor</th>
                            <th scope="col">Mentee</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $counter = 0;
                        foreach ($mentormentee as $mm):
                            $counter++;
                        ?>
                            <tr>
                                <td><?= $counter ?></td>
                                <td><?= $mm['mentor_nama'] ?></td>
                                <td><?= $mm['mentee_nama'] ?></td>
                                <td>
                                    <form method="POST" action="controller.php" class="d-inline">
                                        <input type="hidden" name="mentee_id" value="<?= $mm['mentee_id'] ?>">
                                        <button type="submit" name="deleteMentorMentee" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <hr>
                <!-- Form tambah pairing -->
                <form method="POST" action="controller.php" class="d-flex flex-column align-items-center gap-3">

                    <!-- Mentor -->
                    <div class="d-flex align-items-center gap-2">
                        <label class="fw-bold">Mentor</label>
                        <select class="form-select w-auto" name="mentor_id">
                            <?php foreach ($mentors as $m): ?>
                                <option value="<?= $m['mentor_id'] ?>"><?= $m['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Mentee -->
                    <div class="d-flex align-items-center gap-2">
                        <label class="fw-bold">Mentee</label>
                        <select class="form-select w-auto" name="mentee_id">
                            <?php foreach ($mentees as $me): ?>
                                <option value="<?= $me['mentee_id'] ?>"><?= $me['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" name="saveMentorMentee" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>