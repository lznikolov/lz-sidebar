<?php

/*
Plugin Name: LZ Newsletter
Plugin URI: http://luckylabz.com/wp/plugins/newsletter
Description: Newsletter Sidebar
Author: Rangel Nikolov
Author URI: http://luckylabz.com/profile/nikolov
Version: 0.1
Text Domain: mini-strap
*/

class Newsletter extends WP_Widget
{

    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'newsletter',
            'description' => 'LZ Newsletter Widget'
        );
        $control_ops = array('width' => 400, 'height' => 350);
        parent::__construct('newsletter', 'Newsletter', $widget_ops, $control_ops);
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
        require_once( get_template_directory().'/partials/sidebar-newsletter.php');
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
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $formId = !empty($instance['formId']) ? $instance['formId'] : '';
        $formLang = !empty($instance['formLang']) ? $instance['formLang'] : '';
        $fieldValue = !empty($instance['fieldValue']) ? $instance['fieldValue'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo _e(esc_attr('Title:')); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">

            <label for="<?php echo esc_attr($this->get_field_id('formId')); ?>"><?php echo _e(esc_attr('Form ID:')); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('formId')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('formId')); ?>" type="number"
                   value="<?php echo esc_attr($formId); ?>" aria-required="true">

            <label
                for="<?php echo esc_attr($this->get_field_id('formLang')); ?>"><?php echo _e(esc_attr('Form Language:')); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('formLang')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('formLang')); ?>" type="text"
                   value="<?php echo esc_attr($formLang); ?>">

            <label
                for="<?php echo esc_attr($this->get_field_id('fieldValue')); ?>"><?php echo _e(esc_attr('Custom Field Value:')); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('fieldValue')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('fieldValue')); ?>" type="number"
                   value="<?php echo esc_attr($fieldValue); ?>" aria-required="true">

        </p>
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
        $instance['formId'] = !empty($new_instance['formId']) ? strip_tags($new_instance['formId']) : '';
        $instance['formLang'] = !empty($new_instance['formLang']) ? strip_tags($new_instance['formLang']) : '';
        $instance['fieldValue'] = !empty($new_instance['fieldValue']) ? strip_tags($new_instance['fieldValue']) : '';
        return $instance;
    }
}

add_action('widgets_init', function () {
    register_widget('Newsletter');
});