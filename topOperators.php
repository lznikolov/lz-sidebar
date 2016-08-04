<?php

/*
Plugin Name: LZ Top Operators
Plugin URI: http://luckylabz.com/wp/plugins/top-operator
Description: Luckylabz Top Operators
Author: Rangel Nikolov
Author URI: http://luckylabz.com/profile/nikolov
Version: 0.1
Text Domain: mini-strap
*/

class TopOperator extends WP_Widget
{

    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'topoperator',
            'description' => 'LZ Top Operator Widget',
        );
        $control_ops = array('width' => 400, 'height' => 350);
        parent::__construct('topoperator', 'Top Operator', $widget_ops, $control_ops);
    }

    /**
     * Outputs the content of the widget
     * @see WP_Widget::widget()
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        require( get_template_directory().'/partials/sidebar-topoperator.php');
        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @see WP_Widget::form()
     * @param array $instance The widget options. Previously saved values from database.
     */
    public function form($instance)
    {
        /* Class Extractor Setting*/
        $operShortnameOrID = !empty($instance['operShortnameOrID']) ? $instance['operShortnameOrID'] : '';
        $bonusType = !empty($instance['bonusType']) ? $instance['bonusType'] : '';
        $bonusReplace = !empty($instance['bonusReplace']) ? $instance['bonusReplace'] : '';
        $unsetBonusCheck = !empty($instance['unsetBonusCheck']) ? $instance['unsetBonusCheck'] : '';
        $unsetStandardCheck = !empty($instance['unsetStandardCheck']) ? $instance['unsetStandardCheck'] : '';
        $bonusLimit = !empty($instance['bonusLimit']) ? $instance['bonusLimit'] : '';
        $useBonusGroup = !empty($instance['useBonusGroup']) ? $instance['useBonusGroup'] : '';
        $useShortname = !empty($instance['useShortname']) ? $instance['useShortname'] : '';
        $unsetSetTypeCheck = !empty($instance['unsetSetTypeCheck']) ? $instance['unsetSetTypeCheck'] : '';

        /* Unique Element Settings*/
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $mobileOS = !empty($instance['mobileOS']) ? $instance['mobileOS'] : '';
        $unique_element_id = !empty($instance['unique_element_id']) ? $instance['unique_element_id'] : '';
        ?>
        <fieldset>
            <legend>UNIQUE ELEMENT SETTINGS</legend>
            <p>
                <label for="<?= esc_attr($this->get_field_id('title')); ?>"><?= _e(esc_attr('Title:')); ?></label>
                <input class="widefat" id="<?= esc_attr($this->get_field_id('title')); ?>"
                       name="<?= esc_attr($this->get_field_name('title')); ?>" type="text"
                       value="<?= esc_attr($title); ?>">

                <label
                    for="<?= esc_attr($this->get_field_id('mobileOS')); ?>"><?= _e(esc_attr('Mobile OS:')); ?></label>
                <input class="widefat" id="<?= esc_attr($this->get_field_id('mobileOS')); ?>"
                       name="<?= esc_attr($this->get_field_name('mobileOS')); ?>" type="text"
                       value="<?= esc_attr($mobileOS); ?>">

                <label
                    for="<?= esc_attr($this->get_field_id('unique_element_id')); ?>"><?= _e(esc_attr('Unique Element Id:')); ?></label>
                <input class="widefat" id="<?= esc_attr($this->get_field_id('unique_element_id')); ?>"
                       name="<?= esc_attr($this->get_field_name('unique_element_id')); ?>" type="text"
                       value="<?= esc_attr($unique_element_id); ?>">
            </p>
        </fieldset>
        <fieldset>
            <legend>CLASS EXTRACTOR SETTINGS</legend>
            <p>

                <label
                    for="<?= esc_attr($this->get_field_id('operShortnameOrID')); ?>"><?= _e(esc_attr('Operator Shortname / ID:')); ?></label>
                <input class="widefat" id="<?= esc_attr($this->get_field_id('operShortnameOrID')); ?>"
                       name="<?= esc_attr($this->get_field_name('operShortnameOrID')); ?>" type="text"
                       value="<?= esc_attr($operShortnameOrID); ?>" placeholder="Not used in Top Operator" disabled>

                <label
                    for="<?= esc_attr($this->get_field_id('bonusType')); ?>"><?= _e(esc_attr('Bonus Type:')); ?></label>
                <input class="widefat" id="<?= esc_attr($this->get_field_id('bonusType')); ?>"
                       name="<?= esc_attr($this->get_field_name('bonusType')); ?>" type="text"
                       value="<?= esc_attr($bonusType); ?>">

                <label
                    for="<?= esc_attr($this->get_field_id('bonusReplace')); ?>"><?= _e(esc_attr('Bonus Replace:')); ?></label>
                <input class="widefat" id="<?= esc_attr($this->get_field_id('bonusReplace')); ?>"
                       name="<?= esc_attr($this->get_field_name('bonusReplace')); ?>" type="text"
                       value="<?= esc_attr($bonusReplace); ?>">

                <label
                    for="<?= esc_attr($this->get_field_id('unsetBonusCheck')); ?>"><?= _e(esc_attr('Unset Bonus Check:')); ?></label>
                <input class="widefat" id="<?= esc_attr($this->get_field_id('unsetBonusCheck')); ?>"
                       name="<?= esc_attr($this->get_field_name('unsetBonusCheck')); ?>" type="text"
                       value="<?= esc_attr($unsetBonusCheck); ?>">

                <label
                    for="<?= esc_attr($this->get_field_id('unsetStandardCheck')); ?>"><?= _e(esc_attr('Unset Standard Check:')); ?></label>
                <input class="widefat" id="<?= esc_attr($this->get_field_id('unsetStandardCheck')); ?>"
                       name="<?= esc_attr($this->get_field_name('unsetStandardCheck')); ?>" type="text"
                       value="<?= esc_attr($unsetStandardCheck); ?>">

                <label
                    for="<?= esc_attr($this->get_field_id('useBonusGroup')); ?>"><?= _e(esc_attr('Use Bonus Group:')); ?></label>
                <input class="widefat" id="<?= esc_attr($this->get_field_id('useBonusGroup')); ?>"
                       name="<?= esc_attr($this->get_field_name('useBonusGroup')); ?>" type="text"
                       value="<?= esc_attr($useBonusGroup); ?>">

                <label
                    for="<?= esc_attr($this->get_field_id('useShortname')); ?>"><?= _e(esc_attr('Use Shortname:')); ?></label>
                <input class="widefat" id="<?= esc_attr($this->get_field_id('useShortname')); ?>"
                       name="<?= esc_attr($this->get_field_name('useShortname')); ?>" type="text"
                       value="<?= esc_attr($useShortname); ?>">

                <label
                    for="<?= esc_attr($this->get_field_id('unsetSetTypeCheck')); ?>"><?= _e(esc_attr('unsetSetTypeCheck :')); ?></label>
                <input class="widefat" id="<?= esc_attr($this->get_field_id('unsetSetTypeCheck')); ?>"
                       name="<?= esc_attr($this->get_field_name('unsetSetTypeCheck')); ?>" type="number"
                       title="Search in options not in bonuses"
                       placeholder=" 1 or empty"
                       value="<?= esc_attr($unsetSetTypeCheck); ?>">

                <label
                    for="<?= esc_attr($this->get_field_id('bonusLimit')); ?>"><?= _e(esc_attr('Bonus Limit:')); ?></label>
                <input class="widefat" id="<?= esc_attr($this->get_field_id('bonusLimit')); ?>"
                       name="<?= esc_attr($this->get_field_name('bonusLimit')); ?>" type="number"
                       value="<?= esc_attr($bonusLimit); ?>">
            </p>
        </fieldset>
        <?php
    }

    /**
     * Processing widget options on save
     *
     * #@see WP_Widget::update()
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = !empty($new_instance['title']) ? strip_tags($new_instance['title']) : '';
        $instance['mobileOS'] = !empty($new_instance['mobileOS']) ? strip_tags($new_instance['mobileOS']) : '';
        $instance['unique_element_id'] = !empty($new_instance['unique_element_id']) ? strip_tags($new_instance['unique_element_id']) : '';

        $instance['operShortnameOrID'] = !empty($new_instance['operShortnameOrID']) ? strip_tags($new_instance['operShortnameOrID']) : '';
        $instance['bonusType'] = !empty($new_instance['bonusType']) ? strip_tags($new_instance['bonusType']) : '';
        $instance['bonusReplace'] = !empty($new_instance['bonusReplace']) ? strip_tags($new_instance['bonusReplace']) : '';
        $instance['unsetBonusCheck'] = !empty($new_instance['unsetBonusCheck']) ? strip_tags($new_instance['unsetBonusCheck']) : '';
        $instance['unsetStandardCheck'] = !empty($new_instance['unsetStandardCheck']) ? strip_tags($new_instance['unsetStandardCheck']) : '';
        $instance['bonusLimit'] = !empty($new_instance['bonusLimit']) ? strip_tags($new_instance['bonusLimit']) : '';
        $instance['useBonusGroup'] = !empty($new_instance['useBonusGroup']) ? strip_tags($new_instance['useBonusGroup']) : '';
        $instance['useShortname'] = !empty($new_instance['useShortname']) ? strip_tags($new_instance['useShortname']) : '';
        $instance['unsetSetTypeCheck'] = !empty($new_instance['unsetSetTypeCheck']) ? strip_tags($new_instance['unsetSetTypeCheck']) : '';
        return $instance;
    }
}

add_action('widgets_init', function () {
    register_widget('TopOperator');
});