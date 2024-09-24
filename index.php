<!DOCTYPE html>
<html>
<head>
    <title>Baggage Weight Checker</title>
    <style>
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input {
            padding: 5px;
            width: 200px;
        }
        .submit-btn {
            background-color: #009fe3;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<h1>Baggage and Passenger Weight Checker</h1>

<form method="POST" action="">
    <label for="baggage_weight">Baggage Weight (kg):</label>
    <input type="number" step="0.01" id="baggage_weight" name="baggage_weight" required><br>

    <label for="passenger_weight">Passenger Weight (kg):</label>
    <input type="number" step="0.01" id="passenger_weight" name="passenger_weight" required><br>

    <label for="max_baggage_weight">Max Baggage Weight (kg):</label>
    <input type="number" step="0.01" id="max_baggage_weight" name="max_baggage_weight" value="20.00" disabled><br>

    <input type="submit" class="submit-btn" value="SUBMIT">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if form fields exist
    if (isset($_POST['baggage_weight']) && isset($_POST['passenger_weight'])) {
        // Get the submitted form data
        $baggage_weight = (float) $_POST['baggage_weight'];
        $passenger_weight = (float) $_POST['passenger_weight'];
        $max_baggage_weight = 20.00;

        // Check if the baggage weight is over the max limit
        if ($baggage_weight > $max_baggage_weight) {
            echo "<p style='color: red;'>Overweight baggage!</p>";
        } else {
            // Calculate and display the total load
            $total_load = $baggage_weight + $passenger_weight;
            echo "<p>Load = " . $total_load . " kg</p>";
        }
    }
}
?>

</body>
</html>
