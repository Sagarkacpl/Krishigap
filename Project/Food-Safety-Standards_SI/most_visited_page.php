<?php
include "connection.php";

    // to get top 10 highest visited page sql query
// SELECT * FROM `most_visited_page` order by CAST(number as int) DESC limit 10;

    if(isset($_SERVER['HTTPS']))
    {
        $actual_link = "https://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI'];
    }
    else
    {
        $actual_link = "http://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI'];
    }
    $page_url = trim($actual_link);
    $page_id = trim($page_url);

    $query = "SELECT * FROM `most_visited_page` WHERE page_id='$page_id'";
    $result = mysqli_query($db,$query);
    if(mysqli_num_rows($result) == 0)
    {
        $insert_query = "INSERT INTO `most_visited_page` (page,page_id,number,DeletedStatus) SET VALUES('$page_url','$page_url',1,0)";
        // page='$page_url',page_id='$page_id',number=1
        if(mysqli_query($db,$insert_query))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    else
    {
        $data = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $number = intval(trim($data['number']))+1;
        $update_query = "UPDATE `most_visited_page` SET number='$number' WHERE page_id='$page_id'";
        if(mysqli_query($db,$update_query))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
?>
