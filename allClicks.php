<?php

/*
Plugin Name: LZ All Clicks
Plugin URI: http://luckylabz.com/wp/plugins/lz-all-clicks
Description: Get all clicks
Author: Rangel Nikolov
Author URI: http://luckylabz.com/profile/nikolov
Version: 0.1
Text Domain: mini-strap
*/

class AllClicks extends WP_Widget
{

    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'allclicks',
            'description' => 'LZ All Clicks Widget'
        );
        $control_ops = array('width' => 400, 'height' => 350);
        parent::__construct('allclicks', 'All Clicks', $widget_ops, $control_ops);
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
        require_once( get_template_directory().'/partials/sidebar-allclicks.php');
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
        $odometer_duration = !empty($instance['odometer_duration']) ? $instance['odometer_duration'] : '';
        $odometer_animation = !empty($instance['odometer_animation']) ? $instance['odometer_animation'] : '';
        $odometer_theme = !empty($instance['odometer_theme']) ? $instance['odometer_theme'] : '';
        $odometer_format = !empty($instance['odometer_format']) ? $instance['odometer_format'] : '';

        ?>
        <fieldset>
            <legend>Counter Settings</legend>
            <p>
                <label
                    for="<?= esc_attr($this->get_field_id('odometer_duration')); ?>"><?= _e(esc_attr('Duration:')); ?></label>
                <input class="widefat" id="<?= esc_attr($this->get_field_id('odometer_duration')); ?>"
                       name="<?= esc_attr($this->get_field_name('odometer_duration')); ?>" type="number"
                       placeholder="3000ms" title="Change how long the javascript expects the CSS animation to take"
                       value="<?= esc_attr($odometer_duration); ?>">
                <label
                    for="<?= esc_attr($this->get_field_id('odometer_animation')); ?>"><?= _e(esc_attr('Animation:')); ?></label>
                <input class="widefat" id="<?= esc_attr($this->get_field_id('odometer_animation')); ?>"
                       name="<?= esc_attr($this->get_field_name('odometer_animation')); ?>" type="text"
                       placeholder="count"
                       title="Count is a simpler animation method which just increments the value, use it when you're looking for something more subtle."
                       value="<?= esc_attr($odometer_animation); ?>">
                <label for="<?php echo $this->get_field_id('odometer_theme'); ?>">Theme:
                    <select class='widefat' id="<?php echo $this->get_field_id('odometer_theme'); ?>"
                            name="<?php echo $this->get_field_name('odometer_theme'); ?>" type="text"
                            title="Specify the theme (if you have more than one theme css file on the page)">
                        <option value='default'<?php echo ($odometer_theme == 'default') ? 'selected' : ''; ?>>
                            Default
                        </option>
                        <option value='minimal' <?php echo ($odometer_theme == 'minimal') ? 'selected' : ''; ?>>
                            Minimal
                        </option>
                        <option value='car' <?php echo ($odometer_theme == 'car') ? 'selected' : ''; ?>>
                            Car
                        </option>
                        <option value='plaza' <?php echo ($odometer_theme == 'plaza') ? 'selected' : ''; ?>>
                            Plaza
                        </option>
                        <option
                            value='slot-machine' <?php echo ($odometer_theme == 'slot-machine') ? 'selected' : ''; ?>>
                            Slot Machine
                        </option>
                        <option
                            value='train-station' <?php echo ($odometer_theme == 'train-station') ? 'selected' : ''; ?>>
                            Train Station
                        </option>
                        <option value='digital' <?php echo ($odometer_theme == 'digital') ? 'selected' : ''; ?>>
                            Digital
                        </option>
                    </select>
                </label>
                <label
                    for="<?= esc_attr($this->get_field_id('odometer_format')); ?>"><?= _e(esc_attr('Format:')); ?></label>
                <select class='widefat' id="<?php echo $this->get_field_id('odometer_format'); ?>"
                        name="<?php echo $this->get_field_name('odometer_format'); ?>" type="text"
                        title="Change how digit groups are formatted, and how many digits are shown after the decimal point">
                    <option value='(,ddd)' <?php echo ($odometer_format == '(,ddd)') ? 'selected' : ''; ?>>
                        xx,xxx,xxx
                    </option>
                    <option value='(,ddd).dd' <?php echo ($odometer_format == '(,ddd).dd') ? 'selected' : ''; ?>>
                        xx,xxx,xxx.xx
                    </option>
                    <option value='(.ddd),dd' <?php echo ($odometer_format == '(.ddd),dd') ? 'selected' : ''; ?>>
                        xx.xxx.xxx,xxx
                    </option>
                    <option value='( ddd),dd' <?php echo ($odometer_format == '( ddd),dd') ? 'selected' : ''; ?>>
                        xx xxx xxx,xx
                    </option>
                    <option value='d' <?php echo ($odometer_format == 'd') ? 'selected' : ''; ?>>
                        xxxxxxxx
                    </option>
                </select>
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
        $instance['odometer_duration'] = !empty($new_instance['odometer_duration']) ? strip_tags($new_instance['odometer_duration']) : '';
        $instance['odometer_animation'] = !empty($new_instance['odometer_animation']) ? strip_tags($new_instance['odometer_animation']) : '';
        $instance['odometer_theme'] = !empty($new_instance['odometer_theme']) ? strip_tags($new_instance['odometer_theme']) : '';
        $instance['odometer_format'] = !empty($new_instance['odometer_format']) ? strip_tags($new_instance['odometer_format']) : '';
        return $instance;
    }
}

add_action('widgets_init', function () {
    register_widget('AllClicks');
});