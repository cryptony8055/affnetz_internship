<?php

if(!empty($_POST)){
    if($_POST['submit']=='1'){
        $num1 = $_POST['operand1'];
        $num2 = $_POST['operand2'];
        $operation = $_POST['operator'];

        switch ($operation) {
            case "+":
                $result = $num1+$num2;
              break;  
            case "-":
                $result = $num1-$num2;
              break;
            case "*":
                $result = $num1*$num2;
              break;
            case "%":
                $result = $num1%$num2;
              break;
            case "/":
                $result = $num1/$num2;
              break;
            default:
              echo "invalid-input";
          }
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
        <input type="number" placeholder="enter..." name="operand1" value = "<?php echo (isset($num1))?$num1:'';?>" required>
        <input type="text" placeholder="enter..." name="operator" value = "<?php echo (isset($operation))?$operation:'';?>" required>
        <input type="number" placeholder="enter..." name="operand2" value = "<?php echo (isset($num2))?$num2:'';?>" required>
        <button name="submit" value="1">=</button>
        <input type="number" placeholder="enter..." name="result" value = "<?php echo (isset($result))?$result:'';?>">
    </form>
</body>
</html>