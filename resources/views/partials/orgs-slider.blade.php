<div class="full-color white">
    <h2 class="section-name">Organizacje członkowskie</h2>
    <?php
    if( have_rows('organizacje-czlonkowskie') ):
        $logos = array();
        while ( have_rows('organizacje-czlonkowskie') ) : the_row();
            $logo = get_sub_field('organizacje-czlonkowskie-logo');
            if( $logo ):
                $logos[] = $logo;
            endif;
        endwhile;
        
        // Losowe tasowanie obrazów
        shuffle($logos);
        
        echo '<div class="organizacje-czlonkowskie">';
        foreach ($logos as $logo) {
            echo '<div class="org-logo">';
            echo '<img src="' . esc_url($logo['url']) . '" alt="' . esc_attr($logo['alt']) . '" />';
            echo '</div>';
        }
        echo '</div>';
    else :
        echo '<p>Brak organizacji członkowskich do wyświetlenia.</p>';
    endif;
    ?>
    <a href="#" class="section-next">O nas</a>
</div>
