<?php 
	function startSession(){
		session_start();

		// If the session vars aren't set, try to set them with a cookie
		if (!isset($_SESSION['user_id'])) {
			if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
			$_SESSION['user_id'] = $_COOKIE['user_id'];
			$_SESSION['username'] = $_COOKIE['username'];
			}
		}
	}

	function logout(){
		// If the user is logged in, delete the session vars to log them out
		session_start();
		if (isset($_SESSION['phone_number'])) {
		// Delete the session vars by clearing the $_SESSION array
		$_SESSION = array();

		// Delete the session cookie by setting its expiration to an hour ago (3600)
		if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time() - 3600);
		}

		// Destroy the session
		session_destroy();
		}

		// Delete the user ID and username cookies by setting their expirations to an hour ago (3600)
		setcookie('phone_number', '', time() - 3600);
		setcookie('username', '', time() - 3600);

		// Redirect to the home page
		$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
		header('Location: ' . $home_url);
	}

	function getDBData(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME,$query){
		$dbc=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$data=mysqli_query($dbc,$query);
		mysqli_close($dbc);
		return $data;
	}

	function createXmlHttpRequestObject(){
		if (window.ActiveXObject) {
			try{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}catch(e){
				xmlHttp=false;
			}
		}else{
			try{
				xmlHttp=new createXmlHttpRequest();
			}catch(e){
				xmlHttp=false;
			}
		}
		if (!xmlHttp) {
			alert("return the object or display error message");
		}else{
			return xmlHttp;
		}
	}
?>