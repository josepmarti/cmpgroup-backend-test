<?php

/**
 * Created by Josep Martí
 */

namespace Service;

/**
 * Abstract Class sharing common methods of all providers
 */
abstract class AbstractProvider
{

    /**
     * Instances table
     *
     * @var array
     */
    protected $_instanceProvider = array();

    /**
     * Provide an Instance for the class $className
     * @param $className
     *
     * @return mixed
     * @throws Exception
     */
    protected function provideInstance($className)
    {
        if (! isset($this->_instanceProvider[$className])) {
            if (! class_exists($className)) {
                throw new Exception('The class ' . $className . ' doesn\'t exist.');
            }
                $this->_instanceProvider[$className] = new $className();

        }
        return $this->_instanceProvider[$className];
    }

    /**
     * Delete all the instances of the service
     *
     * Only used by the Unit Tests
     */
    public function clearAllInstance()
    {
        $this->_instanceProvider = array();
    }

}

