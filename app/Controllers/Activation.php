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
    // @method: verification
    public function verification()
    {
        $code = $this->request->getGet("code") ?? null;
        $uid = $this->request->getGet("uid") ?? null;
        $message_error = [
            "message" => 'Permintaan gagal dipenuhi. Mohon kontak Administrator untuk solusi lebih lanjut!',
        ];
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
        // init ActivationCode
        $activationCode = new ActivationCode();
        // check is code activation exist and match on Database
        $is_code_activation_matched = $activationCode->select()->where(["user_id" => $uid, "code" => $hash_code_request])->first();
        // if code activation not exist or not match on database
        if (! $is_code_activation_matched)
            // @return error 400 (Bad Request)
            return $this->response
                ->setStatusCode(400)
                ->setBody(view(
                    '/errors/html/error_400',
                    $message_error,
                ));
        // init UserModel
        $userModel = new UserModel();
        // update is_verified user account to true
        $userModel->update($is_code_activation_matched["user_id"], [
            "is_verified" => "true",
        ]);
        // @return text HTML format
        return "<p>Aktivasi berhasil!</p>";
    }
    // @method: resend
    public function resend(): RedirectResponse
    {
        // init class ActivationService
        $activationService = new ActivationService();
        // send activation code
        $sendActivation = $activationService->sendCode(1, "fattahillahmuhammad48@gmail.com");
        // @if send activation code is fail
        if (! $sendActivation)
            // @return redirect user back to before endpoint url and set flash data message
            return redirect()->back()->with("message", "Gagal mengirim aktivasi! Coba lagi nanti.");

        // send activation code is success
        // @return redirect user back to before endpoint url and set flash data message
        return redirect()->back()->with("message", "Berhasil mengirim aktivasi! Cek email anda.");
    }
}
