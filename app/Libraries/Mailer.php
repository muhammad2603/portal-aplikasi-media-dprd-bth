<?php
// set strict_types to 1
declare(strict_types=1);
// namespace Libraries
namespace App\Libraries;
// use Services
use Config\Services;
// @class
class Mailer
{
    protected $email;
    // @constructor
    public function __construct()
    {
        // call email service
        $this->email = Services::email();
    }
    /** @method: sendMail
     * @param string $to: mail_receiver
     * @param string $subject: mail subject
     * @param string $message: mail message with HTML format
     * 
     * @return boolean
     */
    public function sendMail(string $to, string $subject, string $message): bool
    {
        /* Mail Header */
        // set mail from
        $this->email->setFrom("noreply@setwan-batangharikab.id", "SiMELEK");
        // set mail to
        $this->email->setTo($to);
        /* Mail Body */
        $this->email->setSubject($subject);
        $this->email->setMessage($message);
        /* Sending Mail */
        // @if sending mail failed
        if (! $this->email->send()) {
            // catch error and save to log with error-level
            log_message("error", $this->email->printDebugger(["headers"]));
            // @return false for conditional use
            return false;
        }
        // mail sending successfully
        // @return true for conditional use
        return true;
    }
}
