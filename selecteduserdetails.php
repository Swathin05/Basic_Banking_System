<?php
include 'connect.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    }


  
    
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance!!")'; 
        echo '</script>';
    }
    


   
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Zero value cannot be transferred!!')";
         echo "</script>";
     }


    else {
        
                
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transactions(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo '<script type="text/javascript">alert("Transaction Successful");
                                     window.location="moneytransfer.php";
                           </script>';
                    
                    // echo '<div class="alert alert-success" role="alert">
                    // Transaction Successfull!!
                    // </div>';
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Transfer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        .btn{
            background-color: black;
            color: white;
        }

        .btn:hover{
            background-color: grey;
            color:black
        }
        </style>
</head>
<body>
    <?php
        include 'navbar.php';
    ?>

        <div class="container">
          <h2 class="text-center pt-4">TRANSACTION</h2>   
              <?php
                include 'connect.php';
                $sid=$_GET['id'];
                $sql="SELECT * FROM users WHERE id=$sid";
                $result=$conn->query($sql);
        
                if(!$result)
                {
                    echo "Error: ".$sql."<br>".$conn->connect_error();
                }
                $rows = $result -> fetch_array(MYSQLI_ASSOC);
              ?> 
            <form method="post" name="tcredit" class="tabletext" ><br>
            <div>   
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>BALANCE</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2"><?php echo $rows['id'] ?></td>
                        <td class="py-2"><?php echo $rows['name']?></td>
                        <td class="py-2"><?php echo $rows['email']?></td>
                        <td class="py-2"><?php echo $rows['balance']?></td>
                    </tr>
            </table>
            </div>
            <br><br><br>

            <label>TRANSFER TO:</label>
            <select name="to" class="form-control" required>
                <option value="" disabled selected>CHOOSE</option>
                <?php
                    include 'connect.php';
                    $sid=$_GET['id'];
                    $sql="SELECT * FROM users WHERE id!=$sid";
                    $result=$conn->query($sql);
                    if(!$result)
                {
                    echo "Error: ".$sql."<br>".$conn->connect_error();
                }
                while($row = $result -> fetch_array(MYSQLI_ASSOC)){
              ?>

              <option class="table" value="<?php echo $row['id'];?>">
                    <?php echo $row['name'];?>
                </option>

            <?php
                }
            ?>
            </select>
            <br>
            <br>
            <label>Amount:</label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
            <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
        </form>
    </div>
    </div>
        
</body>
</html>