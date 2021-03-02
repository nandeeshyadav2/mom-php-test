<?php
namespace Magento;
include_once('Report.php');
$type = 'HTML'; // Type of mail HTML or JSON
$report = new Report('title', '2021-20-12', 'content');
$res = $report->sendReport($type);
echo $res?"Report Sent Successfully":"Validation Error! Please fill title and content";