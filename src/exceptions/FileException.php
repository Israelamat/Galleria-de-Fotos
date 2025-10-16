<?php
class FileException extends Exception
{
    /**
     * param string $fileName
     * param array $arrTypes
     * @throws FileException
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }   
}
