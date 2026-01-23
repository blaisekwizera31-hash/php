<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Grade Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0 20px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Enter Student Marks</h2>
        <form method="POST" action="">
            <label for="percentage">Percentage:</label>
            <input type="number" name="percentage" id="percentage" min="0" max="100" required>
            <button type="submit">Display Grade</button>
        </form>

        <div class="result">
            <?php
            if (isset($_POST['percentage'])) {
                $marks = $_POST['percentage'];
                $grade = "";

                switch (true) {
                    case ($marks >= 90 && $marks <= 100):
                        $grade = "A";
                        break;
                    case ($marks >= 80 && $marks < 90):
                        $grade = "B";
                        break;
                    case ($marks >= 70 && $marks < 80):
                        $grade = "C";
                        break;
                    case ($marks >= 60 && $marks < 70):
                        $grade = "D";
                        break;
                    case ($marks >= 50 && $marks < 60):
                        $grade = "E";
                        break;
                    case ($marks >= 40 && $marks < 50):
                        $grade = "F";
                        break;
                    case ($marks >= 30 && $marks < 40):
                        $grade = "S";
                        break;
                    case ($marks < 30):
                        $grade = "U";
                        break;
                    default:
                        $grade = "Invalid";
                }

                echo "Percentage: {$marks}%<br>";
                echo "Grade: {$grade}";
            }
            ?>
        </div>
    </div>

</body>

</html>