<!DOCTYPE html>
<html>
<head>
    <title>PHP Calculator</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="num1" placeholder="Enter number 1" required>
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="text" name="num2" placeholder="Enter number 2" required>
        <input type="submit" value="Calculate">
    </form>
    <br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];

        if (!is_numeric($num1) || !is_numeric($num2)) {
            echo "Error: Please enter valid numbers.";
        } else {
            switch ($operator) {
                case "+":
                    $result = $num1 + $num2;
                    break;
                case "-":
                    $result = $num1 - $num2;
                    break;
                case "*":
                    $result = $num1 * $num2;
                    break;
                case "/":
                    if ($num2 == 0) {
                        echo "Error: Division by zero is not allowed.";
                        break;
                    }
                    $result = $num1 / $num2;
                    break;
                default:
                    echo "Error: Invalid operator selected.";
                    break;
            }

            echo "Result: " . $result;
        }
    }
    ?>
