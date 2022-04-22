<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking System</title>
    <link rel="stylesheet" href="home1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
  <style>
    .btn{
    width:360px;
    margin-bottom: 15px;
}
</style>
</head>
<body>
    <?php
      include 'navbar.php';
    ?>

      <div class="container">
        <h3 class="welcome">WELCOME!</h3>
        <a href="moneytransfer.php" type="button" class="btn btn-success btn-lg btn-block">MONEY TRANSFER</a>
        <a href="transactionhistory.php" type="button" class="btn btn-success btn-lg btn-block">TRANSACTION HISTORY</a>
      </div>
</body>
</html>