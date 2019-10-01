<html>
	<body>
	
	<?php
		//reading the file users.txt .if the file doesn't exist then it will give error.
		$myFile=fopen("users.txt","r+") or die("Unable to open file");
		$count=0;
		while(!feof($myFile)) //reading till end of file.
		{	
			if(fgets($myFile)==$_POST["username"]."\r\n") //if the matching username is found
			{
				$_SESSION["name"]=$_POST["username"];
				echo ("<script LANGUAGE='JavaScript'>
						window.alert('The username already exist.Please try again');
						window.location.href='http://localhost/A4_Q1.html';
						</script>");
				$count=1;
			}
			//echo $valueTemp;
			
		}
		if($count==0)
		{
			session_start();
			$_SESSION["Name"]=$_POST["name"];
			$_SESSION["Email"]=$_POST["email"];
			$_SESSION["userName"]=$_POST["username"];
			$_SESSION["passWord"]=$_POST["password"];
			$value=$_POST["username"];
			fwrite($myFile,$_POST["username"]."\r\n");
			echo "<h1>Congratulations!!!</h1>";
			echo "<h2>The data is recorded.</h2>";
		}
		fclose($myFile);
	?>
	</body>
</html>