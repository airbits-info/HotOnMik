

<?php
##Testing str
   $mac=$_POST['mac'];
   $ip=$_POST['ip'];
   $username=$_POST['username'];
   $linklogin=$_POST['link-login'];
   $linkorig=$_POST['link-orig'];
   $error=$_POST['error'];
   $chapid=$_POST['chap-id'];
   $chapchallenge=$_POST['chap-challenge'];
   $linkloginonly=$_POST['link-login-only'];
   $linkorigesc=$_POST['link-orig-esc'];
   $macesc=$_POST['mac-esc'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>mikrotik hotspot > login</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="pragma" content="no-cache" #/>
<meta http-equiv="expires" content="-1" />
<style type="text/css">
body {color: #737373; font-size: 10px; font-family: verdana;}

textarea,input,select {
background-color: #FDFBFB;
border: 1px solid #BBBBBB;
padding: 2px;
margin: 1px;
font-size: 14px;
color: #808080;
}

a, a:link, a:visited, a:active { color: #AAAAAA; text-decoration: none; font-size: 10px; }
a:hover { border-bottom: 1px dotted #c1c1c1; color: #AAAAAA; }
img {border: none;}
td { font-size: 14px; color: #7A7A7A; }
</style>

</head>

<body>
<!-- $(if chap-id) -->

    <form name="sendin" action="<?php echo $linkloginonly; ?>" method="post">
        <input type="hidden" name="username" />
        <input type="hidden" name="password" />
        <input type="hidden" name="dst" value="<?php echo $linkorig; ?>" />
        <input type="hidden" name="popup" value="true" />
    </form>
    
    <script type="text/javascript" src="./md5.js"></script>
    <script type="text/javascript">
    <!--
        function doLogin() {
                <?php if(strlen($chapid) < 1) echo "return true;\n"; ?>
        document.sendin.username.value = document.login.username.value;
        document.sendin.password.value = hexMD5('<?php echo $chapid; ?>' + document.login.password.value + '<?php echo $chapchallenge; ?>');
        document.sendin.submit();
        return false;
        }
    //-->
    </script>
<!-- $(endif) -->


<table width="100%" style="margin-top: 10%;">
    <tr>
    <td align="center" valign="middle">
        <div class="notice" style="color: #c1c1c1; font-size: 15px">Пожалуйста, пройдите авторизацию для доступа в интернет<br />
        <div class="notice" style="color: #c1c1c1; font-size: 15px">или<br />
        <div class="notice" style="color: #c1c1c1; font-size: 15px">введите номер телефона в поле регистрации, через СМС<br />


</div><br />
    <table width="240" height="100" style="border: 2px solid #cccccc; padding: 0px;" cellpadding="0" cellspacing="0">
    <tr>
    <td align="center" valign="bottom" height="175" colspan="2">
<!-- removed $(if chap-id) $(endif)  around OnSubmit -->
        <form name="login" action="<?php echo $linkloginonly; ?>" method="post" onSubmit="return doLogin()" >
            <input type="hidden" name="dst" value="<?php echo $linkorig; ?>" />
            <input type="hidden" name="popup" value="true" />
	<center><h2>Авторизация</h2></center>
            <table width="300" style="background-color: #ffffff">
                <tr><td align="right" >Номер телефона</td>
                <td><input style="width: 138px" value="7"name="username" type="text" value="<?php echo $username; ?>"/></td>
                </tr>
                <tr><td align="right">Код доступа</td>
                <td><input style="width: 80px" name="password" type="password"/></td>
                </tr>
                <tr><td> </td>
                <td><input type="submit" value="OK" /></td>
                </tr>
            </table>
        </form>
    </td>
    </tr>
    <table width="240" height="40" style="border: 2px solid #cccccc; padding: 0px;" cellpadding="0" cellspacing="0">
<br>
    <tr>
    <td>
	<center><h1>Регистрация</h1></center>
	<form id="myForm" action="user.php" method="post">
	    <table width="60" style="background-color: #ffffff">
	<tr></tr>
                <tr><td align="right">Номер телефона</td>
                <td><input style="width: 138px" name="mobileNumber" type="text" value="7" </td>
	<td><br><button id="sub" type="submit">Send</button></td>
            </table>
	</form>
<span id="result"></span>
    </td>
    </tr>
    </table>

<!-- $(if error) -->
<br /><div style="color: #FF8080; font-size: 10px"><?php echo $error; ?></div>
<!-- $(endif) -->

    </td>
    </tr>
</table>

<script type="text/javascript">
<!--
  document.login.username.focus();
//-->
</script>
<script src="jquery-1.8.1.min.js" type="text/javascript"></script>
<script src="jquery.maskedinput.js" type="text/javascript"></script>
<script src="script.js" type="text/javascript"></script>
</body>
</html>
