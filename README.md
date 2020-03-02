## laravel-file-helper
Simple file uploader for documents and images with resize opportunity

## Installation
1. Install package from composer
> composer require evmusonov/laravel-file-helper
2. Add provider into your config/app.php
> Evmusonov\LaravelFileHelper\FileHelperServiceProvider::class
3. Do this command to publish the config file
> php artisan vendor:publish
4. Execute this command for database tables migration. 'File' table will be created.
> php artisan migrate
5. Final step is to configure config/filehelper.php

Package contains two types of files: images (jpg, png, ...) and documents (pdf, docx, ...). So you can configure mimes for yourself in `documentExtensions` and `imageExtensions` settings. 

By default, config contains `pathToStorage`, it means you may write your own path for storage, but default path is recommended for usage.

If you want to set own versions for resizing, you can put it in `versions` setting, follow the example in the config file.

## Usage
1. Create a file manager
> $uploadManager = new FileManager();
2. Create uploader
> $imageUploader = $uploadManager->createImageUploder('put your file input name');
3. Upload your file
> $imageUploader->upload('path/to/[module]/[id]');
### Note!
Path for future file must contain module directory and item's id in the end of the sentence.
#### Examples
You may write `$imageUploader->upload('user/1');` or `$imageUploader->upload('somefolder/anotherfolder/user/1');`

(optional) 4. If you want to resize your image
> $imageUploader->upload('user/1')->resize('your version');
#### Examples
> $imageUploader->upload('user/1')->resize('200x200');
