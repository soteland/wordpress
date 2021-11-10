<aside id="block-99" class="widget inner-padding widget_block">
    <div class="wp-block-group">
        <div class="wp-block-group__inner-container">
            <p>
                <h2>OBS!</h2>
                <ul class="wp-block-latest-posts__list wp-block-latest-posts">
                    <?php
                    $recent_posts = wp_get_recent_posts(array('post_type'=>'custom-post-type-slug'));
                    foreach( $recent_posts as $recent ){
                        $current_page = $recent["post_name"] == basename(get_permalink()) ? 'current' : '';
                        echo '<li><a class="'.$current_page.'" href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
                    }
                    ?>
                </ul>
            </p>
        </div>
    </div>
</aside>
