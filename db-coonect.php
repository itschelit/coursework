<?php
define('HOST','127.0.0.1');
define('USER','host2976');
define('PASSWORD','j1hgY6LC');
define('DB','itelit_host2976');
$db = mysql_connect(HOST,USER,PASSWORD);

if (!$db) {
    exit('Не має доступу до бази данних, помилка -'.mysql_error());
}

if (!mysql_select_db(DB,$db)) {
    exit('Не можливо вибрати базу данних, помилка -'.mysql_error());
}
mysql_query('SET NAMES "utf8" ');
?>