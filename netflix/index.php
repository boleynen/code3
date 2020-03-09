<?php 
  //  var_dump($_COOKIE);
  session_start();
  
  if(isset($_SESSION['user'])){
    // OK
  }else{
      header("location: login.php");
    }

  include_once("data.inc.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>IMDFlix</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  
  <div id="netflix">
  <?php include_once("nav.inc.php"); ?>
  
  <div class="collection">
  
    <?php foreach($collection as $key => $item): ?>

    <a href="details.php?id=<?php echo $key; ?>" class="collection__item" style="background-image: url(<?php echo $item['poster'] ?>)">
    </a>

    <?php endforeach; ?>

  </div>
  
</div>

</body>
</html>