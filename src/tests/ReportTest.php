<?php

namespace Magento;
use PHPUnit\Framework\TestCase;
require dirname(dirname(__FILE__)) .'../ReportController.php';

class ReportTest extends TestCase
{
      public function testValidate()
      {
         $report = new Report('', '2021-20-12', 'content');
         $result =  $report->validate();
         $this->assertStringContainsString('title should not be empty', $result);

         $report = new Report('testtitle', 'Invalid date', 'content');
         $result =  $report->validate();
         $this->assertStringContainsString('Invalid date', $result);

         $report = new Report('testtitle', '2021-20-12', '');
         $result =  $report->validate();
         $this->assertStringContainsString('content should not be empty', $result);
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

      }
}
