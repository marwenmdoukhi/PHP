<?php
namespace App;
use App\Exceptions\APIExection;
use \Exception;
use \DateTime;
//require_once 'APIException.php';


class OpenWeather
{

    private $apiKey;
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * getToDay
     *Recupere les informations météorologiques du jour
     * @param  mixed $city ville ex: ('Brussels, be')
     *
     * @return array
     */
    public function getToDay(string $city): ?array
    {
        $data = $this->callApi("weather?q={$city}");             
        return [
            'temp' => $data['main']['temp'],
            'description' => $data['weather'][0]['description'],
            'date'    => new DateTime()
        ];
    }

    /**
     * getForecast
     *Recupere les previsions meteo sur plusieurs jours
     * @param  mixed $city ville ex: ('Brussels, be')
     *
     * @return array
     */
    public function getForecast(string $city): ?array
    {
        
            $data = $this->callApi("forecast?q={$city}");   
        foreach ($data['list'] as $day) {
            $result[] = [
                'temp' => $day['main']['temp'],
                'description' => $day['weather'][0]['description'],
                'date'    => new DateTime('@' . $day['dt'])
            ];
        }
        return $result;
    }







    /**
     * callApi Appelle l' API Open Weather
     *@throws APIException pour toute erreur liée à l'API
     * @param  mixed $endpoint Action à appeler ex: (weather, ou bien forecast ou forecast/daily)
     *
     * @return array
     */
    private function callApi(string $endpoint): ?array
    {
        $curl = curl_init("http://api.openweathermap.org/data/2.5/{$endpoint}&cnt=7&APPID={$this->apiKey}&units=metric&lang=fr");
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CAINFO => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'cert.cer',
            CURLOPT_TIMEOUT => 1
        ]);
        $data = curl_exec($curl);
        if ($data === false) {
            $error = curl_error($curl);
            curl_close($curl);
            throw new APIExection($error);
        }

        if (curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) {
            throw new Exception($data);
        }
        curl_close($curl);
        return json_decode($data, true);
    }
}
