<?php
namespace devskyfly\libs\convertors\fileToText;

use DOMDocument;
use ZipArchive;

class PptxToTextConvertor extends AbstractFileToTextConvertor
{
    protected function fileExtension()
    {
        return 'pptx';
    }

    protected function convertImplementation()
    {
        $zip_handle = new ZipArchive;
        $output_text = "";
        if(true === $zip_handle->open($this->file->getPathname())){
            $slide_number = 1; //loop through slide files
            while(($xml_index = $zip_handle->locateName("ppt/slides/slide".$slide_number.".xml")) !== false){
                $xml_datas = $zip_handle->getFromIndex($xml_index);
                $xml_handle = DOMDocument::loadXML($xml_datas, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
                $output_text .= strip_tags($xml_handle->saveXML());
                $slide_number++;
            }
            if($slide_number == 1){
                $output_text .="";
            }
            $zip_handle->close();
        }else{
            throw new FileException('Can\'t open file \''.$this->file->getPathname().'\'.');
        }
        return $output_text;
    }

    
}