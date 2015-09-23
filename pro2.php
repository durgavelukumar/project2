<?php
error_reporting(E_ALL);       # Report Errors, Warnings, and Notices 
ini_set('display_errors', 1); # Display errors on page (instead of a log file)
?>

<!DOCTYPE html>
<html>
<head>

	<title>Password Generator</title>
	<link href="colorpro2.css" rel="stylesheet">

</head>	
<body>
	
<style>	
	p.wr {
	margin-top: 10px;
	margin-bottom: 50px;
	margin-right: 200px;
	margin-left: 200px;
}
</style>
	<h1>Password Generator</h1>
	
	<p class="wr">This is an app which can be used to form passwords for different accounts. Based on what you need,
		you enter in the amount of words you prefer, and check the boxes if you would like to add numbers
		and/or symbols.</p>
		
	<p class="wr">An xkcd password includes the use of a list of words, numbers, and symbols depending on your
		preference. It is based on the concept that any potential attacker knows the algorithm but 
		doesn't know the chosen password.</p>
		
	<?php
         $numberofWords = 3;
	    if (isset($_POST["numberofWords"]))
		{
			$numberofWords = $_POST["numberofWords"];
		};
		
		$includeNumber = "Yes";
	    if (isset($_POST["includeNumber"]))
		{
			$includeNumber = $_POST["includeNumber"];
		};
		
		 $includeSymbol =  "Yes";
	    if (isset($_POST["includeSymbol"]))
		{
			$includeSymbol = $_POST["includeSymbol"];
		};
?>	

	<div style="width: 500px; margin: 100px auto 0 auto;">
	<form method='POST' action='pro2.php'>
		
		Number of words (1-9):
		<input type='text' name='numberofWords' value='<?php echo $numberofWords; ?>'/><br />
		
		Include number
		<input type='checkbox' name='includeNumber' value='<?php echo $includeNumber; ?>' /><br />

		Include symbol
		<input type="checkbox" name="includeSymbol" value='<?php echo $includeSymbol; ?>' /><br />
 
		<input type='submit' value='Give Password.' />

	</form>
	</div>

<?php
$words = Array(
	'hummingbird', 
	'singer', 
	'tree',
	'eating',
	'safari',
	'grateful',
	'learning',
	'blossom',
	'pomegranate',
	'turmeric',
	'dancing',
	'dolphin',
	'travelling',
	'research',
	'winning', 
	'pineapple',
	'well',
	'thought',
	'smile',
	'abacus'
);

$numbers = Array(
	'1',
	'2',
	'3',
	'4',
	'5',
	'6',
	'7',
	'8',
	'9',
	'0'
);

$symbols = Array(
	'*',
	'@',
	'!',
	'^',
	'%'
);

if (isset($_POST["numberofWords"])){
	$numberofWords = $_POST["numberofWords"];
	$randomWords = array_rand($words, $numberofWords);
}

$randomNumber = array_rand($numbers);

$randomSymbol = array_rand($symbols);
?>

	<p class="wr">Your password: </p>

<?php

$pwd = "";

if (isset($_POST["numberofWords"])){
	for ($i = 0; $i < $numberofWords; $i++) {

		echo $words[$randomWords[$i]];
		//$pwd = $pwd + $words[$randomWords[$i]];
	
		if ($i != ($numberofWords - 1))
		{
		echo "_";
		//$pwd = $pwd + "_";
		}
	}

if (isset($_POST['includeNumber'])) 
	{
		echo $numbers[$randomNumber]; 
		//$pwd = $pwd + $numbers[$randomNumber]; 
	}


if (isset($_POST['includeSymbol'])) 
	{
		echo $symbols[$randomSymbol]; 
		//$pwd = $pwd + $symbols[$randomSymbol]; 
	}
	
	//echo $pwd;
} //isset

?>
	

</body>
</html>