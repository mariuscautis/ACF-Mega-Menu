<?php 
// Phone Picks - Mega Menu 
?>

<section class="mega-menu">
    <div class="top-bar">
        <div class="hamburger-menu" id="hamburger-menu">
            <div class="menu-bar1"></div>
            <div class="menu-bar2"></div>
            <div class="menu-bar3"></div>
        </div>
    </div>
    <div class="container">
        <div class="menu-outer">
            <?php
                // Check if rows exist.
                if( have_rows('mega_menu', 'option') ):

                    // Loop through rows.
                    while( have_rows('mega_menu', 'option') ) : the_row();

                        // Load sub field value.
                        $parent_menu_label = get_sub_field('parent_menu_item');
                        $custom_class = get_sub_field('custom_menu_item_class');
                        ?>
                        <div class="menu-item <?php echo $custom_class; ?>">
                            <h3 class="parent-menu-item"><?php echo esc_html($parent_menu_label); ?></h3>
                            <div class="sub-menu-outer">
                                <div class="content-wrapper"> <!-- New wrapper div -->
                                    <?php
                                        // Check if rows exist.
                                        if( have_rows('dropdown_items') ):

                                            // Loop through rows.
                                            while( have_rows('dropdown_items') ) : the_row();

                                                // Load sub field value.
                                                $sub_menu_column_label = get_sub_field('submenu_column_label'); ?>
                                                <div class="sub-menu-column">
                                                    <h4><?php echo esc_html($sub_menu_column_label); ?></h4>
                                                    <?php
                                                        // Check if rows exist.
                                                        if( have_rows('submenu_column') ):

                                                            // Loop through rows.
                                                            while( have_rows('submenu_column') ) : the_row();

                                                                // Load sub field value.
                                                                $sub_menu_label = get_sub_field('submenu_item_label');
                                                                $sub_menu_link = get_sub_field('submenu_link'); ?>
                                                                <a href="<?php echo esc_url($sub_menu_link); ?>" class="sub-menu-item"><?php echo esc_html($sub_menu_label); ?></a>
                                                            <?php endwhile; // End loop.

                                                        else :
                                                            // No value.
                                                        endif; ?>
                                                </div>
                                            <?php endwhile; // End loop.

                                        else :
                                            // No value.
                                        endif; ?>
                                </div> <!-- End wrapper div -->
                            </div>
                        </div>
                    <?php endwhile; // End loop.

                else :
                    // No value.
                endif;
            ?>
        </div>
    </div>
</section>




<style>

/* Header  Start  */

.mega-menu .sub-menu-item:focus {
    outline: none;
}

