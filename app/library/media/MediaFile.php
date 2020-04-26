<?php


namespace App\library\media;

/**
 * Class MediaFile
 * @package App\library\media
 */
class MediaFile
{

    private string $file;
    private string $ext;
    private string $name;

    public function __construct(string $file = '', string $name = '', string $ext = '')
    {
        $this->file = $file;
        $this->ext = $ext;
        $this->name = $name;
    }

    public function setName(string $name) : void {
        $this->name = $name;
    }

    public function ext() : string {
        return '.' . $this->ext;
    }

    public function name() : string {
        return $this->name;
    }

    public function file() : string {
        return $this->file;
    }

    public function fullName(): string {
        return $this->name . $this->ext();
    }

}