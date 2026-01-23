<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Simple Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .calculator {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input,
        select,
        button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button,
        #button {
            background-color: #28a745;
            color: white;
            border: none;
            width: 50px;
        }

        button:hover,
        #button:hover {
            background-color: #218838;
        }

        .result {
            margin-top: 20px;
            font-weight: bold;
            text-align: center;
            font-size: 18px;
        }
    </style>
</head>

<body>

    <div class="calculator">
        <h2>Simple Calculator</h2>
        <form method="post" action=" ">
            <label>First Number:</label>
            <input type="number" name="num1" required>

            <label>Second Number:</label>
            <input type="number" name="num2" required>

            <label>Results:</label>
            <input name="result" value="<?php echo htmlspecialchars($result); ?>" readonly>

            <label>Operation:</label>

<div name="operator">
    
                <input type="button" value="+" id="button" name="operator">
                <input type="button" value="x" id="button" name="operator">
                <input type="button" value="-" id="button" name="operator">
                <input type="button" value="/" id="button" name="operator"> <br>
</div>

            <button type="submit" id="button" style=" width: 210px; margin-left: 80px;">Calculate</button>


        </form>

        <div class="result">
            <?php
            $num1 = $num2 = $result = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $num1 = $_POST['num1'];
                $num2 = $_POST['num2'];
                $op = $_POST['operator'];
                $result = "";

                switch ($op) {
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
                        $result = ($num2 != 0) ? $num1 / $num2 : "Cannot divide by zero";
                        break;
                    default:
                        $result = "Invalid operation";
                }

                echo "Result: " . $result;
            }
            ?>
        </div>
    </div>

</body>

</html>