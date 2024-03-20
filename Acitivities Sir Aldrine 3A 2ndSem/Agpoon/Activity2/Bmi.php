<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI</title>
</head>

<body>

    <p> Bmi </p>
    <form method="post">
        <label for="name"> Height:</label>
        <input type="text" id="height" name="height">
        <select name="heightUnit" id="heightUnit">
            <option value="centimeter">Centimeters</option>
            <option value="inches">Inches</option>
            <option value="meter">Meters</option>
            <option value="foot">Feet</option>
        </select>

        <br><br>
        <label for="name"> Weight:</label>
        <input type="text" id="weight" name="weight">
        <select name="weightUnit" id="weightUnit">
            <option value="kilograms">Kilograms</option>
            <option value="pounds">Pounds</option>
        </select>
        <input type="Submit" value="Submit">
    </form> <br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Height = $_POST["height"];
        $HeightUnit = $_POST["heightUnit"];
        $Weight = $_POST["weight"];
        $WeightUnit = $_POST["weightUnit"];
        if ($Height == '' || $Weight == '' || $HeightUnit == '' || $WeightUnit == '') {
            $Error = "The input values are required.";
        } elseif (filter_var($Height, FILTER_VALIDATE_FLOAT) === false || filter_var($Weight, FILTER_VALIDATE_FLOAT) === false) {
            $Error = "The input value must be a number only.";
        } else {

            $HInches = ($HeightUnit == 'centimeter') ? $Height * 0.393701 : (($HeightUnit == 'foot') ? $Height * 12 : (($HeightUnit == 'meter') ? $Height * 39.3700787 : $Height));

            $pounds = ($WeightUnit == 'kilograms') ? $Weight * 2.20462 : $Weight;
            $BMIIndex = round($pounds / ($HInches * $HInches) * 703, 1);

            echo "Your BMI: " . $BMIIndex . "<br>";

            if ($BMIIndex < 18.5) {
                $Message = "Underweight";
            } else if ($BMIIndex <= 24.9) {
                $Message = "Normal";
            } else if ($BMIIndex <= 29.9) {
                $Message = "Overweight";
            } else {
                $Message = "Obese";
            }

            echo "<p>Bmi Result: " . $Message . "</p>";
        }
    }



    ?>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        include  'connection.php';

    
        $sql = "INSERT INTO BMI (BMI) VALUES ('$BMIIndex')";

        $result = $conn->query($sql);

        if ($result == TRUE) {

            echo "Inserted";
        } else {

            echo  $conn->error;
        }
    }

    ?>




</body>

</html>