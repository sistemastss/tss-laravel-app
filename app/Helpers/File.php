<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Storage;

class File
{
    public static function uploadFile($file) {

        $file = [
            'path'      => 'public/files/',
            'name'      => self::makeFileName($file['file_name']),
            'content'   => self::fileFromBlob($file['blob']),
        ];

        return self::saveFile($file);
    }

    public static function makeFileToUpload(array $data)
    {
        $time = time();
        [$name, $blob, $ext] = $data;
        $fileName = "{$time}_{$name}";

        return [
            'content' => File::fileFromBlob($blob),
            'path' => 'public/files/',
            'name' => $fileName,
            'ext' => $ext,
        ];
    }

    private static function makeFileName($fileName)
    {
        $time = time();
        return "{$time}_{$fileName}";
    }

    public static function fileFromBlob(string $blob, $config = null)
    {
        //get the base-64 from data
        $base64_str = substr($blob, strpos($blob, ",") + 1);

        //decode base64 string
        $file = base64_decode($base64_str);

        return $file;
    }

    public static function saveFile(array $file)
    {
        $content = $file['content'];
        $path = $file['path'];
        $name = $file['name'];

        $success = Storage::disk('local')->put($path . $name, $content);

        if (!$success) {
            return false;
        }

        return $name;
    }

}