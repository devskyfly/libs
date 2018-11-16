<?php
namespace devskyfly\libs\convertors\fileToText;

use DOMDocument;
use ZipArchive;

class XlsxToTextConvertor extends AbstractFileToTextConvertor
{
    protected function fileExtension()
    {
        return 'xlsx';
    }

    protected function convertImplementation()
    {
        $xml_filename = "xl/sharedStrings.xml"; //content file name
        $zip_handle = new ZipArchive;
        $output_text = "";
        if(true === $zip_handle->open($this->file->getPathname())){
            if(($xml_index = $zip_handle->locateName($xml_filename)) !== false){
                $xml_datas = $zip_handle->getFromIndex($xml_index);
                $xml_handle = DOMDocument::loadXML($xml_datas, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
                $output_text = strip_tags($xml_handle->saveXML());
            }else{
                $output_text .="";
            }
            $zip_handle->close();
        }else{
            throw new FileException('Can\'t open file \''.$this->file->getPathname().'\'.');
        }
        return $output_text;
    }

}

