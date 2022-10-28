<?php
$myServer="mysql:dbname=".DB.";host=".SERVER;
try {
    $pdo = new PDO ($myServer, USER, PASSWORD,
        array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
    );if($pdo){
        echo "<script> alert('DBconnection Works') </script>";
    } else{
        echo "<script> alert('DB Connection works!!')</script>";}
} catch (PDOException $e) {
    echo "<script> alert ('Error)'</script>";
}
?>