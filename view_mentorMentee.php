<?php require("controller.php");
$mentors = viewMentor();
// $mentees = viewMentee();
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
                            <th scope="col">Mentor</th>
                            <th scope="col">Mentee</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mentormentee as $mentormentee1): ?>
                            <tr>
                                <td><?= $mentormentee1['id'] ?></td>
                                <td><?= $mentormentee1['mentor_nama'] ?></td>
                                <td><?= $mentormentee1['mentee_nama'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <hr>
                <div class="">
                    <!-- Mentor -->
                    <div class="d-flex justify-content-center align-items-center gap-3 pb-3">
                        <h4>Mentor</h4>
                        <select class="form-select w-auto" name="mentor_id">
                            <?php foreach ($mentors as $m): ?>
                                <option value="<?= $m['mentor_id'] ?>"><?= $m['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="d-flex justify-content-center align-items-center gap-3 pb-3">
                        <h4>Mentee</h4>
                        <!-- Mentee -->
                        <select class="form-select w-auto" name="mentee_id">
                            <?php foreach ($mentees as $m): ?>
                                <option value="<?= $m['mentee_id'] ?>"><?= $m['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <a href="view_addmentor.php" class="btn btn-success">Save</a>
                </div>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-HoAqxH5j3rP8/Tf/N9H7HWhA7h1lQf5yDx5f+V3E5n7QZ6W8O4C1xA2X58Xj7gS2" crossorigin="anonymous"></script>
</body>

</html>