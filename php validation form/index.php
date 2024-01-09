<?php
include("confing.php");
$name = $email = $phone = $password = "";
$condition = false; 

$nameError = $emailError = $phoneError = $passwordError = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $password = trim($_POST["password"]);

    if (empty($name) or strlen($name) <= 10) {
        $condition = true;
        $nameError = "Please enter the name (at least 10 characters)";
    }
    if (empty($email) or strpos($email, '@') === false or strpos($email, '.') === false) {
        $condition = true;
        $emailError = "Please enter a valid email";
    }
    if (empty($password) or strlen($password) <= 6) {
        $condition = true;
        $passwordError = "Please enter a valid password (at least 6 characters)";
    }
    if (empty($phone) or strlen($phone) <= 10) {
        $condition = true;
        $phoneError = "Please enter a valid phone (at least 10 characters)";
    }
}
if (!$condition) {

  $conn = mysqli_connect($severname, $username, $password, $database);

  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "INSERT INTO data (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')";

  if (mysqli_query($conn, $sql)) {
      echo "Data inserted successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation Form</title>
    <script src="https://kit.fontawesome.com/899b80023c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form method="post" action="index.php">
            <i class="fa-sharp fa-solid fa-user"></i>
            <div class="input-group">
                <label>Full Name</label>
                <input type="text" placeholder="Enter your name" name="name">
                <span id="name-error"><?php echo $nameError; ?></span>
            </div>

            <div class="input-group">
                <label>Phone No.</label>
                <input type="tel" placeholder="123 456 7890" name="phone">
                <span id="phone-error"><?php echo $phoneError; ?></span>
            </div>

            <div class="input-group">
                <label>Email Id</label>
                <input type="email" placeholder="Enter Email" name="email">
                <span id="email-error"><?php echo $emailError; ?></span>
            </div>

            <div class="input-group">
                <label>Password </label>
                <input type="password" placeholder="Enter password" name="password">
                <span id="massage-error"><?php echo $passwordError; ?></span>
            </div>

            <button type="submit">Submit</button>

        </form>
    </div>
</body>

</html>
