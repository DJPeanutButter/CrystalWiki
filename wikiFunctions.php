<?
    function wikiReadFromDB ($strInp){
        $tmpArr = explode (",", $strInp);
        $retArr = [];
        
        foreach ($tmpArr as $strTmp){
            array_push ($retArr, ($strTmp[1] === "1"));
        }
        
        return $retArr;
    }
?>