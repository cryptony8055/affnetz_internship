<?php

$month = ['Jan'=>'January','Feb'=>'February','Mar'=>'March','Apr'=>'April','may'=>'May','Jun'=>'June','jul'=>'July','Aug'=>'August','Sep'=>'September','Oct'=>'October','Nov'=>'November','Dec'=>'December'];
$upadeted_month = '';
$user_input = [];

if(!empty($_POST)){
    if($_POST['submit']=='1'){
        $filter_var = $_POST['filter'];
        // if(isset($month[$filter_var])){
        //     $upadeted_month = $month[$filter_var];
        // } else {
        //     echo "invalid input";
        // }

        switch ($filter_var) {
            case "Jan":
              $upadeted_month = $month[$filter_var];
              break;
            case "Feb":
              $upadeted_month = $month[$filter_var];
              break;
            case "Mar":
                $upadeted_month = $month[$filter_var];
              break;  
            case "Apr":
                $upadeted_month = $month[$filter_var];
              break;
            case "May":
                $upadeted_month = $month[$filter_var];
              break;
            case "Jun":
                $upadeted_month = $month[$filter_var];
              break;
            case "Jul":
                $upadeted_month = $month[$filter_var];
              break;
            case "Aug":
                $upadeted_month = $month[$filter_var];
              break;
            case "Sep":
                $upadeted_month = $month[$filter_var];
              break;
            case "Oct":
                $upadeted_month = $month[$filter_var];
              break;
            case "Nov":
                $upadeted_month = $month[$filter_var];
              break;
            case "Nov":
                $upadeted_month = $month[$filter_var];
              break;
            default:
              echo "invalid-input";
              array_push($user_input,$filter_var);
          }
        //array_push($user_input,$filter_var);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <input type="text" placeholder="enter..." name="filter" required>
        <button name="submit" value="1">submit</button>
    </form>
    <ol>
        <?php 
        if($upadeted_month){
            echo "<li>".$upadeted_month."</li>";
        }else{
            foreach($month as $key=>$value){
                echo "<li>".$value."</li>";
            }
        }        
        ?>
    </ol>
    <ol>
        <?php 
        if($user_input){
            foreach($user_input as $keys=>$values){
                echo "<li>".$values."</li>";
            }
        }       
        ?>
    </ol>
</body>
</html>