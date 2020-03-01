<?php

use App\Models\Users as Users;
use App\Models\Tokens as Tokens;
use App\Models\Coupons as Coupons;


class UserController extends ControllerBase
{

    public function indexAction()
    {
        $user = Tokens::check($this->request->getHeader('Authorization-Token'));
        if ($user !== false) {
            $response = [
                "status" => "OK",
                "message" => "Success",
                "user" => [
                    'id' => $user->getId(),
                    'email' => $user->getEmail(),
                    'city' => $user->getCity(),
                    'language' => $user->getLanguage(),
                    'os' => $user->getOs(),
                    'status' => $user->getStatus(),
                    'type' => $user->getType(),
                    'create_time' => $user->getCreateTime(),
                ]
            ];
        } else {
            $response = ["status" => "NOK",
                "code" => "API_ERR_1006",
                "message" => "Invalıd Token",];
        }

        return $this->response->setJsonContent($response);
    }

    public function updateAction()
    {
        $user = Tokens::check($this->request->getHeader('Authorization-Token'));
        if ($user !== false) {
            $update = false;
            $password = $this->request->getPut('password', 'string');
            $city = $this->request->getPut('city', 'string');
            $language = $this->request->getPut('language', 'string');
            $os = $this->request->getPut('os', 'string');

            if (!empty($password)) {
                $user->setPassword($password);
                $update = true;
            }
            if (!empty($city)) {
                $user->setCity($city);
                $update = true;
            }
            if (!empty($language)) {
                $user->setLanguage($language);
                $update = true;
            }
            if (!empty($os)) {
                $user->setOs($os);
                $update = true;
            }

            if ($update) {
                if ($user->update()) {
                    $response = [
                        "status" => "OK",
                        "message" => "Update is successful",
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
                    "code" => "API_ERR_1011",
                    "message" => "There is no any updatable record",
                ];
            }
        } else {
            $response = [
                "status" => "NOK",
                "code" => "API_ERR_1006",
                "message" => "Invalıd Token",
            ];
        }
        return $this->response->setJsonContent($response);
    }

    public function redeemAction()
    {
        $user = Tokens::check($this->request->getHeader('Authorization-Token'));
        if ($user !== false) {
            $code = $this->request->getPut("code");
            if ($code) {
                if ($user->getType() == Users::TYPE_NEW) {

                    $coupon = Coupons::findByCode($code);
                    if ($coupon) {
                        if ($coupon->getStatus() == Coupons::STATUS_NEW) {
                            $coupon->process($user);
                            $response = [
                                "status" => "OK",
                                "message" => "Redeem is successful"
                            ];
                        } else {
                            $response = [
                                "status" => "NOK",
                                "code" => "API_ERR_1009",
                                "message" => "This coupon used before",
                            ];
                        }
                    } else {
                        $response = [
                            "status" => "NOK",
                            "code" => "API_ERR_1008",
                            "message" => "Invalid Code",
                        ];
                    }
                } else {
                    $response = [
                        "status" => "NOK",
                        "code" => "API_ERR_1010",
                        "message" => "The user used a coupon before",
                    ];
                }
            } else {
                $response = [
                    "status" => "NOK",
                    "code" => "API_ERR_1007",
                    "message" => "Empty Code",
                ];
            }
        } else {
            $response = [
                "status" => "NOK",
                "code" => "API_ERR_1006",
                "message" => "Invalıd Token",
            ];
        }
        return $this->response->setJsonContent($response);
    }

}