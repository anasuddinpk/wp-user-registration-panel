<div class="wrap">
    <table class="wp-list-table widefat fixed striped table-view-list posts">
        <thead>
            <tr>
                <th class="manage-column">
                    Profile
                </th>
                <th class="manage-column">
                    Email
                </th>
                <th class="manage-column">
                    Phone
                </th>
                <th class="manage-column">
                    Date of Birth
                </th>
            </tr>
        </thead>
        <tbody id="the-list">
            <?php
            if( !empty($result) ){

                foreach ($result as $key => $value) {
                    echo '<tr class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry category-uncategorized">';
                    $temp = '';
                    $incr = 1;
                    foreach ($value as $nested_key => $nested_value) {
                        if($nested_key == 'id'){
                            $temp = $nested_value;
                            continue;
                        }
                        if($nested_key == 'name'){
                            continue;
                        }
                        if($nested_key == 'image_url'){
                            include plugin_dir_path( __FILE__ ) . '/entries-edit-delete.php';
                        }
                        else{
                            echo '<td id=val-'. $temp . "-" . ++$incr .'>';
                            echo $nested_value;
                            echo '</td>';
                        }
                    }
                    echo '</tr>';
                    $temp = '';
                }

            }
            else{
                echo '<td colspan=4 style="text-align:center"><h3>No users registered</h3></td>';
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th class="manage-column">
                    Name
                </th>
                <th class="manage-column">
                    Email
                </th>
                <th class="manage-column">
                    Phone
                </th>
                <th class="manage-column">
                    Date of Birth
                </th>
            </tr>
        </tfoot>
    </table>
</div>