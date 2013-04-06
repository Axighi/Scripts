<?php
  require_once('predefinevars.php');
  require_once('header.php');

  // Start the session
  session_start();

  // Clear the error message
  $error_msg = "";

  // If the user isn't logged in, try to log them in
  if (!isset($_SESSION['phone_number'])) {
    if (isset($_POST['submit'])) {
      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

      // Grab the user-entered log-in data
      $phone_number= mysqli_real_escape_string($dbc, trim($_POST['phone_number']));
      $password = mysqli_real_escape_string($dbc, trim($_POST['password']));

      if (!empty($phone_number) && !empty($password)) {
        // Look up the username and password in the database
        $query = "SELECT phone_number,first_name,last_name FROM member WHERE phone_number='$phone_number' AND password = SHA('$password')";
        $data = mysqli_query($dbc, $query);

        if (mysqli_num_rows($data) == 1) {
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
          $row = mysqli_fetch_array($data);
          $_SESSION['phone_number'] = $row['phone_number'];
          $_SESSION['username'] = $row['first_name'].$row['last_name'];
          setcookie('phone_number', $row['phone_number'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
          setcookie('username', $row['first_name'].$row['last_name'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
          header('Location: ' . $home_url);
        }
        else {
          // The username/password are incorrect so set an error message
          $error_msg = 'Sorry, you must enter a valid account and password to log in.';
        }
      }
      else { 
        // The username/password weren't entered so set an error message
        $error_msg = 'Sorry, you must enter your account and password to log in.';
      }
    }
  }

  // Insert the page header
  require_once('nav.php');

  // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
  if (empty($_SESSION['phone_number'])) {
    echo '<p class="error">' . $error_msg . '</p>';
?>
<div class="login">
<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Phone number</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Phone number"
       name="phone_number" value="<?php if (!empty($phone_number)) echo $phone_number; ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" id="inputPassword" placeholder="Password" name="password">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <!-- <label class="checkbox">
        <input type="checkbox"> Remember me
      </label> -->
      <input type="submit" class="btn" value="Login" name="submit">
    </div>
  </div>
</form>
</div>
<?php
  }
?>

<?php
  // Insert the page footer
  require_once('footer.php');
?>



