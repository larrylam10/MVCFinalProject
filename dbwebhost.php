<?php
class DB
{
    private $pdo = null;
    private $stmt = null;

    function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host=localhost;dbname=id13870432_registration;charset=utf8",
                "id13870432_root",
                "T*sted123456",
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
    
    function __destruct()
    {
        if ($this->stmt !== null) {
            $this->stmt = null;
        }

        if ($this->pdo !== null) {
            $this->pdo = null;
        }
    }

    function insert($sql, $data) {
        $result = false;
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $result = $this->stmt->execute($data);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $this->stmt = null;
        return $result;  
    }

    function select($sql, $cond = null)
    {
        $result = false;
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($cond);
            $result = $this->stmt->fetchAll();
        } catch (Exception $ex) {
            die($ex->getMessage());
        }

        $this->stmt = null;
        return $result;
    }

    function delete($sql, $cond = null)
    {
        $result = false;
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $result = $this->stmt->execute($cond);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }

        $this->stmt = null;
        return $result;
    }

    function update($sql, $cond = null)
    {
        $result = false;
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $result = $this->stmt->execute($cond);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $this->stmt = null;
        return $result;
    }

    function affected_rows($sql, $cond = null)
    {
        $result = false;
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $result = $this->stmt->execute($cond);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $this->stmt = null;
        return $result;
    }
}
