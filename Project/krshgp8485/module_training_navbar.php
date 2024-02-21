<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar" style="width: 245px;">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Training Module</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth" style="list-style-type: none;">
        <ul class="nav flex-column sub-menu" style="padding-left: 20px;">
          <li class="nav-item">
            <a class="nav-link" href="short-story.php">Short Story</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="most-popular.php">Most Popular Courses </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ScheduleDate.php">Schedule Date </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Faculty.php">Our Faculty </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="SkillDevelopmentHistory.php">Skill Development History </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="training_modules_feedback.php">Feedbacks </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="training_modules_enquiries.php">Enquiries </a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="manage_schedule.php">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Schedule</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="faculty_list.php">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Faculty List</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="certificate.php">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Certificates</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="skill_dev_internalPage.php">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Skill Dev History Page</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="most_visited_page.php">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Most Visited Page</span>
      </a>
    </li>
  </ul>
</nav>