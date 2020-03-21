<? $page = "Setup"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $req_pm = "isadmin"; ?>
<?
$arr = array(
	// link					name 					Description 							permission
	"general_info.php?id=1", "General Info",		"Website General Information",			"isadmin",
	"prefix.php",			"Prefix",				"Item Prefix",							"isadmin",
	"email_template.php",	"Template",				"Email Template",						"isadmin",
);
?>
<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card task-container">
				<div class="card-header">
					<h4 class="card-title"> <?= $list_title == "" ? $page : $list_title; ?><?= $for ?></h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-6 mx-auto">
							<? for ($i = 0; $i < sizeof($arr); $i += 4) { ?>
								<?
								$link = $arr[$i];
								$name = $arr[$i + 1];
								$desc = $arr[$i + 2];

								if ($arr[$i + 3] != "" && !get($arr[$i + 3])) {
									continue;
								}
								?>
								<div class="row">
									<div class="col-6 d-flex justify-content-center">
										<a href="<?= $link ?>" class="w-50 btn btn-info btn-block"><?= $name ?></a>
									</div>
									<div class="col-6 d-flex align-items-center justify-content-start">
										<h4 class="mb-0"><?= $desc ?></h4>
									</div>
								</div>
							<? } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<? include "footer.php"; ?>