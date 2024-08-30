<?php

$conn = new mysqli("localhost", "root", "rohit", "Employee");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $full_name = $_POST['full_name'];
    $designation = $_POST['designation'];
    $date_of_joining = $_POST['date_of_joining'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    
 
    $sql = "INSERT INTO Employee_record (full_name, designation, date_of_joining, phone_no, email, address)
            VALUES ('$full_name', '$designation', '$date_of_joining', '$phone_no', '$email', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>