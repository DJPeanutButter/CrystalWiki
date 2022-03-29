<?
/*
 * File: wikiNewTask.php
 * Created 3/15/22
 * By Dani Lawless
 *
 *  Dependencies
 *    ../php/wikiDBConfig.php
 *    wiki.js
 *    wikiStyles.css
 */
    if (!file_exists ($_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php"))
        echo $_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php does not exist! <br>";
    else{
        require_once $_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php";
?>
<!DocType HTML>

<html>
    <head>
        <title>Add a Task!</title>
        <link rel="stylesheet" href="wikiStyles.css">
        <script src="wiki.js"></script>
<?
    if (isset($_POST["created"])){
        if ((isset($_POST["task"]))and(isset($_POST["priority"]))and(isset($_POST["due"]))){
            
            $arrCols = array("Task", "Priority", "AssignedOn", "DueBy");
            $arrVals = array($_POST["task"], $_POST["priority"], $_POST["created"], $_POST["due"]);
            
            if (wikiInsert("Tasks", $arrCols, $arrVals) . "<br>")
                echo "Record succesfully created for ".$_POST["task"].".";
            else
                echo "Error thrown in wikiInsert function.";
        }else
            echo "Please fill out all fields.";
    }
?>
    </head>
    <body>
<?
    if(isset($_POST["message"])){
?>
        <div class="message-div"><?echo $_POST["message"];?></div>
<?
    }
?>
    <form action="wikiNewTask.php" method="POST">
        <fieldset>
            <legend>New Task</legend>
            <label for="task">Task Name</label>
            <br>
            <input type="text" name="task" value=<?echo "\"".$_POST["task"]."\""?>>
            <br>
            <label for="priority">Priority</label>
            <br>
            <select name="priority">
                <option value="low"<?if ($_POST["priority"]==="low"){echo " selected";}?>>Low</option>
                <option value="med"<?if ($_POST["priority"]==="med"){echo " selected";}?>>Medium</option>
                <option value="high"<?if ($_POST["priority"]==="high"){echo " selected";}?>>High</option>
            </select>
            <br>
            <label for="date">Due Date</label>
            <br>
            <input type="date" name="due" value=<?echo "\"".$_POST["due"]."\""?>><br>
            <input type="hidden" name="created" value="<?echo date("Y-m-d");?>">
            <input type="submit" value="Create New Task">
        </fieldset>
    </form>
    </body>
</html>
<?}?>