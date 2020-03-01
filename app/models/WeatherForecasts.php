<?php

namespace App\Models;

class WeatherForecasts extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $city;

    /**
     *
     * @var string
     */
    protected $date;

    /**
     *
     * @var string
     */
    protected $guess;

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
     * Method to set the value of field date
     *
     * @param string $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Method to set the value of field guess
     *
     * @param string $guess
     * @return $this
     */
    public function setGuess($guess)
    {
        $this->guess = $guess;

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
     * Returns the value of field city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Returns the value of field date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Returns the value of field guess
     *
     * @return string
     */
    public function getGuess()
    {
        return $this->guess;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("cFaqCK79p4");
        $this->setSource("weather_forecasts");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return WeatherForecasts[]|WeatherForecasts|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WeatherForecasts|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
