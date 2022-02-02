<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=webstudiose', 'root', null);


    // $sql = "DROP DATABASE webstudiose";
    // $conn->exec($sql);

} catch (PDOException $e) {
    // print "Error!: " . $e->getMessage() . "<br/>";

    include('./config/create_db.php');
}
