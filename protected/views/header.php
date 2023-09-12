<?php
require PROTECTED_DIR.'menu.php';
require_once CORE_DIR.'views.php';
?>


<header class="hero">
        <div id="navbar" class="navbar">
            <h1 class="logo"><span class="text-primary">Beauty</span> Salon</h1>
            <nav>
                <?php print_menu($menu)?>
            </nav>
        </div>
        <div class="content">
            <h1>Our passion is Beauty</h1>
            <p>We make you look better</p>
            <a href="#about" class="btn"><i class="fas fa-chevron-right"></i> About us</a>
    </header>