<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.tabs .tab-links a').on('click', function(e)  {
            var currentAttrValue = jQuery(this).attr('href');

            // Show/Hide Tabs
            jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

            // Change/remove current tab to active
            jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

            e.preventDefault();
        });
    });
</script>


<div class="wrap">
    <div class="main">

        <?php
            if( array_key_exists( 'notification', $viewmodel ) ) {
                echo '<div class="updated"><p><strong>' . __($viewmodel['notification'], 'menu-test') . '</strong></p></div>';
            }

            echo "<h2>" . __( 'Mandrill Cleaner Settings', 'menu-test' ) . "</h2>";
        ?>

        <div class="tabs standard">
            <ul class="tab-links">

                <li class="active"><a href="#tab1">Mandrill Settings</a></li>
                <li><a href="#tab2">Clean Mandrill Errors </a></li>
                <li><a href="#tab3"> Feature Request</a></li>

            <?php

                //Create tab links dynamically
                if( array_key_exists( 'tabs', $viewmodel )) {
                    foreach ( $viewmodel["tabs"] as $tab ) {
                        $i++;
                        //Default active tab is the first tab
                        $tabs .=  ( $i==1 ?  '<li class="active">' : '<li>' );
                        $tabs .=  '<a href="#tab' . $i . '">' . $tab["title"] . "</a></li>";
                    }

                    echo $tabs;
                }
            ?>

            </ul>

            <div class="tab-content">

                <!--Tabs -->
                 <?php
                    require_once('settings.tab.php');
                    require_once('clean.tab.php');
                    require_once('features.tab.php');
                ?>

            </div>

        </div>

    </div><!--end .main-->
</div>
