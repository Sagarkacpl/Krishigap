<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   include "connection.php";
   include "most_visited_page.php";
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Good Agricultural Practices</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="" name="keywords">
      <meta content="" name="description">
      <link href="img/favicon.ico" rel="icon">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
      <link href="lib/animate/animate.min.css" rel="stylesheet">
      <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <style>
         .conatiner {
         max-width: 1160px;
         margin: 0px auto;
         }
         table {
         font-family: "Heebo", sans-serif;
         border-collapse: collapse;
         width: 100%;
         font-size: 12px;
         }
         td,
         th {
         border: 1px solid #dddddd;
         text-align: Center;
         padding: 15px 5px;
         }
         .table-head {
         font-size: 13px;
         color: black;
         }
         .table-bg {
         background-color: white;
         box-shadow: 0px 0px 8px #e8e8e8;
         padding: 20px 10px;
         border-radius: 12px;
         }
         .table-heading {
         text-align: center;
         font-family: "Nunito", sans-serif;
         padding: 0px;
         margin: 0px;
         text-decoration: underline;
         }
      </style>
   </head>
   <body>
      <?php include "navbar.php"; ?>
      <div class="container-fluid bg-primary py-5 mb-5 page-header">
         <div class="container py-5">
            <div class="row justify-content-center">
               <div class="col-lg-10 text-center">
                  <h1 class="display-3 text-white animated slideInDown">Skill Development History</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <a href="index.php" class="btn btn-success btn-sm">Home</a>
                        &nbsp;
                        <button class="btn btn-success btn-sm" onclick="history.back()">Go Back</button>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <div class="container-xxl py-5">
         <div class="conatiner">
            <div class="table-bg">
               <div class="table-heading">
                  <h3>View Past Skill Development Programs</h3>
               </div>
               <form action="skill-development-page_PHP.php" method="get">
                  <div class="row mt-5">
                     <div class="col-md-4">
                        <h5>Year</h5>
                        <div class="form-floating">
                           <select class="form-control" name="Year" required="" id="Year">
                              <option value="">Select Year</option>
                              <?php
                                 $year = "SELECT YEAR(StartDate) `year` FROM schedule_PHP WHERE EndDate < CURDATE() GROUP BY YEAR(StartDate)";
                                 $year_exe = mysqli_query($db, $year);
                                 while ($fetch_year = mysqli_fetch_assoc($year_exe)) {
                                     $selectyear = $fetch_year['year']; ?>
                              <option <?php if ($_GET['Year'] == $selectyear) {
                                 echo "selected";
                                 } ?> value="<?php echo $fetch_year['year']; ?>"><?php echo $fetch_year['year']; ?></option>
                              <?php
                                 } ?> 
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <h5>Month</h5>
                        <div class="form-floating">
                           <select name="Month" class="form-control" required="" id="Month">
                              <?php if (isset($_GET['Month']) AND $_GET['Month'] != '') { ?>
                              <option value="">Select Month</option>
                              <option <?php if ($_GET['Month'] == '00') {
                                 echo "selected";
                                 } ?> value="00">All
                              </option>
                              <?php
                                 $query = "SELECT MONTH(StartDate) `Month`, YEAR(StartDate) `year` FROM schedule_PHP WHERE EndDate < CURDATE() AND YEAR(StartDate)='$_GET[Year]' GROUP BY MONTH(StartDate),YEAR(StartDate)";
                                 $result = mysqli_query($db, $query);
                                 if (mysqli_num_rows($result) > 0) {
                                     while ($row = mysqli_fetch_assoc($result)) {
                                         $month = date($row['Month']);
                                         $dateObj = DateTime::createFromFormat('!m', $month);
                                         $monthName = $dateObj->format('F');
                                         $string = $monthName;
                                         $month_number = date("n", strtotime($string)); ?>
                              <option <?php if ($_GET['Month'] == $month_number) {
                                 echo "selected";
                                 } ?> value="<?php echo $month_number; ?>" ><?php echo $monthName; ?></option>
                              <?php
                                 }
                                 }
                                 ?>
                              <?php
                                 } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <h5 style="font-size: 19px;"></h5>
                        <button class="btn btn-primary w-100 py-3 mt-4" type="submit">Show Result</button>
                     </div>
                  </div>
               </form>
               <?php if ($_GET['Month'] != "" and $_GET['Year'] != "") { ?>
               <table class="mt-5">
                  <tr class="table-head">
                     <th>S.No</th>
                     <th>Month</th>
                     <th>Course</th>
                     <th>Subjects</th>
                     <th>Start Date</th>
                     <th>End Date</th>
                     <th>Duration in hrs.</th>
                     <th>Faculty</th>
                     <th>Faculty Organization</th>
                     <th>Feedback</th>
                     <th>View Trainee List</th>
                  </tr>
                  <?php
                     if ($_GET['Month'] != '00') {
                         $select_Month = $_GET['Month'];
                         $select_year = $_GET['Year'];
                         $schedule = "SELECT Course,TopicCovered,StartDate,EndDate,Duration,FacultyOrganization,Fees,Feedback,FacultyName, EXTRACT(YEAR FROM StartDate) AS Year, EXTRACT(MONTH FROM StartDate) AS Month FROM `schedule_PHP` WHERE EndDate < CURDATE() AND Year(StartDate)='$select_year' AND Month(StartDate)='$select_Month' AND DeletedStatus='0' GROUP BY Course,TopicCovered,StartDate,EndDate,Duration,FacultyOrganization,Fees,Feedback,FacultyName";
                         $exe = mysqli_query($db, $schedule);
                         $count = 1;
                         while ($read = mysqli_fetch_assoc($exe)) {
                             $StartDate = date_create($read['StartDate']);
                             $Date = date_format($StartDate, "d M Y");
                             $month = date($read['Month']);
                             $dateObj = DateTime::createFromFormat('!m', $month);
                             $monthName = $dateObj->format('F');
                             $EndDate = date_create($read['EndDate']);
                             $End_Date = date_format($EndDate, "d M Y");
                             $time = date("h:i A", strtotime($read['StartTiming']));
                     ?>
                  <tr>
                     <td>
                        <p>
                           <?php echo $count; ?>
                        </p>
                     </td>
                     <td>
                        <p>
                           <?php echo $monthName; ?>
                        </p>
                     </td>
                     <td>
                        <p>
                           <?php echo $read['Course']; ?>
                        </p>
                     </td>
                     <td>
                        <p>
                           <?php echo $read['TopicCovered']; ?>
                        </p>
                     </td>
                     <td>
                        <p>
                           <?php echo $Date; ?>
                        </p>
                     </td>
                     <td>
                        <p>
                           <?php echo $End_Date; ?>
                        </p>
                     </td>
                     <td>
                        <p>
                           <?php echo $read['Duration']; ?>
                        </p>
                     </td>
                     <td>
                        <p>
                           <?php echo $read['FacultyName']; ?>
                        </p>
                     </td>
                     <td>
                        <p>
                           <?php echo $read['FacultyOrganization']; ?>
                        </p>
                     </td>
                     <td>
                        <p>
                           <?php echo $read['Feedback']; ?>
                        </p>
                     </td>
                     <td>
                        <a href="trainee_list_PHP.php?Course_name=<?php echo $read['Course']; ?>" target="_blank" rel="noopener noreferrer">Trainee List</a>
                     </td>
                  </tr>
                  <?php $count++;
                     } ?>
                  <?php
                     } else {
                         $select_year = $_GET['Year'];
                         $schedule.= "SELECT Course,TopicCovered,StartDate,EndDate,Duration,FacultyOrganization,Fees,Feedback,FacultyName, EXTRACT(YEAR FROM StartDate) AS Year, EXTRACT(MONTH FROM StartDate) AS Month FROM `schedule_PHP` WHERE EndDate < CURDATE() AND Year(StartDate)='$select_year'  AND DeletedStatus='0' GROUP BY Course,TopicCovered,StartDate,EndDate,Duration,FacultyOrganization,Fees,Feedback,FacultyName";
                         // $schedule = "SELECT * , EXTRACT(YEAR FROM StartDate) AS Year, EXTRACT(MONTH FROM StartDate) AS Month FROM `schedule` WHERE EndDate < CURDATE()";
                         $exe = mysqli_query($db, $schedule);
                         $count = 1;
                         while ($read = mysqli_fetch_assoc($exe)) {
                             // Start Date Format
                             $StartDate = date_create($read['StartDate']);
                             $Date = date_format($StartDate, "d M Y");
                             // $month = date($read['Month']);
                             // $dateObj = DateTime::createFromFormat('!m', $month);
                             // $monthName = $dateObj->format('F');
                             $month = date_create($read['StartDate']);
                             $monthName = date_format($StartDate, "F");
                             // End Date Format
                             $EndDate = date_create($read['EndDate']);
                             $End_Date = date_format($EndDate, "d M Y");
                             $time = date("h:i A", strtotime($read['StartTiming']));
                     ?>
                  <tr>
                     <td>
                        <p>
                           <?php echo $count; ?>
                        </p>
                     </td>
                     <td>
                        <p>
                           <?php echo $monthName; ?>
                        </p>
                     </td>
                     <td>
                        <p>
                           <?php echo $read['Course']; ?>
                        </p>
                     </td>
                     <td>
                        <p>
                           <?php echo $read['TopicCovered']; ?>
                        </p>
                     </td>
                     <td>
                        <p>
                           <?php echo $Date; ?>
                        </p>
                     </td>
                     <td>
                        <p>
                           <?php echo $End_Date; ?>
                        </p>
                     </td>
                     <td>
                        <p>
                           <?php echo $read['Duration']; ?>
                        </p>
                     </td>
                     <td>
                        <p>
                           <?php echo $read['FacultyName']; ?>
                        </p>
                     </td>
                     <td>
                        <p>
                           <?php echo $read['FacultyOrganization']; ?>
                        </p>
                     </td>
                     <td>
                        <p>
                           <?php echo $read['Feedback']; ?>
                        </p>
                     </td>
                     <td>
                        <a href="trainee_list_PHP.php?Course_name=<?php echo $read['Course']; ?>" target="_blank" rel="noopener noreferrer">Trainee List</a>
                     </td>
                  </tr>
                  <?php $count++;
                     } ?>
                  <?php
                     }
                     } ?>
               </table>
            </div>
         </div>
      </div>
      <?php include ('footer.php'); ?>
      <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="lib/wow/wow.min.js"></script>
      <script src="lib/easing/easing.min.js"></script>
      <script src="lib/waypoints/waypoints.min.js"></script>
      <script src="lib/owlcarousel/owl.carousel.min.js"></script>
      <script src="js/main.js"></script>
      <script>
         $(document).ready(function() {
             $("#Year").on('change', function() {
                 var year = $(this).val();
         $.ajax({
                     method: "POST",
                     url: "skill_dev_dropdown_PHP.php",
                     data: {
                         id: year
                     },
                     datatype: "html",
                     success: function(data) {
                         $("#Month").html(data);
                     }
                 });
             });
         });
      </script>
   </body>
</html>