<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 13-04-2017
 * Time: 13:51
 */

$servername = "localhost";
$username = "root";
$password = "";
$database = 'mynewdatabase';
$myfilename = "us-500.csv";

function openmydatabase($servername,$username,$password){
    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully<br>";
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage()."<br>";
        return false;
    }
    return true;


}

function createanewdatabase($servername,$username,$password,$database){
    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE $database";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Database created successfully<br>";
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage()."<br>";
        return false;
    }

    $conn = null;
    return true;
}

function createmytables($servername,$username,$password,$database){
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // sql to create table
        $sql = "CREATE TABLE MyGuests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    company_name VARCHAR(30) NOT NULL,
    adresse VARCHAR(30) NOT NULL,
    city VARCHAR(30) NOT NULL,
    county VARCHAR(30) NOT NULL,
    state VARCHAR(30) NOT NULL,
    zip VARCHAR(30) NOT NULL,
    phone1 VARCHAR(30) NOT NULL,
    phone2 VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    web VARCHAR(30) NOT NULL
    )";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Table MyGuests created successfully"."<br>";
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage()."<br>";
        return false;
    }

    $conn = null;
    return true;
}

function insertdatainmydatabase($table, $insertstring,$values){
    GLOBAL $servername,$username,$password,$database;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO $table ($insertstring)
      VALUES ($values)";

        // use exec() because no results are returned
        $conn->exec($sql);
        $conn = null;
        return true;
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage()."<br>";
        $conn = null;
        return false;
    }

}


function importdatafromfile($myfilename,$servername,$username,$password,$database){
    $sql = "LOAD DATA INFILE '$myfilename'
     INTO TABLE myguests
     FIELDS TERMINATED BY ';'
     LINES TERMINATED BY '\\n' 
    (first_name,last_name,company_name,adresse,city,county,state,zip,phone1,phone2,email,web)";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=".$database, $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Data imported successfully<br>";
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage()."<br>";
    }

    $conn = null;
}

function dropdatabase($servername,$username,$password)
{

    $sql = "drop database mynewdatabase";

    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Database is deleted successfully<br>";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage() . "<br>";
    }

    $conn = null;

}