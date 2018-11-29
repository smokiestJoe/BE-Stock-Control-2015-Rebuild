<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 28/11/2018
 * Time: 09:57
 */

abstract class AbstractStatements
{
    abstract public function getPrimarySql();

    abstract public function getColumnsAndData();

    abstract protected function generateCreateSql();

    abstract protected function generateReadSql();

    abstract protected function generateUpdateSql();

    abstract protected function generateDeleteSql();
}