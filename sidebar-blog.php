<?php
/*	
*	---------------------------------------------------------------------
*	SCOPE Blog sidebar
*	--------------------------------------------------------------------- 
*/
?>
<aside class="page-sibar" itemscope itemtype="http://schema.org/WPSideBar">
    <div class="widget-area">
        <?php if ( ! dynamic_sidebar( 'blog-sidebar' ) ) : ?>

            <aside id="archives" class="widget">
                <h3 class="widget-title"><?php esc_html_e( 'Archives', 'scope' ); ?></h3>
                <ul>
                    <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                </ul>
            </aside>

            <aside id="meta" class="widget">
                <h3 class="widget-title"><?php esc_html_e( 'Meta', 'scope' ); ?></h3>
                <ul>
                    <?php wp_register(); ?>
                    <aside role="complementary"><?php wp_loginout(); ?></aside>
                    <?php wp_meta(); ?>
                </ul>
            </aside>

        <?php endif; ?>
    </div>
</aside><!-- .page-sidebar -->