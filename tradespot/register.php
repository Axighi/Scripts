<?php 
  require_once('predefinevars.php');
  require_once('header.php');

	// Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['submit'])) {
  	// Grab the profile data from the POST
  	$first_name = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
  	$last_name = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
  	$password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
  	$password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
  	$phone_number = mysqli_real_escape_string($dbc, trim($_POST['phone_number']));
  	$qq = mysqli_real_escape_string($dbc, trim($_POST['qq']));

  	if (!empty($first_name)&& !empty($last_name)&& !empty($password1)&& !empty($password2)&& 
  		!empty($phone_number)&&($password1==$password2)) {
  		$query="select * from member where phone_number='$phone_number'";
  		$data=mysqli_query($dbc,$query);

  		if (mysqli_num_rows($data)==0) {
  			$query="insert into member (first_name,last_name,password,phone_number,qq) values('$first_name',
  				'$last_name',SHA('$password1'),'$phone_number','$qq')";
				mysqli_query($dbc,$query);
				
				echo'You have registered successfully!You\'re now ready to <a href="login.php">log in</a>.</p>';
				mysqli_close($dbc);
				exit();
  		}
  		else{
  			echo'Your phone number has been registered.Please try another one.';
  			$phone_number='';
  		}
  	}
  	else{
  		echo'You must fill all the blanks except qq.';
  	}
  }
  mysqli_close($dbc);
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="register">
  <div class="control-group success">
    <label class="control-label" for="inputSuccess">Phone number</label>
    <div class="controls">
      <input type="text" id="inputSuccess" name="phone_number" value="<?php if (!empty($phone_number)) echo $phone_number; ?>" >
      <span class="help-inline"></span>
    </div>
    <label class="control-label" for="inputSuccess">First name</label>
    <div class="controls">
      <input type="text" id="inputSuccess" name="first_name" value="<?php if (!empty($first_name)) echo $first_name; ?>" >
      <span class="help-inline"></span>
    </div>
    <label class="control-label" for="inputSuccess">Last name</label>
    <div class="controls">
      <input type="text" id="inputSuccess" name="last_name" value="<?php if (!empty($last_name)) echo $last_name; ?>"  >
      <span class="help-inline"></span>
    </div>
     <label class="control-label" for="inputSuccess">Password</label>
    <div class="controls">
      <input type="password" id="inputSuccess" name="password1">
      <span class="help-inline"></span>
    </div>
    <label class="control-label" for="inputSuccess">Confirm password</label>
    <div class="controls">
      <input type="password" id="inputSuccess" name="password2">
      <span class="help-inline"></span>
    </div>
    <label class="control-label" for="inputSuccess">QQ</label>
    <div class="controls">
      <input type="text" id="inputSuccess" name="qq" value="<?php if (!empty($qq)) echo $qq; ?>" >
      <span class="help-inline"></span>
    </div>
  </div>

  <input class="btn" type="submit" value="Submit" name="submit">
  </div> 
</form>

<?php
  // Insert the page footer
  require_once('footer.php');
?>

