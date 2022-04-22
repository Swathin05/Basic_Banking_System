<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Tranfer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        .money{
            margin-bottom: 30px;
            text-align: center;
            font-size: 45px;
        }
        .btn{
            color:black;
            background-color: lightgray;
        }
        .btn:hover{
            background-color: #333;
            color: white;
        }

        thead{
            background-color: black;
            color: white;
        }
        </style>
</head>
<body>
    <?php
        include 'connect.php';
        $sql="SELECT * FROM users";
        //$result=mysqli_query($conn,$sql);
        $result=$conn->query($sql);
    ?>

    <?php
        include 'navbar.php';
    ?>

<div class="container">
  <h2 class="money">MONEY TRANSFER</h2>            
  <table class="table table-striped table-hover">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>BALANCE</th>
        <th>DETAILS</th>
      </tr>
    </thead>
    <tbody>
<?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td class="py-2"><?php echo $rows['id'] ?></td>
                        <td class="py-2"><?php echo $rows['name']?></td>
                        <td class="py-2"><?php echo $rows['email']?></td>
                        <td class="py-2"><?php echo $rows['balance']?></td>
                        <td><a href="selecteduserdetails.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn">Show Details/Transfer</button></a></td> 
                    </tr>
                <?php
                    }
                ?>
            
       
    </tr>
    </tbody>
  </table>
</div>

</body>
</html>