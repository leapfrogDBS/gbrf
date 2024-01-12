<?php
// admin/theme-admin-page.php

// Prevent direct access to this file.
defined('ABSPATH') || exit;

function display_filters_value()
{
    $filters = get_option('filters');
?>
    <div class="wrap">
        <h1>Filters Value</h1>
        <p>The value of "filters" option is: <?php echo esc_html($filters); ?></p>
    </div>
<?php
}
