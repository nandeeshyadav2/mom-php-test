<?php

namespace Magento;
use PHPUnit\Framework\TestCase;
require dirname(dirname(__FILE__)) .'../MailerModel.php';
class MailerTest extends TestCase
{
      public function testSend()
      {
         $report = new Mailer();

         $result = $report->send('<html><head></head><body><div id="elementId">some content</div></body></html>');
         $this->assertTrue($result);

         $result = $report->send('{"name":"John", "age":31, "city":"New York"}');
         $this->assertTrue($result);

      }
}
