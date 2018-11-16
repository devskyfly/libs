<?php
namespace devskyfly\libs\convertors\fileToText;

class PdfToTextConvertor extends AbstractFileToTextConvertor
{
    /**
     * Convert file to text.
     *
     * This is redeclaration.
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
        if(is_null(shell_exec('which pdftotext'))){
            throw new ShellException('Programm \'pdftotext\' is not install in system.');
        }
        $cmnd='pdftotext '.$this->file->getPathname().' -nopgbrk -';
        return shell_exec($cmnd);
    }
    
    protected function fileExtension()
    {
        return 'pdf';
    }

    /**
     * Method termination.
     * 
     * {@inheritDoc}
     * @see \devskyfly\libs\convertors\fileToText\AbstractFileToTextConvertor::convertImplementation()
     */
    protected function convertImplementation()
    {
        return "";
    }

}

