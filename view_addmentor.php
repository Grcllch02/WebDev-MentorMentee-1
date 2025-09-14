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
                <form>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Name</label>
                        <input type="name" class="form-control" id="inputName">
                    </div>
                    <div class="mb-3">
                        <label for="inputPhone" class="form-label">Phone</label>
                        <input type="phone" class="form-control" id="inputPhone">
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail">
                    </div>
                    <div class="mb-3">
                        <label for="inputNote" class="form-label">Note</label>
                        <input type="note" class="form-control" id="inputNote">
                    </div>
                    <a href="view_mentor.php" class="btn btn-danger">Back</a>
                    <a href="" class="btn btn-primary">Submit</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>