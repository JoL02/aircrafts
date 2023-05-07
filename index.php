<?php

// look at this - that's a new thing to learn:
include 'functions/database.php';
// With the "include" keyword we can "insert" the content of another PHP file into this one.
// This way we can define our functions in separate files, thus keeping this one fairly clean :)

if ($_GET ['action'] == "delete") {
    delete_one_aircraft_by_id($_GET ["id"]);
}

$aircrafts = get_all_aircrafts();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>
<body>
<div class="container">

    <h1>Handsome's Aircraft Collection</h1>

    <div class="row">
        <div class="col-md-12">
            <a href="AddEntry.php"> <button type="button" class="btn btn-primary" style = "float:right">Add Entry</button> </a>

    </div>
    </div>

    <table id = "aircrafts" class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Airline</th>
            <th scope="col">Aircraft Model</th>
            <th scope="col">Manufacturer</th>
            <th scope="col">Scale</th>
            <th scope="col">Registration</th>
            <th scope="col">Remarks</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach($aircrafts as $index=> $aircraft) {
        ?>
        <tr>
            <th scope="row"> <?php echo $index+1; ?> </th>
            <td> <?php echo $aircraft['airline']; ?> </td>
            <td> <?php echo $aircraft['aircraft_model']; ?> </td>
            <td> <?php echo $aircraft['manufacturer']; ?> </td>
            <td> <?php echo $aircraft['scale']; ?> </td>
            <td> <?php echo $aircraft['registration']; ?> </td>
            <td> <?php echo $aircraft['remarks']; ?> </td>
            <td>  <a href="edit.php?id=<?php echo $aircraft['id']; ?>"> <button type="button" class="btn btn-warning">Edit</button> </a>
                <a href="upload.php?id=<?php echo $aircraft['id']; ?>"> <button type="button" class="btn btn-primary">Upload</button> </a>
                <a href="index.php?action=delete&id=<?php echo $aircraft['id']; ?>" onclick="return confirm('Are you sure you want to delete this entry?');"> <button type="button" class="btn btn-danger">Delete</button> </a> </td>
        </tr>
        <?php
        }
        ?>

        </tbody>
    </table>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>

        $(document).ready(function () {
            $('#aircrafts').DataTable();
        });

    </script>
</div>
</body>
</html>

