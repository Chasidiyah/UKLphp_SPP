<?php
session_start();
if(isset($_SESSION['username'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>LOG IN</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<style>
		body {
    		width: 100%;
    		height : 20vh;
    		background-size: cover;
			color: #957dad;
			background-image: url(pics/bgpwm.jpg);
		}
		.form-control {
			min-height: 41px;
			background: #fff;
			box-shadow: none !important;
			border-color: #e3e3e3;
	}
	.form-control:focus {
		border-color: #70c5c0;
	}
	.form-control, .btn {        
		border-radius: 8px;
    	margin-bottom: 8px;
	}
	.login-form {
		width: 350px;
		margin: 0 auto;
		padding: 100px 0 30px;		
	}
	.login-form form {
		color: #7a7a7a;
		border-radius: 50px;
		margin-bottom: 15px;
		font-size: 13px;
		background: #ececec;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		padding: 30px;	
		position: relative;	
	}
	.login-form h2 {
		font-size: 22px;
		margin: 35px 0 25px;
	}
	.login-form input[type="checkbox"] {
		position: relative;
		top: 1px;
	}
	.login-form .btn, .login-form .btn:active {        
		font-size: 16px;
		font-weight: bold;
		background: #957dad !important;
		border: none;
		margin-bottom: 20px;
	}
	.login-form .btn:hover, .login-form .btn:focus {
		background: #d291bc !important;
	}    
	.login-form a {
		color: #fff;
		text-decoration: underline;
	}
	.login-form a:hover {
		text-decoration: none;
	}
	.login-form form a {
		color: #7a7a7a;
		text-decoration: none;
	}
	.login-form form a:hover {
		text-decoration: underline;
	}
	.login-form .bottom-action {
		font-size: 14px;
	}
		</style>
    <head>
        <title>LOG IN</title>
    </head>
<body>
    <div class="login-form">
        <form action="proseslogin.php" method="POST">
<center>
    <h1>Silahkan Login</h1>
            <hr />

    <table>
        <div class="form-group">
            <tr>
            <td><input type="text" class="form-control" name="username" placeholder="Username" required="required"></td>
        	</tr>
        </div>
        <div class="form-group">
            <tr>
            	<td><input type="password" class="form-control" name="password" placeholder="Password" required="required"></td>
        	</tr>
        </div>
        	<td>
				<div class="form-group">
            	<input type="submit" class="btn btn-primary btn-lg btn-block" value="Log In" name="login"></button>
            	</div>
			</td>
		<div class="bottom-action clearfix">       
        	<tr>
            	<td colspan="2">
                	<center>Apakah anda seorang siswa? login <a href="login_siswa.php">disini</a></center>
            	</td>
        	</tr>
    </table>
</form>
</center>
</div>
</body>
</html>

