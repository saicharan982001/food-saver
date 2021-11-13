<?php
include("header.php");
include("dbconnection.php");
session_start();
if(isset($_SESSION['aid']))
{
    header("location:adminwelcome.php");
    exit();   
}
?>
<div style="text-align:center">
<h1 class="text text-capitalize text-center text-primary">Admin Login</h1>
<form method="post">
<div>
<table align="center">
    <tr><td>Email:</td>
    <td><input type="email" name="email" required placeholder="Please enter your Email" class="form-control"></td></tr>
    <tr><td>Password:</td><td>
        <input type="password" name="pass" required placeholder="Please enter your Password" class="form-control"></td></tr>
        <tr><td align="right"><input type="reset" value="Reset" class="btn btn-success" style="background-color:#FCD34D;border:1px"></div></td>
        <td><input type="submit" name="login" value="Login" class="btn btn-danger" style="background-color:#FCD34D;border:1px" style="margin-left: 20px">
        <a href="register.php" class="btn btn-success">Registration</a>
</td></tr>

</table>
</div>
</div>
</body>
</html>
<?php
if(isset($_POST["login"]))
{
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $query="SELECT * FROM 'admin' WHERE email='$email' AND password='$pass'";
    $run=mysqli_query($con,$query);
    $row=mysqli_num_rows($run);
    if($row<1)
    {?>
    <script>
    
    alert('Email and Password is not correct');
</script>
<?php
}
else
{
    $data=mysqli_fetch_assoc($run);
    $id=$data['id'];
    $_SESSION['aid']=$id;
    header("location:adminwelcome.php");
}
}
?>
