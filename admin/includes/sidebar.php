<?php
session_start();
if (!isset($_SESSION['Login'])) {
    header('Location: ../../login.php');
}
function sideBar($active)
{
if ($_SESSION['UserType'] == 'faculty') {
?>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="" target="_blank">
                <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">TROTZA</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if($active == 'attendance') { echo 'active'; } ?>" href="attendance_list.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Attendance</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($active == 'mark') { echo 'active'; } ?>" href="marks.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-certificate text-secondary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Mark</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

<?php
} elseif ($_SESSION['UserType'] == 'admin') {
?>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="" target="_blank">
                <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">TROTZA</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if($active == 'dashboard') { echo 'active'; } ?>" href="dashboard.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($active == 'faculty') { echo 'active'; } ?>" href="faculty_list.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-user text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Faculty</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?php if($active == 'student') { echo 'active'; } ?>" href="student_list.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-users text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Students</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($active == 'attendance') { echo 'active'; } ?>" href="attendance_list.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Attendance</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?php if($active == 'mark') { echo 'active'; } ?>" href="marks.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-certificate text-secondary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Mark</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?php if($active == 'fee') { echo 'active'; } ?>" href="fees.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-money text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Fees</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?php if($active == 'class') { echo 'active'; } ?>" href="class.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-tasks text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Class</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?php if($active == 'subject') { echo 'active'; } ?>" href="subject.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-book text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Subject</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
<?php
}}
?>