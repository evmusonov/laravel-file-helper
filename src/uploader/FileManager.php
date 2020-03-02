<?php

namespace Evmusonov\LaravelFileHelper;

class FileManager
{
    public function createImageUploder($inputName)
    {
        return new ImageUploader($inputName);
    }
}
