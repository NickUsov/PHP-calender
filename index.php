<?php
    $rnd = rand(1, 12);
    function calender($rnd){
        $month = '';
        if($rnd < 10) {
            $month = sprintf('2019-0%s-01', $rnd);
        }
        else {
            $month = sprintf('2019-%s-01', $rnd);
        }
        
        $first_day = new DateTime($month);
        $week_day = $first_day->format('N') - 1;
        $days = $first_day->format('t');
        $flag = 0;
        $k = 1;
        $rows = 5;
        if(($days == 30 && $week_day == 6 ) || ($days == 31 && $week_day > 4)) {
            $rows = 6;
        }
        $str = sprintf('<p>%s</p><table><tr><th>Пн</th><th>Вт</th><th>Ср</th><th>Чт</th><th>Пт</th><th>Сб</th><th>Вс</th></tr>',$first_day->format('F'));
        for($i = 0; $i < $rows; $i ++) {
            $str .= '<tr>';
            for($j = 0; $j <7; $j ++) {
                if( $week_day == $j && $i == 0) {
                    $flag = 1;
                }
                if($flag == 1) {
                    $str .= sprintf('<td>%s</td>', $k);
                    $k ++;
                    if($k > $days) {
                        $flag = 0;
                    }
                }
                else {
                    $str .= '<td></td>';
                }
            }
            $str .= '</tr>';
        }
        $str .= '</table>';
        echo $str;
    }
    calender($rnd);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PHP Calender</title>
        <style>
            table {
                border: 1px solid gray;
                border-collapse: collapse;
            }
            td, th {
                border: 1px solid gray;
                width: 50px;
                height: 30px;
            }
    </style>
</head>
<body>
    
</body>
</html>