<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'functions/database.php';

if (!empty($_POST)) {
    create_aircraft($_POST["airline"], $_POST["aircraftmodel"], $_POST["manufacturer"], $_POST["scale"], $_POST["registration"], $_POST["remarks"] ?? '');

    header("Location: index.php");
}



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
<div class="container">

    <h1>Handsome's Aircraft Collection</h1>

    <div class="row">
        <div class="col-md-12">

        </div>
    </div>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <form method="post" action="AddEntry.php">
        <div class="form-group row">
            <label for="airline" class="col-4 col-form-label">Airline</label>
            <div class="col-8">
                <input id="airline" name="airline" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="aircraftmodel" class="col-4 col-form-label">Aircraft Model</label>
            <div class="col-8">
                <input id="aircraftmodel" name="aircraftmodel" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="manufacturer" class="col-4 col-form-label">Manufacturer</label>
            <div class="col-8">
                <input id="manufacturer" name="manufacturer" type="text" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-4">Scale</label>
            <div class="col-8">
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input name="scale" id="scale1" type="checkbox" class="custom-control-input" value="1:200">
                    <label for="scale1" class="custom-control-label">1:200</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input name="scale" id="scale2" type="checkbox" class="custom-control-input" value="1:250">
                    <label for="scale2" class="custom-control-label">1:250</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input name="scale" id="scale3" type="checkbox" class="custom-control-input" value="1:400">
                    <label for="scale3" class="custom-control-label">1:400</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="registration" class="col-4 col-form-label">Registration</label>
            <div class="col-8">
                <input id="registration" name="registration" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="textarea" class="col-4 col-form-label">Remarks</label>
            <div class="col-8">
                <textarea id="remarks" name="remarks" cols="40" rows="3" class="form-control"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                <a href="index.php?"> <button type="button" class="btn btn-secondary" >Go Back</button> </a>
            </div>
        </div>
    </form>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</div>
</body>
</html>


