<?php

namespace ITime\UniCalendar;

class ITimeFactory {

    public static $LIB_UNIMELB = 'unimelb';
    public static $LIB_MONASH = 'monash';
    public static $LIB_RMIT = 'rmit';
    private static $clsMap = array(
        'unimelb' => 'LibUniMelb',
        'monash' => 'LibMonash',
        'rmit' => 'LibRMIT',
    );

    function __construct(){

    }

    /**
     * [create description]
     * @param  [string] $className [description]
     * @return [ITimeCalendar]   [description]
     */
    public static function create($className){
        $instance = null;
        if(!array_key_exists($className, ITimeFactory::$clsMap)){
            return $instance;
        }
        try{
            $reflect = new \ReflectionClass('ITime\\UniCalendar\\'.ITimeFactory::$clsMap[$className]);
            $instance = $reflect->newInstance();
        } catch (Exception $e){
            // var_dump($e);
            $instance = null;
        }
        return $instance;
    }
}