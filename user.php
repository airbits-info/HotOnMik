<?php
include_once('db.php');
$mobileNumber = $_POST['mobileNumber'];
$code = rand(100000,999999);

if (!preg_match("/^[0-9]{11}+$/",$mobileNumber))
{
	echo "Номер задан в неверном формате";
}
else
{
	$result = mysqli_query($conn, "SELECT * FROM radcheck WHERE username ='$mobileNumber'");
	if (mysqli_num_rows($result) > 0)
	{
		mysqli_query($conn, "UPDATE radcheck SET value='$code' WHERE username='$mobileNumber'");
		echo "Ваш код доступа обновлен, и отпрален.";
	}
	else
	{

		mysqli_query($conn, "INSERT INTO radcheck (username, attribute, op, value) VALUES ('$mobileNumber', 'Cleartext-Password', ':=', '$code')");
		echo "Регистрация успешна, код доступа отпрален.";

	}
	$smstext = "http://sms.ru/sms/send?api_id=API_ID&to=$mobileNumber&text=$code";
	file_get_contents($smstext);
}
?>
