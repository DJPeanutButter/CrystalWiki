<?
  /*
   * wikiCreate.php
   *
   * Created 3/14/22
   * By Jonny Lawless
   *
   * Dependancies
   *   wikiFunctions.php
   *
   * TODO
   *   Reformat consonants, dissonants, planets, elements, zodiac
   *
   */
    
    require_once "wikiFunctions.php";
    
    //Generate strings for $wikiChakras, $wikiPlanets, $wikiElements & $wikiZodiac
    $wikiChakras = wikiEncode(array(($_POST ["chakra1"] === "on"),
                                    ($_POST ["chakra2"] === "on"),
                                    ($_POST ["chakra3"] === "on"),
                                    ($_POST ["chakra4"] === "on"),
                                    ($_POST ["chakra5"] === "on"),
                                    ($_POST ["chakra6"] === "on"),
                                    ($_POST ["chakra7"] === "on")));
    
    $wikiPlanets = wikiEncode(array(($_POST ["plnSaturn"] === "on"),
                                    ($_POST ["plnJupiter"] === "on"),
                                    ($_POST ["plnMars"] === "on"),
                                    ($_POST ["plnVenus"] === "on"),
                                    ($_POST ["plnMercury"] === "on"),
                                    ($_POST ["plnMoon"] === "on"),
                                    ($_POST ["plnSun"] === "on")));
    
    $wikiElements = wikiEncode(array(($_POST ["eleAir"] === "on"),
                                     ($_POST ["eleWater"] === "on"),
                                     ($_POST ["eleEarth"] === "on"),
                                     ($_POST ["eleFire"] === "on")));
    
    $wikiZodiac = wikiEncode (array(($_POST ["zodAries"] === "on"),
                                    ($_POST ["zodTaurus"] === "on"),
                                    ($_POST ["zodGemini"] === "on"),
                                    ($_POST ["zodCancer"] === "on"),
                                    ($_POST ["zodLeo"] === "on"),
                                    ($_POST ["zodVirgo"] === "on"),
                                    ($_POST ["zodLibra"] === "on"),
                                    ($_POST ["zodScorpio"] === "on"),
                                    ($_POST ["zodSagittarius"] === "on"),
                                    ($_POST ["zodCapricorn"] === "on"),
                                    ($_POST ["zodAquarius"] === "on"),
                                    ($_POST ["zodPisces"] === "on")));
    
    
    
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
  <link rel="stylesheet" href="wikiStyles.css">
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