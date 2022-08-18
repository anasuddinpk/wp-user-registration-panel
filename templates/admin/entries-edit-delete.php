<td>
    <div>
        <img src="<?php echo $nested_value ?>" class="avatar avatar-32 photo" id="<?php echo "user-img-" . $temp ?>" width="32" height="32" style="float:left; margin: 5px 10px 0 0">
        <strong id="<?php echo 'user-name-'. $temp .'';?>"><?php echo $value->name; ?></strong>
    </div>

    <div class="row-actions">
        <span class="trash">
            <a href="<?php echo admin_url() . 'options-general.php?page=users-registration&action=delete&id=' . $temp ?>" class="submitdelete">Trash</a> |
        </span>
        <span class="edit">
            <a id="<?php echo $temp?>" class="edit-record" style="cursor:pointer;">Edit</a> |
        </span>
        <span class="print">
            <a id="<?php echo 'Print-' . $temp; ?>" class="print-record" style="cursor:pointer;">Print</a>
        </span>
    </div>
</td>
