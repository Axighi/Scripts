<?php 
	require_once('header.php');
	require_once('predefinevars.php');
	require_once('nav.php');

	if (isset($_POST['submit'])) {
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		$category=mysqli_real_escape_string($dbc,trim($_POST['category']));
		$name=mysqli_real_escape_string($dbc,trim($_POST['name']));
		$description=mysqli_real_escape_string($dbc,trim($_POST['description']));
		$image=mysqli_real_escape_string($dbc, trim($_FILES['image']['name']));
		$image_type=$_FILES['image']['type'];
		$image_size=$_FILES['image']['size'];

		if (!empty($category)&& !empty($name)&& !empty($description)) {
			if (($image_type=='image/gif')||($image_type=='image/jpeg')||($image_type=='image/png')||
				($image_type=='image/pjpeg')&&(image_size>0)&&($image_size<TS_MAXFILESIZE)) {
				if ($_FILES['image']['error']==0) {
					$time_image=time().$image;
					$target = TS_UPLOADPATH.$time_image;
					if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
						$query="INSERT INTO item (category,name,description,create_time,image)
						VALUES ('$category','$name','$description',NOW(),'$time_image')";
						mysqli_query($dbc,$query);

						echo'<p class="alert alert-success">成功添加物品!</p>';
						// Clear the score data to clear the form
						$image="";
						$name="";
						$description="";

						mysqli_close($dbc);
					}
					else {
            			echo '<p class="error">Sorry, there was a problem uploading your item image.</p>';
                    }
				}
			}
			else {
				echo '<p class="error">The image must be a GIF, JPEG, or PNG image file no greater than ' .
				 (TS_MAXFILESIZE / 1024) . ' KB in size.</p>';
		    }
		    @unlink($_FILES['image']['tmp_name']);
		}
		else{
			echo'Please fill all the blanks!';
		}
	}
?>

<div style="text-align:center">
	<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	  <input type="hidden" name="MAX_FILE" value="TS_MAXFILESIZE"/>
	    <p>添加你的宝贝</p>

	    <label>类别</label>
		<input type="checkbox" name="category" value="2">服装
		<input type="checkbox" name="category" value="3">生活用品
		<input type="checkbox" name="category" value="4">数码<br>

	    <label for="name" >名称</label>
		<input id="name" name="name" type="text" placeholder="给宝贝起个好名字,有助于出售哦">

		<label for="description">介绍</label>
		<input id="description" name="description" type="text" placeholder="简单描述一下你的宝贝吧,亲">

		<label for="image">宝贝图片</label>
		<input type="file" id="image" name="image"/><br>

	    <input type="submit" name="submit" value="添加宝贝" class="btn">
	  </section>
	</form>
</div>

<?php 
	require_once('footer.php');
 ?>