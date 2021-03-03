<?php

namespace Magento;
include_once('MailerModel.php');
include_once('MailFormatModel.php');
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
    // This function is to validate the inputs
    public function validate()
    {
        if (empty($this->title)) {
            return 'title should not be empty';
        }
        if (empty($this->content)) {
            return 'content should not be empty';
        }
        if (!empty($this->content) && !strtotime($this->date)) {
            return 'Invalid date';
        }

        return true;
    }

    // This function is to sending report to user
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