<?php 
    require_once('header.php');
    require_once('nav.php');
?>

<section class="index_body">
<?php 
    require_once('predefinevars.php');
 	$dbc=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 	$query="select name,description,image from item order by create_time desc";
 	$data=mysqli_query($dbc,$query);
 	while ($row=mysqli_fetch_array($data)) {
        echo'<section class="index_image">';
 		echo'<p class="label label-important" id="item_name">'.$row['name'].'</p><br>';
 		if (is_file(TS_UPLOADPATH.$row['image']) && filesize(TS_UPLOADPATH.$row['image'])> 0) {

    
    		echo '<img class="image" src="' .TS_UPLOADPATH . $row['image'] . '" alt="' . $row['name'] . '" />';
    	}
    	else {
        	echo '<img class="image" src="' . TS_UPLOADPATH. 'nopic.jpg' . '" alt="' . $row['name'] . '"  />';
    	}
    	echo'<p class="text-info">'.$row['description'].'</p>';
        echo'</section>';
 	}
    mysqli_close($dbc);
?>
</section>
<?php
	require_once('footer.php');
?>
