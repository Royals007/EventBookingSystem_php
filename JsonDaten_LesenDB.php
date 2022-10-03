<?php

/* Hinweis:
 * Erstellen Sie einen leeren Datenbanknamen in mysql (PHPmyadmin). Führen Sie dann den Code
 */

$connect = mysqli_connect("localhost:330", "root", "root", "rexx_systems");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

/*
 * Json Daten lesen
 * Tabelle von php erstellen
 */
$query = '';
$data = file_get_contents('project.json');
$array = json_decode($data, true);

$sql_table = "CREATE TABLE rs_table(
    participation_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,           
    employee_name VARCHAR(30) NOT NULL,
    employee_mail VARCHAR(50) NOT NULL,
    event_id INT NOT NULL,
    event_name VARCHAR(70) NOT NULL,
    participation_fee DOUBLE NOT NULL,
    event_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    version VARCHAR(50) NOT NULL
)";

// Erfolgsmeldung für db-connect
if (mysqli_query($connect, $sql_table)) {
    echo " Table created successfully.";
} else {
    echo "ERROR: Could not able to execute $sql_table. " . mysqli_error($connect);
}

foreach ($array as $row) {
    $query =
        "INSERT INTO test_table VALUES
        
        ('" . $row["participation_id"] . "',
        '" . $row["employee_name"] . "',
        '" . $row["employee_mail"] . "',
        '" . $row["event_id"] . "',
        '" . $row["event_name"] . "',
        '" . $row["participation_fee"] . "',
        '" . $row["event_date"] . "',
        '" . $row["version"] . "');
        ";

    if ($connect->query($query) === true) {
        echo "yahoo! Neuer Datensatz erfolgreich erstellt";
    } else {
        echo "Error: " . $query . "<br>" . $connect->error;
    }
}
