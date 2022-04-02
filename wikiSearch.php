<doctype html>
<?
  include_once $_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php";
  
  $query = wikiSelect("Crystals","Name");
?>
<html>
  <head>
    <title>Search for a crystal!</title>
    <script src="wiki.js"></script>
    <link rel="stylesheet" href="wikiStyles.css">
    <script>
      var crystals = [<?
      foreach ($query as $i => $tmp){
        echo "\"".$tmp[0]."\"";
        if ($tmp !== end($query))
          echo ", ";
      }?>];
    </script>
  </head>
  <body>
    <form action="<?echo $_SERVER['REQUEST_URI'];?>">
      <div class="autocomplete">
        <input id="searchBar" type="text" name="crystal" placeholder="Crystal Name" autocomplete="off">
      </div>
      <input type="submit">
    </form>
    <script>
      autocomplete(document.getElementById("searchBar"), crystals);
    </script>
  </body>
</html>