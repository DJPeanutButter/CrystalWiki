<doctype html>
<?
  include_once $_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php";
  
  $crystals = wikiSelect("Crystals","Name");
  $colors = wikiSelect("Crystals","Color");
  $lusters = wikiSelect("Crystals","Luster");
  $streaks = wikiSelect("Crystals","Streak");
?>
<html>
  <head>
    <title>Search for a crystal!</title>
    <script src="wiki.js"></script>
    <link rel="stylesheet" href="wikiStyles.css">
    <script>
      var crystals = [<?
      foreach ($crystals as $i => $tmp){
        echo "\"".$tmp[0]."\"";
        if ($tmp !== end($crystals))
          echo ", ";
      }?>];
      var colors = [<?
      foreach ($colors as $i => $tmp){
        echo "\"".$tmp[0]."\"";
        if ($tmp.key !== end($colors).key)
          echo ", ";
      }?>];
      var lusters = [<?
      foreach ($lusters as $i => $tmp){
        echo "\"".$tmp[0]."\"";
        if ($tmp.key !== end($lusters).key)
          echo ", ";
      }?>];
      var streaks = [<?
      foreach ($streaks as $i => $tmp){
        echo "\"".$tmp[0]."\"";
        if ($tmp.key !== end($streaks).key)
          echo ", ";
      }?>];
    </script>
  </head>
  <body>
    <form action="<?echo $_SERVER['REQUEST_URI'];?>">
      <fieldset>
        <legend>Search by Name</legend>
        <div class="autocomplete">
          <input id="searchBarName" type="text" name="crystal" placeholder="Crystal Name" autocomplete="off">
        </div>
      </fieldset>
      <fieldset>
        <legend>Search by Color</legend>
        <div class="autocomplete">
          <input id="searchBarColor" type="text" name="color" placeholder="Color" autocomplete="off">
        </div>
      </fieldset>
      <fieldset>
        <legend>Search by Luster</legend>
        <div class="autocomplete">
          <input id="searchBarLuster" type="text" name="luster" placeholder="Luster" autocomplete="off">
        </div>
      </fieldset>
      <fieldset>
        <legend>Search by Streak</legend>
        <div class="autocomplete">
          <input id="searchBarStreak" type="text" name="streak" placeholder="Streak" autocomplete="off">
        </div>
      </fieldset>
      <fieldset>
        <legend>Search by Hardness</legend>
      </fieldset>
      <fieldset>
        <legend>Search by Specific Gravity</legend>
      </fieldset>
      <fieldset>
        <legend>Search by Chakras</legend>
      </fieldset>
      <fieldset>
        <legend>Search by Planets</legend>
      </fieldset>
      <fieldset>
        <legend>Search by Zodiac</legend>
      </fieldset>
      <fieldset>
        <legend>Search by Elements</legend>
      </fieldset>
        <input type="submit">
    </form>
    <script>
      autocomplete(document.getElementById("searchBarName"), crystals);
      autocomplete(document.getElementById("searchBarColor"), colors);
      autocomplete(document.getElementById("searchBarLuster"), lusters);
      autocomplete(document.getElementById("searchBarStreak"), streaks);
    </script>
  </body>
</html>