<?php

class DbOp
{
    var  $serverStr = "localhost";
    var $username = "root";
    var $password = "";
    var $databaseName = "group10blog";

    public $dbCon;
    public function __construct()
    {
        $this->dbCon();
    }

    public function dbCon()
    {
        $this->dbCon = new mysqli($this->serverStr, $this->username, $this->password, $this->databaseName);
        if (!$this->dbCon) {
            echo $this->dbCon->nums_error;
        }
    }
    public function createCmd($tableName, $array = [])
    {
        ///// assign assoc  --  names for col name and value for insert 
        $strSqlQuery = "insert into  " . $tableName . " (" . implode(",", array_keys($array)) . ") Values ('" . implode("','", array_values($array)) . "')";
        $strSqlQuery_Run =   $this->dbCon->query($strSqlQuery);
        $excuted = false;
        if ($strSqlQuery_Run) {
            $excuted = true;
            return $excuted;
        }
    }
    public  function updateCmd($tableName, $array = [], $strWhere)
    {
        $strloop = "";
        foreach ($array as $key => $value) {
            $strloop .= $key . "= '" . $value . "',";
        }
        $query = substr($strloop, 0, -2);

        ///update Set title= 'title',content= 'test title',image= '16428238891781922905.png where 5
        $queryStr = "update " . $tableName . " Set " . $query . "' where " . $strWhere;
        //echo $queryStr ; exit();
        $queryStr_Run = $this->dbCon->query($queryStr);
        $excuted = false;
        if ($queryStr_Run) {
            $excuted = true;
            return $excuted;
        }
    }
    public function selectCmd($strQuery, $strWhere = null)
    {
        $strSqlQuery = $strQuery;
        $strSqlQuery_Run =   $this->dbCon->query($strSqlQuery);
        if ($strSqlQuery_Run) {
            return $strSqlQuery_Run;
        }
    }
    public function deleteCmd($table, $strWhere = null)
    {
        $condition = " Where ";
        if ($strWhere === "ALL") {
            $condition = "";
            $strWhere="";
        }
        $strSqlQuery = "delete  from  ".$table.' '.$condition.''. $strWhere;
        $strSqlQuery_Run =   $this->dbCon->query($strSqlQuery);
        if ($strSqlQuery_Run) {
            return $strSqlQuery_Run;
        }
    }
}
