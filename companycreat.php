<?php
include_once 'config.php';

?>

<?php

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
   
    $stmt = $conn -> prepare("insert into company_reg( `company_name`, `owner_name`, `company_email`, `password`, `mobile_number`, `website`, `street`, `city`, `province`, `postal_code`, `telephone_number`)
    values(?,?,?,?,?,?,?,?,?,?,?)");

    $stmt -> bind_param("ssssissssii",$companyname, $companyowner, $cemail, $cpassword, $cmobil,$website,$street,$ccity,$cprovince,$cpostal, $ctele);
    $stmt -> execute();

    $stmt-> close();
    $conn ->  close(); 

    
?>