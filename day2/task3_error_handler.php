<?php

//just demonstrating various fucntionalities for the language . this code is not optimised at all.just for learning purposes.

function errorCheck($n1,$n2,$op){
    $res = [];
    switch ($op) {
        case "/":
            if($n2==0){
                $res['success']=false;
                $res['val'] = "cannot devide";
            }else{
                $res['success']=true;
                $res['val'] = $n1/$n2;
            }
            return $res;
          break;  
        case "-":
            if($n1<$n2){
                $res['success']=false;
                $res['val'] = "cannot subtract";
            }else{
                $res['success']=true;
                $res['val'] = $n1-$n2;
            }
            return $res;
          break;
        default:
          echo "invalid-input";
      }

}

?>