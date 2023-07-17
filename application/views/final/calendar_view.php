<!DOCTYPE html>
<html>
<head>
    <title>Booking Calendar</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <h2>Select a date:</h2>
    <div class="calendar">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group"> <input class="form-control calendar-date" type="date" id="date" required></div>
		</div>
        <!-- Display the calendar with clickable dates -->
        <!-- Each date should have the "calendar-date" class and a "data-date" attribute with the date value -->
    </div>
	<script>
        $(document).ready(function() {
            $('.calendar-date').click(function() {
                var selectedDate = $(this).data('date');
                
                $.ajax({
                    url: '<?php echo site_url("bookingController/getTimeSlots"); ?>',
                    method: 'POST',
                    data: { selected_date: selectedDate },
                    dataType: 'json',
                    success: function(response) {
                        // Update the calendar view with the available time slots
                        // Use the response.time_slots data to populate the time slots
                    }
                });
            });
        });
    </script>
</body>
</html>




