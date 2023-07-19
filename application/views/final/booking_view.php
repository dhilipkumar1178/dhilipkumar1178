<!DOCTYPE html>
<html>
<head>
    <title>Available Time Slots</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Available Time Slots</h1>
    <table border="1">
        <tr>
            <th>Date</th>
            <th>Time Slot</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($available_slots as $slot) { ?>
            <tr>
                <td><?= $slot->date ?></td>
                <td><?= $slot->time_slot ?></td>
                <td>
                    <?php if ($slot->is_available == 1) { ?>
                        <button class="book-button" data-date="<?= $slot->date ?>" data-time="<?= $slot->time_slot ?>">Book</button>
                    <?php } else { ?>
                        Booked
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </table>

    <div id="booking-modal" style="display:none;">
        <h2>Book Time Slot</h2>
        <form id="booking-form">
            <input type="hidden" id="date" name="date">
            <input type="hidden" id="time_slot" name="time_slot">
            Name: <input type="text" id="user_name" name="user_name"><br>
            Email: <input type="email" id="user_email" name="user_email"><br>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $(".book-button").click(function() {
                var date = $(this).data('date');
                var time_slot = $(this).data('time');

                $("#date").val(date);
                $("#time_slot").val(time_slot);

                $("#booking-modal").show();
            });

            $("#booking-form").submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('BookingController/bookSlot'); ?>',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            alert('Booking successful!');
                            window.location.reload();
                        } else {
                            alert(response.message);
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
