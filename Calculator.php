<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <input type="number" name="num01" placeholder="First number" required>
        <select name="operator">
            <option value="add">+</option>
            <option value="sutract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <input type="number" name="num02"placeholder="Second numbber" required>
        <button name = "submit" >Calculate</button>
    </form>
    <?php   
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        
        //Data Grabber
        $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);
        $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);
        $operator = htmlspecialchars($_POST["operator"]);
        
        //Errors 
        $errors = false;

        if ( empty($num01) || empty($num02) || empty($operator) )
        {
            echo "Please fill in all fields !<br>";
            $errors = true;
        }
        if( !is_numeric($num01) || !is_numeric($num02) )
        {
            echo "Only numbers are allowed !";
        }

        //Calculate 
        if(!$errors)
        {
            $result = 0;
            switch ($operator) 
            {
                case "add": $result = $num01 + $num02; break;
                case "sutract": $result = $num01 - $num02; break;
                case "multiply": $result = $num01 * $num02; break;
                case "divide": $result = $num01 / $num02; break;
                default : $result = "Invalid operator"; break;
            }

            echo "The result is: $result";
                
        }
    

    }
    ?>

</body>
</html>