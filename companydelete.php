<html>
    <head>
        <style>

            input{
                background-color:green;
            }
            </style>
    </head>
        <body>
<div class = "delete">
<?php

require_once 'config.php';




if (isset($_GET['E_id'])) {
    $E_id = $_GET['E_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $stmt = $conn->prepare("DELETE FROM company_reg WHERE E_id = ?");
        $stmt->bind_param("i", $E_id);

        if ($stmt->execute()) {
            
            header("Location: companyregi.html");
            exit();
        } else {
            echo "Error deleting record: " . $stmt->error;
        }

        $stmt->close();
    } 
    else {
       
        echo "Are you sure you want to delete this record?<br>";
        echo "<form method='POST'>";
        echo "<input type='submit' value='Yes, Delete'>";
        echo "</form>";
       
    }
}

$conn->close();
?>
</div>
</body>

</html>