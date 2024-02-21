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
        <span class="menu-title">On Farm Production &nbsp; </span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth" style="list-style-type: none;">
        <ul class="nav flex-column sub-menu" style="padding-left: 20px;">
          <li class="nav-item">
            <a class="nav-link" href="Food-Safety-Standards-add-edit.php">Food Safety Standards</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="farmer-hand-book-edit.php">Farmer Hand Book</a>
          </li>
          <li class="nav-item">
            <a href="demo-farm-edit.php" class="nav-link">Demo Farm</a>
          </li>
          <li class="nav-item">
            <a href="internal-inspection-edit.php" class="nav-link">Internal Inspection</a>
          </li>
          <li class="nav-item">
            <a href="internal-audit-edit.php" class="nav-link">Internal Audit</a>
          </li>
          <li class="nav-item">
            <a href="plant-protection-edit.php" class="nav-link">Plant Protection Products</a>
          </li>
          <li class="nav-item">
            <a href="Package-of-practices-edit.php" class="nav-link">Package of Practices</a>
          </li>
          <li class="nav-item">
            <a href="Harvesting-add-edit.php" class="nav-link">Harvesting</a>
          </li>
          <li class="nav-item">
            <a href="other-edit.php" class="nav-link">Others</a>
          </li>
          <li class="nav-item">
            <a href="workers-health-edit.php" class="nav-link">Workers Health, Safety</a>
          </li>
          <li class="nav-item">
            <a href="plant-nutritional-management-edit.php" class="nav-link">Crops Standards</a>
          </li>
          <li class="nav-item">
            <a href="mrls-laboratories-Documents-list.php" class="nav-link">MRLs/Laboratories<br>Documents</a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-toggle="collapse" href="#Harvesting" aria-expanded="false"
        aria-controls="auth">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Post Harvesting </span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="Harvesting" style="list-style-type: none;">
        <ul class="nav flex-column sub-menu" style="padding-left: 20px;">
          <li class="nav-item">
            <a class="nav-link" href="Food-Safety-Standards-add-edit_PHP.php">Food Safety Standards</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="internal-audit-edit_PHP.php">Internal Audit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="workers-health-edit_PHP.php">Workers Health, Safety</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="other-edit_PHP.php">Others</a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-toggle="collapse" href="#Sustainable" aria-expanded="false"
        aria-controls="auth">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Sustainable Initiatives &nbsp; </span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="Sustainable" style="list-style-type: none;">
        <ul class="nav flex-column sub-menu" style="padding-left: 20px;">
          <li class="nav-item">
            <a class="nav-link" href="Food-Safety-Standards-add-edit_SI.php">Food Safety Standards</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="internal-audit-edit_SI.php">Internal Audit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="workers-health-edit_SI.php">Workers Health, Safety</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="other-edit_SI.php">Others</a>
          </li>
        </ul>
      </div>
    </li>
    <style>
      .m-hover-menu:hover #module-1 {
        display: block;
      }
    </style>
    <li class="nav-item">
      <a class="nav-link collapsed" data-toggle="collapse" href="#Training" aria-expanded="false" aria-controls="auth">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Training Module</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="Training" style="list-style-type: none;">
        <ul class="nav flex-column sub-menu" style="padding-left: 20px;">
          <li class="nav-item">
            <a class="nav-link" href="manage_schedule.php">
              <!-- <i class="icon-paper menu-icon"></i> -->
              <span class="menu-title">Schedule</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="faculty_list.php">
              <!-- <i class="icon-paper menu-icon"></i> -->
              <span class="menu-title">Faculty List</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="certificate.php">
              <!-- <i class="icon-paper menu-icon"></i> -->
              <span class="menu-title">Certificates</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="skill_dev_internalPage.php">
              <!-- <i class="icon-paper menu-icon"></i> -->
              <span class="menu-title">Skill Dev History</span>
            </a>
          </li>
          <li class="nav-item m-hover-menu">
            <a class="nav-link collapsed" data-toggle="collapse" href="#module-1" aria-expanded="false"
              aria-controls="auth">
              <!-- <i class="icon-head menu-icon"></i> -->
              <span class="menu-title">Training Module Homepage</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="module-1" style="list-style-type: none;">
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
                  <a class="nav-link" href="SkillDevelopmentHistory.php">Skill Dev. History </a>
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
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="main_others.php">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Other</span>
      </a>
    </li>

    <!-- <li class="nav-item">
      <a class="nav-link" href="Food-Safety-Standards-add-edit.php">
        <i class="icon-bar-graph menu-icon"></i>
        <span class="menu-title">Food Safety Standards</span>
      </a>
    </li> -->

    <!-- <li class="nav-item">
      <a class="nav-link" href="Food-Safety-Standards-add-edit_PHP.php">
        <i class="icon-bar-graph menu-icon"></i>
        <span class="menu-title">Food Safety Standards<br>(Post Harvest Processing)</span>
      </a>
    </li> -->

    <!-- <li class="nav-item">
      <a class="nav-link" href="Food-Safety-Standards-add-edit_SI.php">
        <i class="icon-bar-graph menu-icon"></i>
        <span class="menu-title">Standards<br>(Sustainable Initiatives)</span>
      </a>
    </li> -->

    <li class="nav-item">
      <a class="nav-link" href="Related-Documents-list.php">
        <i class="icon-bar-graph menu-icon"></i>
        <span class="menu-title">Related Documents</span>
      </a>
    </li>

    <li class="nav-item">
      <a href="events.php" class="nav-link">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Events</span>
      </a>
    </li>

    <!-- <li class="nav-item">
      <a class="nav-link" href="mrls-laboratories-Documents-list.php">
        <i class="icon-bar-graph menu-icon"></i>
        <span class="menu-title">MRLs/Laboratories<br>Documents</span>
      </a>
    </li> -->

    <!-- <li class="nav-item">
      <a class="nav-link" href="farmer-hand-book-edit.php">
        <i class="icon-bell menu-icon"></i>
        <span class="menu-title">Farmer Hand Book</span>
      </a>
    </li> -->

    <!-- <li class="nav-item">
      <a class="nav-link" href="demo-farm-edit.php">
        <i class="icon-check menu-icon"></i>
        <span class="menu-title">Demo Farm</span>
      </a>
    </li> -->

    <!-- <li class="nav-item">
      <a class="nav-link" href="internal-inspection-edit.php">
        <i class="icon-cloud menu-icon"></i>
        <span class="menu-title">Internal Inspection</span>
      </a>
    </li> -->

    <!-- <li class="nav-item">
      <a class="nav-link" href="internal-audit-edit.php">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Internal Audit</span>
      </a>
    </li> -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="internal-audit-edit_PHP.php">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Internal Audit<br>(Post Harvest Processing)</span>
      </a>
    </li> -->

    <!-- <li class="nav-item">
      <a class="nav-link" href="internal-audit-edit_SI.php">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Internal Audit<br>(Sustainable Initiatives)</span>
      </a>
    </li> -->

    <!-- <li class="nav-item">
      <a class="nav-link" href="plant-protection-edit.php">
        <i class="icon-disc menu-icon"></i>
        <span class="menu-title">Plant Protection Products </span>
      </a>
    </li> -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="plant-nutritional-management-edit.php">
        <i class="icon-disc menu-icon"></i>
        <span class="menu-title">Crops Standards </span>
      </a>
    </li> -->
    <!-- 
    <li class="nav-item">
      <a class="nav-link" href="Package-of-practices-edit.php">
        <i class="icon-drop menu-icon"></i>
        <span class="menu-title">Package of Practices</span>
      </a>
    </li> -->

    <!-- <li class="nav-item">
      <a class="nav-link" href="Harvesting-add-edit.php">
        <i class="icon-flag menu-icon"></i>
        <span class="menu-title">Harvesting</span>
      </a>
    </li> -->

    <!-- <li class="nav-item">
      <a class="nav-link" href="other-edit.php">
        <i class="icon-help menu-icon"></i>
        <span class="menu-title">Others</span>
      </a>
    </li> -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="other-edit_PHP.php">
        <i class="icon-help menu-icon"></i>
        <span class="menu-title">Others<br>(Post Harvest Processing)</span>
      </a>
    </li> -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="other-edit_SI.php">
        <i class="icon-help menu-icon"></i>
        <span class="menu-title">Others<br>(Sustainable Initiatives)</span>
      </a>
    </li> -->

    <!-- <li class="nav-item">
      <a class="nav-link" href="workers-health-edit.php">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Workers Health, Safety</span>
      </a>
    </li> -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="workers-health-edit_PHP.php">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Workers Health, Safety<br>(Post Harvest Processing)</span>
      </a>
    </li> -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="workers-health-edit_SI.php">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Workers Health, Safety<br>(Sustainable Initiatives)</span>
      </a>
    </li> -->

    <!-- <li class="nav-item">
      <a class="nav-link" href="skills-development_SI.php">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Skills Development<br>(Sustainable Initiatives)</span>
      </a>
    </li> -->

    <li class="nav-item">
      <a class="nav-link" href="news-edit.php">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">News</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="gap-edit.php">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">GAP Standard Wise<br>Price</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="standards-edit.php">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Standards</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="crops-edit.php">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Crops</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about_all_standards.php">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">About Standards</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="most_visited_page.php">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Most Visited Page</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="users.php">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Users</span>
      </a>
    </li>
    <!-- <li class="nav-item">
            <a class="nav-link" href="manage_schedule.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Schedule</span>
            </a>
          </li> -->
  </ul>
</nav>