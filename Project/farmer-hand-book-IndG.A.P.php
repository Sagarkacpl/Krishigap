<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
  //  include "most_visited_page.php";
   if ($_SESSION['UID'] == '') {
       header("Location: login.php"); 
   }?> <div class="text-center" style="visibility: visible;">
                <h6 class="section-title bg-white text-center text-primary px-3">Introduction</h6>
                <h1 class="mb-5">IndG.A.P</h1>
            </div>
          
<h4>Introduction:</h4>
<p>A manual for framers with important practices to be followed and recorded during cultivation and harvesting.</p>
<p>The objective is to build farmers capacity in entrepreneurial management skills. It does  this through a learning by doing approach.</p>
<p>It enables them to learn and improve knowledge, change their attitude based on learnings and enables their skills towards improved farm commercialization, while working on their own farms.</p>
<h4>Farm Income:</h4>
<p>Money received from selling the farm output.</p>
<h4>Farm Costs:</h4>
<p>Money spent to produce and market farm output such as Seed, Plant Nutrients, Plant Protection Products, Farm labor, machinery hire charges etc </p>
<h4>Profit:</h4>
<p>Money left over from income after deduction of Farm costs.</p>
<h4>What Farmer needs to do:</h4>
<p>To find out the profitability of farm operations, the farmer need to maintain some records  and also to demonstrate the implementation of Good agricultural Practices.</p>
<b>Examples of some Records</b> and Documents:
<p>1 Farm Input Application</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<b>•</b> Seed planting</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<b>•</b> Plant Nutrients</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<b>•</b> Plant Protection</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<b>•</b> Other farm inputs</p>
<p>2 Farm output harvested and sold</p>
<p>3 Good Agricultural Practices</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<b>•</b> Farm activities to do list based on crop calendar of operations </p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<b>•</b> Training </p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<b>•</b> Water Management</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<b>•</b> List of Permitted plant protection products</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<b>•</b> Soil test report with recommendations</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<b>•</b> Water test report I case of irrigated land</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<b>•</b> Work instructions on workers’ health, safety and welfare </p>
