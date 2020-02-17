<?php


class View extends model
{

    public function readUsers($uid){
        $results = $this->getNames($uid);
        return $results[0]['uid'];
    }

}