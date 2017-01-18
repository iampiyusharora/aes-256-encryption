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
<html>
<head>
    <title>Homepage</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
 
<body>
    <?php

    include("connection.php");   
    $cipher = new cipher('d0a7e7997b6d5fcd55f4b5c32611b87cd923e88837b63bf2941ef819dc8ca282');

    if(isset($_SESSION['valid'])) {            
                         
        $result = mysqli_query($mysqli, "SELECT * FROM login");
    ?>                
        Welcome Admin ! <a href='logout.php'>Logout</a><br/>
        <br/>
        <a href='view.php'>View and Update Data</a>
        <br/><br/>
    <?php    
    } else {
        echo "You must be logged in to view this page.<br/><br/>";
        echo "<a href='login.php'>Login</a>";
    }
    ?>

    <?php
    $result = mysqli_query($mysqli, "SELECT * FROM products ORDER BY id DESC");

    while($res = mysqli_fetch_array($result)) {   
        $decrypted_jobid = $res['encrypted_jobid'];
        $decrypted_var1 = $cipher->decrypt($decrypted_jobid);
        $decrypted_opnum = $res['encrypted_opnum'];
        $decrypted_var2 = $cipher->decrypt($decrypted_opnum);
        echo "<tr>";
        echo "<td>".$decrypted_var1."</td>";
        echo "<td>".$decrypted_var2."</td>";    
        echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }
    ?>
</body>
</html>