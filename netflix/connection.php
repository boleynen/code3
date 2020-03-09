<?php 
    $conn = new mysqli("localhost", "root", "", "netflix");
    if($conn->connect_errno != 0){
        echo "connection failed";
    }else{
        echo "connection OK";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>