<?php

/*
 * ------------- PHP Code -------------
 */

include 'data.inc.php';

/**
 * Retrieve previous content from the form
 */

$loaded_information = read_data();


/**
 * Generate a field input based on a name
 *
 * @param $name
 * @param bool|true $with_checkbox
 * @return string
 */
function field_value($name, $key = null)
{
    global $loaded_information;

    $field_value = isset($loaded_information[$name]) ? $loaded_information[$name] : ['value' => null, 'privacy' => 'public'];
    if ($field_value != null && !isset($field_value['privacy']) && !is_null($key) && isset($loaded_information[$key]) && isset($loaded_information[$key]['privacy'])) {
        $field_value['privacy'] = $loaded_information[$key]['privacy'];
    }

    if (isset($field_value['privacy']) && $field_value['privacy'] == 'private') {
        return 'This information is private';
    }

    return is_null($field_value['value']) || $field_value['value'] == '' ? '<span style="color:#AAA">Not entered</span>' : $field_value['value'];
}

?>

<?php
/*
 * ------------ Code page ---------
 */
?>

<?php

$url = 'profile';
include 'header-user.inc.php';
?>

<div id="profile-management">
    <form method="post">
        <div id="fields-section">
            <?php
            foreach ($fields as $field => $data) {
                if (is_array($data)) {
                    ?>
                    <fieldset>
                        <div class="well">
                            <legend><?php echo $field; ?></legend>
                            <?php foreach ($data as $key => $value) { ?>
                                <?php
                                $linked_to = null;
                                if (!is_int($key)) {
                                    $linked_to = $value;
                                    $value = $key;
                                }
                                ?>
                                <div class="field">
                                    <label><?php echo ucfirst($value); ?></label>

                                    <div>
                                        <?php echo field_value($value, $linked_to); ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </fieldset>
                    <br/>
                    <?php
                } else {
                    ?>
                    <div class="well">
                        <div class="field">
                            <label><?php echo ucfirst($data); ?></label>

                            <div>
                                <?php echo field_value($data); ?>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <?php
                }
            }
            ?>
        </div>
        <div class="text-center">
            <input type="submit" value="save"/>
        </div>
    </form>
</div>


<?php
include 'footer.inc.php';
?>
