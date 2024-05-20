<div class="full-color white">
    <h2 class="section-name">Organizacje członkowskie</h2>
    <?php
    // Pobierz ID strony głównej
    $homepage_id = get_option('page_on_front');

    if (have_rows('organizacje-czlonkowskie', $homepage_id)):
        $logos = array();
        while (have_rows('organizacje-czlonkowskie', $homepage_id)): the_row();
            $logo = get_sub_field('organizacje-czlonkowskie-logo', $homepage_id);
            $link = get_sub_field('link', $homepage_id);
            if ($logo):
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
    else:
        echo '<p>Brak organizacji członkowskich do wyświetlenia.</p>';
    endif;
    ?>
    <a href="#" class="section-next">O nas</a>
</div>
