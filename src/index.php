<?php
namespace Magento;

include_once('ReportController.php');
$title = 'title';
$date = '';
$content = 'somecontent';
$type = 'HTML'; // Type of mail HTML or JSON
$report = new Report($title, $date, $content);
$validate = $report->validate();

switch($validate) {
    case 0: 
        echo $validate;
        break;
    case 1;
        echo $validate?
        $report->sendReport($type)?
        "Report Sent Successfully":"Error sending email"
        :'Validation Error! Please check the input data';

}
