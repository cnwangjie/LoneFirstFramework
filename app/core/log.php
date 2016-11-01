<?php
namespace core;

class log
{
    public static function writeHttpLog($log)
    {
        $logPath = config('log:path');
        $logFile = $logPath.date('Y-m-d').'.log';
        if (!file_exists($logFile)) {
            if (!file_exists($logPath)) {
                mkdir($logPath);
            }
            @touch($logFile);
        }
        if (!is_writable($logPath)) {
            throw new Exception("日志文件不可写", 1);
        }
        $h = @fopen($logFile, 'ab');
        fwrite($h, $log.PHP_EOL);
        fclose($h);
    }
}