@media screen and (min-width: 1401px) {
    .header-top .search-area {
        display: flex;
        align-items: center;
        justify-content: right;
    }

    .mega-menu {
        background-color: var(--dark-blue);
        color: #fff;
        position: relative;
    }

    .mega-menu {
        -webkit-box-shadow: 0px 9px 14px -8px rgba(0,0,0,0.68);
        -moz-box-shadow: 0px 9px 14px -8px rgba(0,0,0,0.68);
        box-shadow: 0px 9px 14px -8px rgba(0,0,0,0.68);
    }

    .mega-menu .menu-outer {
        display: flex;
        flex-wrap: nowrap;
    }

    .mega-menu .sub-menu-item,
    .mega-menu h3 {
        color: #fff;
        padding: 0px 10px;
        font-size: 20px;
    }

    .mega-menu .sub-menu-item {
        text-decoration: none;
        flex-basis: 100%;
    }

    .mega-menu .sub-menu-outer {
        display: none;
        position: absolute;
        top: auto;
        left: 0;
        right: 0;
        width: 100vw;
        background-color: #fff;
        z-index: 1000;
        padding: 30px 0;
        -webkit-box-shadow: 0px 9px 14px -8px rgba(0,0,0,0.68);
        -moz-box-shadow: 0px 9px 14px -8px rgba(0,0,0,0.68);
        box-shadow: 0px 9px 14px -8px rgba(0,0,0,0.68);
    }

    .mega-menu .sub-menu-outer .content-wrapper {
        max-width: 1600px;
        margin: 0 auto;
        padding: 0 10px;
        display: flex;
    }

    .mega-menu .menu-item.visible .sub-menu-outer {
        display: block;
    }

    .mega-menu .sub-menu-column h4 {
        font-size: 18px;
        color: var(--medium-blue);
        margin-top: 10px;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .mega-menu .sub-menu-column {
        display: flex;
        flex-wrap: wrap;
    }

    .mega-menu .sub-menu-item {
        font-size: 16px;
        color: var(--lightgrey);
        flex-basis: 100%;
        padding: 0px;
        margin-bottom: 5px;
    }

    .mega-menu .menu-item,
    .mega-menu .sub-menu-item:hover {
        cursor: pointer;
    }

    .mega-menu .sub-menu-item:hover {
        color: var(--coral);
        transition: 0.3s;
    }

    .mega-menu .menu-item.has-child h3::after {
        content: '';
        width: 20px;
        height: 20px;
        background-image: url(/wp-content/themes/phone-picks/assets/images/chevron-down.png);
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        position: absolute;
        top: 5px;
        right: 22px;
        display: flex;
        filter: invert(100%) sepia(0%) saturate(1%) hue-rotate(138deg) brightness(103%) contrast(101%);
        transition: 0.3s;
    }

    .mega-menu .menu-item.visible.has-child h3::after {
        transform: rotate(180deg);
        transition: 0.3s;
    }

    .mega-menu .menu-item.has-child h3 {
        position: relative;
        padding-right: 50px;
    }

    .mega-menu .open-menu,
    .mega-menu .close-menu {
        display: none;
    }
}

@media screen and (max-width: 1400px) {
    .mega-menu .menu-outer {
        border: 1px solid;
        max-width: 400px;
        height: 100vh;
        position: absolute;
        top: 0;
        z-index: 10;
        padding: 150px 50px 50px;
        background-color: var(--darkerBlue);
        width: 100%;
    }

    .mega-menu .menu-item.has-child {
        display: flex;
        flex-wrap: wrap;
    }

    .mega-menu .menu-item.has-child h3::after {
        content: '';
        width: 20px;
        height: 20px;
        background-image: url(/wp-content/themes/phone-picks/assets/images/chevron-down.png);
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        position: absolute;
        top: 7px;
        right: 2px;
        display: flex;
        filter: invert(100%) sepia(0%) saturate(1%) hue-rotate(138deg) brightness(103%) contrast(101%);
        transition: 0.3s;
    }

    .mega-menu .menu-item.visible.has-child h3::after {
        transform: rotate(180deg);
        transition: 0.3s;
    }

    .mega-menu .menu-item.has-child h3 {
        position: relative;
        padding-right: 50px;
    }

    .mega-menu .menu-outer {
        -webkit-box-shadow: 8px -2px 18px -7px rgba(0,0,0,0.68);
        -moz-box-shadow: 8px -2px 18px -7px rgba(0,0,0,0.68);
        box-shadow: 8px -2px 18px -7px rgba(0,0,0,0.68);
    }

    .mega-menu .menu-item .sub-menu-item,
    .mega-menu .menu-item.has-child h4,
    .mega-menu .menu-item.has-child h3 {
        color: #fff;
    }

    .mega-menu .menu-item .sub-menu-item {
        text-decoration: none;
        flex-basis: 100%;
        padding-left: 20px;
    }

    .mega-menu .menu-item.visible h3 {
        color: var(--coral);
        transition: 0.3s;
        margin-bottom: 5px;
    }

    .mega-menu .menu-item .sub-menu-column {
        display: flex;
        flex-wrap: wrap;
        justify-content: left;
    }

    .mega-menu .menu-item.has-child h4 {
        margin-bottom: 10px;
        padding-left: 20px;
        color: var(--paleBlue);
    }

    .top-bar {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 20;
        background: var(--darkerBlue);
        height: 80px;
        display: flex;
        width: 100%;
        align-items: center;
        padding: 20px 50px;
        transition: .3s;
    }

    .hamburger-menu {
        position: fixed;
        z-index: 20;
        cursor: pointer;
    }

    .menu-bar1,
    .menu-bar2,
    .menu-bar3 {
        width: 3.5rem;
        height: 0.2rem;
        background-color: #fff;
        margin: 0.8rem 0;
        transition: 0.4s;
    }

    .menu-bar2 {
        width: 2rem;
    }

    .active .menu-bar1 {
        transform: rotate(-45deg) translate(-0.7rem, 0.8rem);
    }

    .active .menu-bar2 {
        opacity: 0;
    }

    .active .menu-bar3 {
        transform: rotate(45deg) translate(-0.6rem, -0.8rem);
    }

    .menu-outer {
        margin-left: -300%;
        transition: 0.3s;
    }

    .mega-menu.active .menu-outer {
        margin-left: 0%;
        transition: 0.3s;
    }

    .mega-menu.active .top-bar {
        background-color: transparent;
        transition: .3s;
    }
}
/* Header End  */




</style>







<script>


jQuery(document).ready(function($) {
    // Mega Menu Start 
    // Hide all sub-menu-outer divs initially
    $('.mega-menu .sub-menu-outer').hide();

    // Function to show the submenu
    function showSubMenu(item) {
        $(item).addClass('visible');
        $(item).find('.sub-menu-outer').stop(true, true).slideDown('fast');
    }

    // Function to hide the submenu
    function hideSubMenu(item) {
        $(item).find('.sub-menu-outer').stop(true, true).slideUp('fast', function() {
            $(item).removeClass('visible');
        });
    }

    // Function to toggle the submenu on click
    function toggleSubMenu(item) {
        if ($(item).hasClass('visible')) {
            hideSubMenu(item);
        } else {
            hideSubMenu($('.mega-menu .menu-item.visible')); // Hide other open sub-menus
            showSubMenu(item);
        }
    }

    // Event handlers for larger screens
    function applyLargeScreenHandlers() {
        $('.mega-menu .menu-item').off('mouseenter mouseleave click');

        $('.mega-menu .menu-item').mouseenter(function() {
            showSubMenu(this);
        }).mouseleave(function() {
            if (!$(this).hasClass('click-open')) {
                hideSubMenu(this);
            }
        });

        $('.mega-menu .menu-item').click(function(event) {
            event.stopPropagation();
            $(this).toggleClass('click-open');
            toggleSubMenu(this);
        });

        $(document).click(function() {
            hideSubMenu($('.mega-menu .menu-item.visible'));
            $('.mega-menu .menu-item').removeClass('click-open');
        });
    }

    // Event handlers for smaller screens
    function applySmallScreenHandlers() {
        $('.mega-menu .menu-item').off('mouseenter mouseleave click');

        $('.mega-menu .menu-item').click(function(event) {
            event.stopPropagation();
            toggleSubMenu(this);
        });

        $(document).click(function() {
            hideSubMenu($('.mega-menu .menu-item.visible'));
        });
    }

    // Function to check screen size and apply appropriate handlers
    function checkScreenSize() {
        if ($(window).width() > 1400) {
            applyLargeScreenHandlers();
        } else {
            applySmallScreenHandlers();
        }
    }

    // Initial check
    checkScreenSize();

    // Reapply event handlers on window resize
    $(window).resize(function() {
        checkScreenSize();
    });

    // Hamburger menu functionality
    const hamburgerMenu = $('#hamburger-menu');
    const megaMenu = $('.mega-menu');

    function toggleMegaMenu() {
        hamburgerMenu.toggleClass('active');
        megaMenu.toggleClass('active');
    }

    // Events Listeners
    hamburgerMenu.on('click', function(event) {
        event.stopPropagation(); // Prevents the click event from bubbling up to the document
        toggleMegaMenu();
    });

    // Click event on document to handle clicks outside the menu
    $(document).on('click', function(event) {
        // Check if the mega-menu has the active class
        if (megaMenu.hasClass('active')) {
            // Check if the click happened outside the .menu-outer
            if (!$(event.target).closest('.menu-outer').length) {
                // Remove the active class from both hamburgerMenu and megaMenu
                hamburgerMenu.removeClass('active');
                megaMenu.removeClass('active');
            }
        }
    });


    // Mega Menu End
});

</script>