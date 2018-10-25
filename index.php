<?php
    try {
        $handler = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'abc123');
        $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "DATABASE CONNECTED";
    } catch(PDOException $e){
        echo $e->getMessage();
        die();
    }
$query = $handler->query('SELECT * FROM user_info');

while($r = $query->fetch(PDO::FETCH_OBJ)){
    echo $r->username, '<br>';
}
?>