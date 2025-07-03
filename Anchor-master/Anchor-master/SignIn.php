<?php
session_start();
$_SESSION['Fname']=null;
$_SESSION['Lname']=null;
$_SESSION['email']=null;
$_SESSION['password']=null;
$_SESSION['profpic']=null;
$_SESSION['idaccount']=null;
$_SESSION['adminuser']=null;
if(isset($_POST['username']) && isset($_POST['password']))
    {

//       $_SESSION['name']=$_POST['username'];
        if (strpos($_POST['username'], " ") !== false) {
            $name=explode(" ", $_POST['username']);
//            $_SESSION['Fname']=$name[0];
//            $_SESSION['Lname']=$name[1];
        }
        else
        {
//            $_SESSION['Fname']=$_SESSION['name'];
//            $_SESSION['Lname']=null;
              $name[1]=null;
        }
//        $_SESSION['Password']=$_POST['password'];
        try {
            $db=new mysqli('localhost','root','','Anchor');
            $qryString="select * from MyAccounts where Fname='" .$name[0]. "'and Lname='".$name[1]."' and password = '".sha1($_POST['password'])."'" ;
            $res=$db->query($qryString);
            $row= $res->fetch_assoc();
            if(isset($row['Adminuser'])){

                if($row['Adminuser']==1)
                {   $_SESSION['Fname']=$row['Fname'];
                    $_SESSION['Lname']=$row['Lname'];
                    $_SESSION['email']=$row['Email'];
                    $_SESSION['password']=$row['Password'];
                    $_SESSION['profpic']=$row['ProfPic'];
                    $_SESSION['idaccount']=$row['accountNum'];
                    $_SESSION['adminuser']=$row['Adminuser'];
                    $_COOKIE['img']= $_SESSION['profpic'];
                    header('Location:AdminInterface.php');
                }

                else if($row['Adminuser']==0){
                    $_SESSION['Fname']=$row['Fname'];
                    $_SESSION['Lname']=$row['Lname'];
                    $_SESSION['email']=$row['Email'];
                    $_SESSION['password']=$row['Password'];
                    $_SESSION['profpic']=$row['ProfPic'];
                    $_SESSION['idaccount']=$row['accountNum'];
                    $_SESSION['adminuser']=$row['Adminuser'];
                    $_COOKIE['img']= $_SESSION['profpic'];

                    header('Location:UserInterface.php');
                }
            }

        }
        catch (Exception $e){

        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anchor</title>
    <link rel="stylesheet" href="Login.css">
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

        <form method="post" action="SignIn.php">
            <h2>Sign In</h2>
            <div class="inputBox">
                <input type="text" name="username" required>
                <label>User Name</label>
                <i></i>
            </div>
            <br>
              <?php

              if(isset($_POST['username'])&&isset($_POST['password'])){
                  try{
              $db=new mysqli('localhost','root','','Anchor');
              $qryString="select Fname from MyAccounts where Fname='".$_SESSION['Fname']."'and Lname='".$_SESSION['Lname']."'";
              $res=$db->query($qryString);
              $row=$res->fetch_assoc();

               if(isset($row['Fname']))
                 {
                     ?>
                     <p style="color: red">*wrong name please try again</p>
            <?php
                 }

                  }
                  catch (Exception $e)
                  {
                      echo "osama theres an exception here";
                  }
               }
              ?>

            <div class="inputBox">
                <input type="password" name="password" required>
                <label>Password</label>
                <i></i>
            </div>
            <br>
            <?php

            if(isset($_POST['username']) && isset($_POST['password'])){
                try{
                    $db=new mysqli('localhost','root','','Anchor');
                    $qryString="select Password from MyAccounts where Password = '".sha1($_POST['password'])."'";

                    $res=$db->query($qryString);
                    $row=$res->fetch_assoc();

                    if(!isset($row['Password']))
                    {
                        ?>
                        <p style="color: red">*wrong Password please try again</p>
                        <?php
                    }
//                    $db->close();

                }
                catch (Exception $e)
                {
                    echo "osama theres an exception here";
                }
            }
            ?>



            <div class="link">
                <a href="ForgetPass.html">Forgot The Password</a>
                <a href="SignUp.php">Sign Up</a>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
<!--x-->