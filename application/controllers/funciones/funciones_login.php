<?php 
	// ********************************LOGIN**************************
function alfabeto_valido($palabra,$validos,$invalidos="NO")
    {
        $contador=0;
        $no_usuado="";
        $k=0;
        for($i=0;$i<strlen($palabra);$i++)
        {   $k=0;
            for($j=0;$j<strlen($validos);$j++)
            {
                if($palabra[$i]==$validos[$j])
                {
                    $contador++;
                }
                else
                {   
                    //$no_usuado[$k]=$palabra[$i];
                    $k++;
                }
            }
            if(strlen($validos)==$k)
            {
                $no_usuado.=$palabra[$i];
            }
        }
        
        if($contador==strlen($palabra))
        {
            return TRUE;
        }               
        else
        {
            if($invalidos=="SI"){
                return $no_usuado;
            }
            else{
                return FALSE;
            }

        }

    }
 ?>