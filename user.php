<?php
include_once('db.php');
#require_once 'sms.ru.php';
$mobileNumber = $_POST['mobileNumber'];
$code = rand(100000,999999);

if (!preg_match("/^[0-9]{11}+$/",$mobileNumber))
{
	echo "Number invalid format";
}
else
{
	$result = mysqli_query($conn, "SELECT * FROM radcheck WHERE username ='$mobileNumber'");
	if (mysqli_num_rows($result) > 0)
	{
		mysqli_query($conn, "UPDATE radcheck SET value='$code' WHERE username='$mobileNumber'");
		echo "Your code updated and sending.";
	}
	else
	{

		mysqli_query($conn, "INSERT INTO radcheck (username, attribute, op, value) VALUES ('$mobileNumber', 'Cleartext-Password', ':=', '$code')");
		echo "Регистрация успешна, код доступа отпрален.";
		echo "Registration succsed, code sending.";

	}
	$smstext = "http://sms.ru/sms/send?api_id=API_ID_FROM_SMS.RU&to=$mobileNumber&text=$code";
	file_get_contents($smstext);
}
?>
