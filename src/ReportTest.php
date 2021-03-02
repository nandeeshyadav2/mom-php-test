<?php

namespace Magento;
use PHPUnit\Framework\TestCase;
require('Report.php');

class ReportTest extends TestCase
{
      public function testValidate()
      {
         $report = new Report('', '2021-20-12', 'content');
         $result =  $report->validate();
         $this->assertFalse($result);

         $report = new Report('testtitle', '', 'content');
         $result =  $report->validate();
         $this->assertTrue($result);

         $report = new Report('testtitle', '2021-20-12', '');
         $result =  $report->validate();
         $this->assertFalse($result);
      }
      
      public function testSendReport()
      {
         $report = new Report('title', '2021-20-12', 'content');
         $result =  $report->sendReport('HTML');
         $this->assertTrue($result);

         $report = new Report('title', '2021-20-12', 'content');
         $result =  $report->sendReport('JSON');
         $this->assertTrue($result);

         $report = new Report('title', '2021-20-12', 'content');
         $result =  $report->sendReport('OTHER');
         $this->assertFalse($result);

         $report = new Report('', '2021-20-12', 'content');
         $result =  $report->sendReport('HTML');
         $this->assertFalse($result);

         $report = new Report('title', '', 'content');
         $result =  $report->sendReport('HTML');
         $this->assertTrue($result);

         $report = new Report('title', '2021-20-12', '');
         $result =  $report->sendReport('HTML');
         $this->assertFalse($result);
      }
}
