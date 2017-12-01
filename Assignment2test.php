<!DOCTYPE html>

<head>

</head>

<body>

<?php
echo "hello world";
?>

<form>
	Card Type:
	<select name="card">
		<option value="visa" selected>Visa</option>
		<option value="mastercard" selected>Master Card</option>
	</select><br>
	Card Number:
	<input type="text" name="cardnumber"><br>
	Expiration date and security code:
	<select name="expdate">
		<option value="1" selected>1</option>
		<option value="2" selected>2</option>
		<option value="3" selected>3</option>
		<option value="4" selected>4</option>
		<option value="5" selected>5</option>
		<option value="6" selected>6</option>
		<option value="7" selected>7</option>
		<option value="8" selected>8</option>
		<option value="9" selected>9</option>
		<option value="10" selected>10</option>
		<option value="11" selected>11</option>
		<option value="12" selected>12</option>
	</select><br>
	First Name: 
	<input type="text" name="firstname"><br>
	Last Name:
	<input type="text" name="lastname"><br>
	City:
	<input type="text" name="lastname"><br>
	<input type="submit">
</form>
</body>