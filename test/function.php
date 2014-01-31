<?php
function getUser()
    {
        $oSql= mysql_connect("localhost","root","root") ;
        mysql_select_db("Stage");
        $sReq = " SELECT Uti_Code, Uti_Login
                  FROM utilisateur
                  WHERE uti_desactive='0' ";
        $rstPdt = mysql_query($sReq) ;
        $iNb = 0 ;
        $lesProduits = array() ;
        while ($uneLigne = mysql_fetch_array($rstPdt))
        {
            $iNb = $iNb + 1 ;
            $lesProduits[$iNb] =  $uneLigne ;
        }
        return ($lesProduits) ;
    }