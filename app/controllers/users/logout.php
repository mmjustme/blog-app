<?php

if ($_SESSION['user']) unset($_SESSION['user']);

redirect(BASE_URL . '/login');
