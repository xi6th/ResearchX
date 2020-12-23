
<?php
    // $script_name = pathinfo(__FILE__, PATHINFO_FILENAME);
?> 
<nav class="sidebar sidebar-offcanvas" id="sidebar"> 
    <ul class="nav">
        <li class="nav-item sidebar-category mt-4">
            <span style="color:black;">Welcome <b>Admin</b></span>
        </li>
        <li class="nav-item <?php if($script_name == "index"){echo("active");}?>">
            <a class="nav-link" href="home">
                <i class="mdi mdi-home-outline menu-icon"></i>
                <span class="menu-title">Home</span>
            </a>
        </li>
        <li class="nav-item <?php if($script_name == "un_attended_projects"){echo("active");}?>">
            <a class="nav-link" href="un_attended_projects">
                <i class="mdi mdi-file-document-box-multiple menu-icon"></i>
                <span class="menu-title">Unattended Projects</span>
            </a>
        </li>
        <li class="nav-item <?php if($script_name == "all_projects"){echo("active");}?>">
            <a class="nav-link" href="all_projects">
                <i class="mdi mdi-history menu-icon"></i>
                <span class="menu-title">All Projects</span>
            </a>
        </li>
        <li class="nav-item <?php if($script_name == "all_users"){echo("active");}?>">
            <a class="nav-link" href="all_users">
                <i class="mdi mdi-account-group menu-icon"></i>
                <span class="menu-title">All Users</span>
            </a>
        </li>

        <li class="nav-item <?php if($script_name == "add_works"){echo("active");}?>">
            <a class="nav-link" href="add_works">
                <i class="mdi mdi-account-group menu-icon"></i>
                <span class="menu-title">Add Works</span>
            </a>
        </li>
        
       
        <li class="nav-item <?php if($script_name == "logout"){echo("active");}?>">
            <a class="nav-link" href="logout">
                <i class="mdi mdi-logout menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>          
    </ul>
</nav>