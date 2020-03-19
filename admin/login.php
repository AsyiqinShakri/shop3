<? $page = "Login"; ?>
<? $sidebar = 0; ?>
<? include "header.php"; ?>
<?
$usr = "";
if (frm("submit")) {
	$usr = frm("usr");
	$pwd = frm("pwd");

	if ($usr == "") {
		$error .= epfx($error, "Username cannot be empty!");
	}
	if ($pwd == "") {
		$error .= epfx($error, "Password cannot be empty!");
	}

	if ($error == "") {
		$sql = "SELECT * FROM employee WHERE usr='" . $usr . "';";
		$r = mfa(mq($sql));

		if ($r['id'] != "") {
			if ($r["pwd"] != md5($session_pfx . $pwd)) {
				$error = "Credentials does not match with database!";
			} else {
				set("id", $r[0]);
				set("usr", $r['usr']);
				set("name", $r['name']);
				set("isadmin", $r['isadmin']);
				set("update", "Welcome, <b>" . $r["name"] . "</b>!");
				$sql = "UPDATE employee SET last_login = '" . now() . "' WHERE id =" . $r[0];
				mq($sql);
				go($site_url . "/index.php");
			}
		} else {
			$error = "User not found!";
		}
	}
}
?>

<div class="container pt-5 mt-5">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card task-container">
				<form action="" method="post">
					<div class="card-header">
						<h4 class="card-title">Login</h4>
					</div>
					<div class="card-body">
						<div class="col-md-12 px-md-3">
							<label>Username *</label>
							<div class="form-group"><input type="text" id="usr" name="usr" size="15" class=" form-control " value="<?= $usr ?>"></div>
						</div>
						<div class="col-md-12 px-md-3">
							<label>Password *</label>
							<div class="form-group"><input type="password" id="pwd" name="pwd" size="15" class=" form-control "></div>
						</div>
					</div>
					<div class="card-footer">
						<input type="submit" id="submit" name="submit" class="btn btn-info" value="Login" />
						<button type="reset" class="btn btn-warning">Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<? include "footer.php"; ?>
<script>
	qs("#usr").focus();
</script>