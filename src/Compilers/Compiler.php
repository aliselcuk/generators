<?php namespace AliSelcuk\Generators\Compilers;

interface Compiler {

    /**
     * Compile the template using
     * the given data
     *
     * @param $template
     * @param $data
     */
    public function compile($template, $data);
} 