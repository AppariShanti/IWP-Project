<?php include('server.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Calender</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
    <script src="script.js" defer></script>
</head>
<body>
    <nav>
        <div class="top-sticky-bar">
            <img class="cal-img" src="calendar-g1bc1b5837_640.jpg"/>
            <div class="cal-title">CALENDER</div>
            <div class="open-button">Create Event</div>
            <div id="today-button">Today</div>
            
            <div class="name">
                <?php if(isset($_SESSION['username'])):?>
                    
                    Welcome <strong><?php echo $_SESSION['username'];?></strong>
                    <p><a href="index.php?logout='1'">Logout</a></p>
                <?php endif ?>
            </div>   
                <img class="login-img" src="user_icon.png" width=50px/>    
        </div>
        
    </nav>
    <hr>
        <main>
            <div class="calender">
                <div class="cal-nav-bar">
                    <span class="cal-button-prev"><i class="fas fa-caret-left"></i></span>
                    <!--Month picker-->
                    <span class="cal-details-month">
                        <p></p>
                    </span>
                    <span class="cal-details-year">
                        <p></p>
                    </span>
                        <span class="cal-button-next"><i class="fas fa-caret-right"></i></span> 
                    </span>    
                </div>
                
                <div class="content">
                    <table class="calender-table" id="calendar">
                        <thead>
                        <tr>
                            <th class="day ">Sun</th>
                            <th class="day">Mon</th>
                            <th class="day">Tue</th>
                            <th class="day">Wed</th>
                            <th class="day">Thu</th>
                            <th class="day">Fri</th>
                            <th class="day">Sat</th>
                        </tr>
                        </thead>
                        <tbody id="calendar-body">
                        </tbody>
                    </table>
                </div>

            </div>
            
            <div class="month-selector">
                <div class="month-nav-bar hidden">Select Month</div>
                <div class="month-list"></div>
            </div>
            <div class="vl"></div>
            <div class="event-content">
                    <table class="event-table" id="event" >
                        <thead>
                        <tr>
                            <th class="event-head hidden"></th>
                            <th class="event-head">Start Date</th>
                            <th class="event-head">End Date</th>
                            <th class="event-head">Event Title</th>
                            <th class="event-head">Edit/Delete</th>
                        </tr>
                        </thead>
                        <tbody id="event-body">
                            <?php foreach ($data as $events): ?>
                                <tr class="single-event-container">
                                    <td class="dot-span"><span class="dot" style="background-color:<?php echo $events[6];?>" ></span></td>
                                    <td class="date-show"><?php echo $events[2]; ?></td>
                                    <td class="date-show"><?php echo $events[3]; ?></td>
                                    <td class="det-show"><?php echo $events[4]; ?></td>
                                    <td class="edit-button"><button type="button" name="edit-button" class="event-btn"><a class="button-link" href="edit.php?id=<?php echo urlencode($events[0]); ?>"> Edit/Delete</a></button></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            
            </main>


    <div class="form-popup" id="myForm" >
        <form method="POST" action="calendar.php" class="form-container">
            <h1>New Event</h1>

            <div class="form-group">
                <input type="text" placeholder="Enter Title" name="event_title">
            </div>
            <div class="form-group">
                <label for="date-start"><b>Date Start</b></label>
                <input type="datetime-local" name="event_start">
            </div>
            <div class="form-group">
                <label for="date-end"><b>Date End</b></label>
                <input type="datetime-local" name="event_end">
            </div>
            <div class="form-group">
                <label for="txt"><b>Event</b></label>
                <textarea id="event_details" name="event_text"></textarea>
            </div>
            <div class="color-picker">
                <label for="color"><b>Color</b></label>
                <input type="color" id="event_color" name="color" value="#0508bd"/>
            </div>
            <input type="submit" name="save" class="btn" id="event_save" value="Save"/>
            <input type="button" name="cancel" class="btn" id="event_cancel" value="Cancel"/>
        </form>
    </div>
    </body>
</html>