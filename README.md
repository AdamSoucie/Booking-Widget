# Booking Widget
A WordPress booking widget originally built for The Cosmopolitan Hotel & Casino's blog.

## Installation Instructions
1. Copy the 'class-cosmo-booking-widget.php' file into your theme directory, preferably in a 'widgets' folder.
2. In 'functions.php', include your your widget using the following:
```php
require_once( dirname( __FILE__ ) . '/widgets/class-cosmo-booking-widget.php' );
```
3. In 'functions.php', preferably in a function, register your widget using the following:
```php  
/**
 * Register all our custom widgets.
 */
function IC_register_widgets()
{
    register_widget( 'IC_Cosmo_Booking_Widget' );
}
add_action( 'widgets_init', 'IC_register_widgets' );
```
4. Enqueue the FlatPickr JS and CSS - https://flatpickr.js.org/getting-started/
5. Enqueue the JavaScript file, or add the JS to your main scripts file (either way works)

## Usage Instructions
1. Add the widget to your desired widget area.
2. Save.
