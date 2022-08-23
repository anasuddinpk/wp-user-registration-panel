<div class="wrap">
    <table class="wp-list-table widefat fixed striped table-view-list posts">
        <thead>
            <tr>
                <th class="manage-column" style="width:15%">
                    Profile
                </th>
                <th class="manage-column" style="width:8%">
                    Role
                </th>
                <th class="manage-column"  style="width:15%">
                    Contact
                </th>
                <th class="manage-column" style="width:9%">
                    Date of Birth
                </th>
                <th class="manage-column" >
                    Website
                </th>
                <th class="manage-column" style="width:8%">
                    Language(s)
                </th>
                <th class="manage-column" style="width:10%">
                    Technicalities
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
                        if($nested_key == 'name' || $nested_key == 'phone' || $nested_key == 'gender'){
                            continue;
                        }
                        if($nested_key == 'image_url'){
                            include plugin_dir_path( __FILE__ ) . '/entries-edit-delete.php';
                        }
                        else if($nested_key == 'email'){
                            echo '<td id=val-'. $temp . "-" . ++$incr .'>';
                            echo '<span class = "email">';
                            echo $nested_value;
                            echo '</span>';
                            echo '<br>';
                            echo '<span class="phone">';
                            echo 'Phone: ' . $value->phone;
                            echo '</span>';
                            echo '</td>';
                        }
                        else if($nested_key == 'website_url'){
                            echo '<td id=val-'. $temp . "-" . ++$incr .'>';
                            echo "<a href='".$nested_value."'>" . $nested_value . "</a>";
                            echo '</td>';
                        }
                        else if($nested_key == 'dob'){
                            echo '<td id=val-'. $temp . "-" . ++$incr .'>';
                            echo '<span class="dob">';
                            echo $nested_value;
                            echo '</span>';
                            echo "<br>";
                            echo '<span class="gender">';
                            echo "Gender: " . $value->gender;
                            echo '</span>';
                            echo '</td>';
                        }
                        else if($nested_key == 'languages' || $nested_key == 'technicality'){
                            echo '<td id=val-'. $temp . "-" . ++$incr .'>';
                            echo str_replace(",", ",  <br>", $nested_value);
                            echo '</td>';
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
                echo '<td colspan=7 style="text-align:center"><h3>No users registered</h3></td>';
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
            <th class="manage-column">
                    Profile
                </th>
                <th class="manage-column">
                    Role
                </th>
                <th class="manage-column">
                    Contact
                </th>
                <th class="manage-column">
                    Date of Birth
                </th>
                <th class="manage-column">
                    Website
                </th>
                <th class="manage-column">
                    Languages
                </th>
                <th class="manage-column">
                    Technicalities
                </th>
            </tr>
        </tfoot>
    </table>
</div>