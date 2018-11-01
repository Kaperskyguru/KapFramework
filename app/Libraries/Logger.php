<?php
// namespace app\libraries\Logger;

class Logger
{

    const DEBUG = 1;
    const INFO = 2;    // Most Verbose
    const WARN = 3;    // ...
    const ERROR = 4;    // ...
    const FATAL = 5;    // ...
    const OFF = 6;    // Least Verbose
    private static $instance;    // Nothing at all.
    public $DateFormat = "Y-m-d G:i:s";
    public $MessageQueue;

    private $log_file;
    private $priority = Logger::INFO;

    private function __construct()
    {

    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function LogInfo($message, $user_id)
    {

        $this->Log($message, $user_id, Logger::INFO);
    }

    private function Log($message, $user_id, $priority)
    {
        if ($this->priority <= $priority) {
            $Log_Status = $this->getType($priority);
            $this->logToDB($message, $Log_Status, $user_id);
        }
    }

    private function getType($priority)
    {
        switch ($priority) {

            case Logger::INFO:
                return 'INFO';
                break;

            case Logger::DEBUG:
                return 'DEBUG';
                break;

            case Logger::ERROR:
                return 'ERROR';
                break;

            case Logger::WARN:
                return 'WARN';
                break;

            case Logger::FATAL:
                return 'FATAL';
                break;

            default:
                return null;
                break;
        }
    }

    private function logToDB($message, $status, $user_id)
    {
        try {

            $sql = "INSERT INTO logs(log_type, log_message, log_user_id)VALUES(:type, :message, :user_id)";

            $this->query($sql);
            $this->bind(':type', $status);
            $this->bind(':message', $message);
            $this->bind(":user_id", $id = ($user_id == 0)? NULL : $user_id);
            $this->executer();
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            return null;
        }
    }

    public function LogDebug($message, $user_id)
    {

        $this->Log($message, $user_id, Logger::DEBUG);
    }

    public function LogError($message, $user_id)
    {

        $this->Log($message, $user_id, Logger::ERROR);
    }

    public function LogFatal($message, $user_id)
    {

        $this->Log($message, $user_id, Logger::FATAL);
    }

    public function logWarn($message, $user_id)
    {

        $this->Log($message, $user_id, Logger::WARN);
    }

    private function __clone()
    {
    }
}
