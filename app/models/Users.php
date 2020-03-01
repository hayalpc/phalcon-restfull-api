<?php

namespace App\Models;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;
use Phalcon\Validation\Validator\PresenceOf as PresenceOf;

class Users extends \Phalcon\Mvc\Model
{

    const TYPE_NEW = "new";
    const TYPE_GOLD = "gold";

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $email;

    /**
     *
     * @var string
     */
    protected $password;

    /**
     *
     * @var string
     */
    protected $city;

    /**
     *
     * @var string
     */
    protected $language;

    /**
     *
     * @var string
     */
    protected $os;

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
     * @var string
     */
    protected $status;

    /**
     *
     * @var string
     */
    protected $type;

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
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Method to set the value of field password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $md5 = md5($password . $this->getEmail());
        $this->password = $md5;
        return $this;
    }

    /**
     * Method to set the value of field city
     *
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Method to set the value of field language
     *
     * @param string $language
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Method to set the value of field os
     *
     * @param string $os
     * @return $this
     */
    public function setOs($os)
    {
        $this->os = $os;

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
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Method to set the value of field type
     *
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

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
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the value of field password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the value of field city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Returns the value of field language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Returns the value of field os
     *
     * @return string
     */
    public function getOs()
    {
        return $this->os;
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
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the value of field type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new EmailValidator(
                [
                    'model' => $this,
                    'message' => 'Please enter a correct email address',
                ]
            )
        );
        $validator->add('password', new PresenceOf(['message' => 'The password is required',]));
        $validator->add('language', new PresenceOf(['message' => 'The language is required',]));
        $validator->add('city', new PresenceOf(['message' => 'The city is required',]));
        $validator->add('os', new PresenceOf(['message' => 'The os is required',]));

        return $this->validate($validator);
    }

    /**
     * @param null $filter
     * @return array
     */
    public function getMessages($filter = null): array
    {
        $messages = [];
        foreach (parent::getMessages($filter) as $message) {
            $messages[$message->getField()] = $message->getMessage();
        }
        return $messages;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cFaqCK79p4");
        $this->setSource("users");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users[]|Users|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public static function checkExistsUser($email)
    {
        $checkExitsUser = self::findFirst([
            'conditions' => ' email=:email: ',
            'bind' => ['email' => $email]
        ]);
        return $checkExitsUser;
    }

    public static function login($email, $password)
    {
        $user = self::findFirst(
            [
                'conditions' => 'email=:email: AND password=:password:',
                'bind' => [
                    'email' => $email,
                    'password' => md5($password . $email)
                ]
            ]
        );
        return $user;
    }
}
