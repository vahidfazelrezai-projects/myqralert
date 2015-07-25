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
function field_input($name, $with_checkbox = true)
{
    global $loaded_information, $privacy;

    $field_value = isset($loaded_information[$name]) ? $loaded_information[$name] : ['value' => null, 'privacy' => 'public'];

    $html = '<input type="text" name="info[' . $name . '][value]" value="' . htmlentities($field_value['value']) . '" placeholder="' . $name . '" />';
    if ($with_checkbox === true) {
        $checkboxs = '';

        foreach ($privacy as $privacy_level => $label) {
            $status = ($field_value['privacy'] == $privacy_level ? 'checked="checked"' : '');
            $checkboxs .= '<span><input type="radio" name="info[' . $name . '][privacy]" class="toggle-on" value="' . $privacy_level . '" ' . $status . '"/>' . $label . '</span>';
        }
        $html .= $checkboxs;
    }

    return $html;
}

/**
 * Logic to save the form into a file if triggered
 */
if (isset($_POST['info'])) {
    save_data($_POST['info']);

    header("Location:management.php");
    exit;
}
?>

<?php
/*
 * ------------ Code page ---------
 */
?>

<?php
include 'header.inc.php';
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
                            <legend><span><?php echo $field; ?></span></legend>
                            <?php foreach ($data as $key => $value) { ?>
                                <div class="field">
                                    <label><?php echo $value; ?></label>

                                    <div>
                                        <?php echo field_input($value); ?>
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
                            <label><?php echo $data; ?></label>

                            <div>
                                <?php echo field_input($data); ?>
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
