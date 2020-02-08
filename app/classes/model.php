<?php

use Slim\App;

class Model extends Db
{
    public function getNames(){

        $results = array (
            'name' => 'Adam',
        );

        return $results['name'];
    }
}