<?
    include_once $_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php";
    $cols = array("Name", "Chakrase");
    var_dump(wikiSelect ("Crystals",$cols));
?>