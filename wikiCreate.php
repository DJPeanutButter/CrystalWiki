<?
  /*
   * wikiCreate.php
   *
   * Created 3/14/22
   * By Dani Lawless
   *
   * Dependancies
   *   None
   *
   * TODO
   *   Reformat consonants, dissonants, planets, elements, zodiac
   *
   */
    //Generate strings for $wikiChakras, $wikiPlanets, $wikiElements & $wikiZodiac
    $wikiChakras = "{";
    $wikiChakras .= ($_POST ["chakra1"] === "on")?"1":"0";
    $wikiChakras .= ", ";
    $wikiChakras .= ($_POST ["chakra2"] === "on")?"1":"0";
    $wikiChakras .= ", ";
    $wikiChakras .= ($_POST ["chakra3"] === "on")?"1":"0";
    $wikiChakras .= ", ";
    $wikiChakras .= ($_POST ["chakra4"] === "on")?"1":"0";
    $wikiChakras .= ", ";
    $wikiChakras .= ($_POST ["chakra5"] === "on")?"1":"0";
    $wikiChakras .= ", ";
    $wikiChakras .= ($_POST ["chakra6"] === "on")?"1":"0";
    $wikiChakras .= ", ";
    $wikiChakras .= ($_POST ["chakra7"] === "on")?"1":"0";
    $wikiChakras .= "}";
    
    $wikiPlanets = "{";
    $wikiPlanets .= ($_POST ["plnSaturn"] === "on")?"1":"0";
    $wikiPlanets .= ", ";
    $wikiPlanets .= ($_POST ["plnJupiter"] === "on")?"1":"0";
    $wikiPlanets .= ", ";
    $wikiPlanets .= ($_POST ["plnMars"] === "on")?"1":"0";
    $wikiPlanets .= ", ";
    $wikiPlanets .= ($_POST ["plnVenus"] === "on")?"1":"0";
    $wikiPlanets .= ", ";
    $wikiPlanets .= ($_POST ["plnMercury"] === "on")?"1":"0";
    $wikiPlanets .= ", ";
    $wikiPlanets .= ($_POST ["plnMoon"] === "on")?"1":"0";
    $wikiPlanets .= ", ";
    $wikiPlanets .= ($_POST ["plnSun"] === "on")?"1":"0";
    $wikiPlanets .= "}";
    
    $wikiElements = "{";
    $wikiElements .= ($_POST ["eleAir"] === "on")?"1":"0";
    $wikiElements .= ", ";
    $wikiElements .= ($_POST ["eleWater"] === "on")?"1":"0";
    $wikiElements .= ", ";
    $wikiElements .= ($_POST ["eleEarth"] === "on")?"1":"0";
    $wikiElements .= ", ";
    $wikiElements .= ($_POST ["eleFire"] === "on")?"1":"0";
    $wikiElements .= "}";
    
    $wikiZodiac = "{";
    $wikiZodiac .= ($_POST ["zodAries"] === "on")?"1":"0";
    $wikiZodiac .= ", ";
    $wikiZodiac .= ($_POST ["zodTaurus"] === "on")?"1":"0";
    $wikiZodiac .= ", ";
    $wikiZodiac .= ($_POST ["zodGemini"] === "on")?"1":"0";
    $wikiZodiac .= ", ";
    $wikiZodiac .= ($_POST ["zodCancer"] === "on")?"1":"0";
    $wikiZodiac .= ", ";
    $wikiZodiac .= ($_POST ["zodLeo"] === "on")?"1":"0";
    $wikiZodiac .= ", ";
    $wikiZodiac .= ($_POST ["zodVirgo"] === "on")?"1":"0";
    $wikiZodiac .= ", ";
    $wikiZodiac .= ($_POST ["zodLibra"] === "on")?"1":"0";
    $wikiZodiac .= ", ";
    $wikiZodiac .= ($_POST ["zodScorpio"] === "on")?"1":"0";
    $wikiZodiac .= ", ";
    $wikiZodiac .= ($_POST ["zodSagittarius"] === "on")?"1":"0";
    $wikiZodiac .= ", ";
    $wikiZodiac .= ($_POST ["zodCapricorn"] === "on")?"1":"0";
    $wikiZodiac .= ", ";
    $wikiZodiac .= ($_POST ["zodAquarius"] === "on")?"1":"0";
    $wikiZodiac .= ", ";
    $wikiZodiac .= ($_POST ["zodPisces"] === "on")?"1":"0";
    $wikiZodiac .= "}";
    
    
    
    //Load DB info and attempt to create a new Record
    include ("../../php/wikiDBConfig.php");
    
          try {
    				$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
            
            // set the PDO error mode to exception
            $query = $conn->prepare ("insert into Crystals (Name, Description, Luster, Color, Streak, Hardness, SpecificGravity, Chakras, ConsonantCrystals, DissonantCrystals, Planets, Elements, Zodiac, Credit) values (:nam, :des, :lst, :clr, :str, :hrd, :spg, :ckr, :con, :dis, :pln, :ele, :zod, :crd)");
            $query->bindParam (':nam', $_POST["name"]);
            $query->bindParam (':des', $_POST["description"]);
            $query->bindParam (':lst', $_POST["luster"]);
            $query->bindParam (':clr', $_POST["color"]);
            $query->bindParam (':str', $_POST["streak"]);
            $query->bindParam (':hrd', $_POST["hardness"]);
            $query->bindParam (':spg', $_POST["specificGravity"]);
            $query->bindParam (':ckr', $wikiChakras);
            $query->bindParam (':con', $_POST ["consonants"]);
            $query->bindParam (':dis', $_POST ["dissonants"]);
            $query->bindParam (':pln', $wikiPlanets);
            $query->bindParam (':ele', $wikiElements);
            $query->bindParam (':zod', $wikiZodiac);
            $query->bindParam (':crd', $_POST ["credit"]);
            
            $query->execute ();
            
            echo "<script>var message=\"Record succesfully created for ".$_POST["name"]."\";</script>";
            
          }catch(PDOException $e){
            echo "Boo<br>Error: " . $e->getMessage();
            echo "<script>var message=\"$e->getMessage()\"</script>";
          }
?>
<body>
<script src="wiki.js"></script>
<script>
    wikiRedirectWithMessage("wiki.php",message);
</script>
<noscript>
    <p>If the page does not reload automatically, press the POST button.</p>
    <form action="wiki.php" method="post">
        <input type="hidden" name="message" value="JavaScript is disabled.">
        <input type="submit" value="POST">
    </form>
</noscript>
<p>If the page does not reload automatically, press the POST button.</p>
<form action="wiki.php" method="post">
    <input type="hidden" name="message" value="POST button pressed before page redirected.">
    <input type="submit" value="POST">
</form>
</body>