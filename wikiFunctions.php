<?
    function wikiDecode ($strInp){
        $tmpArr = explode (",", $strInp);
        $retArr = [];
        
        foreach ($tmpArr as $strTmp){
            array_push ($retArr, ($strTmp[1] === "1"));
        }
        
        return $retArr;
    }
    
    function wikiEncode ($arrInp){
        $retVal = "{";
        foreach ($arrInp as $tmp){
            if (strlen($retVal)>1)
                $retVal .= ", ";
            $retVal .= ($tmp===true)?"1":"0";
        }
        $retVal .= "}";
        return $retVal;
    }
?>