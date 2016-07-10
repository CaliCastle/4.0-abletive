<?php
global $mkd_burst_options, $mkd_burst_page_id;
$sidebar_id = $mkd_burst_page_id;
?>
<div class="column_inner">
    <aside class="sidebar">
        <?php
        $sidebar = "";

        $is_woocommerce = false;
        if (function_exists("is_woocommerce")) {
            $is_woocommerce = is_woocommerce();
            if ($is_woocommerce) {
                $sidebar_id = get_option('woocommerce_shop_page_id');
            }
        }

        if (get_post_meta($sidebar_id, 'mkd_choose-sidebar', true) != "") {
            $sidebar = get_post_meta($sidebar_id, 'mkd_choose-sidebar', true);
        } else {
            if (is_singular("post")) {
                if ($mkd_burst_options['blog_single_sidebar_custom_display'] != "") {
                    $sidebar = $mkd_burst_options['blog_single_sidebar_custom_display'];
                } else {
                    $sidebar = "sidebar";
                }
            } else {
                $sidebar = "sidebar_page";
            }
        } ?>

        <?php if (is_active_sidebar($sidebar)) {
            dynamic_sidebar($sidebar);
        } ?>
    </aside>
</div>
