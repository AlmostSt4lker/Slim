<?php

use Slim\App;

class Model extends Db
{

    protected function getNames($uid){
        $sql = "SELECT * FROM users WHERE uid LIKE ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$uid]);

        $results = $stmt->fetchAll();

        return $results;
    }
}