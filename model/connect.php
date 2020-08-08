<?php 
function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=bantraicay", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
}
function result1($fe,$sql){
    $sql = $sql;
    $conn = connect();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    switch ($fe) {
        case 0:
            return $stmt->fetchAll(); 
            break;
        case 1:
            return $stmt->fetch(); 
            break;
  
    }
  }
?>
