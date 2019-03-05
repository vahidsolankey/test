<?php
error_reporting(NULL);
$servername = "localhost";
$username = "root";
$password = "pass";
$dbName = "impetussite";
// echo "Connected successfully";
$timeScript = '<script type="text/javascript">
  setTimeout(function () {    
    window.location.href = "index.php"; 
},3000);
</script>';
$emailErr = "";
$email = "";
if (isset($_POST["submit"]) && !empty($_POST["submit"]))
  {
  if (empty($_POST["email"]))
    {
    $emailErr = "*Email is required";
    }
    else
    {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
      {
      $emailErr = "*Invalid Email format";
      }
      else
      {
      $sql = "SELECT * from user_email where (email='$email');";
      $res = mysqli_query($conn, $sql);
      if (mysqli_num_rows($res) > 0)
        {
        $row = mysqli_fetch_assoc($res);
        if ($email == $row['email']){
          $emailErr = "*Your Email is already exist";
          }
        }
        else
        {
        $sql = "INSERT INTO user_email (email) VALUES ('" . $_POST["email"] . "')";
        if ($conn->query($sql) === TRUE)
          {
          $t = date("s");
          if ($t < "2")
            {
            header("Location: index.php");
            }
            else
            {
            $successfully = '<div style="opacity: 1; color: #878aa0;margin-top:30px; background-color: #dff0d8;border-color: #d6e9c6;padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Your Requst successfully generated</div>';
             echo $timeScript;
            }
          }
          else
          {
          echo "Error: " . $sql . "<br/>" . $conn->error;
          }
        // $conn->close();
        }
      }
    }
  }

