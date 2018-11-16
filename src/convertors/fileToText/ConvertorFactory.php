<?php
namespace devskyfly\libs\convertors\fileToText;

class ConvertorFactory
{
    protected static $extension=[
        'pdf',
        //'doc',
        'docx',
        'xlsx',
        'pptx'
    ];
    /**
     * Create convertor for file.
     * 
     * @param string $file_path
     * @return AbstractFileToTextConvertor | null
     */
    public static function create($file_path)
    {
        if(self::isConvertable($file_path)){
            $extension=self::getFileExtension($file_path);
            $factory_cls='devskyfly\\libs\convertors\\fileToText\\'.ucfirst($extension)."ToTextConvertor";
            return new $factory_cls($file_path);
        }else{
            return null;
        }
    }
      
    /**
     * Check is it possible to convert this file.
     * 
     * @param string $file_path
     * @throws FileException
     * @return bool
     */
    public static function isConvertable($file_path)
    {
        $extension=self::getFileExtension($file_path);
        if(in_array($extension, self::$extension))
        {
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * 
     * @param string $file_path
     * @throws FileException
     * @return string
     */
    protected static function getFileExtension($file_path)
    {
        $file=new \SplFileInfo($file_path);
        if(!$file->isFile()){
            throw new FileException("File {$file->getPathname()} does not exist.");
        }
        return strtolower($file->getExtension());
    }
}

