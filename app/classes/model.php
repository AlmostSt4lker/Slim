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

    // CONTROLLER USE

    protected function setUser($uid, $email, $password){
        $sql = "INSERT INTO users(uid, email, password) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$uid, $email, $password]);

        $resultsItems = $stmt->fetchAll();

        return $resultsItems;
    }

    protected function setItem($name, $stock, $price){
        $sql = "INSERT INTO products(product_name, product_stock, product_price) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $stock, $price]);
       }

    protected function changeItem($name, $change, $value){

        if ($change == "product_stock") {

            $sql = "UPDATE `products` SET `product_stock` = ? WHERE `products`.`product_name` = ?;";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$value, $name]);
        }
        if ($change == "product_price"){

            $sql = "UPDATE `products` SET `product_price` = ? WHERE `products`.`product_name` = ?;";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$value, $name]);
        }
        if ($change == "product_name"){

            $sql = "UPDATE `products` SET `product_name` = ? WHERE `products`.`product_name` = ?;";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$value, $name]);
        }
    }

}