function test_input($data)
  {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
?>
<?php
$emailError = "";
$email2 = "";
$nameError = "";
$name = "";
$phone = "";
if (isset($_POST["contect"]) && !empty($_POST["contect"]))
  {
    $int = 10;

  if (empty($_POST["name"]))
    {
    $nameError = "Name is required";
    }
  elseif (!preg_match("/^[a-zA-Z ]*$/", $name))
    {
    $nameError = "Only letters and white space allowed";
    }
if (empty($_POST["phone"])){
    $phoneError="Phone is Required";
  }
  // if (empty($_POST["phone"])){
  //   $phoneError="Phone is Required";
  // }
  //  elseif (!filter_var($_POST['phone'], FILTER_VALIDATE_INT)) {
  //         $phoneError = "Invalid Phone format"; 
  //         }

  /*if(!empty($phone)) // phone number is not empty
{
    if(preg_match('/^\d{10}$/',$phone)) // phone number is valid
    {
      $phone = '0' . $phone;
      $phoneError = "hiufrhodiushiudh";
    }
  }
}*/
  if (empty($_POST["email2"]))
    {
    $formError = '<div style="opacity: 1; margin-top:30px; color: #878aa0;
background-color: #ff747429;padding: 15px;
margin-bottom: 20px;
border: 1px solid transparent;
border-radius: 4px;">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
* form is not submited</div>';
$emailError = "* Email in Required";
    }
    else
    {
    $email2 = test_input($_POST["email2"]);
    if (!filter_var($email2, FILTER_VALIDATE_EMAIL))
      {
      $emailError = "Invalid email format";
      $row = mysqli_fetch_assoc($res);
      }
      else
      {
      $sql = "SELECT * from user_form where (email2='$email2');";
      $res = mysqli_query($conn, $sql);
      if (mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
        }
      if ($email2 == $row['email2']){
        $emailError = "email already exists";
        }
        
    if(!preg_match("/^\d{10}+$/", $_POST['phone'])){
         $phoneError= "Only Numbers with 10 Digits required";
}

       
   elseif (!filter_var($_POST['phone'], FILTER_VALIDATE_INT)) {
          $phoneError = "Invalid Phone format"; 
          }
          else{
        $sql = "INSERT INTO `user_form`(`name`, `phone`,`email2`,`company`) VALUES ('" . $_POST["name"] . "','" . $_POST["phone"] . "','" . $_POST["email2"] . "','" . $_POST["company"] . "')";
          if ($conn->query($sql) === TRUE){
            $formSubmit = '<div style="opacity: 1; margin-top:30px; color: #878aa0;
            background-color: #dff0d8;border-color: #d6e9c6;padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Your Requst successfully generated</div>';
            echo $timeScript;
            }
          else
          {
          echo "Error: " . $sql . "<br />" . $conn->error;
          }
        }
      }
    }
  }

?>
 <style type="text/css">
     @media screen and (max-width: 600px) {
.h1-responsive{
     font-size: 26px !important;   
  }
  .fnt_txt_larg{
    font-size:19px !important;
    }
    
    .moble-txt-fnt{
    font-size:13px !important;
    margin-top:10px !important;
    }

    .icon-3{
      margin-bottom: -23px;
    }
.Impetus-img {
    width: 100px;
    height: 100px;
    position: absolute;
    margin-left: -66px;
    top: 17%;
    -webkit-animation: spin 20s cubic-bezier(0, 0, .0, 0);
    animation-iteration-count: infinite;
}
.fnt_txt_moble >b{
    font-size: 25px;
}
.v_hlp_u_txt >b{
  font-size:16px;
}
       .v_hlp_u_txt{
   margin-left:0% !important;
   animation-duration: 5s;
   top: 4% !important;
   }
.Bg-Change {
    position: relative;
    animation-name: example;
    animation-duration: 20s;
    animation-iteration-count: infinite;
    height: 154px !important;
}


   .sliderDivSize{
      height: 220px;
   }
 }
@media screen and (min-width: 700px) {
  .btnMs{
      margin-right: 20px !important;
    }
    .topButton{
      padding-left: 83px;
    }
     .sliderDivSize{
      height: 280px !important;
   }
      .sizeLg{
      width: 80px; 
      height: 80px;
   }
      
        .Impetus-img {
    width: 200px;
    height: 200px;
    position: absolute;
    margin-left: -124px;
    top: 18%;
    -webkit-animation: spin 20s cubic-bezier(0, 0, .0, 0);
    animation-iteration-count: infinite;
    }
    .dev-form-space{
    min-height:290px;
    border-radius:4px;
    border:3px solid #e7e7e7;
    box-shadow:0px 0px 0px 1px;
    }
    .fnt_txt_larg{
    font-size:19px !important;
    }
    .cng-text{
          color: #3e4c5f !important;
    font-weight: normal;
    background-color: white;
    font-family: Lato !important;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-smoothing: antialiased;
    text-shadow: 0 0 1px transparent;
    }
</style>
<html>

<head>
    <title>Impetus Consulting - Human Resource & Growth Consulting Firm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="animat/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" type="text/css" href="impetus.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body class="px-0">
    <div class="col-lg-12 ml-auto mr-auto">
        <div class="row mt-4">
            <div class="col-lg-7 col-12">
                <img class="ml-lg-5" src="Impetus_img/logo.png">
            </div>
            <div class="col-lg-5 d-none d-lg-block col-12 topButton">
                <span class="d-md-block float-left ml-5 pl-3  mt-3 d-none" style="float:right; color:#707070">I am looking for</span>
                <!-- <p class="d-block mb-0 d-md-none ">I am looking for</p> -->
                <button type="button" class="btn  bg-white btn-modalClr py-3 px-3 ml-lg-2 mt-md-0 mt-3 topBtn" style="font-size: 14px;float:right;" data-toggle="modal" data-target="#myModal">
                    <b>High Performing Team</b>
                </button>
                <!-- The Modal -->
                <div class="modal" id="myModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content p-lg-3 p-1" style="width: 100%;">
                            <div class="row ml-0 mr-0 mt-4">
                                <div class="col-12 d-block ml-auto mr-auto">
                                    <div class="container ">
                                        <button type="button" class="btn btn-link float-right" data-dismiss="modal">X</button>
                                        <h4 class="text-left">Reach Out to Us</h4>
                                        <h6 class="text-muted text-left ">Get an hour of free consultation and understand how we can help you</h6>
                                        <hr>
                                        <form action="" method="POST" onSubmit="window.location.reload(index.php)">
                                            <div class="row">
                                                <div class="col-lg-6 col-6 col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control py-lg-5" name="name" placeholder="Name" value="<?php echo $name; ?>">
                                                        <span class="text-danger float-left"><?php echo $nameError; ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-6 col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control py-lg-5" name="phone" placeholder="Phone Number" maxlength="10" minlength="10" value="<?php echo $phone; ?>">
                                                        <span class="text-danger float-left"><?php echo $phoneError; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control py-lg-5" name="email2" placeholder="Email" value="<?php echo $email2; ?>">
                                                <span class="text-danger float-left"><?php echo $emailError; ?></span>
                                                <input type="text" class="form-control py-lg-5 mt-4" name="company" placeholder="company" value="<?php echo $company; ?>" required>
                                            </div>
                                            <input name="contect" type="submit" style="font-size: 20px;" class="btn py-4 Submt-btn btn-sm btn-block text-white">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btnMs bg-white btn-modalClr py-3 px-4 mr-lg-2  mt-lg-0 mt-3" style="font-size: 15px; float:right;">
                    <b>Growth Strategy</b>
                </button>
            </div>
        </div>
        <?= $successfully ?>
        <?= $formSubmit ?>
        <?= $formError ?>
            <div class="row ml-0 mr-0">
              <div class="col-12 col-lg-6 pt-lg-5 mt-2 mb-2 ml-lg-5 p-0 txt-div-fnt">
                  <h1 class="d-md-block d-none pageTitles" style="font-size: 2.5em; font-weight: 400;">Adding value to your
  organization through HR and Growth Consulting</h1>

                            <div class="nav-link mt-2 text- pr-5 p-0" href="#" style="color: #337ab7;">Get an hour of free consulting</div>
                            <form method="POST">

                                <div class="input-group-prepend pl-0">
                                    <input type="text" class="form-control pr-5 p-4" type="text" style="height:66px;" maxlength="50" placeholder="Enter Email" name="email" value="<?php echo $email; ?>">

                                    <button class="btn bg- text-white font-weight-bold" type="submit" name="submit" value="submit" style="background-color: #4B67A3;font-size: 16px; padding-right: 30px;padding-left: 30px;">Know More</button>
                                </div>
                                <span class="text-danger ml-1 pl-2"><?php echo $emailErr; ?></span>
                                <span class="text-danger pl-4 ml-2 mt-0">
                      <?php 
                        if ($emailError != '') {
                          echo $emailErr;
                        }
                      ?></span>
                            </form>

                        </div>
                        <div class="col-12 col-lg-5 p-0 d-lg-block d-none">
                            <img class="w-75 float-right position-relative" src="Impetus_img/imptus_imran.png" style="margin-right: -77px; padding-top:40px;">
                        </div>
                    </div>

                    <div style="background-color: #fafdfd; padding-bottom:50px;">
                        <h2 class="d-md-block text-center mt-2 pt-md-5  d-none pageTitles" style="font-size: 45px;">Here is how we can help you</h2>
                        <h2 class="d-block text-center pt-md-5 mb-0 d-md-none pageTitles" style="font-size: 20px;">Here is how we can help you</h2>
                        <div class="row mt-md-5 pt-5 text-center">
                            <div class="col-lg-6 col-12 pr-lg-5 text-sm-center text-lg-left">
                                <div class="ml-lg-4 pl-lg-5">
                                    <img class="img-logo ml-lg-4" src="Impetus_img/ik.png">
                                    <h6 class="mt-3 cng-text">End to end HR policy and <br>Procedure Implementation</h6>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12 pl-lg-5 text-sm-center text-lg-left">
                                <img class="img-logo  ml-lg-2" src="Impetus_img/ik_1.png">
                                <h6 class="mt-3 cng-text">Long term Strategy Building<br> and Growth Consulting</h6>
                            </div>
                        </div>
                        <div class="col-md-10 ml-md-auto px-0">
                            <div class="row mt-md-5 pt-md-5 text-center">
                                <div class="col-lg-6 col-12 pl-4 text-center">
                                    <img class="img-logo" src="Impetus_img/ik_2.png">
                                    <h6 class="mt-3 cng-text">Inbound/Outbound BPO <br>
                 Services
              </h6>
                                </div>
                                <div class="col-lg-6 col-12 pl-lgq-5 text-center">
                                    <img class="img-logo pl-lg-4" src="Impetus_img/ik_3.png">
                                    <h6 class="mt-3 cng-text pl-md-5">Optimizations through <br>Technology Implementation</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                    <h2 class="d-md-block text-center mt-5 pt-md-5  d-none pageTitles" style="font-size: 45px;font-family: " Segoe UI ",Arial,sans-serif;">We would love to have you here</h2>
                    <h2 class="d-block text-center mt-5 pt-md-5  mb-0 d-md-none pageTitles" style="font-size: 20px;font-family: " Segoe UI ",Arial,sans-serif;">We would love to have you here</h2>
     <div class="row ml-0 mr-0 ">
        <div class="col-lg-3 col-6 p-5 text-center">
            <div class="zoom-2">
                <img class="img-fluid img-size" src="Impetus_img/Alfen_Logo.jpg">
            </div>
        </div>
        <div class="col-lg-3 col-6 p-5 text-center">
            <div class="zoom">
                <img class="img-fluid img-size" src="Impetus_img/Atlier-Logo.png">
            </div>
        </div>
        <div class="col-lg-3 col-6 p-5 text-center">
            <div class="zoom">
                <img class="img-fluid img-size" src="Impetus_img/Cars24_Logo.png">
            </div>
        </div>
        <div class="col-lg-3 col-6 p-5 text-center">
            <div class="zoom">
                <img class="img-fluid img-size" src="Impetus_img/Ethnic_Hub_logo.jpg">
            </div>
        </div>
        <div class="col-lg-3 col-6 p-5 text-center">
            <div class="zoom">
                <img class="img-fluid img-size" src="Impetus_img/Jhandewala_logo.png">
            </div>
        </div>
        <div class="col-lg-3 col-6 p-5 text-center">
            <div class="zoom">
                <img class="img-fluid img-size" src="Impetus_img/Rajesh_Motors_Logo.jpg">
            </div>
        </div>
        <div class="col-lg-3 col-6 p-5 text-center">
            <div class="zoom">
                <img class="img-fluid img-size" src="Impetus_img/Satnam_Motorcorp_Logo.png">
            </div>
        </div>
        <div class="col-lg-3 col-6 p-5 text-center">
            <div class="zoom">
                <img class="img-fluid img-size" src="Impetus_img/T&T_Motors_Logo.jpg">
            </div>
        </div>
    </div>
    </div>

     <script type="text/javascript">
      $( ".zoom" ).hover(function() {
        //alert('hello');
        $('.zoom-2').addClass('zoom');
        $('.zoom-2').removeClass('zoom-2');
        $(this).addClass('zoom-2');
        $(this).removeClass('zoom');
        
      });

    </script>
    <div class="row ml-0 mr-0 mt-lg-5 pt-lg-3 p-0">
        <div class="col-12 col-lg-12 Bg-Change">
            <img class="Impetus-img" src="Impetus_img/impetus_2.png" />
            <h1 class="h1-C text-white carousel animated bounceInRight fnt_txt_moble"><b>How do we help ?</b></h1>
            <h4 class="h5-C text-white carousel animated bounceInRight v_hlp_u_txt"><b>We help you define the right team, right policies and a clear long </b></h4>
            <h5 class="h5-C text-white carousel animated bounceInRight v_hlp_u_txt"><b>term strategy</b></h5>
        </div>
    </div>
    <div class="container">
        

        <!-- 7 -->

        <div class="row ml-0 mr-0">
            <div class="col-12 col-lg-12 mt-lg-3 pt-4">
                <p class="d-md-block text-center mt-5 pt-md-5  d-none pageTitles" style="font-size: 45px;font-family: " Segoe UI ",Arial,sans-serif;">And our Partners are Delighted</p>
            </div>
        </div>

        <!-- 8 -->

        <div class="row ml-0 mr-0">
            <div class="col-lg-9 mt-lg-5 ml-auto mr-auto">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->

                    <ul class="carousel-indicators icon-3">
                        <li class="bg-danger text-light active" data-target="#demo" data-slide-to="0"></li>
                        <li class="bg-danger text-light" data-target="#demo" data-slide-to="1"></li>
                       <!--  <li class="bg-danger text-light" data-target="#demo" data-slide-to="2"></li> -->
                    </ul>

                    <!-- The slideshow -->

                    <div class="carousel-inner shadow">
                        <div class="carousel-item active mt-lg-5 sliderDivSize">
                            <h4 style="line-height: 30px;" class="d-block px-5 ml-auto mr-auto moble-txt-fnt" alt="First slide">Impetus is one such team which is always high on energy , extreme clean on integrity and business ethics. The best part about this team is they understand client requirement at depth and design solutions accordingly totally tailor-made and customised. </h4>
                            <div class="row ml-0 mr-0">
                                <div class="col-4 col-lg-6 p-lg-3">
                                    <img class="float-right img-fluid sizeLg" src="Impetus_img/Instacash.png">
                                </div>
                                <div class="col-8 col-lg-6 p-lg-3">
                                    <h3 class="float-left moble-txt-fnt">Mohit Bhambhani<br><span class="moble-txt-fnt" style="font-size:15px; margin-top:10px;">CEO, Instacash</span></h3>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item  mt-lg-5 sliderDivSize">
                            <h4 style="line-height: 30px;" class="d-block px-5 ml-auto mr-auto moble-txt-fnt" alt="First slide"> Great support, excellent service and the ability to closely understand our requirements. Impetus has really worked wonders for our company. Thank you and hope to have great success in future</h4>
                            <div class="row ml-0 mr-0">
                                <div class="col-4 col-lg-6 p-lg-3">
                                    <img class="float-right img-fluid sizeLg" src="Impetus_img/ss.jpeg">
                                </div>
                                <div class="col-8 col-lg-6 p-lg-3">
                                    <h3 class="float-left moble-txt-fnt">Baran Khan<br><span class="moble-txt-fnt" style="font-size:15px; margin-top:10px;">Founder, SimplySocial Technologies</span></h3>
                                </div>
                            </div>
                        </div>
                      <!--   <div class="carousel-item  mt-lg-5 sliderDivSize">
                            <h4 class="d-block px-5 ml-auto mr-auto moble-txt-fnt" alt="First slide">The quick brouwn fox jumps over the little lazy dog. The quick brouwn fox jumps over the little lazy dog</h4>
                            <div class="row ml-0 mr-0">
                                <div class="col-4 col-lg-6 p-lg-5">
                                    <img class="float-right img-fluid mt-3 sizeLg" src="Impetus_img/iknic_2039.png">
                                </div>
                                <div class="col-8 col-lg-6 p-lg-5">
                                    <h2 class="float-left moble-txt-fnt">Rahul trivedi<br><span class="moble-txt-fnt" style="font-size:20 margin-top:10px;">founder, Ethnic Hub </span></h2>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row ml-0 mr-0 d-none">
            <div class="col-12 col-lg-12 mt-lg-5 pt-2">
                <h1 class="text-center text-muted font-weight-bold">Our Services</h1>
            </div>
            <div class="col-12 col-lg-4 mt-4 pt-lg-5 ml-lg-auto mr-lg-auto">
                <div class="dev-form-space"></div>
            </div>
            <div class="col-12 col-lg-4 mt-4 pt-lg-5 ml-lg-auto mr-lg-auto">
                <div class="dev-form-space"></div>
            </div>
            <div class="col-12 col-lg-4 mt-4 pt-lg-5 ml-lg-auto mr-lg-auto">
                <div class="dev-form-space"></div>
            </div>
        </div>

        <div class="row ml-0 mr-0 ">
            <div class="col-12 col-lg-12 mt-5 text-lg-center">
                <h3 class="txt-spesing-btn text-center Lst-Chrt p-lg-5 h3">We assist
                  <span class="text-info Lst-Chrt font-weight-bold h1"> YOU </span>
                   in setting up long term 
                   <span class="h3 Lst-Chrt">
                     <u style="color: #a4bf21;"> growth strategies</u></span>,
                      <span class="h3 Lst-Chrt" style="color:#f68721;"><u>right 
                  policies</u></span> and an 
                  <span class="h3 Lst-Chrt" style="color:#f17c61;">
                     <u>efficient team</u>
                  </span> structure that can realize your goals
               </h3>
            </div>
        </div>
        <div class="row mb-5 ">
            <div class="col-12 col-lg-6 text-center text-md-right">
                <button class="btn text-white text-md-right border-0 px-lg-4 py-lg-3 font-weight-bold Lst-btn px-4 mt-2 mt-md-2 bgclr-devijn-lst" data-target="#myModal" data-toggle="modal">YES, WE WENT TO GROW</button>
            </div>
            <div class="col-12 col-lg-6  mt-2 mt-md-2 text-center text-md-left">
                <button class="btn  text-white border-0 px-lg-4 py-lg-3 font-weight-bold ml-lg-2 px-3 Lst-btn bgclr-devijn-lst">NO, WE DON'T WENT TO GROW</button>
            </div>
        </div>  
    </div>
    </div>
    <div class="row ml-0 mr-0 d-none d-lg-block">
        <div class="div-img-animte mt-lg-5" id="gui"></div>
        <div id="canvas-container" style="background-color:#3a77b9;">
            <div class="col-lg-10  ml-lg-auto mr-lg-auto align-items-end text-lg-right text-white" style="margin-bottom:15%;position: absolute;" id="drag">
                <p style="position: absolute;margin-top: 7%; text-align: right;margin-left: 70%;font-size: 12px;" class="">
                    <i class='fa fa-bullseye fa-2x' style="width: 20px;position: absolute;margin-top: -20%;margin-left: 41%;" onclick="myFunction()"></i> CLICK AND DRAG YOUR CURSOR</p>
            </div>
            <script>
                function myFunction() {
                    document.getElementById("drag").style.display = "none";
                }
            </script>
            <div id="mountains2"></div>
            <div id="mountains1"></div>
            <div id="skyline"></div>
        </div>
        <div class="col-lg-10 ml-lg-auto mr-lg-auto align-items-end text-lg-center text-white" style="margin-top:-15%;">
            <h1>You are just a ping away from the right team with right goals and the right strategy to acheive it</h1>
            <button class="btn bgclr-devijn-lst px-lg-5 py-lg-3">
                <h4 class="text-white"><b>YES, YES, YES WE NEED THAT</b></h4></button>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
<script type="text/javascript">
  var Fireworks = function(){
  /*=============================================================================*/ 
  /* Utility
  /*=============================================================================*/
  var self = this;
  var rand = function(rMi, rMa){return ~~((Math.random()*(rMa-rMi+1))+rMi);}
  var hitTest = function(x1, y1, w1, h1, x2, y2, w2, h2){return !(x1 + w1 < x2 || x2 + w2 < x1 || y1 + h1 < y2 || y2 + h2 < y1);};
  window.requestAnimFrame=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(a){window.setTimeout(a,1E3/60)}}();
  
  /*=============================================================================*/ 
  /* Initialize
  /*=============================================================================*/
  self.init = function(){ 
    self.dt = 0;
    self.oldTime = Date.now();
    self.canvas = document.createElement('canvas');       
    self.canvasContainer = $('#canvas-container');
    
    var canvasContainerDisabled = document.getElementById('canvas-container');
    self.canvas.onselectstart = function() {
      return false;
    };
    
    self.canvas.width = self.cw = 1291;
    self.canvas.height = self.ch = 500; 
    
    self.particles = [];  
    self.partCount = 15;
    self.fireworks = [];  
    self.mx = self.cw/2;
    self.my = self.ch/2;
    self.currentHue = 170;
    self.partSpeed = 5;
    self.partSpeedVariance = 10;
    self.partWind = 50;
    self.partFriction = 5;
    self.partGravity = 1;
    self.hueMin = 150;
    self.hueMax = 200;
    self.fworkSpeed = 2;
    self.fworkAccel = 4;
    self.hueVariance = 30;
    self.flickerDensity = 20;
    self.showShockwave = false;
    self.showTarget = true;
    self.clearAlpha = 25;

    self.canvasContainer.append(self.canvas);
    self.ctx = self.canvas.getContext('2d');
    self.ctx.lineCap = 'round';
    self.ctx.lineJoin = 'round';
    self.lineWidth = 1;
    self.bindEvents();      
    self.canvasLoop();
    
    self.canvas.onselectstart = function() {
      return false;
    };
    
    
  };    
  
  /*=============================================================================*/ 
  /* Particle Constructor
  /*=============================================================================*/
  var Particle = function(x, y, hue){
    this.x = x;
    this.y = y;
    this.coordLast = [
      {x: x, y: y},
      {x: x, y: y},
      {x: x, y: y}
    ];
    this.angle = rand(0, 360);
    this.speed = rand(((self.partSpeed - self.partSpeedVariance) <= 0) ? 1 : self.partSpeed - self.partSpeedVariance, (self.partSpeed + self.partSpeedVariance));
    this.friction = 1 - self.partFriction/100;
    this.gravity = self.partGravity/2;
    this.hue = rand(hue-self.hueVariance, hue+self.hueVariance);
    this.brightness = rand(50, 80);
    this.alpha = rand(40,100)/100;
    this.decay = rand(10, 50)/1000;
    this.wind = (rand(0, self.partWind) - (self.partWind/2))/25;
    this.lineWidth = self.lineWidth;
  };
  
  Particle.prototype.update = function(index){
    var radians = this.angle * Math.PI / 180;
    var vx = Math.cos(radians) * this.speed;
    var vy = Math.sin(radians) * this.speed + this.gravity;
    this.speed *= this.friction;
            
    this.coordLast[2].x = this.coordLast[1].x;
    this.coordLast[2].y = this.coordLast[1].y;
    this.coordLast[1].x = this.coordLast[0].x;
    this.coordLast[1].y = this.coordLast[0].y;
    this.coordLast[0].x = this.x;
    this.coordLast[0].y = this.y;
    
    this.x += vx * self.dt;
    this.y += vy * self.dt;
    
    this.angle += this.wind;        
    this.alpha -= this.decay;
    //////IF MOUSE KE SATH SATH GUMANA CHAHE TO *2 KO CHANGE KERE
    if(!hitTest(0,0,self.cw,self.ch,this.x-this.radius, this.y-this.radius, this.radius*2, this.radius*2) || this.alpha < .05){         
      self.particles.splice(index, 1);  
    }     
  };
  
  Particle.prototype.draw = function(){
    var coordRand = (rand(1,3)-1);
    self.ctx.beginPath();               
    self.ctx.moveTo(Math.round(this.coordLast[coordRand].x), Math.round(this.coordLast[coordRand].y));
    self.ctx.lineTo(Math.round(this.x), Math.round(this.y));
    self.ctx.closePath();       
    self.ctx.strokeStyle = 'hsla('+this.hue+', 100%, '+this.brightness+'%, '+this.alpha+')';
    self.ctx.stroke();        
    
    if(self.flickerDensity > 0){
      var inverseDensity = 50 - self.flickerDensity;          
      if(rand(0, inverseDensity) === inverseDensity){
        self.ctx.beginPath();
        self.ctx.arc(Math.round(this.x), Math.round(this.y), rand(this.lineWidth,this.lineWidth+3)/2, 0, Math.PI*2, false)
        self.ctx.closePath();
        var randAlpha = rand(50,100)/100;
        self.ctx.fillStyle = 'hsla('+this.hue+', 100%, '+this.brightness+'%, '+randAlpha+')';
        self.ctx.fill();
      } 
    }
  };
  
  /*=============================================================================*/ 
  /* Create Particles
  /*=============================================================================*/
  self.createParticles = function(x,y, hue){
    var countdown = self.partCount;
    while(countdown--){           
      self.particles.push(new Particle(x, y, hue));
    }
  };
  
  /*=============================================================================*/ 
  /* Update Particles
  /*=============================================================================*/   
  self.updateParticles = function(){
    var i = self.particles.length;
    while(i--){
      var p = self.particles[i];
      p.update(i);
    };
  };
  
  /*=============================================================================*/ 
  /* Draw Particles
  /*=============================================================================*/
  self.drawParticles = function(){
    var i = self.particles.length;
    while(i--){
      var p = self.particles[i];        
      p.draw();       
    };
  };
  
  /*=============================================================================*/ 
  /* Firework Constructor
  /*=============================================================================*/
  var Firework = function(startX, startY, targetX, targetY){
    this.x = startX;
    this.y = startY;
    this.startX = startX;
    this.startY = startY;
    this.hitX = false;
    this.hitY = false;
    this.coordLast = [
      {x: startX, y: startY},
      {x: startX, y: startY},
      {x: startX, y: startY}
    ];
    this.targetX = targetX;
    this.targetY = targetY;
    this.speed = self.fworkSpeed;
    this.angle = Math.atan2(targetY - startY, targetX - startX);
    this.shockwaveAngle = Math.atan2(targetY - startY, targetX - startX)+(90*(Math.PI/180));
    this.acceleration = self.fworkAccel/100;
    this.hue = self.currentHue;
    this.brightness = rand(50, 80);
    this.alpha = rand(50,100)/100;
    this.lineWidth = self.lineWidth;
    this.targetRadius = 1;
  };
  
  Firework.prototype.update = function(index){
    self.ctx.lineWidth = this.lineWidth;
      
    vx = Math.cos(this.angle) * this.speed,
    vy = Math.sin(this.angle) * this.speed;
    this.speed *= 1 + this.acceleration;        
    this.coordLast[2].x = this.coordLast[1].x;
    this.coordLast[2].y = this.coordLast[1].y;
    this.coordLast[1].x = this.coordLast[0].x;
    this.coordLast[1].y = this.coordLast[0].y;
    this.coordLast[0].x = this.x;
    this.coordLast[0].y = this.y;
    
    if(self.showTarget){
      if(this.targetRadius < 8){
        this.targetRadius += .25 * self.dt;
      } else {
        this.targetRadius = 1 * self.dt;  
      }
    }
    
    if(this.startX >= this.targetX){
      if(this.x + vx <= this.targetX){
        this.x = this.targetX;
        this.hitX = true;
      } else {
        this.x += vx * self.dt;
      }
    } else {
      if(this.x + vx >= this.targetX){
        this.x = this.targetX;
        this.hitX = true;
      } else {
        this.x += vx * self.dt;
      }
    }
    
    if(this.startY >= this.targetY){
      if(this.y + vy <= this.targetY){
        this.y = this.targetY;
        this.hitY = true;
      } else {
        this.y += vy * self.dt;
      }
    } else {
      if(this.y + vy >= this.targetY){
        this.y = this.targetY;
        this.hitY = true;
      } else {
        this.y += vy * self.dt;
      }
    }       
    
    if(this.hitX && this.hitY){
      var randExplosion = rand(0, 9);
      self.createParticles(this.targetX, this.targetY, this.hue);
      self.fireworks.splice(index, 1);          
    }
  };
  
  Firework.prototype.draw = function(){
    self.ctx.lineWidth = this.lineWidth;
      
    var coordRand = (rand(1,3)-1);          
    self.ctx.beginPath();             
    self.ctx.moveTo(Math.round(this.coordLast[coordRand].x), Math.round(this.coordLast[coordRand].y));
    self.ctx.lineTo(Math.round(this.x), Math.round(this.y));
    self.ctx.closePath();
    self.ctx.strokeStyle = 'hsla('+this.hue+', 100%, '+this.brightness+'%, '+this.alpha+')';
    self.ctx.stroke();  
    
    if(self.showTarget){
      self.ctx.save();
      self.ctx.beginPath();
      self.ctx.arc(Math.round(this.targetX), Math.round(this.targetY), this.targetRadius, 0, Math.PI*2, false)
      self.ctx.closePath();
      self.ctx.lineWidth = 1;
      self.ctx.stroke();
      self.ctx.restore();
    }
      
    if(self.showShockwave){
      self.ctx.save();
      self.ctx.translate(Math.round(this.x), Math.round(this.y));
      self.ctx.rotate(this.shockwaveAngle);
      self.ctx.beginPath();
      self.ctx.arc(0, 0, 1*(this.speed/5), 0, Math.PI, true);
      self.ctx.strokeStyle = 'hsla('+this.hue+', 100%, '+this.brightness+'%, '+rand(25, 60)/100+')';
      self.ctx.lineWidth = this.lineWidth;
      self.ctx.stroke();
      self.ctx.restore();
    }                
  };
  
  /*=============================================================================*/ 
  /* Create Fireworks
  /*=============================================================================*/
  self.createFireworks = function(startX, startY, targetX, targetY){      
    self.fireworks.push(new Firework(startX, startY, targetX, targetY));
  };
  
  /*=============================================================================*/ 
  /* Update Fireworks
  /*=============================================================================*/   
  self.updateFireworks = function(){
    var i = self.fireworks.length;
    while(i--){
      var f = self.fireworks[i];
      f.update(i);
    };
  };
  
  /*=============================================================================*/ 
  /* Draw Fireworks
  /*=============================================================================*/
  self.drawFireworks = function(){
    var i = self.fireworks.length;      
    while(i--){
      var f = self.fireworks[i];    
      f.draw();
    };
  };
  
  /*=============================================================================*/ 
  /* Events
  /*=============================================================================*/
  self.bindEvents = function(){
    $(window).on('resize', function(){      
      clearTimeout(self.timeout);
      self.timeout = setTimeout(function() {
        self.ctx.lineCap = 'round';
        self.ctx.lineJoin = 'round';
      }, 100);
    });
    
    $(self.canvas).on('mousedown', function(e){
      var randLaunch = rand(0, 5);
      self.mx = e.pageX - self.canvasContainer.offset().left;
      self.my = e.pageY - self.canvasContainer.offset().top;
      self.currentHue = rand(self.hueMin, self.hueMax);
      self.createFireworks(self.cw/2, self.ch, self.mx, self.my); 
      
      $(self.canvas).on('mousemove.fireworks', function(e){
        var randLaunch = rand(0, 5);
        self.mx = e.pageX - self.canvasContainer.offset().left;
        self.my = e.pageY - self.canvasContainer.offset().top;
        self.currentHue = rand(self.hueMin, self.hueMax);
        self.createFireworks(self.cw/2, self.ch, self.mx, self.my);                 
      }); 
      
    });
    
    $(self.canvas).on('mouseup', function(e){
      $(self.canvas).off('mousemove.fireworks');                  
    });
          
  }
  
  /*=============================================================================*/ 
  /* Clear Canvas
  /*=============================================================================*/
  self.clear = function(){
    self.particles = [];
    self.fireworks = [];
    self.ctx.clearRect(0, 0, self.cw, self.ch);
  };
  
  /*=============================================================================*/ 
  /* Delta
  /*=============================================================================*/
  self.updateDelta = function(){
    var newTime = Date.now();
    self.dt = (newTime - self.oldTime)/16;
    self.dt = (self.dt > 5) ? 5 : self.dt;
    self.oldTime = newTime; 
  }
  
  /*=============================================================================*/ 
  /* Main Loop
  /*=============================================================================*/
  self.canvasLoop = function(){
    requestAnimFrame(self.canvasLoop, self.canvas);
    self.updateDelta();
    self.ctx.globalCompositeOperation = 'destination-out';
    self.ctx.fillStyle = 'rgba(0,0,0,'+self.clearAlpha/100+')';
    self.ctx.fillRect(0,0,self.cw,self.ch);
    self.ctx.globalCompositeOperation = 'lighter';
    self.updateFireworks();
    self.updateParticles();
    self.drawFireworks();     
    self.drawParticles();     
  };
  
  self.init();
  
  var initialLaunchCount = 10;
  while(initialLaunchCount--){
    setTimeout(function(){
    self.fireworks.push(new Firework(self.cw/2, self.ch, rand(50, self.cw-50), rand(50, self.ch/2)-50));
    }, initialLaunchCount*200);
  }
  
}

/*=============================================================================*/ 
/* GUI
/*=============================================================================*/ 
var guiPresets = {
        "preset": "Default",
        "remembered": {
        "Default": {
          "0": {
          "fworkSpeed": 2,
          "fworkAccel": 4,
          "showShockwave": false,
          "showTarget": true,
          "partCount": 30,
          "partSpeed": 5,
          "partSpeedVariance": 10,
          "partWind": 50,
          "partFriction": 5,
          "partGravity": 1,
          "flickerDensity": 20,
          "hueMin": 150,
          "hueMax": 200,
          "hueVariance": 30,
          "lineWidth": 1,
          "clearAlpha": 25
          }
        },
        "Anti Gravity": {
          "0": {
          "fworkSpeed": 4,
          "fworkAccel": 10,
          "showShockwave": true,
          "showTarget": false,
          "partCount": 150,
          "partSpeed": 5,
          "partSpeedVariance": 10,
          "partWind": 10,
          "partFriction": 10,
          "partGravity": -10,
          "flickerDensity": 30,
          "hueMin": 0,
          "hueMax": 360,
          "hueVariance": 30,
          "lineWidth": 1,
          "clearAlpha": 50
          }
        },
        "Battle Field": {
          "0": {
          "fworkSpeed": 10,
          "fworkAccel": 20,
          "showShockwave": true,
          "showTarget": true,
          "partCount": 200,
          "partSpeed": 30,
          "partSpeedVariance": 5,
          "partWind": 0,
          "partFriction": 5,
          "partGravity": 0,
          "flickerDensity": 0,
          "hueMin": 20,
          "hueMax": 30,
          "hueVariance": 10,
          "lineWidth": 1,
          "clearAlpha": 40
          }
        },
        "Mega Blast": {
          "0": {
          "fworkSpeed": 3,
          "fworkAccel": 3,
          "showShockwave": true,
          "showTarget": true,
          "partCount": 500,
          "partSpeed": 50,
          "partSpeedVariance": 5,
          "partWind": 0,
          "partFriction": 0,
          "partGravity": 0,
          "flickerDensity": 0,
          "hueMin": 0,
          "hueMax": 360,
          "hueVariance": 30,
          "lineWidth": 20,
          "clearAlpha": 20
          }
        },
        "Nimble": {
          "0": {
          "fworkSpeed": 10,
          "fworkAccel": 50,
          "showShockwave": false,
          "showTarget": false,
          "partCount": 120,
          "partSpeed": 10,
          "partSpeedVariance": 10,
          "partWind": 100,
          "partFriction": 50,
          "partGravity": 0,
          "flickerDensity": 20,
          "hueMin": 0,
          "hueMax": 360,
          "hueVariance": 30,
          "lineWidth": 1,
          "clearAlpha": 80
          }
        },
        "Slow Launch": {
          "0": {
          "fworkSpeed": 2,
          "fworkAccel": 2,
          "showShockwave": false,
          "showTarget": false,
          "partCount": 200,
          "partSpeed": 10,
          "partSpeedVariance": 0,
          "partWind": 100,
          "partFriction": 0,
          "partGravity": 2,
          "flickerDensity": 50,
          "hueMin": 0,
          "hueMax": 360,
          "hueVariance": 20,
          "lineWidth": 4,
          "clearAlpha": 10
          }
        },
        "Perma Trail": {
          "0": {
          "fworkSpeed": 4,
          "fworkAccel": 10,
          "showShockwave": false,
          "showTarget": false,
          "partCount": 150,
          "partSpeed": 10,
          "partSpeedVariance": 10,
          "partWind": 100,
          "partFriction": 3,
          "partGravity": 0,
          "flickerDensity": 0,
          "hueMin": 0,
          "hueMax": 360,
          "hueVariance": 20,
          "lineWidth": 1,
          "clearAlpha": 0
          }
        }
        },
        "closed": true,
        "folders": {
        "Fireworks": {
          "preset": "Default",
          "closed": false,
          "folders": {}
        },
        "Particles": {
          "preset": "Default",
          "closed": true,
          "folders": {}
        },
        "Color": {
          "preset": "Default",
          "closed": true,
          "folders": {}
        },
        "Other": {
          "preset": "Default",
          "closed": true,
          "folders": {}
        }
        }
      };


var fworks = new Fireworks();
var gui = new dat.GUI({
  autoPlace: false,
  load: guiPresets,
  preset: 'Default'
});
var customContainer = document.getElementById('gui');
customContainer.appendChild(gui.domElement);

var guiFireworks = gui.addFolder('Fireworks');
guiFireworks.add(fworks, 'fworkSpeed').min(1).max(10).step(1);
guiFireworks.add(fworks, 'fworkAccel').min(0).max(50).step(1);
guiFireworks.add(fworks, 'showShockwave');
guiFireworks.add(fworks, 'showTarget');

var guiParticles = gui.addFolder('Particles');
guiParticles.add(fworks, 'partCount').min(0).max(500).step(1);  
guiParticles.add(fworks, 'partSpeed').min(1).max(100).step(1);
guiParticles.add(fworks, 'partSpeedVariance').min(0).max(50).step(1);
guiParticles.add(fworks, 'partWind').min(0).max(100).step(1);
guiParticles.add(fworks, 'partFriction').min(0).max(50).step(1);
guiParticles.add(fworks, 'partGravity').min(-20).max(20).step(1);
guiParticles.add(fworks, 'flickerDensity').min(0).max(50).step(1);

var guiColor = gui.addFolder('Color');
guiColor.add(fworks, 'hueMin').min(0).max(360).step(1);
guiColor.add(fworks, 'hueMax').min(0).max(360).step(1);
guiColor.add(fworks, 'hueVariance').min(0).max(180).step(1);

var guiOther = gui.addFolder('Other');
guiOther.add(fworks, 'lineWidth').min(1).max(20).step(1);
guiOther.add(fworks, 'clearAlpha').min(0).max(100).step(1);
guiOther.add(fworks, 'clear').name('Clear');

gui.remember(fworks);
</script>