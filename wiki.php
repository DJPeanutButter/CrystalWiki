<!DocType HTML>
<!--
  File: wiki.php
  Created 3/13/22
  By Jonny Lawless
  
  Dependancies
    wiki.js
    wikiStyles.css
-->
<?
  /*
   * PHP Dependancies
   *   wikiFunctions.php
   *   wikiDBConfig.php
   */
   $checkMarkChar = "&#x1F5F8;";
    if (!file_exists ($_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php"))
        echo $_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php does not exist! <br>";
    else{
        require_once $_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php";
?>
<html>
    <head>
        <title>LS Vibes Crystal Healing Wiki</title>
        <script src="wiki.js"></script>
        <link rel="stylesheet" href="wikiStyles.css">
<?
    //Check for GET crystal
    if (isset($_GET["crystal"])){
        $pageType = "crystal";
        $wikiData = wikiGetCrystalInfoByName($_GET["crystal"]);
        $wikiMenuData = wikiSelect ("Crystals","Name");
    }else{
        $pageType = "landing";
        $wikiData = wikiSelect ("Crystals","Name");
    }
?>
    </head>
    <body>
        <div class="wiki-menu">
            <a href="wiki.php"><img class="logo-square-small" src="wikiLogo.png"></a>
<?
    if ($pageType === "crystal"){
?>
            <ul>
                <li><a href="wiki.php">Wiki Home</a></li>
<?
    foreach ($wikiMenuData as $tmp){
?>
                <li><form action="wiki.php" method="GET"><input type="hidden" name="crystal" value="<?echo $tmp["Name"];?>"><input type="submit" class="link-button" value="<?echo $tmp["Name"]?>"></form></li>
<?
    }
?>
            </ul>
        </div>
        <div class="wiki-document">
<?
    //Check for POST message
    if (isset($_POST["message"]))
        echo "        <div class=\"message-div\">".$_POST["message"]."</div>\r\n";
?>
            <h1 class="wiki-entry-title"><?echo $wikiData["Name"];?></h1>
            <a href="edit.php?crystal=<?echo $wikiData["Name"];?>" class="edit-link">Edit</a>
            <br>
            <p class="timestamp">Originally Written: <?echo $wikiData["Created"];?></p>
            <p class="timestamp">Updated: <?echo $wikiData["Updated"];?></p>
            <hr>
            <p><?echo $wikiData["Description"];?></p>
            <hr>
            <table class="wiki-data-table">
                <tr>
                    <td>Color</td>
                    <td><?echo $wikiData["Color"];?></td>
                </tr>
                <tr>
                    <td>Luster</td>
                    <td><?echo $wikiData["Luster"];?></td>
                </tr>
                <tr>
                    <td>Streak</td>
                    <td><?echo $wikiData["Streak"];?></td>
                </tr>
                <tr>
                    <td>Hardness</td>
                    <td><?echo $wikiData["Hardness"];?></td>
                </tr>
                <tr>
                    <td>Specific Gravity</td>
                    <td><?echo $wikiData["SpecificGravity"];?></td>
                </tr>
            </table>
            <hr>
            <h2>Chakras</h2><?
    //TODO Clean this up
    //Converts Chakras code from DB
    $tmp = $wikiData ["Chakras"];
    $tmpArr = explode (",", $tmp);
    $printStr = "";
    $chakras = [];
    
    array_push ($chakras, ($tmpArr[0] === "{1"));
    array_push ($chakras, ($tmpArr[1] === " 1"));
    array_push ($chakras, ($tmpArr[2] === " 1"));
    array_push ($chakras, ($tmpArr[3] === " 1"));
    array_push ($chakras, ($tmpArr[4] === " 1"));
    array_push ($chakras, ($tmpArr[5] === " 1"));
    array_push ($chakras, ($tmpArr[6] === " 1}"));

?>
            <table>
                <tr>
                    <td><?if ($chakras[6]){echo &checkMarkChar;}?></td>
                    <td>Sahastrara (Crown)</td>
                </tr>
                <tr>
                    <td><?if ($chakras[5]){echo $checkMarkChar;}?></td>
                    <td>Ajna (Third Eye)</td>
                </tr>
                <tr>
                    <td><?if ($chakras[4]){echo $checkMarkChar;}?></td>
                    <td>Vishuddha (Throat)</td>
                </tr>
                <tr>
                    <td><?if ($chakras[3]){echo $checkMarkChar;}?></td>
                    <td>Anahata (Heart)</td>
                </tr>
                <tr>
                    <td><?if ($chakras[2]){echo $checkMarkChar;}?></td>
                    <td>Manipura (Solar Plexus)</td>
                </tr>
                <tr>
                    <td><?if ($chakras[1]){echo $checkMarkChar;}?></td>
                    <td>Svadhishthana (Sacral)</td>
                </tr>
                <tr>
                    <td><?if ($chakras[0]){echo $checkMarkChar;}?></td>
                    <td>Muladhara (Root)</td>
                </tr> 
            </table>
            <hr>
            <h2>Planets</h2><?
    //TODO Clean this up
    //Converts Planets code from DB
    $tmp = $wikiData ["Planets"];
    $tmpArr = explode (",", $tmp);
    $planets = [];
    
    array_push ($planets, ($tmpArr[0] === "{1"));
    array_push ($planets, ($tmpArr[1] === " 1"));
    array_push ($planets, ($tmpArr[2] === " 1"));
    array_push ($planets, ($tmpArr[3] === " 1"));
    array_push ($planets, ($tmpArr[4] === " 1"));
    array_push ($planets, ($tmpArr[5] === " 1"));
    array_push ($planets, ($tmpArr[6] === " 1}"));
?>
            <table>
                <tr>
                    <td><?if ($planets[0]){echo $checkMarkChar;}?></td>
                    <td>Saturn</td>
                </tr>
                <tr>
                    <td><?if ($planets[1]){echo $checkMarkChar;}?></td>
                    <td>Jupiter</td>
                </tr>
                <tr>
                    <td><?if ($planets[2]){echo $checkMarkChar;}?></td>
                    <td>Mars</td>
                </tr>
                <tr>
                    <td><?if ($planets[3]){echo $checkMarkChar;}?></td>
                    <td>Venus</td>
                </tr>
                <tr>
                    <td><?if ($planets[4]){echo $checkMarkChar;}?></td>
                    <td>Mercury</td>
                </tr>
                <tr>
                    <td><?if ($planets[5]){echo $checkMarkChar;}?></td>
                    <td>Moon</td>
                </tr>
                <tr>
                    <td><?if ($planets[6]){echo $checkMarkChar;}?></td>
                    <td>Sun</td>
                </tr>
            </table>
            <hr>
            <h2>Zodiac</h2><?
    //TODO Clean this up
    //Converts Zodiac code from DB
    $tmp = $wikiData ["Zodiac"];
    $tmpArr = explode (",", $tmp);
    $zodiacs = [];
    
    array_push ($zodiacs, ($tmpArr[0] === "{1"));
    array_push ($zodiacs, ($tmpArr[1] === " 1"));
    array_push ($zodiacs, ($tmpArr[2] === " 1"));
    array_push ($zodiacs, ($tmpArr[3] === " 1"));
    array_push ($zodiacs, ($tmpArr[4] === " 1"));
    array_push ($zodiacs, ($tmpArr[5] === " 1"));
    array_push ($zodiacs, ($tmpArr[6] === " 1"));
    array_push ($zodiacs, ($tmpArr[7] === " 1"));
    array_push ($zodiacs, ($tmpArr[8] === " 1"));
    array_push ($zodiacs, ($tmpArr[9] === " 1"));
    array_push ($zodiacs, ($tmpArr[10] === " 1"));
    array_push ($zodiacs, ($tmpArr[11] === " 1}"));
?>
            <table>
                <tr>
                    <td><?if($zodiacs[0]){echo $checkMarkChar;}?></td>
                    <td>Aries</td>
                </tr>
                <tr>
                    <td><?if($zodiacs[1]){echo $checkMarkChar;}?></td>
                    <td>Taurus</td>
                </tr>
                <tr>
                    <td><?if($zodiacs[2]){echo $checkMarkChar;}?></td>
                    <td>Gemini</td>
                </tr>
                <tr>
                    <td><?if($zodiacs[3]){echo $checkMarkChar;}?></td>
                    <td>Cancer</td>
                </tr>
                <tr>
                    <td><?if($zodiacs[4]){echo $checkMarkChar;}?></td>
                    <td>Leo</td>
                </tr>
                <tr>
                    <td><?if($zodiacs[5]){echo $checkMarkChar;}?></td>
                    <td>Virgo</td>
                </tr>
                <tr>
                    <td><?if($zodiacs[6]){echo $checkMarkChar;}?></td>
                    <td>Libra</td>
                </tr>
                <tr>
                    <td><?if($zodiacs[7]){echo $checkMarkChar;}?></td>
                    <td>Scorpio</td>
                </tr>
                <tr>
                    <td><?if($zodiacs[8]){echo $checkMarkChar;}?></td>
                    <td>Sagittarius</td>
                </tr>
                <tr>
                    <td><?if($zodiacs[9]){echo $checkMarkChar;}?></td>
                    <td>Capricorn</td>
                </tr>
                <tr>
                    <td><?if($zodiacs[10]){echo $checkMarkChar;}?></td>
                    <td>Aquarius</td>
                </tr>
                <tr>
                    <td><?if($zodiacs[11]){echo $checkMarkChar;}?></td>
                    <td>Pisces</td>
                </tr>
            </table>
            <hr>
            <h2>Elements</h2><?
    //TODO Clean this up
    //Converts Elements code from DB
    $tmp = $wikiData ["Elements"];
    $tmpArr = explode (",", $tmp);
    $elements = [];
    
    array_push ($elements, ($tmpArr[0] === "{1"));
    array_push ($elements, ($tmpArr[1] === " 1"));
    array_push ($elements, ($tmpArr[2] === " 1"));
    array_push ($elements, ($tmpArr[3] === " 1}"));
?>
            <table>
                <tr>
                    <td><?echo $elements[0]?$checkMarkChar:"";?></td>
                    <td>Air</td>
                </tr>
                <tr>
                    <td><?echo $elements[1]?$checkMarkChar:"";?></td>
                    <td>Water</td>
                </tr>
                <tr>
                    <td><?echo $elements[2]?$checkMarkChar:"";?></td>
                    <td>Earth</td>
                </tr>
                <tr>
                    <td><?echo $elements[3]?$checkMarkChar:"";?></td>
                    <td>Fire</td>
                </tr>
            </table>
<?
    if ($_GET["debug"] === "yes"){
?>
            <pre><?echo var_dump($wikiData);?></pre>
<?
    }
?>
        </div>
<?
    }
    else if ($pageType === "landing"){
?>
            <ul>
                <li><a href="wikiSearch.php">Search</a></li>
                <li>Crystals</li>
                <ul>
<?
    foreach ($wikiData as $tmp){
?>
                    <li><form action="wiki.php" method="GET"><input type="hidden" name="crystal" value="<?echo $tmp["Name"];?>"><input type="submit" class="link-button" value="<?echo $tmp["Name"]?>"></form></li>
<?
    }
?>
                </ul>
                <li><form action="addCrystal.php" method="POST"><input type="hidden" name="message" value="Directed from <a href='wiki.php'>Main Page</a>"><input type="submit" class="link-button" value="Add a Crystal!"></form></li>
<?
    }

?>
            </ul>
        </div>
        <div class="wiki-document">
<?
    //Check for POST message
    if (isset($_POST["message"]))
        echo "            <div class=\"message-div\">".$_POST["message"]."</div>\r\n";
?>
        </div>
    </body>
</html>
<?}?>