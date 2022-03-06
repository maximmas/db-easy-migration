<?php
/**
 * DB table creation
 *
 */

namespace DEM;


final class Migration
{

    public function __construct(
        private ?\PDO $pdo,
    )
    {
    }


    public function run(): void
    {
        $this->pdo && !$this->isTableExists() && $this->createTable();

    }


    protected function createTable(): ?bool
    {

        $sql = DEM_TABLE_SQL;

        try {
            $result = $query = $this->pdo->prepare($sql)->execute();
            $query->closeCursor();

        } catch (\PDOException $e) {
            echo "DB Error: " . $e->getMessage();
        }

        return $result;
    }


    protected function isTableExists(): bool
    {

        try {
            $sql = "SELECT COUNT(*) 
                      FROM information_schema.tables 
                      WHERE TABLE_SCHEMA = :db_name 
                      AND TABLE_NAME = :table_name";

            $query = $this->pdo->prepare($sql);

            $query->execute([
                'db_name' => DEM_DB_NAME,
                'table_name' => DEM_DB_TABLE
            ]);

            $row = $query->fetch()[0];
            $query->closeCursor();

        } catch (\PDOException $e) {
            $row = false;
            echo "DB Error: " . $e->getMessage();
        }
        return $row === "1";
    }


}