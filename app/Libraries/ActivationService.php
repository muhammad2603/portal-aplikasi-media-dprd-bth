<?php
// declare strict types
declare(strict_types=1);
// namespace Libraries
namespace App\Libraries;
// use Database from Config
use \Config\Database;
// use Mailer from Libraries
use App\Libraries\Mailer;
// @class
class ActivationService
{
    // set protected vars
    protected $db;
    protected $mailer;
    // @constructor
    public function __construct()
    {
        // init database connect
        $this->db       = Database::connect();
        // init mailer
        $this->mailer   = new Mailer();
    }
    /**
     * @method sendCode
     * 
     * @param int $user_id User ID
     * @param string $user_email Email User
     * 
     * @return bool
     */
    public function sendCode(int $user_id, string $user_email): bool
    {
        // create random string, then convert to hex
        $activation_code = bin2hex(random_bytes(32));
        // hash random string with algo sha256
        $hash_code = hash("sha256", $activation_code);
        // UPDATE or INSERT activation code to Database
        $upsert_activation = $this->db
            ->table("activation_code")
            ->setData([
                "user_id"   => $user_id,
                "code"      => $hash_code,
            ])
            ->onConstraint("user_id")
            ->upsert();
        // @if operation DB was fail
        if (! $upsert_activation)
            // return false
            return false;
        // set target user email
        $to = $user_email;
        // set subject
        $subject = "Aktivasi Akun";
        // set activation link
        $activation_link = base_url("/aktivasi?code=$activation_code&uid=$user_id");
        // set message HTML for body email
        $message = "<h1>Terima kasih telah melakukan pendaftaran pada aplikasi kami!</h1>
        <p>Klik link berikut untuk melanjutkan aktivasi akun anda: <a href='$activation_link'>Aktivasi Akun</a>.</p>";
        // send mail
        $sendMail = $this->mailer->sendMail($to, $subject, $message);
        // @if send mail is fail
        if (! $sendMail)
            // @return false
            return false;
        // @return true if send mail is success
        return true;
    }
}
