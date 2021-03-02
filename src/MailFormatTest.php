<?php

namespace Magento;
use PHPUnit\Framework\TestCase;
require('MailFormat.php');

class MailFormatTest extends TestCase
{
      public function testHTMLJSONFormat()
      {
        $title = 'title';
        $date = '2020-12-20';
        $content = 'somecontent';

          $report = new MailFormat();
          $result =  $report->formatJson($title, $date, $content);
          // $this->assertJsonFragment("{'title':'title'; 'date':'2021-20-12'; 'content':'content'}");
          $this->assertSame('{"title":"'.$title.'","date":"'.$date.'","content":"'.$content.'"}',$result, '');

          $result =  $report->formatHtml($title, $date, $content);
          $this->assertSame("'<h1>{$title}</h1>
          <p>{$date}</p>
          <div class='content'>{$content}</div>'",$result, '');
      }
      public function testReportToArray() 
      {
        $title = 'title';
        $date = '2020-12-20';
        $content = 'somecontent';
        
        $report = new MailFormat();
        $result =  $report->reportToArray($title, $date, $content);
        $this->assertTrue(in_array($title, $result));
        $this->assertTrue(in_array($date, $result));
        $this->assertTrue(in_array($content, $result));

        // $this->assertContains( $result, ['title'=> $title, 'date'=>$date, 'content'=>$content] );

      }
}
