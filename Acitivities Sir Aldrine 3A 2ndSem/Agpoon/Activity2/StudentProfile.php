<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StudentProfile.css">
    <title>Student Profile</title>
</head>

<style>
    .echo-text {
        margin-top: 10px;
        font-size: 25px;
        Color: red;
    }
</style>

<body>
<p> Student Profile </p>    
    <div class="border">
   
    <div class="con">
    <form method="post">
        <label for="name"> Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="age"> Age:</label>
        <input type="text" id="age" name="age" required>
        <br>
        <label for="address"> Address:</label>
        <input type="text" id="address" name="address" required>
        <br>
        <label for="contact"> Contact Number:</label>
        <input type="text" id="contact" name="contact" required>
        <br>
        <label for="birthdate"> BirthDate:</label>
        <input type="text" id="birthdate" name="birthdate" required>
        <br>
        <label for="Gender"> Gender:</label>
        <input type="text" id="gender" name="gender" required>
        <br>
        <label for="bloodtype"> Blood Type:</label>
        <input type="text" id="blood" name="blood" required>
        <br><br>
        <input type="Submit" value="Submit">
    </form> <br>
    </div>
   
    </div>
    

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $age = $_POST["age"];
        $address = $_POST["address"];
        $contact = $_POST["contact"];
        $birthdate = $_POST["birthdate"];
        $gender = $_POST["gender"];
        $blood = $_POST["blood"];

        echo "Name: $name <br>";
        echo "Age: $age <br>";
        echo "Address: $address <br>";
        echo "Contact: $contact <br>";
        echo "Birth Date: $birthdate <br>";
        echo "Gender: $gender <br>";
        echo "Blood Type: $blood ";
        echo '<br>';
    }


    ?>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        include  'connection.php';

        $sql = "INSERT INTO info (Name, Age, Contact, Birthdate, Gender, Bloodtype) VALUES ('$name', '$age', '$contact', '$birthdate', '$gender', '$blood')";


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