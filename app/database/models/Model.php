<?php

namespace app\database\models;

use app\database\Transaction;
use PDOException;
use PDO;

abstract class Model
{
    protected static string $table;

    public static function findId(int $id, string $fields = '*')
    {
        try {
            Transaction::open();

            $conn = Transaction::getConnection();
            $tableName = static::$table;

            $query = $conn->prepare("SELECT {$fields} FROM {$tableName} WHERE id = :id");
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();

            $result = $query->fetchObject(static::class);

            Transaction::close();

            return $result ?: null;
        } catch (PDOException $e) {
            Transaction::rollback();
            self::mensagemErro($e);
            return false;
        }
    }

    public static function getAll(string $fields = '*')
    {
        try {
            Transaction::open();

            $conn = Transaction::getConnection();
            $tableName = static::$table;

            $query = $conn->prepare("SELECT {$fields} FROM {$tableName}");
            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_CLASS, static::class);

            Transaction::close();
            return $result;
        } catch (PDOException $e) {
            Transaction::rollback();
            self::mensagemErro($e);
            return false;
        }
    }

    public static function where(string $field, string $value, string $fields = '*', bool $single = true)
    {
        try {
            Transaction::open();

            $conn = Transaction::getConnection();
            $tableName = static::$table;

            $query = $conn->prepare("SELECT {$fields} FROM {$tableName} WHERE {$field} = :{$field}");
            $query->execute([$field => $value]);

            $result = $single
                ? $query->fetchObject(static::class)
                : $query->fetchAll(PDO::FETCH_CLASS, static::class);

            Transaction::close();
            return $result;
        } catch (PDOException $e) {
            Transaction::rollback();
            self::mensagemErro($e);
            return false;
        }
    }

    public static function queryCustomizada(string $query, array $params = [])
    {
        try {
            Transaction::open();
            $conn = Transaction::getConnection();

            $stmt = $conn->prepare($query);
            $stmt->execute($params);
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);

            Transaction::close();
            return $result;
        } catch (PDOException $e) {
            Transaction::rollback();
            self::mensagemErro($e);
            return false;
        }
    }

    public static function insert(array $data)
    {
        try {
            Transaction::open();
            $conn = Transaction::getConnection();

            $table = static::$table;
            $fields = implode(',', array_keys($data));
            $placeholders = ':' . implode(', :', array_keys($data));

            $query = $conn->prepare("INSERT INTO {$table} ({$fields}) VALUES ({$placeholders})");
            $query->execute($data);
            $lastInsertId = $conn->lastInsertId();
            Transaction::close();
            return $lastInsertId;
        } catch (PDOException $e) {
            Transaction::rollback();
            self::mensagemErro($e);
            return false;
        }
    }

    public static function update(int $id, array $data)
    {
        try {
            Transaction::open();
            $conn = Transaction::getConnection();

            $table = static::$table;
            $fields = implode(' = ?, ', array_keys($data)) . ' = ?';

            $query = $conn->prepare("UPDATE {$table} SET {$fields} WHERE id = ?");
            $query->execute([...array_values($data), $id]);

            Transaction::close();
        } catch (PDOException $e) {
            Transaction::rollback();
            self::mensagemErro($e);
            return false;
        }
    }

    public static function delete(int $id)
    {
        try {
            Transaction::open();
            $conn = Transaction::getConnection();

            $table = static::$table;

            $query = $conn->prepare("DELETE FROM {$table} WHERE id = ?");
            $query->execute([$id]);

            Transaction::close();
        } catch (PDOException $e) {
            Transaction::rollback();
            self::mensagemErro($e);
            return false;
        }
    }

    private static function mensagemErro(PDOException $exception): void
    {
        $errorCode = $exception->getCode();
        $errorMessage = $exception->getMessage();

        if ($errorCode == '23000') {
            $_SESSION['flash_message'] = [
                'message' => 'Não é possível excluir este item porque está vinculado a outros registros.',
                'type' => 'error',
            ];
        }

        $_SESSION['flash_message'] = [
            'message' => 'Ocorreu um erro no banco de dados.'.$errorMessage,
            'type' => 'error',
        ];
    }
}
