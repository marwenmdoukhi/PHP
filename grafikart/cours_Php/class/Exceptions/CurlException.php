<?php

namespace App\Exceptions;
class Curl extends \Exception
{
 public function __construct($curl)
    {
$this->message = curl_error($curl);
curl_close($curl);
    
   }
 
}
