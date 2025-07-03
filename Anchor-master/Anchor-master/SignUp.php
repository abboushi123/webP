<?php
    $passeqcon=0;
    $emailexist=0;
    $passwordexist=0;
    session_start();

    if(isset($_POST['Fname']) && isset($_POST['Lname']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['confirmpassword'])){

        if($_POST['password']==$_POST['confirmpassword'])
            {$passeqcon=1;}

        $db=new mysqli('localhost','root','','Anchor');
        $qryString="select Password from MyAccounts where  Password='".sha1($_POST['password'])."'";
        $res=$db->query($qryString);
        $row= $res->fetch_assoc();



        if(isset($row['Password']))
        {
            $passwordexist=1;
        }

        $qryString="select Email from MyAccounts where  Email='".$_POST['email']."'";
        $res=$db->query($qryString);
        $row= $res->fetch_assoc();
        if(isset($row['Email']))
        {
            $emailexist=1;
        }
        if($emailexist==0 && $passeqcon==1 && $passwordexist==0) {
            $qryString="select max(accountNum) from MyAccounts";
            $res=$db->query($qryString);
            $row=$res->fetch_assoc();
           $qryString=" INSERT INTO `MyAccounts` (`accountNum`, `Fname`, `Lname`, `Password`, `Email`, `Adminuser`, `ProfPic`) VALUES ('".++$row['max(accountNum)']."', '".$_POST['Fname']."', '".$_POST['Lname']."', '".sha1($_POST['password'])."', '".$_POST['email']."', '0', 'image/profImg.jpg')";
           $hi= $db->query($qryString);

        $_SESSION['Fname']=$_POST['Fname'];
        $_SESSION['Lname']=$_POST['Lname'];
        $_SESSION['email']=$_POST['email'];
        $_SESSION['password']=$_POST['password'];
        $_SESSION['profpic']="image/profImg.jpg";
        $_SESSION['idaccount']=$row['max(accountNum)'];
        $_SESSION['adminuser']='0';

        }
$db->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anchor</title>
    <link rel="stylesheet" href="SignUp.css">
</head>
<body>

<div class="text-container">
    <span>A</span>
    <span>N</span>
    <span>C</span>
    <span>H</span>
    <span>O</span>
    <span>R</span>

</div>
<div class="box">

    <form action="SignUp.php" method="post">
        <h2>Sign Up</h2>
        <div class="inputBox">
            <input type="text" name="Fname" required>
            <label>First Name</label>
            <i></i>
        </div>

        <div class="inputBox">
            <input type="text" name="Lname" required>
            <label>Last Name</label>
            <i></i>
        </div>

        <div class="inputBox">
            <input type="email" name="email" required>
            <label>Email</label>
            <i></i>
        </div>
        <?php
        if($emailexist==1)
        {
            ?>
            <p style="color: red">*email waws exist try another one </p>
        <?php
        }
        ?>

        <div class="inputBox">
            <input type="password" name="password" required>
            <label>Password</label>
            <i></i>
        </div>
        <?php
        if(isset($_POST['password']) && isset($_POST['confirmpassword']))
        if($passeqcon==0)
        {
            ?>
            <p style="color: red">*password not equal the confirm pass </p>
        <?php

        }
        elseif ($passwordexist==1)
        {
            ?>
            <p style="color: red">*password exist try another one </p>
        <?php
        }
        ?>
        <div class="inputBox">
            <input type="password" name="confirmpassword" required>
            <label>Confirm Password</label>
            <i></i>
        </div>

        <div class="link">
            <a href="SignIn.php">Sign In</a>
        </div>
        <input type="submit" value="Sign Up">
        <?php
        if(($passwordexist==1 || $passeqcon==1)  || $emailexist==1)
        {
            ?>
            <script>
              var edit=document.querySelectorAll(".box");
              // var edit1=document.querySelectorAll(".box::after");
              // var edit2=document.querySelectorAll(".box::before");
              edit[0].style.height='640px';
              // edit1[0].style.height='660px';
              // edit2[0].style.height='660px';
            </script>
        <?php
        }

        ?>
    </form>
</div>

</body>
</html>
<!--.-->