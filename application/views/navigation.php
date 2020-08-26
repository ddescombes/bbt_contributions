<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="contribute_menu" aria-expanded="false">Contributions <span class="caret"></span></a>
            <div class="dropdown-menu" aria-labelledby="contribute_menu">
                <a class="dropdown-item" href="<?php echo base_url('contribution/add_contribution');?>">Add Contribution</a>
                <a class="dropdown-item" href="<?php echo base_url('contribution/reconcile');?>">Reconcile</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="assignment_menu" aria-expanded="false">Assignments <span class="caret"></span></a>
            <div class="dropdown-menu" aria-labelledby="assignment_menu">
                <a class="dropdown-item" href="<?php echo base_url('assignment/list');?>">View Assignments</a>
                <a class="dropdown-item" href="<?php echo base_url('assignment/add');?>">Add Assignment</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="user_menu" aria-expanded="false">Users <span class="caret"></span></a>
            <div class="dropdown-menu" aria-labelledby="user_menu">
                <a class="dropdown-item" href="<?php echo base_url('user/add_user');?>">Add User</a>
                <a class="dropdown-item" href="#">Edit User</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('report/create_pdf');?>">Annual Report</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('user/logout');?>">Logout</a>
        </li>
        </ul>
    </div>
</nav>