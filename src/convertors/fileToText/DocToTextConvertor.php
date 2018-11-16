<?php
namespace devskyfly\libs\convertors\fileToText;

class DocToTextConvertor extends AbstractFileToTextConvertor
{
    protected function fileExtension()
    {
        return 'doc';
    }

    protected function convertImplementation()
    {   
        $content=file_get_contents($this->file->getPathname());
        codecept_debug($content);
        $lines = explode(chr(0x0D),$content);
        
        $outtext = "";
        foreach($lines as $thisline)
        {
            $pos = mb_strpos($thisline, chr(0x00));
            if (($pos !== FALSE)||(mb_strlen($thisline)==0))
            {
            } else {
                $outtext .= $thisline." ";
            }
        }
        $outtext = mb_ereg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$outtext);
        return $outtext;
    }

}

