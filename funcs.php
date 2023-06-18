<?php
function debug($data)
{
    echo '<pre>' . print_r($data) . '</pre>';
}


function get_proektant(int $year):array
{
    global $connect;
    $res = $connect->query("SELECT MONTH(`data`) AS month_num, SUM(`zarpl_proektant`) FROM `reestr` WHERE YEAR(`data`) = $year GROUP BY `data`");
    return $res->fetchAll();
}