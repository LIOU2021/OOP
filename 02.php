<?php

abstract class Adapter
{
    protected $name;

    public function getName(): string
    {
        return $this->name;
    }
}

class AjaxAdapter extends Adapter
{
    public function __construct()
    {
        $this->name = 'ajaxAdapter';
    }
}

class NodeAdapter extends Adapter
{
    public function __construct()
    {
        $this->name = 'nodeAdapter';
    }
}

class HttpRequester
{
    private $name;
    public function __construct(Adapter $adapter)
    {
        $this->name = $adapter->getName();
    }

    public function print()
    {
        return $this->name;
    }
}

$http = new HttpRequester(new NodeAdapter());
echo $http->print();
