<?php

    if ( have_comments() ) :

        echo '<div id="comments">';
        
            echo '<h4>' . __('Comments', 'mnmlwp') . '</h4>';

            echo '<ol class="commentlist">';

                wp_list_comments( array(
                    'style' => 'ul',
                ) );

            echo '<ol>';

        echo '</div>';

    endif;

    comment_form();

    paginate_comments_links();
