<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   set_time_limit(0);
   error_reporting(0);
   if ($_SESSION['Admin_GAP793_Id'] == '') {
       header("Location: index.php");
   }
   include "connection.php";
//    $query11 = mysqli_query($db, "SELECT * from crop ORDER BY CropName");
//    if (isset($_POST["StandardCategory"]) && isset($_POST["GAPStandardWise"]) && isset($_POST["Crop"]) && isset($_POST["User"]) && isset($_POST["Documents"]) && isset($_POST["SourceLink"])) {
//        $StandardCategory = mysqli_real_escape_string($db, $_POST["StandardCategory"]);
//        $GAPStandardWise = mysqli_real_escape_string($db, $_POST["GAPStandardWise"]);
//        $Crop = mysqli_real_escape_string($db, $_POST["Crop"]);
//        $User = mysqli_real_escape_string($db, $_POST["User"]);
//        $Documents = mysqli_real_escape_string($db, $_POST["Documents"]);
//        $Remark = mysqli_real_escape_string($db, $_POST["Remark"]);
//        $DocumentsSource = mysqli_real_escape_string($db, $_POST["DocumentsSource"]);
//        $SourceLink = mysqli_real_escape_string($db, $_POST["SourceLink"]);
//            $query = mysqli_query($db, "INSERT INTO `food_safety_standards` (`FoodSafetyStandardsId`, `StandardCategory`, `GAPStandardWise`, `Crop`, `Documents`, `User`, `sort`, `Remark`, `DocumentsSource`, `SourceLink`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$StandardCategory', '$GAPStandardWise', '$Crop', '$Documents', '$User', '0', '$Remark', '$DocumentsSource', '$SourceLink', '0', current_timestamp());");
//            $FoodSafetyStandardsId = $db->insert_id;
//            if ($query) {
//             for ($i = 0;$i < count($_FILES["documents"]["name"]);$i++) {
//                $documents1 = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["documents"]["name"][$i];
//                $documents = str_replace(",","","$documents1");
//                if ($_FILES["documents"]["name"][$i] != '') {
//                    if(move_uploaded_file($_FILES["documents"]["tmp_name"][$i], "../Food-Safety-Standards/" . $documents)){
//                    $query1 = mysqli_query($db, "INSERT INTO `food_safety_standards_documents` (`food_safety_standards_documents_id`, `FoodSafetyStandardsId`, `documents_name`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$FoodSafetyStandardsId', '$documents', '0', current_timestamp());");
//                 }
//                }
//            } 
//                header("Location:Food-Safety-Standards-add.php?msg=success");
//            } else {
//                header("Location:Food-Safety-Standards-add.php?msg=fail");
//            }
//    } 
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="images/favicon.png" />
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.multifile.js"></script>
    <style type="text/css">
        .multifile_remove_input {
            color: red;
            text-decoration: none;
            font-size: 20px;
            font-weight: 600;
        }

        p {
            margin-bottom: 0px;
            margin-top: 5px;
        }

        .content-wrapper {
            padding: .3rem .3rem;
        }

        .card {
            border-radius: 0px;
        }

        .card .card-body {
            padding: 0.5rem 0.5rem;
        }

        .card .card-title {
            margin-bottom: 0.7rem;
        }

        select.form-control {
            outline: 1px solid #999;
            color: #999;
        }

        .form-control {
            border: 1px solid #999;
        }

        .mup {
            display: block;
            width: 100%;
            height: 2.875rem;
            padding: 0.875rem 1.375rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1;
            color: #495057;
            background-color: #ffffff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 2px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <?php include "header.php"; ?>
        <div class="container-fluid page-body-wrapper">
            <?php include "module_training_navbar.php";?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title float-left" style="margin-top: 7px;">Add Faculty List</h4>
                                    <div class="card-title float-right">
                                        <a href="faculty_list.php" class="btn btn-primary btn-sm">View List</a>
                                    </div>
                                    <div class="clearfix" style="margin-top: 50px;margin-bottom: 30px;"></div>
                                    <?php
                              $msg = $_GET['msg'];
                              if($msg == 'faile'){?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="bs-component">
                                                <div class="alert alert-dismissible alert-danger">
                                                    <button class="close" type="button"
                                                        data-dismiss="alert">×</button>Food Safety Standards details
                                                    already exist.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php
                              $msg = $_GET['msg'];
                              if($msg == 'fail'){?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="bs-component">
                                                <div class="alert alert-dismissible alert-danger">
                                                    <button class="close" type="button"
                                                        data-dismiss="alert">×</button>Food Safety Standards details not
                                                    saved.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php
                              $msg = $_GET['msg'];
                              if($msg == 'success'){?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="bs-component">
                                                <div class="alert alert-dismissible alert-success">
                                                    <button class="close" type="button"
                                                        data-dismiss="alert">×</button>Food Safety Standards details
                                                    successfully saved.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                                        <div class="expert-repeat" style="padding-top: 10px;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Profile Pic</label>
                                                        <input type="file" name="Profile" class="form-control" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Trainee Name</label>
                                                        <input type="text" name="TraineeName" class="form-control" placeholder="Trainee Name" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Trainee Details</label>
                                                        <input type="text" name="TraineeDetail" class="form-control" required="" placeholder="Trainee Details">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Designation 1</label>
                                                        <input type="text" name="TraineeDesignation" class="form-control" required="" placeholder="Designation 1">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Designation 2</label>
                                                        <input type="text" name="TraineeDesignation_Two" class="form-control" required="" placeholder="Designation 2">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Select State</label>
                                                        <select class="form-control" id="inputState" name="State">
                                                            <option value="">Select State</option>
                                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                            <option value="Assam">Assam</option>
                                                            <option value="Bihar">Bihar</option>
                                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                                            <option value="Goa">Goa</option>
                                                            <option value="Gujarat">Gujarat</option>
                                                            <option value="Haryana">Haryana</option>
                                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                            <option value="Jharkhand">Jharkhand</option>
                                                            <option value="Karnataka">Karnataka</option>
                                                            <option value="Kerala">Kerala</option>
                                                            <option value="Madya Pradesh">Madya Pradesh</option>
                                                            <option value="Maharashtra">Maharashtra</option>
                                                            <option value="Manipur">Manipur</option>
                                                            <option value="Meghalaya">Meghalaya</option>
                                                            <option value="Mizoram">Mizoram</option>
                                                            <option value="Nagaland">Nagaland</option>
                                                            <option value="Orissa">Orissa</option>
                                                            <option value="Punjab">Punjab</option>
                                                            <option value="Rajasthan">Rajasthan</option>
                                                            <option value="Sikkim">Sikkim</option>
                                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                                            <option value="Telangana">Telangana</option>
                                                            <option value="Tripura">Tripura</option>
                                                            <option value="Uttaranchal">Uttaranchal</option>
                                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                            <option value="West Bengal">West Bengal</option>
                                                            <option disabled="" style="background-color:#aaa; color:#fff">UNION Territories</option>
                                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                            <option value="Chandigarh">Chandigarh</option>
                                                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                                            <option value="Daman and Diu">Daman and Diu</option>
                                                            <option value="Delhi">Delhi</option>
                                                            <option value="Lakshadeep">Lakshadeep</option>
                                                            <option value="Pondicherry">Pondicherry</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label class="mb-2">District</label>
                                                        <select name="District" class="form-control" id="inputDistrict">
                                                        <option value="">Select District</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Contact No.</label>
                                                        <input type="url" name="phone" id="" class="form-control" required="" placeholder="+91 1234567890">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="email" name="email" id="" class="form-control" required="" placeholder="example@mail.com">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Profile Summary</label>
                                                        <textarea name="ProfileSummary" id="editor1" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Professional Trainings & Courses</label>
                                                        <textarea name="ProfessionalTraining" id="editor2" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Research Experiences</label>
                                                        <textarea name="ResearchExperiences" id="editor3" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Facebook Profile URL</label>
                                                        <input type="url" name="Facebook" id="" class="form-control" required="" placeholder="https://facebook.com">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Twitter Profile URL</label>
                                                        <input type="url" name="Twitter" id="" class="form-control" required="" placeholder="https://twitter.com">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Instagram Profile URL</label>
                                                        <input type="url" name="Instagram" id="" class="form-control" required="" placeholder="https://instagram.com">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Linkedin Profile URL</label>
                                                        <input type="url" name="Linkedin" id="" class="form-control" required="" placeholder="https://linkedin.com">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">WhatsApp Number</label>
                                                        <input type="number" name="WhatsApp" id="" class="form-control" required="" placeholder="Enter WhatsApp Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <button type="submit" class="btn btn-primary mr-2"
                                                    name="submit">Submit</button>
                                                <button type="reset" class="btn btn-light">Cancel</button>
                                            </div>
                                    </form>
                                    <?php
                                        if(isset($_POST['submit']))
                                        {
                                            $Profile = $_FILES['Profile']['name'];
                                            $Profile_tmp = $_FILES['Profile']['tmp_name'];
                                            move_uploaded_file($Profile_tmp,"images/faculty_profile/".$Profile);

                                            $TraineeName = $_POST['TraineeName'];
                                            $TraineeDetail = $_POST['TraineeDetail'];
                                            $Facebook = $_POST['Facebook'];
                                            $Twitter = $_POST['Twitter'];
                                            $Instagram = $_POST['Instagram'];
                                            $Linkedin = $_POST['Linkedin'];
                                            $WhatsApp = $_POST['WhatsApp'];

                                            $facultiy = "INSERT INTO `faculty_list` SET Profile='$Profile',TraineeName='$TraineeName',TraineeDetail='$TraineeDetail',Facebook='$Facebook',Twitter='$Twitter',Instagram='$Instagram',Linkedin='$Linkedin',WhatsAppNumber='$WhatsApp'";
                                            $execute = mysqli_query($db,$facultiy);
                                            if($execute == TRUE)
                                            {
                                                echo "<script>alert('Faculty Add Successfully')</script>";
                                                echo "<script>window.location.href='faculty_list.php'</script>";
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022.
                            Good Agricultural Practices All rights reserved. </span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Design & Developed by
                            <a href="https://aretesoftwares.com" target="_blank">Aretesoftwares.com</a></span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="vendors/select2/select2.min.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <script src="js/file-upload.js"></script>
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <script>
        var AndhraPradesh = ["Anantapur", "Chittoor", "East Godavari", "Guntur", "Kadapa", "Krishna", "Kurnool", "Prakasam", "Nellore", "Srikakulam", "Visakhapatnam", "Vizianagaram", "West Godavari"];
         
         var ArunachalPradesh = ["Anjaw", "Changlang", "Dibang Valley", "East Kameng", "East Siang", "Kra Daadi", "Kurung Kumey", "Lohit", "Longding", "Lower Dibang Valley", "Lower Subansiri", "Namsai", "Papum Pare", "Siang", "Tawang", "Tirap", "Upper Siang", "Upper Subansiri", "West Kameng", "West Siang", "Itanagar"];
         
         var Assam = ["Baksa", "Barpeta", "Biswanath", "Bongaigaon", "Cachar", "Charaideo", "Chirang", "Darrang", "Dhemaji", "Dhubri", "Dibrugarh", "Goalpara", "Golaghat", "Hailakandi", "Hojai", "Jorhat", "Kamrup Metropolitan", "Kamrup (Rural)", "Karbi Anglong", "Karimganj", "Kokrajhar", "Lakhimpur", "Majuli", "Morigaon", "Nagaon", "Nalbari", "Dima Hasao", "Sivasagar", "Sonitpur", "South Salmara Mankachar", "Tinsukia", "Udalguri", "West Karbi Anglong"];
         
         var Bihar = ["Araria", "Arwal", "Aurangabad", "Banka", "Begusarai", "Bhagalpur", "Bhojpur", "Buxar", "Darbhanga", "East Champaran", "Gaya", "Gopalganj", "Jamui", "Jehanabad", "Kaimur", "Katihar", "Khagaria", "Kishanganj", "Lakhisarai", "Madhepura", "Madhubani", "Munger", "Muzaffarpur", "Nalanda", "Nawada", "Patna", "Purnia", "Rohtas", "Saharsa", "Samastipur", "Saran", "Sheikhpura", "Sheohar", "Sitamarhi", "Siwan", "Supaul", "Vaishali", "West Champaran"];
         
         var Chhattisgarh = ["Balod", "Baloda Bazar", "Balrampur", "Bastar", "Bemetara", "Bijapur", "Bilaspur", "Dantewada", "Dhamtari", "Durg", "Gariaband", "Janjgir Champa", "Jashpur", "Kabirdham", "Kanker", "Kondagaon", "Korba", "Koriya", "Mahasamund", "Mungeli", "Narayanpur", "Raigarh", "Raipur", "Rajnandgaon", "Sukma", "Surajpur", "Surguja"];
         
         var Goa = ["North Goa", "South Goa"];
         
         var Gujarat = ["Ahmedabad", "Amreli", "Anand", "Aravalli", "Banaskantha", "Bharuch", "Bhavnagar", "Botad", "Chhota Udaipur", "Dahod", "Dang", "Devbhoomi Dwarka", "Gandhinagar", "Gir Somnath", "Jamnagar", "Junagadh", "Kheda", "Kutch", "Mahisagar", "Mehsana", "Morbi", "Narmada", "Navsari", "Panchmahal", "Patan", "Porbandar", "Rajkot", "Sabarkantha", "Surat", "Surendranagar", "Tapi", "Vadodara", "Valsad"];
         
         var Haryana = ["Ambala", "Bhiwani", "Charkhi Dadri", "Faridabad", "Fatehabad", "Gurugram", "Hisar", "Jhajjar", "Jind", "Kaithal", "Karnal", "Kurukshetra", "Mahendragarh", "Mewat", "Palwal", "Panchkula", "Panipat", "Rewari", "Rohtak", "Sirsa", "Sonipat", "Yamunanagar"];
         
         var HimachalPradesh = ["Bilaspur", "Chamba", "Hamirpur", "Kangra", "Kinnaur", "Kullu", "Lahaul Spiti", "Mandi", "Shimla", "Sirmaur", "Solan", "Una"];
         
         var JammuKashmir = ["Anantnag", "Bandipora", "Baramulla", "Budgam", "Doda", "Ganderbal", "Jammu", "Kargil", "Kathua", "Kishtwar", "Kulgam", "Kupwara", "Leh", "Poonch", "Pulwama", "Rajouri", "Ramban", "Reasi", "Samba", "Shopian", "Srinagar", "Udhampur"];
         
         var Jharkhand = ["Bokaro", "Chatra", "Deoghar", "Dhanbad", "Dumka", "East Singhbhum", "Garhwa", "Giridih", "Godda", "Gumla", "Hazaribagh", "Jamtara", "Khunti", "Koderma", "Latehar", "Lohardaga", "Pakur", "Palamu", "Ramgarh", "Ranchi", "Sahebganj", "Seraikela Kharsawan", "Simdega", "West Singhbhum"];
         
         var Karnataka = ["Bagalkot", "Bangalore", "Belgaum", "Bellary", "Bidar", "Vijayapura", "Chamarajanagar", "Chikkaballapur", "Chikkamagaluru", "Chitradurga", "Dakshina Kannada", "Davanagere", "Dharwad", "Gadag", "Gulbarga", "Hassan", "Haveri", "Kodagu", "Kolar", "Koppal", "Mandya", "Mysore", "Raichur", "Ramanagara", "Shimoga", "Tumkur", "Udupi", "Uttara Kannada", "Yadgir"];
         
         var Kerala = ["Alappuzha", "Ernakulam", "Idukki", "Kannur", "Kasaragod", "Kollam", "Kottayam", "Kozhikode", "Malappuram", "Palakkad", "Pathanamthitta", "Thiruvananthapuram", "Thrissur", "Wayanad"];
         
         var MadhyaPradesh = ["Agar Malwa", "Alirajpur", "Anuppur", "Ashoknagar", "Balaghat", "Barwani", "Betul", "Bhind", "Bhopal", "Burhanpur", "Chhatarpur", "Chhindwara", "Damoh", "Datia", "Dewas", "Dhar", "Dindori", "Guna", "Gwalior", "Harda", "Hoshangabad", "Indore", "Jabalpur", "Jhabua", "Katni", "Khandwa", "Khargone", "Mandla", "Mandsaur", "Morena", "Narsinghpur", "Neemuch", "Panna", "Raisen", "Rajgarh", "Ratlam", "Rewa", "Sagar", "Satna",
         
         "Sehore", "Seoni", "Shahdol", "Shajapur", "Sheopur", "Shivpuri", "Sidhi", "Singrauli", "Tikamgarh", "Ujjain", "Umaria", "Vidisha"
         ];
         
         var Maharashtra = ["Ahmednagar", "Akola", "Amravati", "Aurangabad", "Beed", "Bhandara", "Buldhana", "Chandrapur", "Dhule", "Gadchiroli", "Gondia", "Hingoli", "Jalgaon", "Jalna", "Kolhapur", "Latur", "Mumbai City", "Mumbai Suburban", "Nagpur", "Nanded", "Nandurbar", "Nashik", "Osmanabad", "Palghar", "Parbhani", "Pune", "Raigad", "Ratnagiri", "Sangli", "Satara", "Sindhudurg", "Solapur", "Thane", "Wardha", "Washim", "Yavatmal"];
         
         var Manipur = ["Bishnupur", "Chandel", "Churachandpur", "Imphal East", "Imphal West", "Jiribam", "Kakching", "Kamjong", "Kangpokpi", "Noney", "Pherzawl", "Senapati", "Tamenglong", "Tengnoupal", "Thoubal", "Ukhrul"];
         
         var Meghalaya = ["East Garo Hills", "East Jaintia Hills", "East Khasi Hills", "North Garo Hills", "Ri Bhoi", "South Garo Hills", "South West Garo Hills", "South West Khasi Hills", "West Garo Hills", "West Jaintia Hills", "West Khasi Hills"];
         
         var Mizoram = ["Aizawl", "Champhai", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Serchhip", "Aizawl", "Champhai", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Serchhip"];
         
         var Nagaland = ["Dimapur", "Kiphire", "Kohima", "Longleng", "Mokokchung", "Mon", "Peren", "Phek", "Tuensang", "Wokha", "Zunheboto"];
         
         var Odisha = ["Angul", "Balangir", "Balasore", "Bargarh", "Bhadrak", "Boudh", "Cuttack", "Debagarh", "Dhenkanal", "Gajapati", "Ganjam", "Jagatsinghpur", "Jajpur", "Jharsuguda", "Kalahandi", "Kandhamal", "Kendrapara", "Kendujhar", "Khordha", "Koraput", "Malkangiri", "Mayurbhanj", "Nabarangpur", "Nayagarh", "Nuapada", "Puri", "Rayagada", "Sambalpur", "Subarnapur", "Sundergarh"];
         
         var Punjab = ["Amritsar", "Barnala", "Bathinda", "Faridkot", "Fatehgarh Sahib", "Fazilka", "Firozpur", "Gurdaspur", "Hoshiarpur", "Jalandhar", "Kapurthala", "Ludhiana", "Mansa", "Moga", "Mohali", "Muktsar", "Pathankot", "Patiala", "Rupnagar", "Sangrur", "Shaheed Bhagat Singh Nagar", "Tarn Taran"];
         
         var Rajasthan = ["Ajmer", "Alwar", "Banswara", "Baran", "Barmer", "Bharatpur", "Bhilwara", "Bikaner", "Bundi", "Chittorgarh", "Churu", "Dausa", "Dholpur", "Dungarpur", "Ganganagar", "Hanumangarh", "Jaipur", "Jaisalmer", "Jalore", "Jhalawar", "Jhunjhunu", "Jodhpur", "Karauli", "Kota", "Nagaur", "Pali", "Pratapgarh", "Rajsamand", "Sawai Madhopur", "Sikar", "Sirohi", "Tonk", "Udaipur"];
         
         var Sikkim = ["East Sikkim", "North Sikkim", "South Sikkim", "West Sikkim"];
         
         var TamilNadu = ["Ariyalur", "Chennai", "Coimbatore", "Cuddalore", "Dharmapuri", "Dindigul", "Erode", "Kanchipuram", "Kanyakumari", "Karur", "Krishnagiri", "Madurai", "Nagapattinam", "Namakkal", "Nilgiris", "Perambalur", "Pudukkottai", "Ramanathapuram", "Salem", "Sivaganga", "Thanjavur", "Theni", "Thoothukudi", "Tiruchirappalli", "Tirunelveli", "Tiruppur", "Tiruvallur", "Tiruvannamalai", "Tiruvarur", "Vellore", "Viluppuram", "Virudhunagar"];
         
         var Telangana = ["Adilabad", "Bhadradri Kothagudem", "Hyderabad", "Jagtial", "Jangaon", "Jayashankar", "Jogulamba", "Kamareddy", "Karimnagar", "Khammam", "Komaram Bheem", "Mahabubabad", "Mahbubnagar", "Mancherial", "Medak", "Medchal", "Nagarkurnool", "Nalgonda", "Nirmal", "Nizamabad", "Peddapalli", "Rajanna Sircilla", "Ranga Reddy", "Sangareddy", "Siddipet", "Suryapet", "Vikarabad", "Wanaparthy", "Warangal Rural", "Warangal Urban", "Yadadri Bhuvanagiri"];
         
         var Tripura = ["Dhalai", "Gomati", "Khowai", "North Tripura", "Sepahijala", "South Tripura", "Unakoti", "West Tripura"];
         
         var UttarPradesh = ["Agra", "Aligarh", "Allahabad", "Ambedkar Nagar", "Amethi", "Amroha", "Auraiya", "Azamgarh", "Baghpat", "Bahraich", "Ballia", "Balrampur", "Banda", "Barabanki", "Bareilly", "Basti", "Bhadohi", "Bijnor", "Budaun", "Bulandshahr", "Chandauli", "Chitrakoot", "Deoria", "Etah", "Etawah", "Faizabad", "Farrukhabad", "Fatehpur", "Firozabad", "Gautam Buddha Nagar", "Ghaziabad", "Ghazipur", "Gonda", "Gorakhpur", "Hamirpur", "Hapur", "Hardoi", "Hathras", "Jalaun", "Jaunpur", "Jhansi", "Kannauj", "Kanpur Dehat", "Kanpur Nagar", "Kasganj", "Kaushambi", "Kheri", "Kushinagar", "Lalitpur", "Lucknow", "Maharajganj", "Mahoba", "Mainpuri", "Mathura", "Mau", "Meerut", "Mirzapur", "Moradabad", "Muzaffarnagar", "Pilibhit", "Pratapgarh", "Raebareli", "Rampur", "Saharanpur", "Sambhal", "Sant Kabir Nagar", "Shahjahanpur", "Shamli", "Shravasti", "Siddharthnagar", "Sitapur", "Sonbhadra", "Sultanpur", "Unnao", "Varanasi"];
         
         var Uttarakhand = ["Almora", "Bageshwar", "Chamoli", "Champawat", "Dehradun", "Haridwar", "Nainital", "Pauri", "Pithoragarh", "Rudraprayag", "Tehri", "Udham Singh Nagar", "Uttarkashi"];
         
         var WestBengal = ["Alipurduar", "Bankura", "Birbhum", "Cooch Behar", "Dakshin Dinajpur", "Darjeeling", "Hooghly", "Howrah", "Jalpaiguri", "Jhargram", "Kalimpong", "Kolkata", "Malda", "Murshidabad", "Nadia", "North 24 Parganas", "Paschim Bardhaman", "Paschim Medinipur", "Purba Bardhaman", "Purba Medinipur", "Purulia", "South 24 Parganas", "Uttar Dinajpur"];
         
         var AndamanNicobar = ["Nicobar", "North Middle Andaman", "South Andaman"];
         
         var Chandigarh = ["Chandigarh"];
         
         var DadraHaveli = ["Dadra Nagar Haveli"];
         
         var DamanDiu = ["Daman", "Diu"];
         
         var Delhi = ["Central Delhi", "East Delhi", "New Delhi", "North Delhi", "North East Delhi", "North West Delhi", "Shahdara", "South Delhi", "South East Delhi", "South West Delhi", "West Delhi"];
         
         var Lakshadweep = ["Lakshadweep"];
         
         var Puducherry = ["Karaikal", "Mahe", "Puducherry", "Yanam"];
         $("#inputState").change(function() {
         
         var StateSelected = $(this).val();
         
         var optionsList;
         
         var htmlString = "";
         switch (StateSelected) {
         
         case "Andhra Pradesh":
         
            optionsList = AndhraPradesh;
         
            break;
         
         case "Arunachal Pradesh":
         
            optionsList = ArunachalPradesh;
         
            break;
         
         case "Assam":
         
            optionsList = Assam;
         
            break;
         
         case "Bihar":
         
            optionsList = Bihar;
         
            break;
         
         case "Chhattisgarh":
         
            optionsList = Chhattisgarh;
         
            break;
         
         case "Goa":
         
            optionsList = Goa;
         
            break;
         
         case "Gujarat":
         
            optionsList = Gujarat;
         
            break;
         
         case "Haryana":
         
            optionsList = Haryana;
         
            break;
         
         case "Himachal Pradesh":
         
            optionsList = HimachalPradesh;
         
            break;
         
         case "Jammu and Kashmir":
         
            optionsList = JammuKashmir;
         
            break;
         
         case "Jharkhand":
         
            optionsList = Jharkhand;
         
            break;
         
         case "Karnataka":
         
            optionsList = Karnataka;
         
            break;
         
         case "Kerala":
         
            optionsList = Kerala;
         
            break;
         
         case "Madya Pradesh":
         
            optionsList = MadhyaPradesh;
         
            break;
         
         case "Maharashtra":
         
            optionsList = Maharashtra;
         
            break;
         
         case "Manipur":
         
            optionsList = Manipur;
         
            break;
         
         case "Meghalaya":
         
            optionsList = Meghalaya;
         
            break;
         
         case "Mizoram":
         
            optionsList = Mizoram;
         
            break;
         
         case "Nagaland":
         
            optionsList = Nagaland;
         
            break;
         
         case "Orissa":
         
            optionsList = Orissa;
         
            break;
         
         case "Punjab":
         
            optionsList = Punjab;
         
            break;
         
         case "Rajasthan":
         
            optionsList = Rajasthan;
         
            break;
         
         case "Sikkim":
         
            optionsList = Sikkim;
         
            break;
         
         case "Tamil Nadu":
         
            optionsList = TamilNadu;
         
            break;
         
         case "Telangana":
         
            optionsList = Telangana;
         
            break;
         
         case "Tripura":
         
            optionsList = Tripura;
         
            break;
         
         case "Uttaranchal":
         
            optionsList = Uttaranchal;
         
            break;
         
         case "Uttar Pradesh":
         
            optionsList = UttarPradesh;
         
            break;
         
         case "West Bengal":
         
            optionsList = WestBengal;
         
            break;
         
         case "Andaman and Nicobar Islands":
         
            optionsList = AndamanNicobar;
         
            break;
         
         case "Chandigarh":
         
            optionsList = Chandigarh;
         
            break;
         
         case "Dadar and Nagar Haveli":
         
            optionsList = DadraHaveli;
         
            break;
         
         case "Daman and Diu":
         
            optionsList = DamanDiu;
         
            break;
         
         case "Delhi":
         
            optionsList = Delhi;
         
            break;
         
         case "Lakshadeep":
         
            optionsList = Lakshadeep;
         
            break;
         
         case "Pondicherry":
         
            optionsList = Pondicherry;
         
            break;
         
         }
         for (var i = 0; i < optionsList.length; i++) {
         htmlString = htmlString + "<option value='" + optionsList[i] + "'>" + optionsList[i] + "</option>";
         }
         $("#inputDistrict").html(htmlString);
         });
    </script>
    <script src="https://cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
    <script>
                        CKEDITOR.replace( 'editor1' );
                        CKEDITOR.replace('editor2');
                        CKEDITOR.replace('editor3');
                </script>
</body>

</html>