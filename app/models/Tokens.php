<?php

namespace App\Models;

class Tokens extends \Phalcon\Mvc\Model
{

    const STATUS_NEW = '0';
    const STATUS_EXPIRED = '-1';
    const STATUS_USED = '1';

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var integer
     */
    protected $user_id;

    /**
     *
     * @var string
     */
    protected $token;

    /**
     *
     * @var string
     */
    protected $create_time;

    /**
     *
     * @var integer
     */
    protected $status;

    /**
     *
     * @var string
     */
    protected $expire_time;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field user_id
     *
     * @param integer $user_id
     * @return $this
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Method to set the value of field token
     *
     * @param string $token
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Method to set the value of field create_time
     *
     * @param string $create_time
     * @return $this
     */
    public function setCreateTime($create_time)
    {
        $this->create_time = $create_time;

        return $this;
    }

    /**
     * Method to set the value of field status
     *
     * @param integer $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Method to set the value of field expire_time
     *
     * @param string $expire_time
     * @return $this
     */
    public function setExpireTime($expire_time)
    {
        $this->expire_time = $expire_time;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field user_id
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Returns the value of field token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Returns the value of field create_time
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Returns the value of field status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the value of field expire_time
     *
     * @return string
     */
    public function getExpireTime()
    {
        return $this->expire_time;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cFaqCK79p4");
        $this->setSource("tokens");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tokens[]|Tokens|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tokens|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function generateToken()
    {
        $length = 128;
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet);

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max - 1)];
        }
        $this->setToken($token);
    }

    public static function check($user_token)
    {
        $token = self::findFirst([
            'conditions'=>'token=:token: AND status=:status:',
            'bind'=>[
                'token'=>$user_token,
                'status'=>self::STATUS_NEW,
            ]
        ]);
        if($token){
            if($token->getExpireTime() >= date('Y-m-d H:i:s')){
                $token->setStatus(self::STATUS_USED);
                $token->update();
                $user = Users::findFirst($token->getUserId());
                if($user){
                    return $user;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

}
