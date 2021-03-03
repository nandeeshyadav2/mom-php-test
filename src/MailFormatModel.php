<?php
namespace Magento;
class MailFormat
{
    // This function is to format json from created array in function reportToArray
    public function formatJson($title, $date, $content)
    {
        return json_encode($this->reportToArray($title, $date, $content));
    }

    // This function is to create array from inputs
    public function reportToArray($title, $date, $content)
    {
        return [
            'title' => $title,
            'date' => $date,
            'content' => $content
        ];
    }
    // This function is to create simple html body for email
    public function formatHtml($title, $date, $content)
    {
        return "'<h1>{$title}</h1>
          <p>{$date}</p>
          <div class='content'>{$content}</div>'";
    }
}