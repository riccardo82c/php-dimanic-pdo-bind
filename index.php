<?php

include_once './Database.php';

$database = new Database();
$db = $database->connect();

$param = [
    'nome' => 'Riccardo',
    'eta' => 38,
    'description' => 'Web Dev',
    'table' => 'students',
];

$table = $param['table'];

unset($param['table']);

$sql = sprintf(
    'insert into %s (%s) values(%s)',
    $table,
    implode(', ', array_keys($param)),
    ':' . implode(', :', array_keys($param)),

);

// Prepare statement
$stmt = $db->prepare($sql);

$stmt->execute($param);

?>