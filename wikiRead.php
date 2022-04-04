<!DocType HTML>

<?
/*
 * wikiRead.php
 * Created 3/14/22
 * By Dani Lawless
 *
 */
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php");

    try {
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        
        $stmt = $conn->prepare ("SELECT * FROM Crystals");
        $stmt->execute();
?>
<table>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Chakras</th>
    </tr>
<?
        while ($row = $stmt->fetch()) {
            echo "    <tr>\r\n        <td>".$row['Name']."</td>\r\n        <td class=\"desc\">".$row['Description']."</td>\r\n        <td>".$row['Chakras']."</td>\r\n    </tr>";
        }
?>

</table>
<form action="wiki.php" method="post">
    <input type="hidden" name="message" value="Redirected from wikiRead.php">
    <input type="submit" value="Make another record!">
</form>
<?
        //TODO: create a list of unique rocks that are not yet in the table
        /*
         * 
         */
        $stmt = $conn->prepare ("SELECT ConsonantCrystals FROM Crystals");
        $stmt->execute();
        $rocks = [];
        
        while ($row = $stmt->fetch()){
            $tmp = explode (",",$row['ConsonantCrystals']);
            array_push($rocks, $tmp);
            echo "<textarea>".$row['ConsonantCrystals']."</textarea>" . "<br>";
            
        }
        echo "<textarea>";
        echo var_dump($rocks);
        echo "</textarea>" . "<br>";
    }catch(PDOException $e){
        echo "Boo<br>Error: " . $e->getMessage();
    }
?>