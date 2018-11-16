<?php namespace devskyfly\libs\convertors\fileToText;


class ConvertorFactoryTest extends \Codeception\Test\Unit
{
    public $data_dir="";   
    
    protected function _before()
    {
        $this->data_dir=__DIR__.'/../../../../data';
    }

    protected function _after()
    {
    }

    protected function check($content)
    {
        $this->assertTrue(preg_match('/[\S\s]*Ваш шедевр[\S\s]*/i', $content)>=1);
    }
    
    // tests
    private function testDocConvertor()
    {
        $file_path=$this->data_dir.'/file.doc';
        $convertor=ConvertorFactory::create($file_path);
        $content=$convertor->convert();
        $this->check($content);
    }
    
    public function testDocxConvertor()
    {
        $file_path=$this->data_dir.'/file.docx';
        $convertor=ConvertorFactory::create($file_path);
        $content=$convertor->convert();
        $this->check($content);
    }
    
    public function testXlsxConvertor()
    {
        $file_path=$this->data_dir.'/file.xlsx';
        $convertor=ConvertorFactory::create($file_path);
        $content=$convertor->convert();
        $convertor=ConvertorFactory::create($file_path);
    }
    
    public function testPptxConvertor()
    {
        $file_path=$this->data_dir.'/file.pptx';
        $convertor=ConvertorFactory::create($file_path);
        $content=$convertor->convert();
        $this->check($content);
    }
    
    public function testPdfConvertor()
    {
        $file_path=$this->data_dir.'/file.pdf';
        $convertor=ConvertorFactory::create($file_path);
        $content=$convertor->convert();
        $this->check($content);
    }
}