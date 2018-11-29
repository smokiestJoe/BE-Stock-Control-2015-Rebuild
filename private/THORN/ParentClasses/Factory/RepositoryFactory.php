<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 18/11/2018
 * Time: 11:08
 */

class RepositoryFactory
{
    private $objectArray = [];

    public function __construct()
    {
        echo "OBJECT FACTORY ONLINE<br>";
    }

    /*     REPOSITORY BUILD     */
    public static function build ($object, $type = null)
    {
        if ($object == '') {

            throw new Exception("Object does not exist<br>");

        } else {

            $className = 'Object' . ucfirst($object);

            if (class_exists($className)) {

                if ($type != null) {

                    return new Repository($className, $type);

                } else {

                    return new Repository($className);
                }

            } else {

                throw new Exception("Class does not exist<br>");
            }
        }
    }
}
