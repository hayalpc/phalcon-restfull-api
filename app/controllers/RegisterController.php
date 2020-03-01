<?php
declare(strict_types=1);


use App\Models\Users as Users;

class RegisterController extends ControllerBase
{
    public function indexAction()
    {


        if ($this->request->isPut() === true) {
            $email = $this->request->getPut('email', 'email');
            $password = $this->request->getPut('password', 'string');
            $city = $this->request->getPut('city', 'string');
            $language = $this->request->getPut('language', 'string', 'tr');
            $os = $this->request->getPut('os', 'string', 'Windows');

            $userModel = new Users();
            $userModel->setEmail($email);
            $userModel->setPassword($password);
            $userModel->setCity($city);
            $userModel->setLanguage($language);
            $userModel->setOs($os);
            $userModel->setType(Users::TYPE_NEW);

            if ($userModel->validation()) {
                $checkExitsUser = Users::checkExistsUser($email);
                if(!$checkExitsUser){
                    try{
                        $save = $userModel->save();
                        if ($save !== false) {
                            $response = [
                                "status" => "OK",
                                "message" => "Success",
                                "user_id"=>$userModel->getId(),
                            ];
                        } else {
                            $response = [
                                "status" => "NOK",
                                "code" => "API_ERR_1003",
                                "message" => "DB error",
                            ];
                        }
                    }catch (\Exception $e){
                        $response = [
                            "status" => "NOK",
                            "code" => "API_ERR_1004",
                            "message" => "Internal Error",
                        ];
                    }
                }else{
                    $response = [
                        "status" => "NOK",
                        "code" => "API_ERR_1005",
                        "message" => "Exists User",
                    ];
                }
            } else {
                $response = [
                    "status" => "NOK",
                    "code" => "API_ERR_1002",
                    "message" => "Validation Error",
                    'fields' => $userModel->getMessages()
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