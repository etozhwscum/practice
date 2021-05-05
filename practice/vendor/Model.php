<?php

/* @var $db PDO */

class Model
{
    public $db;
    public function __construct()
    {
        $dsn = APP_CONF['database']['db'] .":host=".APP_CONF['database']['host'].";dbname=".APP_CONF['database']['name'].";charset=".APP_CONF['database']['charset'].";";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->db = new PDO($dsn, APP_CONF['database']['login'], APP_CONF['database']['password'], $opt);
    }

    public function name()
    {
        $tmp = new ReflectionClass($this);
        $temp = explode(trim('\ '), $tmp->name);
        return strtolower(end($temp));
    }

    public function getModel(string $field = '*')
    {
        return $this->db->query("SELECT $field FROM {$this->name()}")->fetchAll();
    }

    public function getTable(string $table, string $field = '*')
    {
        return $this->db->query("SELECT $field FROM $table")->fetchAll();
    }

    public function delete($id)
    {
        $this->db->exec("DELETE FROM `{$this->name()}` WHERE `id` = {$id}");
    }

    public function update()
    {
    }
    
    public function save()
    {
    }
}

