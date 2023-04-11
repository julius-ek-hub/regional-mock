<nav class="nav no-print">
    <div class="flexible">
        <a class="site-title" href="<?php echo $base_url; ?>">
            <img src="<?php echo $base_url; ?>/assets/images/pwf.png"/>
            RDSE
        </a>
        <div class="site-menu">
        <?php echo $admin ? '<span class="admin">Admin</span>' : '' ?>
        <a href="<?php echo $base_url; ?>">Home</a>
        <a>About</a>
        <a>Contacts</a>
        <a>Offices</a>
        <a class="btn-light login-btn" href="<?php echo $base_url . (($institute || $admin) ? '/workers/logout.php' : '/pages/institute-login.php') ?>"><?php echo ($institute || $admin) ? 'Logout' : 'Login' ?></a>
        </div>
    </div>
</nav>