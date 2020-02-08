<?php


class View extends model
{

    public function readUsers(){
        $results = $this->getNames();
        return (string)$results;
    }

}