<div class="full-color white">
    <h2 class="section-name">Organizacje członkowskie</h2>
    <?php
    if( have_rows('organizacje-czlonkowskie') ):
        $logos = array();
        while ( have_rows('organizacje-czlonkowskie') ) : the_row();
            $logo = get_sub_field('organizacje-czlonkowskie-logo');
            $link = get_sub_field('link');
            if( $logo ):
            $logos[] = array('logo' => $logo, 'link' => $link);
            endif;
        endwhile;
        
        // Losowe tasowanie obrazów
        shuffle($logos);
        
        echo '<div class="organizacje-czlonkowskie">';
        foreach ($logos as $item) {
            echo '<div class="org-logo">';
            if ($item['link']) {
                echo '<a href="' . esc_url($item['link']) . '">';
            }
            echo '<img src="' . esc_url($item['logo']['url']) . '" alt="' . esc_attr($item['logo']['alt']) . '" />';
            if ($item['link']) {
                echo '</a>';
            }
            echo '</div>';
        }
        echo '</div>';
    else :
        echo '<p>Brak organizacji członkowskich do wyświetlenia.</p>';
    endif;
    ?>
    <a href="#" class="section-next">O nas</a>
</div>