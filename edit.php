<?php 
    require_once('functions.php');
    $client = find_client_by_id($_GET['id']);
    global $client ?>
    <?php?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Calender</title>
        <link rel="stylesheet" href="style_form.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
        <script src="script.js" defer></script>
    </head>
    <body>
    <div class="form-popup" id="myForm" >
        <form method="POST" action="calendar.php" class="form-container">
                <h1>Edit/Delete Event</h1>

                <div class="form-group">
                    <input type="text" placeholder="Enter Title" name="event_title" value="<?php echo $client['event_title']; ?>">
                </div>
                <div class="form-group">
                    <label for="date-start"><b>Date Start</b></label>
                    <?php  $datetime1 = new DateTime($client['event_start']);   ?>
                    <input type="datetime-local" name="event_start" value = "<?php echo $datetime1->format('Y-m-d\TH:i:s'); ?>">
                </div>
                <div class="form-group">
                    <label for="date-end"><b>Date End</b></label>
                    <?php  $datetime2 = new DateTime($client['event_end']);   ?>
                    <input type="datetime-local" name="event_end" value = "<?php echo $datetime2->format('Y-m-d\TH:i:s'); ?>">
                </div>
                <div class="form-group">
                    <label for="txt"><b>Event</b></label>
                    <textarea id="event_details" name="event_text"><?php echo $client['event_text']; ?></textarea>
                </div>
                <div class="color-picker">
                    <label for="color"><b>Color</b></label>
                    <input type="color" id="event_color" name="color" value="<?php echo $client['color']; ?>"/>
                </div>
                <input type="hidden" name="id" value=<?php echo $client['id']; ?>/>
                <input type="submit" name="edit-event-save" class="btn" id="edit-event-save" value="Save"/>
                <input type="submit" name="delete" class="btn" id="event_del" value="Delete"/>
                <input type="submit" name="event-cancel" class="btn" id="event_cancel" value="Cancel"/>
            </form>
        </div>
    </body>
<?php ?>
    