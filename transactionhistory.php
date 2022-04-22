<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction history</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        thead{
            background-color: black;
            color: white;
        }
        h2{
            font-size:45px;
        }
        </style>
</head>
<body>
<?php
  include 'navbar.php';
?>

	<div class="container">
        <h2 class="text-center pt-4">TRANSACTION HISTORY</h2>
       <br>
       <div class="table-responsive-sm">
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr>
                
                <th class="text-center">SENDER</th>
                <th class="text-center">RECEIVER</th>
                <th class="text-center">AMOUNT</th>
                <th class="text-center">DATE</th>
            </tr>
        </thead>
        <tbody>
        <?php

            include 'connect.php';

            $sql ="select * from transactions";

            $query =mysqli_query($conn, $sql);
            if($query){
            while($rows = mysqli_fetch_assoc($query))
            {
        ?>
            <tr>
            
            <td class="text-center py-2"><?php echo $rows['sender']; ?></td>
            <td class="text-center py-2"><?php echo $rows['receiver']; ?></td>
            <td class="text-center py-2"><?php echo $rows['amount']; ?> </td>
            <td class="text-center py-2"><?php echo $rows['datetime']; ?> </td>
                
        <?php
            }
            }
        ?>
        </tbody>
    </table>

    </div>
</div>
</body>
</html>