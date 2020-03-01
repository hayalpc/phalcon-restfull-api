<?php
declare(strict_types=1);

use App\Models\Users as Users;
use App\Models\Tokens as Tokens;

class AuthenticateController extends ControllerBase
{

    public function indexAction()
    {
        if ($this->request->isPost() === true) {
            $email = $this->request->get('email', 'email');
            $password = $this->request->get('password', 'string');
            $user = Users::login($email, $password);
            if ($user) {
                $token = new Tokens();
                $token->setUserId($user->getId());
                $token->setStatus(Tokens::STATUS_NEW);
                $token->setExpireTime(date('Y-m-d H:i:s', strtotime('+15 minutes')));
                $token->generateToken();
                if ($token->save() !== false) {
                    $response = [
                        "status" => "OK",
                        "message" => "Success",
                        'token' => $token->getToken(),
                        'expire_time' => $token->getExpireTime(),
                    ];
                } else {
                    $response = [
                        "status" => "NOK",
                        "code" => "API_ERR_1003",
                        "message" => "DB error",
                    ];
                }
            } else {
                $response = [
                    "status" => "NOK",
                    "code" => "API_ERR_1006",
                    "message" => "Invalid User",
                ];
            }
        } else {
            $response = [
                "status" => "NOK",
                "code" => "API_ERR_1001",
                "message" => "Invalıd Method",
            ];
        }
        return $this->response->setJsonContent($response);
    }


}