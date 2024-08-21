<?php
    try {
    $connection = new mysqli("localhost", "root", "", "DBINVENTORIES");
    } catch(Exception $_ex) {
        echo "Error: " . $connection->connect_error;
    }
?>