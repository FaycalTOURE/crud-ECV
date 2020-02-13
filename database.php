<?php
/**
 * Created by PhpStorm.
 * User: toure
 * Date: 13/02/2020
 * Time: 14:53
 */

$db = null;

try
{
    $db = PDOFactory::getMysqlConnexion();
    $errorDataBase = PDOFactory::getMysqlErrorsConnexion();
}
catch (PDOException $e)
{
    echo 'La connexion a échoué : [', $e->getCode(), '] : ', $e->getMessage();
}