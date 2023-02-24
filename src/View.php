<?php

class View
{
    public $engines = array();
    public string $filepath;
    public function __construct(string $filepath, $data = array())
    {
        $this->filepath = $filepath;
    }
    public function render() {

        if (!file_exists($this->filepath))
            throw new InvalidArgumentException("File not found: {$this->filepath}");

        if (str_ends_with($this->filepath, ".md"))
        {
            $md = new Parsedown();
            $html = $md->parse(file_get_contents($this->filepath));
        }
        else if (str_ends_with($this->filepath, ".mustache"))
        {
            $engine = new Mustache_Engine();
            $tmpl = $engine->loadTemplate($this->filepath);
            $html = $tmpl->render();
        }

    }
}