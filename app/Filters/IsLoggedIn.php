<?php // Filter for status login
// namespace Filters
namespace App\Filters;
// use RequestInterface from CodeIgniter
use CodeIgniter\HTTP\RequestInterface;
// use ResponseInterface from CodeIgniter
use CodeIgniter\HTTP\ResponseInterface;
// use FilterInterface from CodeIgniter
use CodeIgniter\Filters\FilterInterface;
// use UserModel from Models
use App\Models\UserModel;
// call helper cookie
helper("cookie");
// @class
class IsLoggedIn implements FilterInterface
{
    // @before
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        // @if check is session isLoggedIn not exist or false AND cookie token_login exist
        if (! $session->get('isLoggedIn') && get_cookie("token_login")) {
            // get token login from cookie and hash with sha256 algo
            $token_hash = hash("sha256", get_cookie("token_login"));
            // init UserModel
            $userModel = new UserModel();
            // check if token login match on field token_login
            $isUserFoundByToken = $userModel->select()->where("token_login", $token_hash)->first();
            // @if token login found/match with token login from cookie
            if ($isUserFoundByToken) {
                $fields = [
                    "user.id" => "user_id",
                    "nama_lengkap",
                    "role"
                ];
                // get user identity is matched by token login
                $getUserIdentityByTokenLogin = $userModel->select($fields)
                    ->join("user_meta um", "um.user_id = user.id")
                    ->join("roles_user ru", "ru.id = user.role_id")
                    ->where("token_login", $token_hash)
                    ->first();
                // renew session user
                $session->set([
                    "isLoggedIn"    => true,
                    "userId"        => $getUserIdentityByTokenLogin["user_id"],
                    "userFullName"  => $getUserIdentityByTokenLogin["nama_lengkap"],
                    "role"          => $getUserIdentityByTokenLogin["role"],
                ]);
                // @return with redirect to dashboard
                return redirect()->to("/dashboard");
            }
        }
        // @if session isLoggedIn exist or has value true
        if ($session->get("isLoggedIn")) {
            // @return with redirect to dashboard
            return redirect()->to('/dashboard');
        }
    }
    // @after
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // @TODO
    }
}
