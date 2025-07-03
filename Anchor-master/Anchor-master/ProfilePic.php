<?php
session_start();
if(isset($_POST['update']))
        {
            $_SESSION['profpic'] = $_COOKIE['img'];
            $db = new mysqli('localhost', 'root', '', 'Anchor');
            $qryString = "Update  MyAccounts set ProfPic='" . $_COOKIE['img'] . "'where accountNum='" . $_SESSION['idaccount'] . "'";
            $db->query($qryString);

        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anchor</title>
    <link rel="stylesheet" href="ProfilePic.css">

    <script>
        function change() {
            const inputFile = document.querySelector('#file');
            const selectImage = document.querySelector('.select-image');
            selectImage.addEventListener('click', function () {
                inputFile.click();
            })
            inputFile.addEventListener('change', function () {
                const image = this.files[0]
                alert(image.name);
                document.getElementById('imgch').src="image/"+image.name;
                document.cookie="img=image/"+image.name;

                if(image.size < 2000000) {
                    const reader = new FileReader();
                    reader.onload = ()=> {
                        const allImg = imgArea.querySelectorAll('.imgup');
                        allImg.forEach(item=> item.remove());
                        const imgUrl = reader.result;
                        const img = document.createElement('img');
                        img.src = imgUrl;

                        // imgArea.appendChild(img);
                        // imgArea.classList.add('active');
                        // imgArea.dataset.img = image.name;
                        alert(image.name);
//                        document.getElementById('imgch').src="image/"+image.name;
                    }
             //       reader.readAsDataURL(image);

                }
                else {
                    alert("Image size more than 2MB");
                }

            })

        }
    </script>

    <script>
        function changeName(){
//           event.preventDefault();
            <?php

           if(isset($_POST['newname'])){
            $name=explode(" ", $_POST['newname']);
            $db=new mysqli('localhost','root','','Anchor');
            $qryString="Update  MyAccounts set Fname='".$name[0]."',Lname='".$name[1]."' where accountNum='".$_SESSION['idaccount']."'";
            $_SESSION['Fname']=$name[0];
            $_SESSION['Lname']=$name[1];
            $db->query($qryString);
         //   header('location:ProfilePic.php');
            }
            ?>
        }

        function changePass(){
//           event.preventDefault();
            <?php

            if(isset($_POST['oldpassword']) && isset($_POST['newpassword'])){
               if(sha1( $_POST['oldpassword']) == $_SESSION['password'] ) {
                   $db = new mysqli('localhost', 'root', '', 'Anchor');
                   $qryString = "Update  MyAccounts set Password='" . sha1($_POST['newpassword']) . "' where accountNum='" . $_SESSION['idaccount'] . "'";
                   $_SESSION['password'] =sha1($_POST['newpassword']);
                   $db->query($qryString);
               }
                //   header('location:ProfilePic.php');
            }
            ?>
        }



    </script>
</head>
<body>
        <header class="sticky">
            <a href="#" class="logo">Anchor</a>
            <ul class="nav">
                <li><a href="UserInterface.php#home">Home</a></li>
                <li><a href="UserInterface.php#about">About</a></li>
                <li><a href="UserInterface.php#events">Events</a></li>
                <li><a href="SignIn.php">Sign Out</a></li>
                <li><a href="UserInterface.php#contact">Contact</a></li>
            </ul>
            <div class="toggleMenu">

            </div>

        </header>

        <article>
                <div class="content">
                    <input type="file" name="image" id="file" accept="image/*" hidden>
                    <img src="<?php echo $_SESSION['profpic'];?>" id="imgch" alt="ProfPic" class="imgup">
                    <div class="buttons">
                        <button class="select-image" onclick="change()"> Upload Photo</button>

                        <button onclick="">Sign out</button>
                    </div>
                    <form method="post">
                    <button type="submit" name="update" >Save</button>
                    </form>
                </div>
                <div class="information" style="width: 100%">
                    <div class="space">
                        <div>
                            <span>User Name: </span>
                            <span> <?php echo $_SESSION['Fname'] . " " . $_SESSION['Lname'] ;?></span>
                            <button id="button" ">Edit Name</button>
                        </div>
                        <div>
                            <span>Email: </span>
                            <span> <?php echo $_SESSION['email']  ;?></span>
                        </div>
                        <div class="hov">
                            <span id="changePass">If you want to change password click here</span>
                        </div>


                    </div>
                    <hr style="width: 100%; margin-top: 20px ;margin-bottom: 20px">
                    <div class="statics">
                        <table class="table">
                            <caption>Statistics of events that you announced</caption>
                            <tr>
                                <th>name of event</th>
                                <th>number of registers</th>
                                <th>total money</th>
                                <th>Full?</th>
                            </tr>
                            <?php

                            $db=new mysqli('localhost','root','','Anchor');
                            $qryString="select * from Event where Event.accountNum='".$_SESSION['idaccount']."'" ;
                            $res=$db->query($qryString);
                            while ($row= $res->fetch_assoc())
                            {
                             ?>
                                <tr>
                                    <td> <?php echo $row['EventName'];?> </td>
                                    <td> <?php echo $row['NumberOfParticipants'];?> </td>
                                    <td> <?php echo $row['EventPrice']*$row['NumberOfParticipants'] . '$';?> </td>
                                    <td> <?php if ($row['NumberOfParticipants']==$row['MaxNumberOfParticipant']) echo "yes";else echo "no"; ?> </td>
                                </tr>

                            <?php
                            }
                            ?>
                        </table>

                    </div>
                </div>

        </article>
        <form id="name-form" method="post">
        <div class="popup">
            <div class="popup-content">
                <img src="image/icons8-close-32.png" id="close" >

                <div>

                    <label>Enter The New Name</label>
                    <input type="text" name="newname" required>

                </div>
                <input type="submit" onclick="changeName();">

            </div>
        </div>
        </form>
     <form method="post">
        <div class="popup2">
            <div class="popup-content2">
                <img src="image/icons8-close-32.png" id="close1" >
                <div>
                    <label for="password">Enter The Old Password:</label>
                    <input type="password" id="password" name="oldpassword" required>
<!--                    <img src="image/icons8-eye-48.png" id="eyeold">-->
                </div>
                <div>
                    <label>Enter The New Password:</label>
                    <input type="password" name="newpassword" required>
<!--                    <img src="image/icons8-eye-48.png" id="eyenew">-->
                </div>
                <input type="submit" onclick="changePass();">

            </div>
        </div>
     </form>

        <script>
            document.getElementById("button").addEventListener("click",function (){
                document.querySelector(".popup").style.display="flex";
            })
            document.getElementById("close").addEventListener("click",function (){
                document.querySelector(".popup").style.display="none";
            })



            document.getElementById("changePass").addEventListener("click",function (){
                document.querySelector(".popup2").style.display="flex";
            })
            document.getElementById("close1").addEventListener("click",function (){
                document.querySelector(".popup2").style.display="none";
            })

        </script>

</body>
</html>
<!--x-->