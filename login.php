<?php
// Connect to the MySQL database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "clp";

$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if the form has been submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
  // Get the submitted username and password
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query the database to see if there is a matching username and password
  $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $query);

  // If there is a match, set the session and redirect the user to the dashboard
  if (mysqli_num_rows($result) == 1) {
    session_start();
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
    exit;
  } else {
    // If there is no match, display an error message
    $error = "Invalid username or password";
  }
}
?>

<!-- Display the login form -->
<form method="post" action="login.php">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"><br><br>
  <input type="submit" value="Submit">
</form>

<!-- Display any error messages -->
<?php if (isset($error)) { echo $error; } ?>
