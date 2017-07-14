<?php

/**
 * Created by Josep Martí
 */

namespace Service;

/**
 * Abstract Class sharing the common methods of all the services
 */
abstract class AbstractService
{

    /**
     * Providing the ServiceProvider
     *
     * @return ServiceProvider
     */
    protected function getServiceProvider()
    {
        return ServiceProvider::getInstance();
    }

}
