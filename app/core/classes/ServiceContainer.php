<?php

namespace core;

class ServiceContainer
{
  protected $services = [];

  public function setService($service, $func)
  {
    $this->services[$service] = $func;
  }

  public function getService($service)
  {
    if (!isset($this->services[$service])) throw new \Exception("{$service} not found");

    return call_user_func($this->services[$service]);
  }
}