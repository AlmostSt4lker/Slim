<?php


class View extends model
{

// users

    public function readUserId($uid)
    {
        $results = $this->getNames($uid);
        return $results[0]['uid'];
    }

    public function readUserEmail($uid)
    {
        $results = $this->getNames($uid);
        return $results[0]['email'];
    }

//products

    public function readItemName()
    {
        $results = $this->getItems();
        return $results[0]['product_name'];
    }

    public function readItemStock()
    {
        $results = $this->getItems();
        return $results[0]['product_stock'];
    }

    public function readItemPrice()
    {
        $results = $this->getItems();
        return $results[0]['product_price'];
    }

    public function readItemTest()
    {

        $arr = $this->getItemsTest();
        $integer = 0;
        foreach($arr as $value){
            $integer++;
            $arr[$integer] = $value;
        }
        return $arr;
    }

}