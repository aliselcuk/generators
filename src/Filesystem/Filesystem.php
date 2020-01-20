<?php namespace AliSelcuk\Generators\Filesystem;

class Filesystem {

    public function make($file, $content, $force = false)
    {
        if ( $this->exists($file) && !$force)
        {
            throw new FileAlreadyExists;
        }

        return file_put_contents($file, $content);
    }

    public function exists($file)
    {
        return file_exists($file);
    }

    public function get($file)
    {
        if ( ! $this->exists($file))
        {
            throw new FileNotFound($file);
        }

        return file_get_contents($file);
    }

} 