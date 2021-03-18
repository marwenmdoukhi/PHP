<?php

namespace App;




use App\Exceptions\CurlException;
use App\Exceptions\HTTPException;
use App\Exceptions\UnauthorizedHTTPException;
use DateTime;
use Exception;

class Openwewater{


    private  $apikey;

    public function __construct(string $apikey){

        $this->apikey = $apikey;
    }


    /**
     * @param string $city
     * @return array|null
     * @throws Exception
     */
    public function getForecast (string $city): ?array
    {

        try {
            $data = $this->callAPI("forecast?q={$city}&appid={$this->apikey}");
        }catch (Exception $e){

            return [];
        }

        $dataReturn = [];

        foreach($data['list'] as $city) {
            $dataReturn[] = [
                'temp' => $city['main']['temp'],
                'description' => $city['weather'][0]['description'],
                'date' => new DateTime("@" . $city['dt'])
            ];
        }

        return $dataReturn;

    }

    public function getToday(string $city): ?array
    {

         try {
        $data = $this->callAPI("weather?q={$city}");
         } catch (Exception $e)  {
            return [
                 'temp' => 0,
                'description' => 'météo indisponible',
                'date' => new DateTime()
             ];
         }

        return [
            'temp'=>$data['main']['temp'],
            'description'=>$data['weather'][0]['description'],
            'date'=>new DateTime()
        ];
    }


        private function callAPI(string $endpont):?array {

        $curl =curl_init("http://api.openweathermap.org/data/2.5/{$endpont}&appid={$this->apikey}&lang=fr&units=metric");

        curl_setopt_array($curl,[
            CURLOPT_CAINFO=>dirname(__DIR__).DIRECTORY_SEPARATOR.'cert.cer',
            CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_TIMEOUT=>1
        ]);
            $data=curl_exec($curl);
            if ($data === false) {
                // curl_error renvoit une erreur que quand le retour de curl_exec vaut false
                throw new CurlException($curl
                );
                // $error = curl_error($ressource);
                // curl_close($ressource);
                // throw new Exception($error);
            }

            $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($code !== 200) {
                curl_close($curl);
                if ($code === 401) {
                    $data = json_decode($data,true);
                    throw new UnauthorizedHTTPException($data['message'], 401);
                }
                throw new HTTPException($data, $code);
                // throw new Exception($data);
            }

            curl_close($curl);
            return json_decode($data, true);

    }


}