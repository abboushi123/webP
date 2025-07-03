<?php

session_start();
if(isset( $_SESSION['profpic']))
   {
        $_SESSION['profpic'] = str_replace('\\', '/', $_SESSION['profpic']);
        $_SESSION['profpic'] = str_replace('C:', '', $_SESSION['profpic']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anchor</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="UserInterface.css">

</head>



<body>
<header class="sticky" >
    <a href="#" class="logo">Anchor</a>
    <ul class="nav">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#events">Events</a></li>
        <li><a href="#" class="<?php

            if(isset($_SESSION['idaccount'])){
                echo "addevent";
            }
            else echo "mustsign";

            ?>">
                Add Events</a></li>
        <li><a href="SignIn.php"><?php  if(isset($_SESSION['idaccount'])) { ?>Sign Out <?php } else {?>Sign In <?php }   ?></a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
    <div class="action">
        <div class="searchBox">
            <a href="#"><i class='bx bx-search'></i></a>
            <input type="text" placeholder="search events">
        </div>
    </div>
    <div>
        <a href="ProfilePic.php" class="user">
            <img src="image/profImg.jpg" class="user-img" id="profpic">
                 <?php
                 if (isset($_SESSION['profpic']))
                 {
                     ?>
                     <script>
                         document.getElementById('profpic').src="<?php echo $_SESSION['profpic']?>";
                     </script>
                     <?php
                 }
                 ?>

        </a>

    </div>
    <div class="toggleMenu">

    </div>
    <div class="toggleMenu" onclick="toggleMenu();"></div>

</header>

    <!-- Home banner-->
    <div class="banner" id="home">
        <div class="bg">
            <div class="content">
                <h2>Join our family</h2>
                <p style="font-size: 20px;"> <br>Here you will find your <br>interests and things to join. </p>
                <a href="#" class="btn"> join now </a>
            </div>
            <img src="image/Anchor.jpg" id="yazan">
        </div>
    </div>
    <!-- about-->
    <div class="about" id="about">
        <div class="contentBx">
            <h2>About Us </h2>
            <pre style="margin-top: 20px ; font-size: 20px">                               Anchor is a website that let companies or individuals post their events online to people who are
                interested to join them.People can do that easily by creating an account and pay for their seats right away on
                the site.Admins are selected people that monitor events and receive notices from people to keep the site as
                efficient as possible.Our world has changed a lot towards the entertainment side of stuff. It’s necessary
                to have a platform that organizes these events from all types to  make it easier for the owners to sell
                and people to easilyfind and buy.</pre>
            <a href="#">Read more</a>
        </div>
        <img src="image/about-us.png">
    </div>
    <!--ads-->
    <div class="ads" id="events">
        <h2>Popular Ads</h2>
        <ul>
            <li class="list active" data-filter="all" >All Events</li>
            <li class="list" data-filter="course">Courses</li>
            <li class="list" data-filter="tournament">Tournaments</li>
            <li class="list" data-filter="sports">Sports</li>

        </ul>
        <div class="cardBx">

        <?php
        try {
            $db=new mysqli('localhost','root','','Anchor');
            $qryString="select * from event where isdeleted='0'" ;
            $res=$db->query($qryString);
            while ($row= $res->fetch_assoc()){

//                  echo "<script> alert(".$row['Type']."); </script>";
            ?>
            <div id="<?php echo $row['Id'];?>" class="card" data-item="<?php echo $row['Type'];?>">
                <img src=<?php echo $row['EventPic'];?>>
                <div class="content">
                    <h4> <?php echo $row['EventName'];?> </h4>
                    <div class="progress-line"> <span class="proline" style="width: <?php $width=($row['NumberOfParticipants']/$row['MaxNumberOfParticipant'])*100; echo $width ?>% ; <?php if($row['NumberOfParticipants']==$row['MaxNumberOfParticipant']){?> background-color: red; box-shadow:0 0 10px red; <?php } ?>  " ></span> </div>
                    <div class="info">
                        <p>Pricing <br><span>$ <?php echo $row['EventPrice'];?></span></p>
                        <a href="#" id="<?php echo $row['Id'];?>"  onclick="passid();" class="joinNow">Join Now</a>
                        <a href="#" class="button" onclick="showdesc(this)">Description</a>
                    </div>
                </div>
            </div>


              <?php
            }
            $db->close();
        }

        catch (Exception $e){

        }

        ?>
            <div class="popup">
                <div class="popup-content">
                    <img src="image/icons8-close-32.png" id="close" >

                       <p id="evname">Name of event : </p>
                       <p id="evemail">email of announcer: </p>
                        <pre id="desc">

                        </pre>

                </div>
            </div>

            <div class="popupjoin">
                <div class="popup-contentjoin">

                    <img src="image/icons8-close-32.png" id="close1" >
                    <form method="post">
                        <span>

                        <div class="wave-group">
                                    <input required name="fullname" type="text" class="input">
                                    <span class="bar"></span>
                                    <label class="label">
                                        <span class="label-char" style="--index: 0">F</span>
                                        <span class="label-char" style="--index: 1">u</span>
                                        <span class="label-char" style="--index: 2">l</span>
                                        <span class="label-char" style="--index: 3">l</span>
                                        <span class="label-char" style="--index: 4">N</span>
                                        <span class="label-char" style="--index: 5">a</span>
                                        <span class="label-char" style="--index: 6">m</span>
                                        <span class="label-char" style="--index: 7">e</span>
                                    </label>
                                </div>


                        </span>


                        <span>
                                <div class="wave-group">
                                    <input required name="emailreg" type="email" class="input">
                                    <span class="bar"></span>
                                    <label class="label">
                                        <span class="label-char" style="--index: 0">E</span>
                                        <span class="label-char" style="--index: 1">m</span>
                                        <span class="label-char" style="--index: 2">a</span>
                                        <span class="label-char" style="--index: 3">i</span>
                                        <span class="label-char" style="--index: 4">l</span>
                                    </label>
                                </div>
                        </span>

                        <span>
                                <div class="wave-group">
                                    <input required name="emailreg" type="email" class="input">
                                    <span class="bar"></span>
                                    <label class="label">
                                        <span class="label-char" style="--index: 0">C</span>
                                        <span class="label-char" style="--index: 1">r</span>
                                        <span class="label-char" style="--index: 2">i</span>
                                        <span class="label-char" style="--index: 3">d</span>
                                        <span class="label-char" style="--index: 4">i</span>
                                        <span class="label-char" style="--index: 5">t</span>
                                        <span class="label-char" style="--index: 6">N</span>
                                        <span class="label-char" style="--index: 7">u</span>
                                        <span class="label-char" style="--index: 8">m</span>
                                        <span class="label-char" style="--index: 9">T</span>
                                        <span class="label-char" style="--index: 10">o</span>
                                        <span class="label-char" style="--index: 11">p</span>
                                        <span class="label-char" style="--index: 12">a</span>
                                        <span class="label-char" style="--index: 13">y</span>
                                    </label>
                                </div>
                        </span>
                        <span>
                            <input type="submit" name="join" value="regester">
                        </span>

                </form>


                </div>
            </div>




            <script>
                function passid() {


                    var link = document.querySelectorAll('.joinNow');
                    var id;
                    for (var i = 0; i < link.length; i++) {

                        link[i].addEventListener('click', function () {

                            id = event.target.getAttribute('id');
                            document.cookie="id="+id;
                            alert(id);
                            //                          return;

                        });

                    }

                }

            </script>


            <?php

            if(isset($_POST['join'])){

                echo "<script> alert('cooke=".$_COOKIE['id']."')</script>";


                //                    echo "<script> console.log('hiJoin');</script>";
                $db=new mysqli('localhost','root','','Anchor');
                $qryString="select max(MemberId) from registers";
                $res=$db->query($qryString);
                $row=$res->fetch_assoc();
                echo "<script> console.log('max=".$row['max(MemberId)']."')</script>";


                $_SESSION['emailreg']=$_POST['emailreg'];
                $_SESSION['fullname']=$_POST['fullname'];
                $_SESSION['MemberId']=$row['max(MemberId)'];



                $qryString=" INSERT INTO registers (`MemberId`, `FullName`, `RegisterEmail`, `Id`) VALUES ('".++$row['max(MemberId)']."', '".$_POST['fullname']."','".$_POST['emailreg']."','".$_COOKIE['id']."');";
                $hi= $db->query($qryString);

                //             echo "<script> document.cookie='id=';</script>";
            }
            ?>




            <div class="popupmustsign">
                <div class="popup-contentmustsign">
                    <img src="image/icons8-close-32.png" id="close2" >
                    <p> you must sign in </p>
                    <div>
                           <span><input onclick="window.location.href='SignIn.php'" type="submit" value="Sing In"></span>
                           <span><input   onclick="document.querySelector('.popupmustsign').style.display = 'none';
                          document.body.style.overflow = 'auto'; " type="submit" value="cancel"></span>
                    </div>

                </div>
            </div>


            <div class="popupaddevent">
                <div class="popup-contentaddevent">
                    <img src="image/icons8-close-32.png" id="close3" >
                    <div style=" display: flex; flex-direction: row; justify-content: space-between">

                        <div style="display: flex; flex-direction: column; ">
                            <form method="post">

                                <div class="wave-group">
                                    <input required="" name="eventname" type="text" class="input">
                                    <span class="bar"></span>
                                    <label class="label">
                                        <span class="label-char" style="--index: 0">N</span>
                                        <span class="label-char" style="--index: 1">a</span>
                                        <span class="label-char" style="--index: 2">m</span>
                                        <span class="label-char" style="--index: 3">e</span>
                                    </label>
                                </div>

                                <div class="wave-group">
                                    <input required="" name="eventprice" type="number" min="0" class="input">
                                    <span class="bar"></span>
                                    <label class="label">
                                        <span class="label-char" style="--index: 0">P</span>
                                        <span class="label-char" style="--index: 1">r</span>
                                        <span class="label-char" style="--index: 2">i</span>
                                        <span class="label-char" style="--index: 3">c</span>
                                        <span class="label-char" style="--index: 4">e</span>
                                    </label>
                                </div>

                                <div class="wave-group">
                                    <input required="" name="maxnum" type="number" min="0" class="input">
                                    <span class="bar"></span>
                                    <label class="label">
                                        <span class="label-char" style="--index: 0">M</span>
                                        <span class="label-char" style="--index: 1">a</span>
                                        <span class="label-char" style="--index: 2">x</span>
                                        <span class="label-char" style="--index: 3"> </span>
                                        <span class="label-char" style="--index: 4">N</span>
                                        <span class="label-char" style="--index: 5">o</span>
                                        <span class="label-char" style="--index: 6">.</span>
                                        <span class="label-char" style="--index: 11">O</span>
                                        <span class="label-char" style="--index: 12">f</span>
                                        <span class="label-char" style="--index: 13"> </span>
                                        <span class="label-char" style="--index: 14">P</span>
                                        <span class="label-char" style="--index: 15">a</span>
                                        <span class="label-char" style="--index: 16">r</span>
                                        <span class="label-char" style="--index: 17">t</span>
                                        <span class="label-char" style="--index: 18">i</span>
                                        <span class="label-char" style="--index: 19">c</span>
                                        <span class="label-char" style="--index: 20">i</span>
                                        <span class="label-char" style="--index: 21">p</span>
                                        <span class="label-char" style="--index: 22">a</span>
                                        <span class="label-char" style="--index: 23">n</span>
                                        <span class="label-char" style="--index: 24">t</span>
                                    </label>
                                </div>

                                <div class="wave-group">
                                    <textarea required="" name="eventdesc" type="text"  class="input"></textarea>
                                    <span class="bar"></span>
                                    <label class="label">
                                        <span class="label-char" style="--index: 0">D</span>
                                        <span class="label-char" style="--index: 1">e</span>
                                        <span class="label-char" style="--index: 2">s</span>
                                        <span class="label-char" style="--index: 3">c</span>
                                        <span class="label-char" style="--index: 4">r</span>
                                        <span class="label-char" style="--index: 5">i</span>
                                        <span class="label-char" style="--index: 6">p</span>
                                        <span class="label-char" style="--index: 7">t</span>
                                        <span class="label-char" style="--index: 8">i</span>
                                        <span class="label-char" style="--index: 9">n</span>
                                    </label>
                                </div>

                                <div>

                                  <p style="font-size: 20px; color: #515151" > Pick the unwanted event's categories</p>

                                </div>

                                <div>

                                    <div  style="display: flex; flex-direction: row;">

                                        <div class="checkbox-wrapper-10">
                                            <input checked="" value="course" name="course" type="checkbox" id="cb5" class="tgl tgl-flip">
                                            <label for="cb5" data-tg-on="Courses" data-tg-off="Nope" class="tgl-btn"></label>
                                        </div>

                                        <div class="checkbox-wrapper-10">
                                            <input checked="" value="tournament" name="tournament" type="checkbox" id="cb6" class="tgl tgl-flip">
                                            <label for="cb6" data-tg-on="Tournament" data-tg-off="Nope" class="tgl-btn"></label>
                                        </div>

                                        <div class="checkbox-wrapper-10">
                                            <input checked="" value="sports" name="sport" type="checkbox" id="cb7" class="tgl tgl-flip">
                                            <label for="cb7" data-tg-on="Sport" data-tg-off="Nope" class="tgl-btn"></label>
                                        </div>
                                    </div>
                                </div>
                        </div>





                    </div>


                    <div  class="container" >
                        <input type="file" name="image" id="file" accept="image/*" hidden>
                        <div class="img-area" data-img="">
                            <i class='bx bxs-cloud-upload icon'></i>
                            <h3>Upload Image</h3>
                            <p>Image size must be less than <span>2MB</span></p>
                            <img src=""  name="imag" class="imgup">
                           </div>

                        <button class="select-image">Select Image</button>

                        <input type="submit" name="regaddevent" id="add" value="add" style="margin-top:90px; margin-right:26px;">

                        </form>

                    </div>

                    <?php
                    if(isset($_POST['regaddevent'])){

                        $db=new mysqli('localhost','root','','Anchor');
                        $qryString="select Id from event where EventName='".$_POST['eventname']."'";

                        $res=$db->query($qryString);
                        $row1=$res->fetch_assoc();
                        if(!isset($row1['Id'])){
                        $sport=$_POST['sport'];
                        $tournament=$_POST['tournament'];
                        $course=$_POST['course'];

                        $qryString="select max(Id) from event";
                        $res=$db->query($qryString);
                        $row=$res->fetch_assoc();


                        $qryString="INSERT INTO `event` (`Id`, `EventName`, `NumberOfParticipants`, `MaxNumberOfParticipant`, `EventPic`, `EventDescription`, `EventPrice`, `Type`, `accountNum`,`isdeleted`) VALUES ('".++$row['max(Id)']."', '".$_POST['eventname']."', '0', '".$_POST['maxnum']."', 'eventpic/".$_COOKIE['imgadd']."', '".$_POST['eventdesc']."', '".$_POST['eventprice']."', '".$sport." ".$tournament." ".$course."', '".$_SESSION['idaccount']."','0');";
                        $hi= $db->query($qryString);

                        }
                    }

                    ?>
                    <script>

                        const selectImage = document.querySelector('.select-image');
                        const inputFile = document.querySelector('#file');
                        const imgArea = document.querySelector('.img-area');

                        selectImage.addEventListener('click', function () {
                            inputFile.click();
                        })

                        inputFile.addEventListener('change', function () {
                            const image = this.files[0]

                            if(image.size < 2000000) {
                                const reader = new FileReader();
                                reader.onload = ()=> {
                                    const allImg = imgArea.querySelectorAll('.imgup');
                                    allImg.forEach(item=> item.remove());
                                    const imgUrl = reader.result;
                                    const img = document.createElement('img');
                                    img.src = imgUrl;

                                    imgArea.appendChild(img);
                                    imgArea.classList.add('active');
                                    imgArea.dataset.img = image.name;
                                    alert(image.name);
                                    document.cookie="imgadd="+image.name;

                                }
                                reader.readAsDataURL(image);
                            }
                            else {
                                alert("Image size more than 2MB");
                            }
                        })



                    </script>

                </div>



            </div>



            <script src="showdesc.js"></script>
            <script src="joinNow.js"></script>
            <script src="mustsign.js"></script>
            <script src="addevent.js"></script>

            <script>

                function showdesc(button){
                    var rootDiv = button.closest('.card');
                    var rootDivId = rootDiv.id;
                    var myArray=[];
                    var decription=[];
                    var Name=[];
                    var ID=[];
                    var IDevent=[];
                    var Email=[];
                    <?php
                    $db=new mysqli('localhost','root','','Anchor');
                    $qryString="select Id,EventDescription,EventName,accountNum from event";
                    $res=$db->query($qryString);
                    while ($row= $res->fetch_assoc()){
                    ?>

                    myArray.push("<?php echo $row['Id'];?>");
                    decription.push("<?php echo $row['EventDescription'];?>");
                    Name.push("<?php echo $row['EventName'];?>");
                    IDevent.push("<?php echo $row['accountNum'];?>");
                    console.log(IDevent);
                    <?php
                    }
                    $qryString="select * from myaccounts";
                    $res=$db->query($qryString);
                    while ($row= $res->fetch_assoc()){
                     ?>
                    ID.push("<?php echo $row['accountNum'];?>");
                    Email.push("<?php echo $row['Email'];?>");
                <?php
                    }
                    ?>

                    for (var i=0 ; i < myArray.length ; i++){
                        if(myArray[i]==rootDivId){
                            document.getElementById('desc').innerText="Event Description:"+decription[i];
                            document.getElementById('evname').innerText="Event Name:"+Name[i];

                            for (var j=0 ; j < IDevent[i]  ; j++)
                            {   if(ID[j]==IDevent[i])
                                {
                                    document.getElementById('evemail').innerText="announcer mail:"+Email[IDevent[i]-1];
                                    break;
                                }
                            }

                        }
                    }


                }

            </script>



        </div>
    </div>



<!--    <script>-->
<!--        // Get all span elements with class "proline"-->
<!--        var spans = document.querySelectorAll('span.proline');-->
<!---->
<!--        // Loop through all spans and add event listener to each one-->
<!--        for (var i = 0; i < spans.length; i++) {-->
<!--            var parentWidth = spans[i].parentElement.offsetWidth; // Get the parent element's width-->
<!--            if (spans[i].offsetWidth === parentWidth) {-->
<!--                spans[i].style.backgroundColor = 'red'; // Change background color to red-->
<!--                spans[i].style.boxShadow='0 0 10px red';-->
<!--            }-->
<!---->
<!--            spans[i].addEventListener('resize', function() {-->
<!--                // Check if span's width is equal to its parent's width-->
<!--                if (this.offsetWidth === parentWidth) {-->
<!--                    this.style('backgroundColor: red;'); // Change background color to red-->
<!--                } else {-->
<!--                    this.style.backgroundColor = ''; // Reset background color-->
<!--                }-->
<!--            });-->
<!--        }-->
<!---->
<!---->
<!---->
<!---->
<!--    </script>-->

    <!--Contact -->

    <div class="contact" id="contact">
        <img src="image/contact.jpg">

        <div class="form">
            <form method="post">
            <h1>Contact Us</h1>
            <div class="inputBx">
                <p>Enter Name</p>
                <input type="text" name="sendername" required placeholder="Full Name">

            </div>
            <div class="inputBx">
                <p>Enter Email</p>
                <input type="email" name="senderemail" required placeholder="Email...">

            </div>
            <div class="inputBx">
                <p>Message</p>
                <textarea name="msgcontent" required placeholder="Type here...."></textarea>
            </div>
            <div class="inputBx">
                <input type="submit" name="Submit">
            </div>
            </form>
        </div>
</div>




<?php

if(isset($_POST['Submit']))
{
    $_SESSION['sendername']=$_POST['sendername'];
    $_SESSION['senderemail']=$_POST['senderemail'];
    $_SESSION['msgcontent']=$_POST['msgcontent'];

    $db=new mysqli('localhost','root','','Anchor');
    $qryString="select max(id) from feedback";
    $res=$db->query($qryString);
    $row=$res->fetch_assoc();

    echo "<script> alert(".$row['max(id)'].") </script>";

    $qryString=" INSERT INTO `feedback` (`id`, `sendername`, `senderemail`, `msgcontent`) VALUES ('".++$row['max(id)']."', '".$_SESSION['sendername']."', '".$_SESSION['senderemail']."', '".$_SESSION['msgcontent']."');";
    $hi= $db->query($qryString);


}
?>

</article>
<!-- Footer -->
<footer>
    <div class="info">
        <a href="#" class="logo">Anchor</a>
        <p><i class='bx bx-copyright'></i>2023 all rights reserved</p>
        <ul>
            <li><a href="#"><i class='bx bxl-facebook' ></i></a></li>
            <li><a href="#"><i class='bx bxl-instagram' ></i></a></li>
            <li><a href="#"><i class='bx bxl-twitter' ></i></a></li>
            <li><a href="#"><i class='bx bxl-youtube' ></i></a></li>
        </ul>
    </div>
</footer>






<script>
    /*steaky navbar*/
    window.addEventListener('scroll',function(){
        var header =document.querySelector('header');
        header.classList.toggle('sticky',window.scrollY >0);
    });
    /*responsive nav bar*/
    function toggleMenu(){
        const toggleMenu =document.querySelector('.toggleMenu');
        const nav =document.querySelector('.nav');
        toggleMenu.classList.toggle('active')
        nav.classList.toggle('active')
    }
    /*Filterable Cards*/
    let list =document.querySelectorAll('.list');
    let card=document.querySelectorAll('.card');
    for(let i=0;i<list.length;i++){
        list[i].addEventListener('click',function (){
            for (let j=0;j<list.length;j++){
                list[j].classList.remove('active');
            }
            this.classList.add('active');

            let dataFilter=this.getAttribute('data-filter');

            for(let k=0;k<card.length;k++){
                card[k].classList.remove('active');
                card[k].classList.add('hide');
                if(card[k].getAttribute('data-item').toLowerCase().indexOf(dataFilter.toLowerCase())!==-1 ||dataFilter=='all'){
                    card[k].classList.remove('hide');
                    card[k].classList.add('active');
                }

            }
        })
    }
</script>
</body>
</html>
<!--x-->