<?php namespace AliSelcuk\Generators\Syntax;

use AliSelcuk\Generators\Compilers\TemplateCompiler;
use AliSelcuk\Generators\Filesystem\Filesystem;

abstract class BaseTable {

    /**
     * @var \AliSelcuk\Generators\Filesystem\Filesystem
     */
    protected $file;

    /**
     * @var \AliSelcuk\Generators\Compilers\TemplateCompiler
     */
    protected $compiler;

    /**
     * @param Filesystem $file
     * @param TemplateCompiler $compiler
     */
    function __construct(Filesystem $file, TemplateCompiler $compiler)
    {
        $this->compiler = $compiler;
        $this->file = $file;
    }

    /**
     * Fetch the template of the schema
     *
     * @return string
     */
    protected function getTemplate()
    {
        return $this->file->get(config("generators.config.schema_template_path"));
    }


    /**
     * Replace $FIELDS$ in the given template
     * with the provided schema
     *
     * @param $schema
     * @param $template
     * @return mixed
     */
    protected function replaceFieldsWith($schema, $template)
    {
        return str_replace('$FIELDS$', implode(PHP_EOL."\t\t\t", $schema), $template);
    }

}