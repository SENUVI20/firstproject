    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $companyname = $_POST['cName'];
        $companyowner = $_POST['coName'];
        $cemail = $_POST['cEmail'];
        $cpassword = $_POST['cPassword'];
        $cmobil = $_POST['cMobile'];
        $website = $_POST['cWeb'];
        $street = $_POST['cStreet'];
        $ccity = $_POST['cCity'];
        $cprovince = $_POST['cProvince'];
        $cpostal = $_POST['postalCode'];
        $ctele = $_POST['ctMobile'];
        $adId = $_POST['E_id'];

    
        $connection = new mysqli('localhost', 'root', '', 'recruitment');
        if ($connection->connect_error) {
            die('Connection failed: ' . $connection->connect_error);
        }

        
        $sql = "UPDATE company_reg SET 
            company_name = '$companyname',
            owner_name = '$companyowner',
            company_email = '$cemail',
            password = '$cpassword',
            mobile_number = '$cmobil',
            website = '$website',
            street = '$street',
            city = '$ccity',
            province = '$cprovince',
            postal_code = '$cpostal',
            telephone_number = '$ctele'
            WHERE E_id = $adId";

        if ($connection->query($sql) === TRUE) {
            
            header("Location:companyread.php");
        } else {
            echo "Error updating details: " . $connection->error;
        }

        $connection->close();
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" href="companydelete.css">

        <title>Update </title>
    </head>
    <body>
        <h1>Edit Company Registration details</h1>

        <?php
        
        if (isset($_GET['E_id'])) {
        
            $connection = new mysqli('localhost', 'root', '', 'recruitment');
            if ($connection->connect_error) {
                die('Connection failed: ' . $connection->connect_error);
            }

        
            $adId = $_GET['E_id'];
            $result = $connection->query("SELECT * FROM company_reg WHERE E_id = $adId");

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                
                ?>
                <form action="compantedit.php" method="POST">
                    <input type="hidden" name="E_id" value="<?php echo $row['E_id']; ?>">
                    <label for="cName">Company Name:</label>
                    <input type="text" name="cName" value="<?php echo $row['company_name']; ?>"><br>

                    <label for="coName">Owner name:</label>
                    <textarea name="coName"><?php echo $row['owner_name']; ?></textarea><br>

                
                    <label for="cEmail">Email:</label>
                    <input type="text" name="cEmail" value="<?php echo $row['company_email']; ?>"><br>

                    <label for="cPassword">password :</label>
                    <input type="text" name="cPassword" value="<?php echo $row['password']; ?>"><br>

                    <label for="cMobile">Mobile number:</label>
                    <input type="text" name="cMobile" value="<?php echo $row['mobile_number']; ?>"><br>

                    <label for="cWeb">Website:</label>
                    <input type="text" name="cWeb" value="<?php echo $row['website']; ?>"><br>

                    <label for="cStreet">Street:</label>
                    <input type="text" name="cStreet" value="<?php echo $row['street']; ?>"><br>

                    <label for="cCity">City:</label>
                    <input type="text" name="cCity" value="<?php echo $row['city']; ?>"><br>

                    <label for="cProvince">Province:</label>
                    <input type="text" name="cProvince" value="<?php echo $row['province']; ?>"><br>

                    <label for="postalCode">Postal code:</label>
                    <textarea name="postalCode"><?php echo $row['postal_code']; ?></textarea><br>

                    <label for="ctMobile">Telephone number:</label>
                    <textarea name="ctMobile"><?php echo $row['telephone_number']; ?></textarea><br>

                    <button type="submit">Update </button>
                    <a href="companyread.php"><button class = "btn">Back</button></a>
                </form>
                
                <?php
            } else {
                echo " ";
            }

            $connection->close();
        } else {
            echo "";
        }
        ?>
    </body>
    </html>