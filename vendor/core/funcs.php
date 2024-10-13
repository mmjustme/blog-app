<?php
function dump($data)
{
  echo "<pre>";
  var_dump($data);
  echo "</pre>";
}

;

function dd($data)
{
  dump($data);
  die;
}

;

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