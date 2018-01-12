<?php
//error_reporting(-1);
//ini_set('display_errors', 'On');
if (!isset($_SESSION)) {
    session_start();
}

function ageCalculator($dob) {
    if (!empty($dob)) {
        $birthdate = new DateTime($dob);
        $today = new DateTime('today');
        $age = $birthdate->diff($today)->y;
        return $age;
    } else {
        return 0;
    }
}

include_once("z_db.php");
require('./sendmail.php');
//session_start();


$sql = "SELECT maintain FROM  settings WHERE sno=0";
if ($result = mysqli_query($con, $sql)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        $main = $row[0];
    }
    if ($main == 2 || $main == 3) {
        print "
				<script language='javascript'>
					window.location = 'maintain.php';
				</script>
			";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['todo'])) {
// Collect the data from post method of form submission // 
    if (isset($_POST['franchise'])) {
        $frn_name = mysqli_real_escape_string($con, $_POST['franchise']);
    } else {
        $frn_name = '';
    }

    $todo = mysqli_real_escape_string($con, $_POST['todo']);
    $name = mysqli_real_escape_string($con, $_POST['fname']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $userid = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $password2 = mysqli_real_escape_string($con, $_POST['password2']);

    $email = mysqli_real_escape_string($con, $_POST['email']);

    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $ref = mysqli_real_escape_string($con, $_POST['referral']);
   //$package = mysqli_real_escape_string($con, $_POST['package']);
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $fhnambe = mysqli_real_escape_string($con, $_POST['fhnambe']);

    $verifi = mysqli_real_escape_string($con, $_POST['verifi']);
    $verificode = mysqli_real_escape_string($con, $_POST['verificode']);
    $rpin = mysqli_real_escape_string($con, $_POST['registrationpin']);
    $package = 25;
    $status = "OK";
    $msg = "";
//validation starts
// if userid is less than 6 char then status is not ok
    //$rpin = (int) $rpin;
    $rr = mysqli_query($con, "select max(registrationpin) as pin from affiliateuser");
    $r = mysqli_fetch_row($rr);
    $rpin = $r[0];
    if ($rpin == 0 || $rpin == '') {
        $rpin = 100;
    } else {
        $rpin = (int) $rpin;
        $rpin = $rpin + 1;
    }

    if ($verifi != $verificode) {
        $msg = $msg . "<li>Verification Code not matched.</li><BR>";
        $status = "NOTOK";
    }

    if (!isset($username) or strlen($username) < 6) {
        $msg = $msg . "<li>User Id Should Contain Minimum 6 CHARACTERS.</li><BR>";
        $status = "NOTOK";
    }

    if (!ctype_alnum($username)) {
        $msg = $msg . "<li>User Id Should Contain Alphanumeric Chars Only.</li><BR>";
        $status = "NOTOK";
    }

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $msg = $msg . "<li>Invalid RefferID Format.</li><BR>";
        $status = "NOTOK";
    }

    if (!preg_match("/^[A-Za-z. ]*$/", $name)) {
        $msg = $msg . "<li>Invalid Name Format.</li><BR>";
        $status = "NOTOK";
    }

    // For Password Input Feild
    // $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

   if(!$lowercase || !$number || strlen($password) < 8) {
       $msg = $msg . "<li>Password Must be a minimum of 8 characters</li> <br>" .
       "<li>Password Must contain at least one lowercase character</li> <br>" .
        "<li>Password Must contain at least 1 number</li><br>";
     }

    // if ($dob == '') {
    //     $msg = $msg . "Notvalid Date of Birth<BR>";
    //     $status = "NOTOK";
    // }
    // if ($fhnambe == "" || strlen($fhnambe) > 100) {
    //     $msg = $msg . "Notvalid Father or Husband Name<BR>";
    //     $status = "NOTOK";
    // }
    // if (DateTime::createFromFormat('d-m-Y', $dob) == FALSE) {
    //     $msg = $msg . "Notvalid Date of Birth<BR>";
    //     $status = "NOTOK";
    // }
    // $age = ageCalculator($dob);
    // if ($age < 18 || $age > 60) {
    //     $msg = $msg . "Age must be between 18 and 60<BR>";
    //     $status = "NOTOK";
    // }
    // $date = date_create($dob);
    // $dob = date_format($date, "Y-m-d");

    $rr = mysqli_query($con, "SELECT COUNT(*) FROM affiliateuser WHERE username = '$username'");
    $r = mysqli_fetch_row($rr);
    $nr = $r[0];
    if ($nr == 1) {
        $msg = $msg . "<li>Userid Already Exists. Please Choose Another One.</li><BR>";
        $status = "NOTOK";
    }
      
    $rrr = mysqli_query($con, "SELECT COUNT(*) FROM affiliateuser WHERE mobile = '$mobile'");
    $r3 = mysqli_fetch_row($rrr);
    $nr3 = $r3[0];
    if ($nr3 > 0) {
        $msg = $msg . "<li>Mobile Number Already Registered.</li><BR>";
        $status = "NOTOK";
    } 

	
    $remail = mysqli_query($con, "SELECT COUNT(*) FROM affiliateuser WHERE email = '$email'");
    $re = mysqli_fetch_row($remail);
    $nremail = $re[0];
    if ($nremail > 0) {
        $msg = $msg . "<li>E-Mail Id Already Registered.</li><BR>";
        $status = "NOTOK";
    } 


    $result = mysqli_query($con, "SELECT count(*) FROM  affiliateuser where username = '$ref'");
    $row = mysqli_fetch_row($result);
    $numrows = $row[0];
    if ($numrows == 0) {
        $msg = $msg . "<li>Sponsor/Referral Username Not Found.</li><BR>";
        $status = "NOTOK";
    }


    // if ($package == "") {
    //     $msg = $msg . "Please Select The Package.<BR>";
    //     $status = "NOTOK";
    // }


    if (strlen($password) < 8) {
        $msg = $msg . "<li>Password Must Be More Than 8 Char Length.</li><BR>";
        $status = "NOTOK";
    }

    if (!preg_match("/[0-9.+]/", $mobile)) {
        $msg = $msg . "<li>Invalid Mobile Format.</li><BR>";
        $status = "NOTOK";
    }

    // if (strlen($mobile) <> 10) {
    //     $msg = $msg . "Please Enter Correct Mobile Number (Without 0 and +91)<BR>";
    // }

    if (strlen($email) < 1) {
        $msg = $msg . "<li>Please Enter Your Email Id.</li><BR>";
        $status = "NOTOK";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = $msg . "<li>Email Id Not Valid, Please Enter The Correct Email Id .</li><BR>";
        $status = "NOTOK";
    }

      if (!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/", $email)) {
        $msg = $msg . "<li>Invalid Email Format.</li><BR>";
        $status = "NOTOK";
    }

    if ($password <> $password2) {
        $msg = $msg . "<li>Both Passwords Are Not Matching.</li><BR>";
        $status = "NOTOK";
    }


//Test if it is a shared client
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
//Is it a proxy address
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
//The value of $ip at this point would look something like: "192.0.34.166"
    $ip = ip2long($ip);
//The $ip would now look something like: 1073732954

    $ripaddress = mysqli_query($con, "SELECT COUNT(*) FROM affiliateuser WHERE ipaddress = '$ip'");
    $reripaddress = mysqli_fetch_row($ripaddress);
    $nreripaddress = $reripaddress[0];
    if ($nreripaddress > 0) {
        $msg = $msg . "<li>You Can not Register Multiple Time. Because You already Registered by Another ID.</li><BR>";
        $status = "NOTOK";
    } 

    $sqlquery = "SELECT wlink FROM settings where sno=0"; //fetching website from databse
    $rec2 = mysqli_query($con, $sqlquery);
    $row2 = mysqli_fetch_row($rec2);
    $wlink = $row2[0]; //assigning website address

    $sqlquery111 = "SELECT etext FROM emailtext where code='SIGNUP'"; //fetching website from databse
    $rec2111 = mysqli_query($con, $sqlquery111);
    $row2111 = mysqli_fetch_row($rec2111);
    $emailtext = $row2111[0]; //assigning email text for email
    //
    $isfrn = 0;
    if ($frn_name != "") {
        $rr = mysqli_query($con, "SELECT COUNT(*) FROM franchise WHERE active=1 and username = '$frn_name'");
        $r = mysqli_fetch_row($rr);
        $nr = $r[0];
        if ($nr == 0) {
            $msg = $msg . "<li>Franchise is not Exist or Deactivated.</li><BR>";
            $status = "NOTOK";
        } else {
            $rr = mysqli_query($con, "SELECT COUNT(*) FROM franchise WHERE active=1 and username = '$frn_name' and deposite>=(select settings.franchiseamount from settings limit 1)");
            $r = mysqli_fetch_row($rr);
            $nr = $r[0];
            if ($nr == 0) {
                $msg = $msg . "<li>Please Contact to your company.</li><BR>";
                $status = "NOTOK";
            } else {
                $isfrn = 1;
            }
        }
    }

    //CODE CHANGED "Expire after 20 years"
    if (!($package == "")) {
        $sqlquery11 = "SELECT validity FROM packages where id = $package"; //fetching no of days validity from package table from databse
        $rec211 = mysqli_query($con, $sqlquery11);
        $row211 = mysqli_fetch_row($rec211);
        $noofdays = $row211[0]; //assigning website address
        $cur = date("Y-m-d");
        //$expiry = date('Y-m-d', strtotime($cur . '+ ' . $noofdays . 'days'));
        $expiry = date('Y-m-d', strtotime("+20 years"));
        $sbonus = 0;
    }
    $path='';
    if ($status == "OK") {
		$token = md5(strtotime(date("Y-m-d h:i:s")));
        $scode = rand(1111111111, 9999999999); //generating random code, this will act as signup key
        $query = mysqli_query($con, "insert into affiliateuser(username,password,fname,address,email,referedby,ipaddress,mobile,doj,country,signupcode,tamount,pcktaken,expiry,city,state,pincode,pancardno,accountname,bankname,branch,accountno,accounttype,ifsccode,micrcode,photo,franchise,franchise_id,dob,father_husband,nomiName,nomiRelation,nomiPAN,nomiAddress,verificationcode,course,registrationpin,active,token) values('$username','$password','$name','','$email','$ref','$ip','$mobile','$cur','$country','$scode','$sbonus','$package','$expiry','','','','','','','','','','','','$path',$isfrn,'$frn_name','$dob','$fhnambe','','','','','$verifi','',$rpin,0,'$token')");
        
        $query = mysqli_query($con, "insert into user_level(username,userlevel,totalchild) values('$username',0,0)");
        $_SESSION['paypalidsession'] = $userid;
        
        $confirmLink = "http://itlcashcoin.com/bbbtestcoin/confirmation.php?token=".$token;
// More headers
        //$headers = "MIME-Version: 1.0" . "\r\n";
        //$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        //$headers .= 'From: <no-reply@' . $wlink . '>' . "\r\n";
        $to = $email;
        $subject = "Order Confirmation";
        $message = "<p>Hello ".$name.",</p>";
        $message .= "<p>Welcome to ITLcashcoin,</p><p> We will like to welcome you onboard, please click link below to confirm your account:</p>";
       $message .= "<p id='link_alert'><a href='".$confirmLink."'>click here</a></p>";
       
       if(sendMail($to,$message,$name,$subject))
      {
		 echo "<script type='text/javascript'>alert('your account has been created successfully, please check your email for confirmation link.'); location.href='http://itlcashcoin.com/bbbtestcoin/index.php';</script>";
  }     
		} else {
        $errormsg = "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>" . $msg . "</div>"; //printing error if found in validation
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="app">
    <head>
        <style type="text/css">html {
                overflow-y: scroll;
                background: url(images/loginbackground.jpg) no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }

        </style>
        <meta charset="utf-8" />
        <title>ITL Coin Registration</title>
        <meta name="google-translate-customization" content="c3c91eff8b5a0ded-878e61fea3a9f875-g9379dbb792475ecb-13"></meta>
        <meta name="description" content="Earn Money Online.Just Fill This Registration Form and Start Your Online work." />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <link rel="stylesheet" href="css/app.v1.css" type="text/css" />
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="js/datepicker/datepicker.css" type="text/css"/>
        <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
    <div id="google_translate_element" align="right"></div><script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
        }
    </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <style>
        .box { background: #eee; border: 1px solid #ccc; padding: 10px; margin-bottom: 20px; top: 30px;
               right: 50px;position: fixed;
               width: 300px;
               color: #000;
        }
        @media (max-width:1052px){
            .box { background: #eee; border: 1px solid #ccc; padding: 10px; margin: 20px 0px 0px 15px; top: 0px;
                   right: 0px;position: relative;
                   width: 300px;
                   color: #000;
            }
        }
           .box2 { background: #eee; border: 1px solid #ccc; padding: 10px; margin-bottom: 20px; top: 320px;
               right: 50px;position: fixed;
               width: 300px;
               color: #000;
	       text-align: center;
        }
        @media (max-width:1052px){
            .box2 { background: #eee; border: 1px solid #ccc; padding: 10px; margin: 20px 0px 0px 15px; top: 0px;
                   right: 0px;position: relative;
                   width: 300px;
                   color: #000;
            }
        }
    </style> 
</head>
<body style="overflow: scroll;">
    <section id="content" >
   
        <div class="container aside-xl"> <a class="navbar-brand block" href="#">Welcome</a>

            <div class="row">
                <div class="col-sm-18">
                    <form action="" enctype="multipart/form-data" method="post" data-validate="parsley">
                        <section class="panel panel-default">
                         <!--    <header class="panel-heading"> -->
                                <!-- <span class="h4">Register<button type="button" class="btn btn-link"><a href="http://www.goldenlifeco.com/">Go back to main website<a></button></span> -->
                                              <!--   </header> -->
                                                <div class="panel-body">

                                                    <p class="text-muted">Please fill the information to continue</p>

                                                    <label class="text-primary">Account Details</label>
                                                    <?php
                                                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($status == "NOTOK")) {
                                                        print $errormsg;
                                                    }
                                                    ?>
                                                    <input type="hidden" name="todo" value="post">
                                                    <?php
                                                    $query = "select max(affiliateuser.registrationpin) as pin from affiliateuser";

                                                    $res = mysqli_query($con, $query);

                                                    while ($row = mysqli_fetch_array($res)) {
                                                        $pin = "$row[pin]";
                                                        if ($pin == 0 || $pin == '') {
                                                            $pin = 100;
                                                            $pin = sprintf('%06d', $pin);
                                                        } else {
                                                            $pin = (int) $pin;
                                                            $pin = sprintf('%06d', $pin + 1);
                                                        }
                                                    }
                                                    ?>
				      <?php /*
                                                    <div class="form-group">
                                                        <label>Registration Pin</label>
                                                        <input type="number" readonly value="<?php echo $pin; ?>" class="form-control" name="registrationpin">
                                                    </div>
					*/ ?>
                                                    <div class="form-group pull-in clearfix">
                                                        <div class="col-sm-6">
                                                            <label>Reffer ID</label>
                                                            <input type="text" class="form-control" data-required="true" name="username" value="" required>                        
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Your Name</label>
                                                            <input type="text" class="form-control" data-required="true" name="fname" required>                          
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label>Date of Birth</label>
                                                        <input type="text" placeholder="dd-mm-yyyy" id="dob" class="form-control" name="dob">
                                                    </div> -->
                                                   <!--  <div class="form-group">
                                                        <label>Father's/Husband's Name</label>
                                                        <input type="text" class="form-control" name="fhnambe">
                                                    </div> -->
                                                    <div class="form-group pull-in clearfix">
                                                        <div class="col-sm-6">
                                                            <label>Enter password</label>
                                                            <input type="password" class="form-control" data-required="true" id="pwd" name="password" required>   
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Confirm password</label>
                                                            <input type="password" class="form-control" data-equalto="#pwd" data-required="true" name="password2" required>      
                                                        </div>   
                                                    </div>
                                                    <div class="form-group pull-in clearfix">
                                                        <div class="col-sm-6">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control" data-type="email" data-required="true" name="email" required>                        
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Phone</label>
                                                            <input type="text" class="form-control" data-type="phone" placeholder="(XXX) XXXX XXX" data-required="true" name="mobile" required>
                                                        </div>
                                                    </div>
                                                       <div class="form-group">
                                                        <label>Country</label>
                                                        <select id="country" data-required="true" class="form-control m-t" name="country" required >
                                                            <option value="">Please choose</option>
                                                            <option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
                                                        </select>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label>Package</label>
                                                        <select data-required="true" class="form-control m-t" name="package" required>
                                                            <option value="">Please choose</option>
                                                            <!-- <?php
                                                            // $query = "SELECT id,name,price,currency,tax FROM  packages where type = 'S'";
                                                            // $result = mysqli_query($con, $query);

                                                            // while ($row = mysqli_fetch_array($result)) {
                                                            //     $id = "$row[id]";
                                                            //     $pname = "$row[name]";
                                                            //     $pprice = "$row[price]";
                                                            //     $pcur = "$row[currency]";
                                                            //     $ptax = "$row[tax]";
                                                            //     $total = $pprice + $ptax;
                                                            //     print "<option value='$id'>$pname | Price - $pcur $total </option>";
                                                            // }
                                                            ?> 
                                                        </select>
                                                    </div> -->

                                                    <?php
                                                    if (isset($_GET["aff"])) {
                                                        $aff = mysqli_real_escape_string($con, $_GET["aff"]);
                                                        $_SESSION['aff'] = $aff;
                                                    }
                                                    ?>
                                                    <div class="form-group">
                                                        <label>Sponsor</label>
                                                        <input type="text" class="form-control" data-required="true" name="referral" value="<?php
                                                        if (isset($_SESSION['aff'])) {
                                                            echo $_SESSION['aff'];
                                                        }
                                                        ?>" required>                        
                                                    </div>
                                                    <?php
                                                    if (isset($_GET["fid"]) && isset($_GET["fnm"])) {
                                                        $franchise_name = mysqli_real_escape_string($con, $_GET["fnm"]);
                                                        $franchise_id = mysqli_real_escape_string($con, $_GET["fid"]);
                                                        $count = mysqli_fetch_array(mysqli_query($con, "SELECT username from franchise WHERE id='$franchise_id'"));
                                                        if ($count[0] == $franchise_name) {
                                                            print "<div class='form-group'>
                                                        <label>Franchise Name</label>
                                                        <input type=text' readonly='true' class='form-control' value='$franchise_name' name='franchise'>
                                                    </div>";
                                                        }
                                                    }
                                                    ?>
                                                    <div class="form-group">
                                                        <label>Verification Code</label>
                                                        <input type="text" class="form-control" data-required="true" name="verifi">
                                                        <b>Verification code- </b><input type="text" style="border: 0;outline: none;" value="<?php echo rand(11111, 99999); ?>" name="verificode">
                                                    </div>

                                                    <div class="checkbox i-checks">
                                                        <label>
                                                            <input type="checkbox" name="check" data-required="true" required><i></i> I agree to the <a href="#" class="text-info">Terms and Conditions</a>
                                                        </label>
                                                    </div>
                                                </div>
                                                <footer class="panel-footer text-right bg-light lter" style="text-align: center;">
                                                    <button type="submit" class="btn btn-success btn-s-xs">Register</button>
                                                </footer>
                                                </section>
                                                <div class="line line-dashed"></div>
                                                <p class="text-muted text-center"><small style="color:#000000; font-weight:bolder; padding:10px;">Already have an account?</small></p>
                                                <a href="index.php" class="btn btn-lg btn-default btn-block">Sign in</a>
                                                </form>
                                                </div>
                                             <!--    <div class="box follow-scroll">
                                                    <h1 style="text-align: center;display: block;"><img width="200" src="https://upload.wikimedia.org/wikipedia/en/4/42/Paytm_logo.png"/></h1>
                                                    <p>
                                                        Please Send payment on this Paytm Number.<br>
                                                        Company Paytm Number - <h2>+91-9813895040</h2>
                                                        After Payment Please send Paytm Payment Screenshot/Receipt  on this WhatsApp Number - +91-9050829036
                                                        <br>
                                                    </p>
                                                </div> -->
						<!-- <div class="box2 follow-scroll">
                                                    <h1 style="text-align: center;display: block;"><img width="200" src="http://www.theperfectfuture.in/wp-content/uploads/2017/02/querywhatsapp.png"/></h1>
                                                    <p >
							Company Email - tpfandeducationsystem@gmail.com</br></br>
                                                      <b>Thanks for Purchasing our Course</b>
                                                    </p>
                                                </div> -->

                                                </div>
                                                </div>
                                                </section>
                                                <!-- footer -->
                                                <footer id="footer">
                                                    <div class="text-center padder clearfix">
                                                        <p> <small style="color:#000000; font-weight:bolder; padding:10px;"><?php
                                                                $query = "SELECT footer from settings where sno=0";


                                                                $result = mysqli_query($con, $query);

                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    $footer = "$row[footer]";
                                                                    print $footer;
                                                                }
                                                                ?>
                                                            </small> </p>
                                                    </div>
                                                </footer>
                                                <!-- / footer -->
                                                <!-- Bootstrap -->
                                                <!-- App -->
                                                <script src="js/app.v1.js"></script>
                                                <script src="js/app.plugin.js"></script>

                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                                                <script src="js/datepicker/bootstrap-datepicker.js"></script>
                                                <script>
        $('#dob').datepicker({
            format: 'dd-mm-yyyy'
        });
        
     
                                                </script>
                                                </body>
                                                </html>
