<?php session_start(); ?>
<?php

class cipher
{
    private $securekey;
    private $iv_size;

    function __construct($textkey)
    {
        $this->iv_size = mcrypt_get_iv_size(
            MCRYPT_RIJNDAEL_128,
            MCRYPT_MODE_CBC
        );
        $this->securekey = hash(
            'sha256',
            $textkey,
            TRUE
        );
    }

    function encrypt($input)
    {
        $iv = mcrypt_create_iv($this->iv_size);
        return base64_encode(
            $iv . mcrypt_encrypt(
                MCRYPT_RIJNDAEL_128,
                $this->securekey,
                $input,
                MCRYPT_MODE_CBC,
                $iv
            )
        );
    }

    function decrypt($input)
    {
        $input = base64_decode($input);
        $iv = substr(
            $input,
            0,
            $this->iv_size
        );
        $cipher = substr(
            $input,
            $this->iv_size
        );
        return trim(
            mcrypt_decrypt(
                MCRYPT_RIJNDAEL_128,
                $this->securekey,
                $cipher,
                MCRYPT_MODE_CBC,
                $iv
            )
        );
    }
}

?>  
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
$cipher = new cipher('d0a7e7997b6d5fcd55f4b5c32611b87cd923e88837b63bf2941ef819dc8ca282');
$orignal_text = 'my secret message';


//including the database connection file
include_once("connection.php");


 
if(isset($_POST['Submit'])) {    
    $jobid1 = $_POST['jobid'];
    $opnum1 = $_POST['opnum'];
    $loginId = $_SESSION['id'];
        
   
        // if all the fields are filled (not empty) 
            $encrypted_jobid = $cipher->encrypt($jobid1); 
            $encrypted_opnum = $cipher->encrypt($opnum1);
        //insert data to database    
        $result = mysqli_query($mysqli, "INSERT INTO products(encrypted_jobid, encrypted_opnum, login_id) VALUES('$encrypted_jobid','$encrypted_opnum', '$loginId')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='view.php'>View Result</a>";
}
?>
</body>
</html>