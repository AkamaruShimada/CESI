<?php

function dbconnect() {
    // Les constantes DB_HOST, DB_USER, DB_PASSWORD, DB_NAME et DB_PORT doivent être définies au préalable
    $conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
    if (mysqli_connect_errno()) {
        throw new Exception("Database connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

/**
 * Used to running database query
 *
 * @param string mysql query
 *
 * return mixed
 */
function run_query($conn, string $query) {

    if(!$result = mysqli_query($conn, $query)) {
        throw new Exception(mysqli_error($conn));
    } else {
        return $result;
    }
}

/**
 * Used to create an INSERT query
 *
 * @param $table table name
 * @param $datas array the data to be inserted
 *
 * return bolean
 */
function insert(string $table, array $datas) {
    $conn = dbconnect();

    $dataColumn = null;
    $dataValues = null;
    foreach($datas as $column => $value) {
        $escapedValue = $conn->real_escape_string($value); // Échapper les données
        $dataColumn .= $column . ",";
        $dataValues .= "'" . $escapedValue . "',";
    }

    $dataColumn = rtrim($dataColumn,',');
    $dataValues = rtrim($dataValues,',');

    $query = "INSERT INTO {$table} ({$dataColumn}) VALUES({$dataValues})";

    return run_query($conn, $query);
}

/**
 * @param string table name
 * @param string column
 * @param array conditions
 *
 * return array if has some data, false otherwise
 */
function select(string $table, string $column = null, $conditions = array()) {
    $conn = dbconnect();
    if(empty($column)) {
        $column = "*";
    }

    $query = "SELECT {$column} FROM {$table}";
    if(!empty($conditions)) {
        $query .= " WHERE {$conditions[0]} {$conditions[1]} '{$conditions[2]}'";
    }

    if (!$result = run_query($conn, $query)) {
        throw new Exception('Error when looking to the data');
    } else {
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }
}
