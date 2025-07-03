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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anchor</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="AdminInterface.css">


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




</head>
<body>
    <header class="sticky">
        <a href="#" class="logo">Anchor</a>
        <ul class="nav">
            <li><a href="#">Event Statics</a></li>
            <li><a href="#">Feedback</a></li>
            <li><a href="SignIn.php">Sign Out</a></li>
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

                <button onclick ="window.location.assign('SignIn.php');">Sign out</button>

            </div>
            <form method="post">
                <button type="submit" name="update" >Save</button>
            </form>


            <div class="admin-info">
                <div>
                    <span>User Name: </span>
                    <span> <?php echo $_SESSION['Fname'] . " " .$_SESSION['Lname']?></span>

                </div>
                <div>
                    <span>Email: </span>
                    <span> <?php echo $_SESSION['email']?></span>
                </div>

            </div>
        </div>
            <div class="reorder">
                <div class="statics">
                    <table class="table">
                        <caption>Statistics of all events in the web site</caption>

                        <tr>
                            <th>name of event</th>
                            <th>number of registers</th>
                            <th>Price</th>
                            <th>Full?</th>
                            <th>Delete</th>
                        </tr>

                        <?php
                        $db=new mysqli('localhost','root','','Anchor');
                        $qryString="select * from Event where isdeleted='0'" ;
                        $res=$db->query($qryString);
                        while ($row= $res->fetch_assoc())
                        {
                            ?>

                            <tr>
                                <td> <?php echo $row['EventName'];?> </td>
                                <td> <?php echo $row['NumberOfParticipants'];?> </td>
                                <td> <?php echo $row['EventPrice'].'$';?> </td>
                                <td> <?php if ($row['NumberOfParticipants']==$row['MaxNumberOfParticipant']) echo "yes";else echo "no"; ?> </td>
                              <form method="post">
                               <td> <input name="rowid" value="<?php echo $row['Id'];?>" hidden type="text"><button type="submit" name="delbutton" >Delete</button></td>
                              </form>
                            </tr>

                            <?php
                        }

                        if(isset($_POST['delbutton']))
                      //  echo "<script> alert(".$_POST['rowid']."); </script>";
                            $qryString="UPDATE `event` SET `isdeleted`='1' WHERE Id='".$_POST['rowid']."'";
                            $res=$db->query($qryString);

                        ?>
                    </table>

                </div>

            <div class="statics">
                <table class="table">
                    <caption>Reports from users</caption>
                    <tr>
                        <th>Sender Name</th>
                        <th>Sender Email</th>
                        <th>Feedback</th>
                        <th>Seen</th>
                    </tr>

                    <?php
                    $db=new mysqli('localhost','root','','Anchor');
                    $qryString="select * from feedback " ;
                    $res=$db->query($qryString);
                    while ($row= $res->fetch_assoc())
                    {
                        ?>

                        <tr>
                            <td> <?php echo $row['sendername'];?> </td>
                            <td> <?php echo $row['senderemail'];?> </td>
                            <td> <?php echo $row['msgcontent'].'$';?> </td>
                            <td> no </td>

                        </tr>

                        <?php
                    }
                    ?>

                </table>
            </div>
        </div>
        <div class="popup">
            <div class="popup-content">
                <img src="image/icons8-close-32.png" id="close" >
                <div>
                    <label>Enter The New Name</label>
                    <input type="text">
                </div>
                <input type="submit">

            </div>
        </div>


        <div class="popup2">
            <div class="popup-content2">
                <img src="image/icons8-close-32.png" id="close1" >
                <div>
                    <label for="password">Enter The New Password:</label>
                    <input type="password" id="password" name="password">
                    <!--                    <img src="image/icons8-eye-48.png" id="eyeold">-->
                </div>
                <div>
                    <label>Enter The New Password:</label>
                    <input type="password">
                    <!--                    <img src="image/icons8-eye-48.png" id="eyenew">-->
                </div>
                <input type="submit">

            </div>
        </div>
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

    </article>
</body>
</html>
<!--d-->