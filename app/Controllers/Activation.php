<?php
// namespace Controllers
namespace App\Controllers;
// use Controller from codeigniter
use CodeIgniter\Controller;
// use ActivationService from Libraries
use App\Libraries\ActivationService;
// use RedirectResponse from HTTP
use CodeIgniter\HTTP\RedirectResponse;
// use UserModel from Models
use App\Models\UserModel;
// use ActivationCode from Models
use App\Models\ActivationCode;
// @class
class Activation extends Controller
{
    // @protected vars
    protected $throttler;
    protected $activationService;
    protected $activationCode;
    protected $userModel;
    // @constructor
    public function __construct()
    {
        // @model inits
        $this->throttler            = service("throttler");
        $this->activationService    = new ActivationService();
        $this->userModel            = new UserModel();
        $this->activationCode       = new ActivationCode();
    }
    // @method: verification
    public function verification()
    {
        $code           = $this->request->getGet("code") ?? null;
        $uid            = $this->request->getGet("uid") ?? null;
        $message_error  = [
            "message" => 'Permintaan gagal dipenuhi. Mohon kontak Administrator untuk solusi lebih lanjut!',
        ];
        $ip_addr_user = $this->request->getIPAddress();
        $rate_limit_req_by_ip = $this->throttler->check(md5($ip_addr_user), 30, MINUTE);
        $rate_limit_req_by_code = $this->throttler->check(md5($code), 5, MINUTE);
        $rate_limit_req_by_uid = $this->throttler->check(md5($uid), 5, MINUTE);
        // @if pengguna terkena batas request
        if (! $rate_limit_req_by_ip || ! $rate_limit_req_by_code || ! $rate_limit_req_by_uid)
            // @return status kode 429 (Too Many Request)
            return $this->response->setStatusCode(429);
        // @if code AND uid not exist on URI Params
        if (! ($code && $uid))
            // @return error 400 (Bad Request)
            return $this->response
                ->setStatusCode(400)
                ->setBody(view(
                    '/errors/html/error_400',
                    $message_error,
                ));
        // hash code from URI Params
        $hash_code_request = hash("sha256", $code);
        // check is code activation exist and match on Database
        $is_code_activation_matched = $this->activationCode->select(["id", "user_id"])->where(["user_id" => $uid, "code" => $hash_code_request])->first();
        // if code activation not exist or not match on database
        if (! $is_code_activation_matched)
            // @return error 400 (Bad Request)
            return $this->response
                ->setStatusCode(400)
                ->setBody(view(
                    '/errors/html/error_400',
                    $message_error,
                ));
        // update is_verified user account to true
        $this->userModel->update($is_code_activation_matched["user_id"], [
            "is_verified" => "true",
        ]);
        // hapus kode aktivasi di Database setelah berhasil merubah status akun pengguna
        $this->activationCode->delete(["id" => $is_code_activation_matched["id"]]);
        // @return text HTML format
        return "<p>Aktivasi berhasil! Silahkan refresh halaman status-akun atau login kembali!</p>";
    }
    // @method: resend
    public function resend(): RedirectResponse
    {
        // ambil value user id dari session, jika tidak ada, otomatis jadi null
        $get_user_id_session = session()->get("userId");
        $ip_addr_user = $this->request->getIPAddress();
        $rate_limit_req_by_ip = $this->throttler->check(md5($ip_addr_user), 30, MINUTE);
        $rate_limit_by_user_id = $this->throttler->check(md5($get_user_id_session), 5, MINUTE);
        // @if pengguna terkena batas request
        if (! $rate_limit_req_by_ip || ! $rate_limit_by_user_id)
            // @return status kode 429 (Too Many Request)
            return $this->response->setStatusCode(429);
        // send activation code
        $sendActivation = $this->activationService->sendCode($get_user_id_session, "fattahillahmuhammad48@gmail.com");
        // @if send activation code is fail
        if (! $sendActivation)
            // @return redirect user back to before endpoint url and set flash data message
            return redirect()->back()->with("message", "Gagal mengirim aktivasi! Coba lagi nanti.");

        // send activation code is success
        // @return redirect user back to before endpoint url and set flash data message
        return redirect()->back()->with("message", "Berhasil mengirim aktivasi! Cek email anda.");
    }
}
