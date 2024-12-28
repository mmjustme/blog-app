<?php

namespace core\middlewares;

class Auth
{
  public function handle()
  {
    if (!checkAuth()) redirect(BASE_URL . '/login');
  }
}
