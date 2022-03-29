<!DocType HTML>
<!--
  File: addCrystal.php
  Created 3/13/22
  By Jonny Lawless
  
  Dependancies
    None

  TODO:
    Reformat consonants, dissonants, planets, elements, zodiac
-->
<?
  /*
   * PHP Dependancies
   *   None
   */
?>
<html>
    <head>
        <title>Wiki Test</title>
        <script src="wiki.js"></script>
        <div class="message-div"><?
            if (isset($_POST["message"]))
                echo $_POST["message"];
            else
                echo "No Message";
        ?></div>
    </head>
    <body>
        <form action="wikiCreate.php" method="post">
            <table>
                <tr>
                    <td><label for="name">Crystal Name</label></td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td><label for="description">Description</label></td>
                    <td><textarea name="description" id="wiki-description"></textarea></td>
                </tr>
                <tr>
                    <td><label for="luster">Luster</label></td>
                    <td><input type="text" name="luster"></td>
                </tr>
                <tr>
                    <td><label for="color">Color</label></td>
                    <td><input type="text" name="color"></td>
                </tr>
                <tr>
                    <td><label for="streak">Streak</label></td>
                    <td><input type="text" name="streak"></td>
                </tr>
                <tr>
                    <td><label for="hardness">Hardness</label></td>
                    <td><input type="text" name="hardness"></td>
                </tr>
                <tr>
                    <td><label for="specificGravity">Specific Gravity</label></td>
                    <td><input type="text" name="specificGravity"></td>
                </tr>
                <tr>
                    <td>
                        <p>Chakras</p>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td><label for="chakra7">Sahastrara (Crown)</label></td>
                                <td><input type="checkbox" name="chakra7"></td>
                            </tr>
                            <tr>
                                <td><label for="chakra6">Ajna (Third Eye)</label></td>
                                <td><input type="checkbox" name="chakra6"></td>
                            </tr>
                            <tr>
                                <td><label for="chakra5">Vishuddha (Throat)</label></td>
                                <td><input type="checkbox" name="chakra5"></td>
                            </tr>
                            <tr>
                                <td><label for="chakra4">Anahata (Heart)</label></td>
                                <td><input type="checkbox" name="chakra4"></td>
                            </tr>
                            <tr>
                                <td><label for="chakra3">Manipura (Solar Plexus)</label></td>
                                <td><input type="checkbox" name="chakra3"></td>
                            </tr>
                            <tr>
                                <td><label for="chakra2">Svadhishthana (Sacral)</label></td>
                                <td><input type="checkbox" name="chakra2"></td>
                            </tr>
                            <tr>
                                <td><label for="chakra1">Muladhara (Root)</label></td>
                                <td><input type="checkbox" name="chakra1"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><label for="consonants">Consonant Crystals</label></td>
                    <td><textarea name="consonants"></textarea></td>
                </tr>
                <tr>
                    <td><label for="dissonants">Dissonant Crystals</label></td>
                    <td><textarea name="dissonants"></textarea></td>
                </tr>
                <tr>
                    <td>
                        <p>Planets</p>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td><input type="checkbox" name="plnSaturn"></td>
                                <td><label for="plnSaturn">Saturn</label></td>
                                <td><input type="checkbox" name="plnJupiter"></td>
                                <td><label for="plnJupiter">Jupiter</label></td>
                                <td><input type="checkbox" name="plnMars"></td>
                                <td><label for="plnMars">Mars</label></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="plnVenus"></td>
                                <td><label for="plnVenus">Venus</label></td>
                                <td><input type="checkbox" name="plnMercury"></td>
                                <td><label for="plnMercury">Mercury</label></td>
                                <td><input type="checkbox" name="plnMoon"></td>
                                <td><label for="plnMoon">Moon</label></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="plnSun"></td>
                                <td><label for="plnSun">Sun</label></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Elements</p>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td><input type="checkbox" name="eleAir"></td>
                                <td><label for="eleAir">Air</label></td>
                                <td><input type="checkbox" name="eleWater"></td>
                                <td><label for="eleWater">Water</label></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="eleEarth"></td>
                                <td><label for="eleEarth">Earth</label></td>
                                <td><input type="checkbox" name="eleFire"></td>
                                <td><label for="eleFire">Fire</label></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Zodiac Signs</p>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td><input type="checkbox" name="zodAries"></td>
                                <td><label for="zodAries">Aries</label></td>
                                <td><input type="checkbox" name="zodTaurus"></td>
                                <td><label for="zodTaurus">Taurus</label></td>
                                <td><input type="checkbox" name="zodGemini"></td>
                                <td><label for="zodGemini">Gemini</label></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="zodCancer"></td>
                                <td><label for="zodCancer">Cancer</label></td>
                                <td><input type="checkbox" name="zodLeo"></td>
                                <td><label for="zodLeo">Leo</label></td>
                                <td><input type="checkbox" name="zodVirgo"></td>
                                <td><label for="zodVirgo">Virgo</label></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="zodLibra"></td>
                                <td><label for="zodLibra">Libra</label></td>
                                <td><input type="checkbox" name="zodScorpio"></td>
                                <td><label for="zodScorpio">Scorpio</label></td>
                                <td><input type="checkbox" name="zodSagittarius"></td>
                                <td><label for="zodSagittarius">Sagittarius</label></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="zodCapricorn"></td>
                                <td><label for="zodCapricorn">Capricorn</label></td>
                                <td><input type="checkbox" name="zodAquarius"></td>
                                <td><label for="zodAquarius">Aquarius</label></td>
                                <td><input type="checkbox" name="zodPisces"></td>
                                <td><label for="zodPisces">Pisces</label></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="credit">Give Credit To</label>
                    </td>
                    <td>
                        <input type="text" name="credit">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Create">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>