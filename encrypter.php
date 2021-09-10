<?php

class StringEncrypter {
    public function __construct(){
        $this->salts = ["Neln#AWa3FT{f,Hlq BkyQyQ3@pegRBh rpct3oOIVoob", "ZsL prUhgMdMYHA YhfDgjAcwalbn4aWuSBkIhw MyeyHyjpn", "AYhc5walbn aWuSB&kIhwMy", "qzdn yJvVLSG YTt,qpRFjpBDpWk", "WqDQm}wtZOGtXtfg HbWSnfnIZM UbuArXtfgH", "fbGXGLj hyqb8xSe@pKzNrG", "Hrwgx8RVU vGBANRw)oXrR W", "rVnOpn4pct oaKvAb OIVVnOpnoobpy&SSjLGKW", "aQbgKHSuL zuaKRVnOpneJywAB", "a1oi7Tpc LaB(tz", "aTr1pl,1hBP)ltaz2V vBnmI1!nvc", ";odot2eaLl9:odot2eaLl9", "3aCoq0nFDO%\$zsv7k A7vfBZi,aH0Ret3a*("];
    }
    private function getRandomSalt(){
        return $this->salts[rand(0, count($this->salts))];
    }
    public function encrypt($input_string){
        $chars = str_split($input_string);
        $encrypted_str = "";
        foreach ($chars as $char){
            $encrypted_str .= $this->getRandomSalt() . 
                              $char . $this->getRandomSalt() .
                              $this->getRandomSalt();
        }
        return strrev($encrypted_str);
    }
    public function decrypt($input_str){
        $decrypted_str = strrev($input_str);
        foreach ($this->salts as $salt){
            $unsalted_str = str_replace($salt, "", $decrypted_str);
            $decrypted_str = $unsalted_str;
        }
        return $decrypted_str;
    }
}

$str_encrypter = new StringEncrypter();
echo $str_encrypter->encrypt("Test message!");