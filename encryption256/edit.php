<?php session_start(); ?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<?php
// including the database connection file
include_once("connection.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $jobid = $_POST['jobid'];
    $opnum = $_POST['opnum'];    
    
    // checking empty fields
    if(empty($jobid) || empty($opnum)) {                
        if(empty($jobid)) {
            echo "<font color='red'>JOB ID field is empty.</font><br/>";
        }
        
        if(empty($opnum)) {
            echo "<font color='red'>OP Num field is empty.</font><br/>";
        }        
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE products SET jobid='$jobid', opnum='$opnum' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: view.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $jobid = $res['jobid'];
    $opnum = $res['opnum'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Job ID</td>
                <td><input type="text" name="jobid" value=<?php echo $jobid;?>></td>
            </tr>
            <tr> 
                <td>OP Num</td>
                <td><input type="text" name="opnum" value=<?php echo $opnum;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>