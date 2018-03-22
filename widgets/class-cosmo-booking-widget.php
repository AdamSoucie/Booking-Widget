<?php

class Cosmo_Booking_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$widget_ops = array(
			'classname' => 'cosmo_booking_widget',
			'description' => 'Displays the Booking Widget',
		);
		parent::__construct( 'cosmo_booking_widget', 'Cosmo Booking Widget', $widget_ops );

		date_default_timezone_set( 'America/Denver' );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance )
	{
		$headline 	= ! empty( $instance['headline'] ) ? $instance['headline'] : __( '', TEXT_DOMAIN );
	?>
		<section class="cosmo-booking-widget widget flatpickr">
			<h2 class="widget-title"><?php echo $headline; ?></h2>
			<input id="startCal" type="text" placeholder="Select Date.." data-input>
			<input id="endCal" type="text" placeholder="Select Date.." data-input>

			<div class="calendar-box" id="calendar-box-start">
				<span class="calendar-title">Arrive</span>
				<div class="calendar-date">
					<span class="calendar-box-month"><?php echo Date('M'); ?></span>
					<span class="calendar-box-day"><?php echo Date('j'); ?></span>
					<span class="calendar-box-year"><?php echo Date('Y'); ?></span>
				</div>
			</div>

			<div class="calendar-box" id="calendar-box-end">
				<span class="calendar-title">Depart</span>
				<div class="calendar-date">
					<span class="calendar-box-month"><?php echo Date('M', strtotime(' + 1 days')); ?></span>
					<span class="calendar-box-day"><?php echo Date('j', strtotime(' + 1 days')); ?></span>
					<span class="calendar-box-year"><?php echo Date('Y', strtotime(' + 1 days')); ?></span>
				</div>
			</div>

			<div class="booking-button-container">
				<a class="button" href="#" target="_blank">Take Me Away</a>
			</div>
		</section>
	<?php
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance )
	{
		$headline	= ! empty( $instance['headline'] ) ? $instance['headline'] : __( '', TEXT_DOMAIN );
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'headline' ); ?>"><?php _e( 'Headline:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'headline' ); ?>" name="<?php echo $this->get_field_name( 'headline' ); ?>" type="text" value="<?php echo esc_attr( $headline ); ?>">
		</p>
	<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance )
	{
		$instance = array();

		$instance['headline'] = ( ! empty( $new_instance['headline'] ) ) ? strip_tags( $new_instance['headline'] ) : '';

		return $instance;
	}
}
