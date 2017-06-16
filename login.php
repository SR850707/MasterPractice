
<?php
	@session_start();
	if(isset($_SESSION["uAcc"])){
		header('Location:index.php');
	}else{
?>
    <!DOCTYPE html>  
    <html>
    <head>
		<meta charset="utf-8">
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
    <body style='background: #EEEEEE;'>
	<div style="position: absolute;top: 40%;left: 50%;margin-right: -50%;transform: translate(-50%, -50%)">
	<center><h2 style='font-family: 微軟正黑體;'>使用者登入</h2></center>
	<table border='0' align="center" style='background: #DDDDDD;'>
		<td>
		<form action="login.php" method="POST">
			<div style="margin-left: 8px; margin-right: 8px; margin-top: 16px;">
				帳號
				<input name="uAcc" type="text" style="margin-bottom: 8px;" required/>
			</div>
			<div style="margin-left: 8px; margin-right: 8px;">
				密碼
				<input name="uPwd" type="password" style="margin-bottom: 8px;" required/>
			</div>
			<div align="right" style="margin-right: 8px; margin-bottom: 8px;">
				<input type="submit">
			</div>
		</form>
		</td>
	</table>

    <div style="text-align: center; margin-top: 4px;">
		<span id="button"><a href="index.php">回首頁</a></span> 
		<span id="button"><a href="register.php">前往註冊</a></span>
	</div>
	</div>
<?php
        ob_start();
        @session_start();

        if(isset($_POST["uAcc"])){
			$uAcc=$_POST["uAcc"];
			$uPwd=$_POST["uPwd"];
			require('include.php');

			$read="SELECT * FROM users WHERE account='$uAcc' AND password='$uPwd'";
			$readresult=mysqli_query($link,$read);
			$result=mysqli_fetch_array($readresult);
			$rows=mysqli_num_rows($readresult);    
			if($rows){
				$_SESSION["check"]="yes";
				$_SESSION["uAcc"]=$uAcc;
				$_SESSION["authority"]=$result[6];
				header('Location:login.php');
			}else{
				echo "<div style='text-align: center;'>帳密錯誤，前往登入頁面</div>";
				header('refresh:1; url="login.php"');
			}
?>
            </form>
            </br>
<?php
		}
?>
    </body>
    </html>
<?php
	}
?>