<doctype html>
<?include_once $_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php" ?>
<html>
	<head>
		<title>Search for a crystal!</title>
	</head>
	<body>
		<form action="<?echo $_SERVER['REQUEST_URI'];?>">
			<div class="autocomplete" style="width: 300px;">
				<input id="searchBar" type="text" name="crystal" placeholder="Crystal Name">
			</div>
			<input type="submit">
		</form>
		<?echo var_dump(wikiSelect("Crystals","Name"));?>
	</body>
</html>