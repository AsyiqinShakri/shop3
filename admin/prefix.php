<? $page = "Prefix"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "prefix"; ?>
<?

$c_flux = array(
	//list			name				align		type			sort
	"id",			"",					"m",		"",				"0",
	"code",			"Code",				"m",		"",				"1",
	"name",			"Name",				"m",		"",				"1",
	"prefix",		"Prefix",			"m",		"",				"1",
);

?>

<div class="content">
	<div class="row mb-3">
		<div class="col-md-12">
			<? require_once "lib/listaction.lib"; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card task-container">
				<div class="card-header">
					<h4 class="card-title"> <?= $list_title == "" ? $page : $list_title; ?></h4>
				</div>
				<div class="card-body">
					<div>
						<? require "lib/mergel.lib"; ?>
						<? require "lib/presql.lib"; ?>
						<? require "lib/sqldelete.lib"; ?>
						<? require "lib/prelist.lib"; ?>
						<? require "lib/listing.lib"; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<? include "footer.php"; ?>