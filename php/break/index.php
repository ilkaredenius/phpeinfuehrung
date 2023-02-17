<?php
$arr = array('eins', 'zwei', 'drei', 'vier', 'stop', 'fünf');
foreach ($arr as $val) {
    if ($val == 'stop') {
        break;
    }
    echo "$val<br />\n";
}