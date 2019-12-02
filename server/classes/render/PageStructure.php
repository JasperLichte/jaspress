<?php
namespace render;

class PageStructure
{
    private Content $content;

    public function __construct(Content $content)
    {
        $this->content = $content;
    }

    public function build():string
    {
        //ToDo dynamisch erzeugen
        return ;
    }
}