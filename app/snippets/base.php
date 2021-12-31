<?php

session_start();

set_include_path(implode(PATH_SEPARATOR, array('app', 'app/models')));
spl_autoload_register();

$database = new Database();

$settings = [];

$variables = $database->getLink()->query("SELECT `name`, `value` FROM `variables`")->fetchAll(PDO::FETCH_ASSOC);

foreach ($variables as $variable) {
    $settings[$variable['name']] = $variable['value'];
}

// TODO: говно, переделать. В идеале вынести в отдельный snippet

$isAdmin = false;

if (!empty($_SESSION['USER'])) {
    $USER = $_SESSION['user'];

    if ($USER['isAdmin']) {
        $isAdmin = true;
    }
}