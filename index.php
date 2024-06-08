<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multipurpose Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="calculator">
        <h1>Multipurpose Calculator</h1>
        <form method="POST" action="">
            <input type="number" step="any" name="num1" placeholder="Enter first number" required>
            <input type="number" step="any" name="num2" placeholder="Enter second number (if needed)">
            <select name="operation">
                <option value="add">Addition</option>
                <option value="subtract">Subtraction</option>
                <option value="multiply">Multiplication</option>
                <option value="divide">Division</option>
                <option value="exponent">Exponentiation</option>
                <option value="percentage">Percentage</option>
                <option value="sqrt">Square Root</option>
                <option value="log">Logarithm</option>
            </select>
            <button type="submit">Calculate</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $num1 = isset($_POST['num1']) ? $_POST['num1'] : 0;
            $num2 = isset($_POST['num2']) ? $_POST['num2'] : 0;
            $operation = $_POST['operation'];
            $result = '';

            function add($a, $b) { return $a + $b; }
            function subtract($a, $b) { return $a - $b; }
            function multiply($a, $b) { return $a * $b; }
            function divide($a, $b) { return $b != 0 ? $a / $b : 'Error: Division by zero'; }
            function exponent($a, $b) { return pow($a, $b); }
            function percentage($a, $b) { return ($a * $b) / 100; }
            function sqrt($a) { return sqrt($a); }
            function log($a) { return log($a); }

            switch ($operation) {
                case 'add':
                    $result = add($num1, $num2);
                    break;
                case 'subtract':
                    $result = subtract($num1, $num2);
                    break;
                case 'multiply':
                    $result = multiply($num1, $num2);
                    break;
                case 'divide':
                    $result = divide($num1, $num2);
                    break;
                case 'exponent':
                    $result = exponent($num1, $num2);
                    break;
                case 'percentage':
                    $result = percentage($num1, $num2);
                    break;
                case 'sqrt':
                    $result = sqrt($num1);
                    break;
                case 'log':
                    $result = log($num1);
                    break;
                default:
                    $result = 'Invalid operation';
            }

            echo "<h2>Result: $result</h2>";
        }
        ?>
    </div>
</body>
</html>
