<?php
namespace devskyfly\libs\convertors\fileToText;

use SplFileInfo;


abstract class AbstractFileToTextConvertor
{
    /**
     * 
     * @var \SplFileInfo
     */
    public $file="";
    
    /**
     * 
     * @param string $file_path
     */
    public function __construct($file_path)
    {
        $this->file=new SplFileInfo(realpath($file_path));
        
    }

    /**
     * Convert file to text.
     * 
     * @throws FileException
     * @return string
     */
    public function convert()
    {
        //Check file exists
        if(!$this->file->isFile()){
            throw new FileException("File '{$this->file->getPathname()}' does not exist.");
        }
        if(!$this->checkFileExtension()){
            throw new FileException("File '{$this->file->getPathname()}' is not {$this->fileExtension()}.");
        }

        return $this->convertImplementation();
    }
    
    /**
     * Check file extension on equal to self::fileExtension for current class.
     * 
     * @return boolean
     */
    protected function checkFileExtension()
    {
        if($this->file->getExtension()==$this->fileExtension()){
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * Define file extension for current class to work.
     * 
     * @return string
     */
    abstract protected function fileExtension();
    
    /**
     * Describe convertion implimentation.
     * 
     * @return string
     */
    abstract protected function convertImplementation();
}