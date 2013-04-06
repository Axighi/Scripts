<nav class="navbar">
	<div class="navbar-inner">
		<a class="brand">TradeSpot</a>

		<ul class="nav">
			<li><button class="btn" id="digital">Digital</button></li>
			<li><button class="btn" id="clothing">Clothing</button></li>
			<li><button class="btn" id="supplies">Supplies</button></li>
			<li><a href="">Post</a></li>
			<?php 
			if (isset($_SESSION['username'])){
			  echo'<li><a href="logout.php">'.$_SESSION['username'].'(Logout)</a></li>';
			  echo'<li><a href="">Set</a></li>';
			}		
			else{
				echo'<li><a href="login.php" >Log in</a></li>';
				echo'<li><a href="register.php">Register</a></li>';
			}
			?>
		</ul>

		<form class="navbar-search pull-left">
		    <input type="text" class="search-query" placeholder="Search">
		</form>
		
		<button class="btn">Search</button>	
	</div>
</nav>

	







	