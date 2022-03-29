<?
$checkMarkChar = "&#9989;";
include_once ("wikiFunctions.php");
?>
<html>
    <head>
        <title>Sort Crystals</title>
        <script src="wiki.js"></script>
        <link rel="stylesheet" href="wikiStyles.css">
    </head>
    <body>
        <div class="wiki-menu">
            <!--
                include menu, don't rewrite for every page!
            -->
        </div>
        <div class="wiki-document">
<?
    $fSortBy = false;
    if (isset ($_GET["sortBy"])){
        $fSortBy = true;
        $sortBy = $_GET["sortBy"];
        $strQuery = "";
        
        if (!file_exists ($_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php"))
            echo $_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php does not exist! <br>";
        else{
            require_once $_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php";
            
            //initialize based on $sortBy value
            switch ($sortBy){
                case "name":
                    $wikiData = wikiSelect("Crystals","Name","Name");
                    break;
                case "chakras":
                    $wikiData = wikiSelect("Crystals",array("Name","Chakras"),array("Chakras","Name"));
                    break;
                case "elements":
                    $wikiData = wikiSelect ("Crystals",array("Name","Elements"),array("Elements DESC","Name"));
                    break;
                case "zodiac":
                    $wikiData = wikiSelect ("Crystals",array("Name","Zodiac"),array("Zodiac DESC", "Name"));
                    break;
                case "planets":
                    $wikiData = wikiSelect ("Crystals",array("Name","Planets"),array("Planets DESC","Name"));
                    break;
                default:
                    $fSortBy = false;
                    break;
            }
            
            if ($fSortBy){
?>
            <table>
                <tr>
                    <td>Name</td>
<?
                    if ($sortBy !== "name"){
?>
                    <td><? echo ucfirst($sortBy); ?></td>
<?                  } ?>
                </tr>
<?
                foreach ($wikiData as $tmp){
?>
                <tr>
                    <td>
                        <form action="wiki.php" method="get">
                            <input type="hidden" name="crystal" value="<? echo $tmp["Name"];?>">
                            <input type="submit" value="<? echo $tmp["Name"];?>" class="link-button">
                        </form>
                    </td>
<?
                    if ($sortBy !== "name"){
?>
                    <td>
<?
                        switch ($sortBy){
                            case "chakras":
                                $chakras = wikiReadFromDB ($tmp[1]);
?>
                        <table>
                            <tr>
                                <td><?if ($chakras[6]){echo "&#9989;";}?></td>
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
<?
                                break;
                            case "elements":
                                $elements = wikiReadFromDB ($tmp[1]);
?>
                        <table>
                            <tr>
                                <td><?if ($elements[0]){echo "&#9989;";}?></td>
                                <td>Air</td>
                            </tr>
                            <tr>
                                <td><?if ($elements[1]){echo "&#9989;";}?></td>
                                <td>Water</td>
                            </tr>
                            <tr>
                                <td><?if ($elements[2]){echo "&#9989;";}?></td>
                                <td>Earth</td>
                            </tr>
                            <tr>
                                <td><?if ($elements[3]){echo "&#9989;";}?></td>
                                <td>Fire</td>
                            </tr>
                        </table>
<?
                                break;
                            case "zodiac":
                                $zodiac = wikiReadFromDB ($tmp[1]);
?>
                        <table>
                            <tr>
                                <td><?if($zodiac[0]){echo $checkMarkChar;}?></td>
                                <td>Aries</td>
                            </tr>
                            <tr>
                                <td><?if($zodiac[1]){echo $checkMarkChar;}?></td>
                                <td>Taurus</td>
                            </tr>
                            <tr>
                                <td><?if($zodiac[2]){echo $checkMarkChar;}?></td>
                                <td>Gemini</td>
                            </tr>
                            <tr>
                                <td><?if($zodiac[3]){echo $checkMarkChar;}?></td>
                                <td>Cancer</td>
                            </tr>
                            <tr>
                                <td><?if($zodiac[4]){echo $checkMarkChar;}?></td>
                                <td>Leo</td>
                            </tr>
                            <tr>
                                <td><?if($zodiac[5]){echo $checkMarkChar;}?></td>
                                <td>Virgo</td>
                            </tr>
                            <tr>
                                <td><?if($zodiac[6]){echo $checkMarkChar;}?></td>
                                <td>Libra</td>
                            </tr>
                            <tr>
                                <td><?if($zodiac[7]){echo $checkMarkChar;}?></td>
                                <td>Scorpio</td>
                            </tr>
                            <tr>
                                <td><?if($zodiac[8]){echo $checkMarkChar;}?></td>
                                <td>Sagittarius</td>
                            </tr>
                            <tr>
                                <td><?if($zodiac[9]){echo $checkMarkChar;}?></td>
                                <td>Capricorn</td>
                            </tr>
                            <tr>
                                <td><?if($zodiac[10]){echo $checkMarkChar;}?></td>
                                <td>Aquarius</td>
                            </tr>
                            <tr>
                                <td><?if($zodiac[11]){echo $checkMarkChar;}?></td>
                                <td>Pisces</td>
                            </tr>
                        </table>
<?
                                break;
                            case "planets":
                                $planets = wikiReadFromDB ($tmp[1]);
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
<?
                                break;
                            default:
                                echo "Unknown Error";
                                break;
                        }
                    }
?>
                    </td>
                </tr>
<?
                }
        ?>
            </table>
<?
            }
        }
    }else{
?>
            <form action="crystalSort.php" method="get">
                <table>
                    <tr>
                        <td><input type="radio" name="sortBy" id="name" value="name"></td>
                        <td><label for="name">Name</label></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="sortBy" id="chakras" value="chakras"></td>
                        <td><label for="chakras">Chakras</label></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="sortBy" id="elements" value="elements"></td>
                        <td><label for="elements">Elements</label></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="sortBy" id="zodiac" value="zodiac"></td>
                        <td><label for="zodiac">Zodiac Signs</label></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="sortBy" id="planets" value="planets"></td>
                        <td><label for="planets">Planets</label></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="go"></td>
                        <td></td>
                    </tr>
                </table>
            </form>
            <? } ?>
        </div>
    </body>
</html>