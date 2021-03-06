<!DocType HTML>
<html>
    <head>
<?
  if (!file_exists ($_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php"))
      echo $_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php does not exist! <br>";
  else{
      require_once $_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php";
      if(!file_exists("wikiFunctions.php"))
        echo "wikiFunctions.php not found! <br>"
      else{
      
        if (isset($_POST["name"])){
          $postData = $_POST;
          echo var_dump($postData);
              //Generate strings for $wikiChakras, $wikiPlanets, $wikiElements & $wikiZodiac
              $wikiChakras = wikiEncode(array(($_POST ["chakra1"] === "on"),
                                              ($_POST ["chakra2"] === "on"),
                                              ($_POST ["chakra3"] === "on"),
                                              ($_POST ["chakra4"] === "on"),
                                              ($_POST ["chakra5"] === "on"),
                                              ($_POST ["chakra6"] === "on"),
                                              ($_POST ["chakra7"] === "on")));
          echo $wikiChakras;
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
                                              
            
              
            try {
              $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
              
              // set the PDO error mode to exception
              $query = $conn->prepare ("update Crystals set Description=:des, Luster=:lst, Color=:clr, Streak=:str, Hardness=:hrd, SpecificGravity=:spg, Chakras=:ckr, ConsonantCrystals=:con, DissonantCrystals=:dis, Planets=:pln, Elements=:ele, Zodiac=:zod where Name=:nam
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
              
              $query->execute ();
              
              echo "<script>var message=\"Record succesfully created for ".$_POST["name"]."\";</script>";
              
            }catch(PDOException $e){
              echo "Boo<br>Error: " . $e->getMessage();
              echo "<script>var message=\"$e->getMessage()\"</script>";
            }
        }
        
        if (isset($_GET["crystal"])){
            if (!$wikiData = wikiGetCrystalInfoByName($_GET["crystal"])){
                exit("Could not find crystal by the name of ".$_GET["crystal"]);
            }
  ?>
        <title>Edit <?echo $wikiData["name"]?></title>
  <?      }else{?>
        <title>No crystal selected!</title>
  <?    }?>
        <link rel="stylesheet" href="wikiStyles.css">
      </head>
      <body>
  <?
        if (isset($_GET["crystal"])){
  ?>
          <form action="edit.php?<?echo $_SERVER['QUERY_STRING'];?>" method="post">
              <table>
                  <tr>
                      <td><label for="name">Name</label></td>
                      <td><input type="text" name="name" value="<?echo $wikiData["Name"]?>"></td>
                  </tr>
                  <tr>
                      <td><label for="description">Description</label></td>
                      <td><textarea name="description"><?echo $wikiData["Description"];?></textarea></td>
                  </tr>
                  <tr>
                      <td><label for="luster">Luster</label></td>
                      <td><input type="text" name="luster" value="<?echo $wikiData["Luster"];?>"</td>
                  </tr>
                  <tr>
                      <td><label for="color">Color</label></td>
                      <td><input type="text" name="color" value="<?echo $wikiData["Color"];?>"></td>
                  </tr>
                  <tr>
                      <td><label for="streak">Streak</label></td>
                      <td><input type="text" name="streak" value="<?echo $wikiData["Streak"];?>"></td>
                  </tr>
                  <tr>
                      <td><label for="hardness">Hardness</label></td>
                      <td><input type="text" name="hardness" value="<?echo $wikiData["Hardness"];?>"></td>
                  </tr>
                  <tr>
                      <td><label for="specificGravity">Specific Gravity</label></td>
                      <td><input type="text" name="specificGravity" value="<?echo $wikiData["SpecificGravity"];?>"></td>
                  </tr>
                  <tr>
                      <td><p>Chakras</p></td>
                      <td>
  <?
          $tmp = $wikiData ["Chakras"];
          $tmpArr = explode (",", $tmp);
  ?>
                          <table>
                              <tr>
                                  <td><label for="chakra7">7th</label></td>
                                  <td><input type="checkbox" name="chakra7"<?if ($tmpArr[6] === " 1}"){echo " checked";}?>></td>
                              </tr>
                              <tr>
                                  <td><label for="chakra6">6th</label></td>
                                  <td><input type="checkbox" name="chakra6"<?if ($tmpArr[5] === " 1"){echo " checked";}?>></td>
                              </tr>
                              <tr>
                                  <td><label for="chakra5">5th</label></td>
                                  <td><input type="checkbox" name="chakra5"<?if ($tmpArr[4] === " 1"){echo " checked";}?>></td>
                              </tr>
                              <tr>
                                  <td><label for="chakra4">4th</label></td>
                                  <td><input type="checkbox" name="chakra4"<?if ($tmpArr[3] === " 1"){echo " checked";}?>></td>
                              </tr>
                              <tr>
                                  <td><label for="chakra3">3rd</label></td>
                                  <td><input type="checkbox" name="chakra3"<?if ($tmpArr[2] === " 1"){echo " checked";}?>></td>
                              </tr>
                              <tr>
                                  <td><label for="chakra2">2nd</label></td>
                                  <td><input type="checkbox" name="chakra2"<?if ($tmpArr[1] === " 1"){echo " checked";}?>></td>
                              </tr>
                              <tr>
                                  <td><label for="chakra1">1st</label></td>
                                  <td><input type="checkbox" name="chakra1"<?if ($tmpArr[0] === "{1"){echo " checked";}?>></td>
                              </tr>
                          </table>
                      </td>
                  </tr>
                  <tr>
                      <td><label for="consonants">Consonant Crystals</label></td>
                      <td><textarea name="consonants"><?echo $wikiData["ConsonantCrystals"];?></textarea></td>
                  </tr>
                  <tr>
                      <td><label for="dissonants">Dissonant Crystals</label></td>
                      <td><textarea name="dissonants"><?echo $wikiData["DissonantCrystals"];?></textarea></td>
                  </tr>
                  <tr>
                      <td>
                          <p>Planets</p>
                      </td>
                      <td>
  <?
          $tmp = $wikiData ["Planets"];
          $tmpArr = explode (",", $tmp);
  ?>
                          <table>
                              <tr>
                                  <td><input type="checkbox" name="plnSaturn"<?if ($tmpArr[0] === "{1"){echo " checked";}?>></td>
                                  <td><label for="plnSaturn">Saturn</label></td>
                                  <td><input type="checkbox" name="plnJupiter"<?if ($tmpArr[1] === " 1"){echo " checked";}?>></td>
                                  <td><label for="plnJupiter">Jupiter</label></td>
                                  <td><input type="checkbox" name="plnMars"<?if ($tmpArr[2] === " 1"){echo " checked";}?>></td>
                                  <td><label for="plnMars">Mars</label></td>
                              </tr>
                              <tr>
                                  <td><input type="checkbox" name="plnVenus"<?if ($tmpArr[3] === " 1"){echo " checked";}?>></td>
                                  <td><label for="plnVenus">Venus</label></td>
                                  <td><input type="checkbox" name="plnMercury"<?if ($tmpArr[4] === " 1"){echo " checked";}?>></td>
                                  <td><label for="plnMercury">Mercury</label></td>
                                  <td><input type="checkbox" name="plnMoon"<?if ($tmpArr[5] === " 1"){echo " checked";}?>></td>
                                  <td><label for="plnMoon">Moon</label></td>
                              </tr>
                              <tr>
                                  <td><input type="checkbox" name="plnSun"<?if ($tmpArr[6] === " 1}"){echo " checked";}?>></td>
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
  <?
          $tmp = $wikiData ["Elements"];
          $tmpArr = explode (",", $tmp);
  ?>
                          <table>
                              <tr>
                                  <td><input type="checkbox" name="eleAir"<?if ($tmpArr[0] === "{1"){echo " checked";}?>></td>
                                  <td><label for="eleAir">Air</label></td>
                                  <td><input type="checkbox" name="eleWater"<?if ($tmpArr[1] === " 1"){echo " checked";}?>></td>
                                  <td><label for="eleWater">Water</label></td>
                              </tr>
                              <tr>
                                  <td><input type="checkbox" name="eleEarth"<?if ($tmpArr[2] === " 1"){echo " checked";}?>></td>
                                  <td><label for="eleEarth">Earth</label></td>
                                  <td><input type="checkbox" name="eleFire"<?if ($tmpArr[3] === " 1}"){echo " checked";}?>></td>
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
  <?
          $tmp = $wikiData ["Zodiac"];
          $tmpArr = explode (",", $tmp);
  ?>
                          <table>
                              <tr>
                                  <td><input type="checkbox" name="zodAries"<?if ($tmpArr[0] === "{1"){echo " checked";}?>></td>
                                  <td><label for="zodAries">Aries</label></td>
                                  <td><input type="checkbox" name="zodTaurus"<?if ($tmpArr[1] === " 1"){echo " checked";}?>></td>
                                  <td><label for="zodTaurus">Taurus</label></td>
                                  <td><input type="checkbox" name="zodGemini"<?if ($tmpArr[2] === " 1"){echo " checked";}?>></td>
                                  <td><label for="zodGemini">Gemini</label></td>
                              </tr>
                              <tr>
                                  <td><input type="checkbox" name="zodCancer"<?if ($tmpArr[3] === " 1"){echo " checked";}?>></td>
                                  <td><label for="zodCancer">Cancer</label></td>
                                  <td><input type="checkbox" name="zodLeo"<?if ($tmpArr[4] === " 1"){echo " checked";}?>></td>
                                  <td><label for="zodLeo">Leo</label></td>
                                  <td><input type="checkbox" name="zodVirgo"<?if ($tmpArr[5] === " 1"){echo " checked";}?>></td>
                                  <td><label for="zodVirgo">Virgo</label></td>
                              </tr>
                              <tr>
                                  <td><input type="checkbox" name="zodLibra"<?if ($tmpArr[6] === " 1"){echo " checked";}?>></td>
                                  <td><label for="zodLibra">Libra</label></td>
                                  <td><input type="checkbox" name="zodScorpio"<?if ($tmpArr[7] === " 1"){echo " checked";}?>></td>
                                  <td><label for="zodScorpio">Scorpio</label></td>
                                  <td><input type="checkbox" name="zodSagittarius"<?if ($tmpArr[8] === " 1"){echo " checked";}?>></td>
                                  <td><label for="zodSagittarius">Sagittarius</label></td>
                              </tr>
                              <tr>
                                  <td><input type="checkbox" name="zodCapricorn"<?if ($tmpArr[9] === " 1"){echo " checked";}?>></td>
                                  <td><label for="zodCapricorn">Capricorn</label></td>
                                  <td><input type="checkbox" name="zodAquarius"<?if ($tmpArr[10] === " 1"){echo " checked";}?>></td>
                                  <td><label for="zodAquarius">Aquarius</label></td>
                                  <td><input type="checkbox" name="zodPisces"<?if ($tmpArr[11] === " 1}"){echo " checked";}?>></td>
                                  <td><label for="zodPisces">Pisces</label></td>
                              </tr>
                          </table>
                      </td>
                  </tr>
                  <tr>
                      <td><input type="submit" value="update"></td>
                  </tr>
              </table>
          </form>
  <?    }else{?>
          <p>No crystal selected!</p>
  <?    }?>
  <?  }?>
      </body>
  </html>
<?  }?>