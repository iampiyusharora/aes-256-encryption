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
 
<?php
//including the database connection file
$cipher = new cipher('d0a7e7997b6d5fcd55f4b5c32611b87cd923e88837b63bf2941ef819dc8ca282');
 
include_once("connection.php");
 
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");


?>
 
<html>
<head>
    <title>Homepage</title>
</head>
 
<body>
<a href="index.php">Home</a> | <a href="add.html">Add New Data</a> | <a href="logout.php">Logout</a>
<br/><br/>


    
<table width='80%' border=0>
    <tr bgcolor='#CCCCCC'>
        <td>JOB ID</td>
        <td>OP Num</td>
    </tr>
    <?php
    while($res = mysqli_fetch_array($result)) {   
    	$decrypted_jobid = $res['encrypted_jobid'];
    	$decrypted_var1 = $cipher->decrypt($decrypted_jobid);
    	$decrypted_opnum = $res['encrypted_opnum'];
    	$decrypted_var2 = $cipher->decrypt($decrypted_opnum);
        echo "<tr>";
        echo "<td>".$decrypted_var1."</td>";
        echo "<td>".$decrypted_var1."</td>";
        echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }
    ?>
</table>    
</body>
</html>