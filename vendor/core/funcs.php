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
    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
  }
  header("Location: {$redirect}");
  die;
}

function old($fieldname)
{
  return isset($_POST[$fieldname]) ? h($_POST[$fieldname]) : '';
}

function load($fillable)
{
  $data = [];
  #задача перевірити чи в масиві fillable є поля з данних юзера
  foreach ($_POST as $key => $value) {
    # беремо $key і перевіряємо наявність в fillable
    if (in_array($key, $fillable)) {
      # запис данних юзера в масив data
      $data[$key] = trim($value);
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