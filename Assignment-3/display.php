
<?php
	//once the submit button is hit , it will save the data in session and then redirected to processs.php
	if(isset($_POST['Submit'])) //if the submit button is hit.
	{
		session_start(); //start the session
		$_SESSION['control'] = $_POST['control']; //session variable for control.
		$_SESSION['fontSize'] = $_POST['fontSize']; //session variable for font size.
		$_SESSION['Color'] = $_POST['Color']; //session variable for color.
		if($_POST['isVisible'] == true)
		{
				$_SESSION['isVisible'] = 1;
		}
		else
		{
			$_SESSION['isVisible'] = 0;
		}
		header('Location:processs.php'); //render to processs.php
	}
	//Part 4.
	//If the page loaded the first time , then there is nothing in the cookie , so it will assign the cookie. 
	if (!isset($_COOKIE['count']))
	{
		$myCookie = 1; //a variable that will initialize by 1 , once the cookie session is over.
		setcookie("count", $myCookie, time()+60, "/"); //setting up the cookie.
		echo "<b>Number of Visits: ", $myCookie ," </b></br></br>"; //displaying the number of visits.
	}
	else
	{
		$myCookie = ++$_COOKIE['count']; //if the cookie session is still active
		setcookie("count", $myCookie, time()+60, "/"); //it will add the number of visits.
		echo "<b>Number of Visits: ", $myCookie ," </b></br></br>"; //displaying the number of visits.
	}
		?>
<html>
	<body>
		<form action="" method="POST">
			<select name="control">
				<option value="text">UserName</option>
				<option value="password">Password</option>
				<option value="submit">Login Button</option>
				<option value="background">background</option>
			</select></br></br>
			<label>Font Size: </label> <input type="range" name="fontSize" min="10" max="100" value="10"/><br/></br>
			<label>Control Color: <input type="color" name="Color" /><br/></br>
			<label>Visible: <input type="checkbox" name="isVisible" checked="checked" value="true"/><br/></br>
			<input type="Submit" value="Submit" name="Submit"/>
		</form>
		<p id="timer"></p> 
		<p id="delete"></p>
	</body>
	<script>
		var seconds=60;
		var timer;
		function myFunction()  //function to display the timer.		
		{
			if(seconds==0) //if the seconds are 0 then display , cookie is deleted
			{
				document.getElementById("delete").innerHTML="Cookies are deleted";
				clearInterval(timer); //stop the time once it hits zero.
			}
			if(seconds <= 60) //if the seconds is less then 60 then display how many seconds are left.
			{
				document.getElementById("timer").innerHTML = seconds+ "s left for cookie to be deleted";
			}
			if (seconds >0 )  
			{
				seconds--; //reduce the seconds by 1. 
			}			
		}
		//set interval function that calls the function myFunction() after every second.
		setInterval(function() { 
		myFunction();
	}, 1000);
	</script>
</html>


