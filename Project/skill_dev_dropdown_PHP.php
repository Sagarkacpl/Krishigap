<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
include_once("connection.php");
if (!empty($_POST["id"])) {
    $id = $_POST['id'];
    $query = "SELECT MONTH(StartDate) `Month`, YEAR(StartDate) `year` FROM schedule_PHP WHERE EndDate < CURDATE() AND YEAR(StartDate)='$id' GROUP BY MONTH(StartDate),YEAR(StartDate)";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        echo '<option value="">Select Month</option>';
        echo '<option value="00">All </option>';
        while ($row = mysqli_fetch_assoc($result)) {
            $month = date($row['Month']);
            $dateObj = DateTime::createFromFormat('!m', $month);
            $monthName = $dateObj->format('F');
            $string = $monthName;
            $month_number = date("n", strtotime($string));
            echo '<option  value="' . $month_number . '" >' . $monthName . '</option>';
        }
    }
} 
