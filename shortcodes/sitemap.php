<div class="ei-datatable" style="display: none;">
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>
                    <?php
                    $custom_post_title = get_theme_mod('ei_custom_string_post_title');
                    echo esc_html(!empty($custom_post_title) ? $custom_post_title : 'Post Title');
                    ?>
                </th>
                <th>
                    <?php
                    $custom_date = get_theme_mod('ei_custom_string_date');
                    echo esc_html(!empty($custom_date) ? $custom_date : 'Date');
                    ?>
                </th>
                <th>
                    <?php
                    $custom_cat = get_theme_mod('ei_custom_string_categories');
                    echo esc_html(!empty($custom_cat) ? $custom_cat : 'Categories');
                    ?>
                </th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>