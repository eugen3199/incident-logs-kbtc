<div class="col-3 vh-100 p-0 h-100 text-white w-sidebar navbar-collapse collapse d-none d-md-flex sidebar ">
    <!-- fixed sidebar -->
    <div class="navbar-light bg-black position-fixed h-100 w-sidebar">
        <ul class="nav flex-column flex-nowrap text-truncate">
            <li class="nav-item pt-1">
                <a class="nav-link text-light bg-<?php if ($_SESSION['cpage']=="home"){echo "secondary";}else{echo "black";}?>" href="index.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light bg-<?php if ($_SESSION['cpage']=="catalog"){echo "secondary";}else{echo "black";}?>" href="category.php">Services Catalogue<br>Category</a> 
            </li>
            <li class="nav-item">
                <a class="nav-link text-light bg-<?php if ($_SESSION['cpage']=="vlogs"){echo "secondary";}else{echo "black";}?>" href="view_logs.php">Incident Logs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light bg-<?php if ($_SESSION['cpage']=="advlogs"){echo "secondary";}else{echo "black";}?>" href="advance_view_logs.php">Advance Search<br>Incident Logs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light bg-<?php if ($_SESSION['cpage']=="location"){echo "secondary";}else{echo "black";}?>" href="location.php">Locations</a> 
            </li>
            <li class="nav-item">
                <a class="nav-link text-light bg-<?php if ($_SESSION['cpage']=="member"){echo "secondary";}else{echo "black";}?>" href="member.php">Members</a> 
            </li>
            <li class="nav-item">
                <a class="nav-link text-light bg-black" href="logout.php"> Logout</a>
            </li>
        </ul>
    </div>
</div>