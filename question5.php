<?php

$servername = "localhost"; 
$username = "root"; 
$password = "rohit"; 
$dbname = "assessment3"; 

$conn = new mysqli($servername, $username, $password);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}


$conn->select_db($dbname);


$sql_create_table = "CREATE TABLE IF NOT EXISTS student (
    Stu_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Stu_name VARCHAR(50) NOT NULL,
    Stu_roll VARCHAR(20) NOT NULL,
    Stu_email VARCHAR(50) NOT NULL
)";

if ($conn->query($sql_create_table) === TRUE) {
    echo "Table student created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}


$records_to_insert = 20;
for ($i = 1; $i <= $records_to_insert; $i++) {
    $stu_name = "Student " . $i;
    $stu_roll = "Roll-" . $i;
    $stu_email = "student" . $i . "@example.com";

    $sql_insert = "INSERT INTO student (Stu_name, Stu_roll, Stu_email)
                   VALUES ('$stu_name', '$stu_roll', '$stu_email')";

    if ($conn->query($sql_insert) !== TRUE) {
        echo "Error inserting record: " . $conn->error;
    }
}


$sql_fetch_records = "SELECT * FROM student";
$result = $conn->query($sql_fetch_records);

if ($result->num_rows > 0) {
    echo "<h2>Student Records</h2>";
    echo "<table border='1'>
            <tr>
                <th>Stu_id</th>
                <th>Stu_name</th>
                <th>Stu_roll</th>
                <th>Stu_email</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["Stu_id"] . "</td>
                <td>" . $row["Stu_name"] . "</td>
                <td>" . $row["Stu_roll"] . "</td>
                <td>" . $row["Stu_email"] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

$conn->close();
?>
