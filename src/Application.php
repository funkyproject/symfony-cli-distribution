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

    public function setContainer(\Pimple $container)
    {
        $this->container = $container;
        return $this;
    }

    protected function getDefaultCommands()
    {

        $commands = array();

        $finder = Finder::create()->files()
            ->name('*Command.php')
            ->in(__DIR__.'/Command');

        foreach($finder as $file) {
            $className = 'Funkyproject\\Command\\'.str_replace('.php','',$file->getFilename());

            $commands[] = $command = new $className;

            if($command instanceof Command\ContainerAwareInterface) {
                $command->setContainer($this->container);
            }
        }

        return array_merge(
            parent::getDefaultCommands(),
            $commands
        );
    }

}