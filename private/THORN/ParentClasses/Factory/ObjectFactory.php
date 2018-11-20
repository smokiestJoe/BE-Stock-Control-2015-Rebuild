<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 18/11/2018
 * Time: 11:08
 */

class ObjectFactory
{
    private $objectArray = [];

    public function __construct()
    {
        echo "OBJECT FACTORY ONLINE<br>";
    }

    public static function build ($object, $type = null)
    {
        if ($object == '') {

            throw new Exception("Object does not exist<br>");

        } else {

            $className = 'Object'.ucfirst($object);

            if (class_exists($className)) {

                if ($type != null) {

                    return new Repository($className, $type);

                } else {

                    return new Repository($className);
                }

            } else {

                throw new Exception('Class does not exist<br>');
            }
        }
    }

//    public static function build ($object, $type = null)
//    {
//        if ($object == '') {
//
//            throw new Exception('NO OBJECT SELECTED');
//
//        } else {
//
//            $class = 'Object'.ucfirst($object);
//
//            if (class_exists($class)) {
//
//                if ($type != null) {
//
//                    return new $class($type);
//
//                } else {
//
//                    return new $class();
//                }
//
//            } else {
//
//                throw new Exception('OBJECT NOT FOUND<br>');
//            }
//
//        }
//    }
}