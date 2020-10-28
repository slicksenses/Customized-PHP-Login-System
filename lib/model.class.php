<?php
class Model extends Database{


    public function getAll($table)
    {
        $query = $this->pdo->prepare('SELECT * from '. $table);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}