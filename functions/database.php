<?php

/**
 * Gets all the mug entries from the database.
 *
 * @return array
 */
function get_all_mugs()
{
    $databaseConnection = get_db_connection();
    $queryResult = $databaseConnection->query("SELECT * FROM mug");
    $allMugs = $queryResult->fetch_all(MYSQLI_ASSOC);
    $databaseConnection->close();
    return $allMugs;
}

function get_all_aircrafts()
{
    $databaseConnection = get_db_connection();
    $queryResult = $databaseConnection->query("SELECT * FROM aircraft");
    $allAircrafts = $queryResult->fetch_all(MYSQLI_ASSOC);
    $databaseConnection->close();
    return $allAircrafts;
}

function get_one_aircraft_by_id($id)
{
    $databaseConnection = get_db_connection();
    $queryResult = $databaseConnection->query("SELECT * FROM aircraft WHERE id = " . $id);
    $allAircraft = $queryResult->fetch_assoc();
    $databaseConnection->close();
    return $allAircraft;
}

/**
 * Can be used to create a new mug entry in the database.
 *
 * @param string $name
 * @param string $category
 */
function create_aircraft($airline, $aircraftModel, $manufacturer, $scale, $registration, $remarks)
{
    $databaseConnection = get_db_connection();
    $databaseConnection->query("INSERT INTO aircraft (airline, aircraft_model, manufacturer, scale, registration, remarks) VALUES('{$airline}', '{$aircraftModel}','{$manufacturer}', '{$scale}', '{$registration}', '{$remarks}')");
    $databaseConnection->close();
}

function delete_one_aircraft_by_id($id)
{
    delete_all_aircraft_image_by_aircraft_id($id);
    $databaseConnection = get_db_connection();
    $databaseConnection->query("DELETE FROM aircraft WHERE id = " . $id);
    $databaseConnection->close();
}


function edit_one_aircraft_by_id($id, $airline, $aircraftModel, $manufacturer, $scale, $registration, $remarks)
{
    $query = "UPDATE aircraft SET airline = :airline, aircraft_model = :aircraftModel, manufacturer = :manufacturer, scale = :scale, registration = :registration, remarks = :remarks WHERE id = :id";
    $pdo = get_pdo();
    $statement = $pdo->prepare($query);
    $statement->execute([
        'id' => $id,
        'airline' => $airline,
        'aircraftModel' => $aircraftModel,
        'manufacturer' => $manufacturer,
        'scale' => $scale,
        'registration' => $registration,
        'remarks' => $remarks
    ]);
}

/**
 * Can be used to get a database connection.
 * Required to make queries on the database.
 *
 * @return false|mysqli|null
 */
function get_db_connection()
{
    return mysqli_connect('w00d8dbb.kasserver.com', 'd03ad2e0', '5HHvw7bPGnuqUMhV', 'd03ad2e0');
}

function get_pdo()
{
    return new PDO('mysql:dbname=d03ad2e0;host=w00d8dbb.kasserver.com', 'd03ad2e0', '5HHvw7bPGnuqUMhV');
}

function get_all_image_by_aircraft_id($id)
{
    $databaseConnection = get_db_connection();
    $queryResult = $databaseConnection->query("SELECT * FROM aircraft_image WHERE aircraft_id = " . $id);
    $allAircraftImages = $queryResult->fetch_assoc();
    $databaseConnection->close();
    return $allAircraftImages;
}

function create_aircraft_image($aircraft_id, $image)
{
    $databaseConnection = get_db_connection();
    $databaseConnection->query("INSERT INTO aircraft_image (aircraft_id, image) VALUES('{$aircraft_id}', '{$image}')");
    $databaseConnection->close();
}

function delete_one_aircraft_image_by_id($id)
{
    $databaseConnection = get_db_connection();
    $databaseConnection->query("DELETE FROM aircraft_image WHERE id = " . $id);
    $databaseConnection->close();
}

function delete_all_aircraft_image_by_aircraft_id($id)
{
    $databaseConnection = get_db_connection();
    $databaseConnection->query("DELETE FROM aircraft_image WHERE aircraft_id = " . $id);
    $databaseConnection->close();
}