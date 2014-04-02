<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 *
 * @category    PhpStorm
 * @author     aurelien
 * @copyright  2014 Efidev 
 * @version    CVS: Id:$
 */

namespace Funkyproject\Configuration;


use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

class DoctrineConfiguration
{
    private  $conn;

    public function __construct($dbname, $user, $password, $host='127.0.0.1')
    {
        $config = new Configuration();

        $connectionParams = array(
            'dbname' => $dbname,
            'user' => $user,
            'password' => $password,
            'host' => $host,
            'driver' => 'pdo_mysql',
        );

        $this->conn = DriverManager::getConnection($connectionParams, $config);
    }

    public function getConn()
    {
        return $this->conn;
    }
}