<html>
	<?php
		session_start();
		$control = $_SESSION['control']; //taking the value from session for control
		$fontSize = $_SESSION['fontSize']; //taking the value from session for font-size
		$controlColor = $_SESSION['Color'];//taking the value from session for color
		if(isset($_SESSION['isVisible'])) //if some value exists in isVisible session
		{
			if($_SESSION['isVisible'] == 1) //if the value is true then set the value as visible.
			{
				$isVisible="visible";
			}
			else if($_SESSION['isVisible'] == 0)
			{
				$isVisible="hidden"; //else hidden.
			}
		}
		echo "<style type='text/css'>"; //embedding the css code in php.
		echo "input[type='".$control."']{"; //setting up the properties of the input types dynamically.
		echo "font-size: ".$fontSize.";";
		echo "background-color: ".$controlColor.";";
		echo "visibility: ".$isVisible.";";
		echo "}\n";
		if($control=="background") //if the control selected as background then set the background-color of body.
		{
			echo "body{background-color:".$controlColor.";}";
		}
		echo "</style>";
	?>
	<body>
		<form>
			<input type="text" placeholder="Mobile number"/><br/>
			<input type="password" placeholder="password"/><br/>
			<input type="submit" value="Login"/>
		</form>
	</body>
</html>