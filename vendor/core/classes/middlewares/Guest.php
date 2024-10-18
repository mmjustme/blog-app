<?php

namespace core\middlewares;

class Guest
{
  public function handle()
  {
    if(checkAuth()) redirect('/');
  }
}