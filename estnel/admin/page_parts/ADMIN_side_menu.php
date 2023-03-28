<div class="est-sideMenu" id="est-sideMenu">
        <div class="est-flex justify-content-between" id="sideMenu-header">
            <span class="d-block" id="sideMenu-title"></span>
            <span class="d-block text-white text-center" id="sideMenu-cancel-button">&times;</span>
        </div>
    <div class="m-3">
        <?php
            if(isset($_SESSION['admin_email'])) {
                //echo '<span class="btn btn-lg btn-primary m-1 text-white bold"><a class="d-inline-block text-decoration-none text-white bold" href="javascript:void(0)">Inbox</a></span>';
                //echo '<span class="btn btn-lg btn-primary m-1 text-white bold"><a class="d-inline-block text-decoration-none text-white bold" href="javascript:void(0)">Admins</a></span>';
                echo '<span class="btn btn-lg btn-danger m-1 text-white bold"><a class="d-inline-block text-decoration-none text-white bold" href="javascript:void(0)" id="logoutBtn">Log Out</a></span>';
            } else if(!isset($_SESSION['admin_email'])) {
                echo '<span class="btn btn-lg btn-success text-white bold"><a class="d-inline-block text-decoration-none text-white bold" href="javascript:void(0)">Sign In</a></span>';
            }
        ?>
    </div>
</div>