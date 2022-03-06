<?php

/**
 * Insert data
 *
 */

namespace DEM;


class DataProvider
{

    public function __construct(
        private ?\PDO $pdo,
        protected string $tableName
    )
    {

    }

    public function saveData(array $tableData): void
    {

        // tableData format: ['fieldName' => 'fieldValue']

        // example of prepared PDO query
        // $query = $db->prepare("INSERT INTO `persons` SET `first_name` = :first_name, `last_name` = :last_name");
        // $query->execute(array('first_name' => 'John', 'last_name' => 'Dow'));

        $string = "INSERT INTO `{$this->tableName}` SET";

        foreach ($tableData as $column => $value) {
            $string .= " `{$column}` = :{$column},";
        }
        $sql = rtrim($string, ',');

       try {
           $query = $this->pdo->prepare($sql);
           $query->execute($tableData);
           $query->closeCursor();
       } catch (\PDOException $e) {
            echo " DB Error: " . $e->getMessage();
        }

    }

}




