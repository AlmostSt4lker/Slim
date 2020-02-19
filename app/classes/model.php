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

    // Products

    protected function getItems(){
        $sql = "SELECT * FROM products";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $resultsItems = $stmt->fetchAll();

        return $resultsItems;
    }

    protected function getItemsTest(){
        $sql = "SELECT * FROM products";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $resultsItems = $stmt->fetchAll();

        $amountOfResults = $stmt->rowCount();
        $integer = 0;
        $array = array();
            foreach($resultsItems as $value){
                $integer++;
                $array[$integer] = $value;
            }
        return $array;
    }

}