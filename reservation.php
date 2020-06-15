<?php

class Reservation {
    private $resId;
    private $clientId;
    private $bookingNo;
    private $status;
    private $created_at;
    public static $sessions;
    public function __construct($resId,$clientId,$bookingNo,$status,$sessions = array(),$created_at)
    {
        date_default_timezone_set('Europe/Istanbul');
        ini_set('default_charset','utf-8');
        $this->resId = $resId;
        $this->clientId = $clientId;
        $this->bookingNo = $bookingNo;
        $this->status = $status;
        $this->created_at = $created_at;
        self::$sessions = $sessions;
        return self::$sessions;
        
    }
    public function getResId(){
        return $this->resId;
    }
    public function getClientId(){
        return $this->clientId;
    }
    public function getBookingNo(){
        return $this->bookingNo;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getSessions(){
        return self::$sessions;
    }
    public function getCreatedAt(){
        return $this->created_at;
    }
    public function createReservation($clientId, $sessions){
        $this->clientId = $clientId;
        self::$sessions = $sessions;
        return array($this->clientId, $this->sessions);
    }
    public function addNewSession($par1,$par2){
        $arr[$par1] = $par2;
        foreach ($arr as $key => $value) {
            self::$sessions[$key] = $value;
        }
        return self::$sessions;
    }
    public function removeSession($sessionId){
        unset(self::$sessions[$sessionId]);
        return self::$sessions;
    }
    public function changeReservation($oldSessionId,$newSessionId){
        if(array_key_exists($oldSessionId,self::$sessions) & array_key_exists($newSessionId,self::$sessions)){
            $arr[$oldSessionId] = $newSessionId;
            foreach ($arr as $key => $value) {
                self::$sessions[$key] = $value; 
            }
            return self::$sessions;
        }else{
            if(!array_key_exists($oldSessionId, self::$sessions)){
                echo $oldSessionId . " numaralı eski oturum ID bulunmuyor.";
            }else{
                echo $newSessionId . " numaralı yeni oturum ID bulunmuyor.";
            }
            return self::$sessions;
        }
    }
    
    public function __destruct()
    {
        $this->resId = NULL;
        $this->clientId = NULL;
        $this->bookingNo = NULL;
        $this->status = NULL;
        $this->created_at = NULL;
        self::$sessions = NULL;
    }
}

?>