(function ($) {
	var url = '',
		startDate = '',
		endDate = '';

	// Updates the URL for the booking link
	function updateURL()
	{
		$('.booking-button-container .button').attr('href', 'http://reservations.travelclick.com/74495?dateIn='+startDate+'&dateOut='+endDate+'&hotelid=74495');
	}

	// Start Date - Date Picker Instance
	var startCal = flatpickr("#startCal", {
		onChange: function(selectedDates, dateStr, instance) {
			// Break up the date string for easy manipulation
			var date = dateStr.split('-'),
				month = new Date(dateStr),
    			locale = "en-us";

    		month = month.toLocaleString(locale, { month: "short" });

			var day = parseInt(date[2]);

	        $('#calendar-box-start .calendar-box-month').text(month);
	        $('#calendar-box-start .calendar-box-day').text(day);
	        $('#calendar-box-start .calendar-box-year').text(date[0]);

			startDate = date[1] + '/' + date[2] + '/' + date[0];

			updateURL();
	    },
	});

	// End Date - Date Picker Instance
	var endCal = flatpickr("#endCal", {
		onChange: function(selectedDates, dateStr, instance) {
			// Break up the date string for easy manipulation
			var date = dateStr.split('-'),
				month = new Date(dateStr),
    			locale = "en-us";

    		month = month.toLocaleString(locale, { month: "short" });

			var day = parseInt(date[2]);

	        $('#calendar-box-end .calendar-box-month').text(month);
	        $('#calendar-box-end .calendar-box-day').text(day);
	        $('#calendar-box-end .calendar-box-year').text(date[0]);

			endDate = date[1] + '/' + date[2] + '/' + date[0];

			updateURL();
	    },
	});

	$('#calendar-box-start').on('click', function(event){
		event.preventDefault();

		// OPEN THE CALENDAR
		startCal.open();
	});

	$('#calendar-box-end').on('click', function(event){
		event.preventDefault();

		// OPEN THE CALENDAR
		endCal.open();
	});

})(jQuery);
