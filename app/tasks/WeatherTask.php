<?php

use Phalcon\Cli\Task;

use App\Models\Users as Users;
use App\Models\WeatherForecasts as WeatherForecasts;

class WeatherTask extends Task
{
    public function MainAction()
    {

        $weathers = WeatherForecasts::find([
            'conditions'=>'date=:date:',
            'bind'=>['date'=>date('Y-m-d')]
        ]);

        $city = [];

        foreach ($weathers as $weather) {
            $city[$weather->getCity()] = $weather->getGuess();
        }

        $users = Users::find([
            'conditions'=>'type=:type:',
            'bind'=>['type'=>Users::TYPE_GOLD]
        ]);

        foreach ($users as $user) {
            if(isset($city[$user->getCity()])){
                //send weather forecasts information to user email
            }
        }
        echo "Task's completed\r\n";
    }
}