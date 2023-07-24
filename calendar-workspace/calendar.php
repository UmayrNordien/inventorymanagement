<?php

function build_calendar($month, $year){
    // create an array of days in the week
    $daysofWeek = array('Sunday','Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    // get the first day of the month which is the argument of the function
    $firstdayoftheMonth = mktime(0,0,0,$month,1,$year);
    // find out how many days there are in that month using date() and time functions
    $numberDays = date('t', $firstdayoftheMonth);
    // get info on the first day of the month
    $dateComponents = getdate($firstdayoftheMonth);
    // getting the name of the month - using the internal function mktime then specifying in the array
    $monthName = $dateComponents['month'];
    // getting the index value 0-6 of the first day of the month
    $dayofWeek = $dateComponents['wday']; 
    // getting the current date
    $dateToday = date('Y-m-d');

    // now creating the HTML table //
    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2></center>";
    $calendar .= "<tr>"; // [OPEN TR ROW]
    // creating calendar headers //
    foreach($daysofWeek as $day) {
        
        $calendar .= "<th class='header'>$day</th>";
    }
    // previous and next buttons
    $calendar .= "<div class='text-center mt-4 mb-4'>";
    $calendar .= "<a class='btn btn-xs btn-outline-dark me-1' href='?month=".date('m', mktime(0,0,0,$month-1,1,$year))."&year=".date('Y',mktime(0,0,0,$month-1,1,$year))."'>Previous Month</a>";
    $calendar .= "<a class='btn btn-xs btn-outline-dark me-1' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a>";
    $calendar .= "<a class='btn btn-xs btn-outline-dark' href='?month=".date('m', mktime(0,0,0,$month+1,1,$year))."&year=".date('Y',mktime(0,0,0,$month+1,1,$year))."'>Next Month</a></center><br>";

    $calendar .= "</tr><tr>"; // [CLOSE TR ROW][OPEN TR ROW]

    // the variable $dayofWeek will make sure that there is only 7 col on the table //
    if($dayofWeek > 0) {
        $calendar .= "<tr>"; // [OPEN TR ROW]
        for($k=0;$k<$dayofWeek;$k++){
            $calendar .= "<td></td>";
        }
    }

    // initiating the day counter 
    $currentDay = 1;
    // getting the month number
    $month = str_pad($month,2,"0", STR_PAD_LEFT);

    while($currentDay <= $numberDays) {
        // if the seventh column (Saturday) is reached, start a new row
        if($dayofWeek == 7) {
            $dayofWeek = 0;
            $calendar .= "<tr>"; // [OPEN TR ROW]
        }

        $currentDayRel = str_pad($currentDay,2,"0",STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        // current day
        if($dateToday==$date) {
            $calendar .= "<td class='today'><h4>$currentDay</h4></td>";
        }else {
            $calendar .= "<td><h4>$currentDay</h4></td>";
        }
        $calendar .= "</td>";

        // incrementing the counters
        $currentDay++;
        $dayofWeek++;
    }

    // completing the row of the last week in the month
    if($dayofWeek != 7) {
        $remainingDays = 7-$dayofWeek;
        for($i=0;$i<$remainingDays;$i++) {
            $calendar .= "<td></td>";
        }
        $calendar .= "</tr>"; // [CLOSE TR ROW]
    }

    $calendar .= "</table>";

    return $calendar;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Icons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>    
    <title>Calendar</title>
    <!-- Style -->
    <style>
        body {

            background:
            conic-gradient(from -60deg at 50% calc(100%/3),#ffffff 0 120deg,#0000 0),
            conic-gradient(from 120deg at 50% calc(200%/3),#ffffff 0 120deg,#0000 0),
            conic-gradient(from  60deg at calc(200%/3),#ffffff 60deg,#f6f6f6 0 120deg,#0000 0),
            conic-gradient(from 180deg at calc(100%/3),#ededed 60deg,#ffffff 0 120deg,#0000 0),
            linear-gradient(90deg,#ededed calc(100%/6),#f6f6f6 0 50%,
            #ededed 0 calc(500%/6), #f6f6f6 0);
            background-size: 139px 80px;


        }
        .navbar {
            background-color: #353535;
            padding: 20px;
            margin-bottom: 5vh;
        }

        .navbar a {
            text-decoration: none;
            color: #fff;
            margin-right: 20px;
        }
        .navbar i {
            font-text-decoration: none;
            color: #FE347E;
        }
        .navbar i:hover {
            font-text-decoration: none;
            color: #83EEFF;
        }

        table {
            table-layout: fixed;
            text-align: center;
        }
        /* data cell */
        td {
            width: 33%;
        }

        .today {
            background-color: #c5c5c5 !important;
            box-shadow: inset 5px 4px 9px 2px rgba(51, 51, 51, 0.192) !important;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <div class="navbar">
        <a href="../index.php"><i class='bx bx-left-arrow bx-fade-down' ></i> Dashboard</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                 $dateComponents = getdate();
                 if(isset($_GET['month']) && isset($_GET['year'])){
                    $month = $_GET['month']; 			     
                    $year = $_GET['year'];
                     }else{
                    $month = $dateComponents['mon']; 			     
                    $year = $dateComponents['year'];
                    }
                 echo build_calendar($month, $year);
                ?>
            </div>
        </div>
    </div>
</body>
</html>

