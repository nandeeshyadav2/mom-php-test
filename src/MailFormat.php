<?php
namespace Magento;
class MailFormat
{
    

    public function formatJson($title, $date, $content)
    {
        return json_encode($this->reportToArray($title, $date, $content));
    }

    public function reportToArray($title, $date, $content)
    {
        return [
            'title' => $title,
            'date' => $date,
            'content' => $content
        ];
    }

    public function formatHtml($title, $date, $content)
    {
        return "'<h1>{$title}</h1>
          <p>{$date}</p>
          <div class='content'>{$content}</div>'";
    }
}