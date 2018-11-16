** Convertors\fileToText

Эта библиотека поддерживает конвертацию файлов следующих форматов:

* pdf
* docx
* xlsx
* pptx

**N.B.** Для использования этой библиотеки необходимо установить пакет poppler-utils

```bash
sudo apt-get install poppler-utils
```


```php
$file_path='file.docx';
$convertor=ConvertorFactory::create($file_path);
$content=$convertor->convert();
```