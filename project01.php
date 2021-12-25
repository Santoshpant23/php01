<?php
$insert = false;
if(isset($_POST['name'])){
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server , $username , $password);
if(!$con){
die("Connection to this database failed due to". mysqli_connect_error());
}

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];
 $sql = "INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";
//  echo $sql;

 if($con->query($sql)==true){
    //  echo "Successfully Inserted";
    $insert = true;

 }
else{
    echo "Error: $sql <br> $con->error";
}
$con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <h2>Welcome to Santosh Pant Travel Form</h2>
      <p>Enter your details to confirm your participation</p>
      <?php
      if($insert == true){
      echo "<p class='subMsg'>Thanks for submitting your information</p>";
      }
      ?>
      <form action="index.php" method="post">
        <input
          type="text"
          name="name"
          id="name"
          placeholder="Enter your name"
        />
        <input type="text" name="age" id="age" placeholder="Enter your age" />
        <input
          type="text"
          name="gender"
          id="gender"
          placeholder="Enter your gender"
        />
        <input
          type="email"
          name="email"
          id="email"
          placeholder="Enter your email"
        />
        <input
          type="phone"
          name="phone"
          id="phone"
          placeholder="Enter your phone number"
        />
        <textarea
          name="desc"
          id="desc"
          cols="30"
          rows="10"
          placeholder="Enter any additional information here"
        ></textarea>
        <button class="btn">Submit</button>
      
      </form>
    </div>
    <script src="index.js"></script>
  </body>
</html>
