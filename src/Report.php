<?php

namespace Magento;
include_once('Mailer.php');
include_once('MailFormat.php');
class Report
{
    private $title;
    private $date;
    private $content;

    function __construct( $title, $date = null, $content ) {
		$this->title = $title;
		$this->date = !$date?(new \DateTime())->format('y-m-d h:i:s'):$date;
        $this->content = $content;
	}

    public function validate()
    {
        if (empty($this->title) || empty($this->date) || empty($this->content)) {
            return false;
        }

        return true;
    }

    public function sendReport($type)
    {
        if ($this->validate())
        {
            echo $type.' ';
            $mailFormat = '';
            $format = new MailFormat();
            switch($type) {
                case 'HTML': 
                    $mailFormat = $format->formatHtml($this->title, $this->date, $this->content);
                    break;
                case 'JSON': 
                    $mailFormat = $format->formatJson($this->title, $this->date, $this->content);
                    break;
                default:
                    return false;
                }

                $mailer = new Mailer();
                return $mailer->send($mailFormat);
                
        }
        return false;
    }
}