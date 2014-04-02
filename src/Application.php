<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 *
 * @author     aurelien
 * @copyright  2014 Efidev 
 * @version    CVS: Id:$
 */

namespace Funkyproject;

use Symfony\Component\Console\Application as BaseApplication;
use Funkyproject\Command as Command;
use Symfony\Component\Finder\Finder;

class Application extends BaseApplication
{
    private $container;


    public function __construct(\Pimple $container, $name = 'UNKNOWN', $version = 'UNKNOWN')
    {
        parent::__construct($name, $version);

        $this->setContainer($container);
    }

    public function setContainer(\Pimple $container)
    {
        $this->container = $container;
        return $this;
    }

    protected function getDefaultCommands()
    {
        $commands = array();

        return array_merge(
            parent::getDefaultCommands(),
            $commands
        );
    }

}