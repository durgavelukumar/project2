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
	margin-bottom: 30px;
	margin-right: 200px;
	margin-left: 200px;
}

p {font-size: large;}
</style>
	<h1>Password Generator</h1>
	
	<p class="wr">This is an app which can be used to form passwords for different accounts. Based on what you need,
		you enter in the amount of words you prefer, and check the boxes if you would like to add numbers
		and/or symbols.</p>
		
	<p class="wr">An xkcd password includes the use of a list of words, numbers, and symbols depending on your
		preference. It is based on the concept that any potential attacker knows the algorithm but 
		doesn't know the chosen password.</p>
		
	<div align="center">
	<form method='POST' action='index.php'>
		
		Number of words:
		<select name="numberofWords">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>       
			<option value="9">9</option>
		</select> <br />
		<br />
		
		Choose Style: <br />
		<input type ='radio' name='pwdStyle' value='LowerCase' onClick="submit();" CHECKED/>All words-lower case<br />
		<input type ='radio' name='pwdStyle' value='UpperCase'>All words-upper case<br />
		<input type ='radio' name='pwdStyle' value='CapWord'>Capitalize each word<br />
		<br />
		
		Include number
		<input type='checkbox' name='includeNumber' value='<?php echo $includeNumber; ?>' /><br />
		<br />
		
		Number of symbols:
		<select name="numberofSymbols">
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>			
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select> <br />
		<br />
		
		
 
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

if (isset($_POST["pwdStyle"])) {
	$pwdStyle = $_POST["pwdStyle"];
}

$randomNumber = array_rand($numbers);

if (isset($_POST["numberofSymbols"])){
	$numberofSymbols = $_POST["numberofSymbols"];
	if (!($numberofSymbols == 0)) {
			$randomSymbols = array_rand($symbols, $numberofSymbols);
	}
}
?>

	<p align="center">Your password: </p>

<?php

$pwd = "";

if (isset($_POST["numberofWords"])){
	for ($i = 0; $i < $numberofWords; $i++) {
		if ($numberofWords == 1){
			if ($pwdStyle == 'UpperCase')
				$pwd = $pwd . strtoupper($words[$randomWords]);
			else if ($pwdStyle == 'LowerCase')
				$pwd = $pwd . lcfirst($words[$randomWords]);
			else if ($pwdStyle == 'CapWord')
				$pwd = $pwd . ucfirst($words[$randomWords]);
		}
		else {
			if ($pwdStyle == 'UpperCase')
				$pwd = $pwd . strtoupper($words[$randomWords[$i]]);
			else if ($pwdStyle == 'LowerCase')
				$pwd = $pwd . lcfirst($words[$randomWords[$i]]);
			else if ($pwdStyle == 'CapWord')
				$pwd = $pwd . ucfirst($words[$randomWords[$i]]);
		}
		if ($i != ($numberofWords - 1))
		{
		$pwd = $pwd . "_";
		}
	}

if (isset($_POST['includeNumber'])) 
	{	
		$pwd = $pwd . $numbers[$randomNumber]; 
	}

if (isset($_POST['numberofSymbols'])) 
	if (!($numberofSymbols == 0)) {
		for ($i = 0; $i < $numberofSymbols; $i++) {
			if ($numberofSymbols == 1)
				$pwd = $pwd . $symbols[$randomSymbols];
			else
				$pwd = $pwd . $symbols[$randomSymbols[$i]];
		}
	} //if 
	
} //isset

?>

<p class="pwd"><?php echo $pwd; ?></p>
	
	
</body>
</html>