<?php

namespace codingbootcamp\exercises;

//FQN: codingbootcamp\exercises\db
class db 
{
    protected static $pdo=null;
    protected static $host = 'localhost';
    protected static $username = 'root';
    protected static $password = 'rootroot';
    protected static $database = 'movie_db';
    /**
    *return the pdo object for teh connection
    *
    *if the connection has been made, it will just return the object, if not,
    *it will first connect and then return it
    *
    *@return pdo connection
    */
    public static function pdo()
    {
        if(static::$pdo === null)
        {
            // connect to the database
            try 
            {
                // store the connection (PDO) into static::$pdo
                static::$pdo = new PDO(
                // 'mysql:dbname=database_name;host=locahost;charset=utf8'
                'mysql:dbname='.static::$database.';host='.static::$host.';charset=utf8', 
                static::$username,
                static::$password
                );

                // set error reporting
                static::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } 
            catch (PDOException $e) 
            {
                // if something went wrong, just print out the error message            
                echo 'Connection failed: ' . $e->getMessage();
            }
        }
        return static::$pdo;
    }

    public static function query($sql, $substitutions = [])
    {
        // get PDO connection object
        $pdo=static::pdo();

        // prepare a statement out of SQL
        $stmt= $pdo->prepare($sql);

        // we run the query and keep the outcome (true or false)
        $outcome= $stmt->execute($substitutions);

        // if there was an error
        if($outcome===false)
        {
            // print the error and exit
            static::exitWithError();
        }
        // return the statement (pointing to the result)
        return $stmt;
    }

    protected function exitWithError()
    {
        // print a <h1>
        echo '<h1>MySQL error:</h1>';
    
        // dump information about the error
        var_dump(static::pdo()->errorInfo());
    
        // end execution
        exit();
    }
}