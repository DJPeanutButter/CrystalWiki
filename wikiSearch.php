<doctype html>
<?
  include_once $_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php";
  
  $crystals = wikiQuery("SELECT DISTINCT Name FROM Crystals ORDER BY Name");
  $colors = wikiQuery("SELECT DISTINCT Color FROM Crystals ORDER BY Color");
  $lusters = wikiQuery("SELECT DISTINCT Luster FROM Crystals ORDER BY Luster");
  $streaks = wikiQuery("SELECT DISTINCT Streak FROM Crystals ORDER BY Streak")
?>
<html>
  <head>
    <title>Search for a crystal!</title>
    <script src="wiki.js"></script>
    <link rel="stylesheet" href="wikiStyles.css">
    <script>
      var crystals = [<?
      for ($i = 0;$i<count($crystals);++$i){
        if ($i>0)
          echo ", ";
        echo "\"".$crystals[$i][0]."\"";
      }?>];
      var colors = [<?
      for ($i = 0;$i<count($colors);++$i){
        if ($i>0)
          echo ", ";
        echo "\"".$colors[$i][0]."\"";
      }?>];
      var lusters = [<?
      for ($i = 0;$i<count($lusters);++$i){
        if ($i>0)
          echo ", ";
        echo "\"".$lusters[$i][0]."\"";
      }?>];
      var streaks = [<?
      for ($i = 0;$i<count($streaks);++$i){
        if ($i>0)
          echo ", ";
        echo "\"".$streaks[$i][0]."\"";
      }?>];
    </script>
  </head>
  <body>
<?
  $fCrystal = $_GET["crystal"];
  $fColor = isset($_GET["color"]);
  $fLuster = isset($_GET["luster"]);
  $fStreak = isset($_GET["streak"]);
  if ($fCrystal !== ""){
    $message = "";
    if (isset($_GET["crystal"])){
      $tmp = wikiGetCrystalInfoByName ($rock)["Name"];
      $rock = $_GET["crystal"];
      $message .= "<a href=\"wiki.php?crystal='";
      $message .= $tmp;
      $message .= "'>";
      $message .= $tmp;
      $message .= "</a>";
    }
    
    echo "<div class=\"search-results\">";
    echo $message;
    echo "</div>";
  }
?>
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