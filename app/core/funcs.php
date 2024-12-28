<?php

function dump($data)
{
  echo "<pre>";
  var_dump($data);
  echo "</pre>";
}

function dd($data)
{
  dump($data);
  die;
}

function checkAllowedFields($fields = [])
{
  $data = [];
  foreach ($_POST as $key => $value) {
    if (in_array($key, $fields)) {
      $data[$key] = $value;
    }
  }
  return $data;
}

function getDb(): \core\Db
{
  return \core\App::get(\core\Db::class);
}

function abort($code = 404)
{
  http_response_code($code);
  require VIEWS . "/errors/{$code}.tpl.php";
  die();
}

function redirect($url = '')
{
  if ($url) {
    $redirect = $url;
  } else {
    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : BASE_URL;
  }
  header("Location: {$redirect}");
  die;
}

function old($fieldname)
{
  return isset($_POST[$fieldname]) ? h($_POST[$fieldname]) : '';
}

function load($fillable, $post = true)
{
  $load_data = $post ? $_POST : $_GET;
  $data = [];

  foreach ($fillable as $name) {
    if (isset($load_data[$name])) {
      !is_array($load_data[$name])
        ? $data[$name] = trim($load_data[$name])
        : $data[$name] = $load_data[$name];
    } else {
      $data[$name] = '';
    }
  }
  return $data;
}

function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES);
}

function checkAuth(): bool
{
  return isset($_SESSION['user']);
}

function get_alerts()
{
  if (!empty($_SESSION['success'])) {
    require_once VIEWS . '/inc/alert_success.php';
    unset($_SESSION['success']);
  }

  if (!empty($_SESSION['error'])) {
    require_once VIEWS . '/inc/alert_error.php';
    unset($_SESSION['error']);
  }
}

function getFileExt($fileName)
{
  $fileName = explode('.', $fileName);
  return end($fileName);
}

function setPageTitle(string $title)
{
  $titles_list = require CONFIG . "/pageTitlesENUM.php";
  return  $titles_list[$title];
}
