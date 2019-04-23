<?php

class DatabaseConnection {
    private static $writeDBConnection;
    private static $readDBConnection;

    public static function connectWriteDB() {
        // check if there is a connection to db already
        if(self::$writeDBConnection === null) {
            // setup the connection to the DB, set the error mode to throw exceptions, we turn emulation of prepares as mysql will handle it natively
            self::$writeDBConnection = new PDO('mysql:host=localhost;dbname=tasksapp;charset=utf8', 'root', '');
            self::$writeDBConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$writeDBConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }

        return self::$writeDBConnection;
    }

    public static function connectReadDB() {
        // check if there is a connection to db already
        if(self::$readDBConnection === null) {
            // setup the connection to the DB, set the error mode to throw exceptions, we turn emulation of prepares as mysql will handle it natively
            self::$readDBConnection = new PDO('mysql:host=localhost;dbname=tasksapp;charset=utf8', 'root', '');
            self::$readDBConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$readDBConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }

        return self::$readDBConnection;
    }
}