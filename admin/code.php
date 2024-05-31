<?php
session_start();
require 'Connections.php';

if(isset($_POST['delete_hr'])){
    $resource_id = mysqli_real_escape_string($con, $_POST['delete_hr']);

    $query = "DELETE FROM resources WHERE id='$resource_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "HR Analytics Deleted Succesfully!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Deleted!";
        header("Location: index.php");
        exit(0);
    }
}   

if(isset($_POST['update_hr'])){

    $resource_id = mysqli_real_escape_string($con, $_POST['resource_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $department = mysqli_real_escape_string($con, $_POST['department']);
    $position = mysqli_real_escape_string($con, $_POST['position']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);

    $query = "UPDATE resources SET name='$name',contact='$contact',department='$department',position='$position',gender='$gender',salary='$salary' 
    WHERE id='$resource_id' "; 
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "HR Analytics Updated Succesfully!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Updated!";
        header("Location: index.php");
        exit(0);
    }

}
if(isset($_POST['save_hr']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $department = mysqli_real_escape_string($con, $_POST['department']);
    $position = mysqli_real_escape_string($con, $_POST['position']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);

    $query = "INSERT INTO resources (name,contact,department,position,gender,salary) VALUES
        ('$name','$contact','$department','$position','$gender','$salary')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Employee Added Succesfully!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Added!";
        header("Location: index.php");
        exit(0);
    }
}
?>