<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="calendar">
                <form method="post" action="calendar.html">
                    <label>Year: </label>
                    <select name="year">
                        <option>2000</option>
                        <option>2001</option>
                        <option>2002</option>
                        <option>2003</option>
                        <option>2004</option>
                        <option>2005</option>
                        <option>2006</option>
                        <option>2007</option>
                        <option>2008</option>
                        <option>2009</option>
                        <option>2010</option>
                        <option>2011</option>
                        <option>2012</option>
                        <option>2013</option>
                        <option>2014</option>
                        <option>2015</option>
                    </select>

                    <label>Month: </label>
                    <select name="month">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>


                </form>
            </div>
        <?php   

$year = $_POST["year"];
$month = $_POST["month"];
$year = date("Y", $year);
$month = date("m", $month);

$firstDay = mktime(0, 0, 0, $month, 1, $year);

$title = date("F", $firstDay);
$dayOfWeek = date("D", $firstDay);

switch($dayOfWeek) {
    case "Sun": $blank = 0; break;
    case "Mon": $blank = 1; break;
    case "Tue": $blank = 2; break;
    case "Wed": $blank = 3; break;
    case "Thu": $blank = 4; break;
    case "Fri": $blank = 5; break;
    case "Sat": $blank = 6; break;
}

$daysInMonth = cal_days_in_month(0, $month, $year);

echo "<table class='centertable'>";
echo "<tr><th colspan=7>" . $title . " " . $year . "</th></tr>";
echo "<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr><tr>";

$dayCount = 1;
while ($blank > 0) {
    echo "<td>&nbsp;</td>";
    $blank--;
    $dayCount++;
}

$dayNum = 1;
while ($dayNum <= $daysInMonth) {
    if (date("d") != $dayNum) {
        echo "<td>" . $dayNum . "</td>";
        $dayNum++;
        $dayCount++;
    } else {
        echo "<td class='currentdate'>" . $dayNum . "</td>";
        $dayNum++;
        $dayCount++;
    }
    if ($dayCount > 7) {
        echo "</tr><tr>";
        $dayCount = 1;
    }
}

while ($dayCount > 1 and $dayCount <= 7) {
    echo "<td>&nbsp;</td>";
    $dayCount++;
}

echo "</tr></table>";

?>
       
</body>
</html>
