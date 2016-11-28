<?php
 
// DATABASE connection script  
 
// database Connection variables
define('HOST', 'kamil-lasecki.ddns.net'); // Database host name ex. localhost
define('USER', 'nciadmin'); // Database user. ex. root ( if your on local server)
define('PASSWORD', 'K7zSZ6uK524SnT6s'); // Database user password  (if password is not set for user then keep it empty )
define('DATABASE', 'calendar2'); // Database name
define('CHARSET', 'utf8');

function DB()
{
    static $instance;
    if ($instance === null) {
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => FALSE,
        );
        $dsn = 'mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=' . CHARSET;
        $instance = new PDO($dsn, USER, PASSWORD, $opt);
    }
    return $instance;
}
 
?>