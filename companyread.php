<!DOCTYPE html>
<html>
<head>
    <title>Company registration Details</title>
    <link rel="stylesheet" href="companyread.css"> 
</head>
<body>
    <h1>Company Registration Details</h1>

    <?php
    
    $connection = new mysqli('localhost', 'root', '', 'recruitment');
    if ($connection->connect_error) {
        die('Connection failed: ' . $connection->connect_error);
    }

    $result = $connection->query("SELECT * FROM company_reg");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='companyregi'>";
            echo "<h2>" . $row['company_name'] . "</h2>";
            echo "<p>" . $row['owner_name'] . "</p>";
            echo "<p>Email: " . $row['company_email'] . "</p>";
            echo "<p>Mobile number: " . $row['mobile_number'] . "</p>";
            echo "<p>website: " . $row['website'] . "</p>";
            echo "<p>Addres -> street: " . $row['street'] . "</p>";
            echo "<p> city: " . $row['city'] . "</p>";
            echo "<p>Province: " . $row['province'] . "</p>";
            echo "<p>Postal code: " . $row['postal_code'] . "</p>";
            echo "<p>telephone_number: " . $row['telephone_number'] . "</p>";

            
echo "<a href='compantedit.php?E_id=" . $row['E_id'] . "'>Update</a>";
echo "<a href='companydelete.php?E_id=" . $row['E_id'] . "'>Delete</a>";

            echo "</div>";
        }
    } else {
        echo "No company registration detail found.";
    }

    $connection->close();
    ?>
    <br>
    <a href="companyregi.html"><button>Back</button></a>
</body>
</html>