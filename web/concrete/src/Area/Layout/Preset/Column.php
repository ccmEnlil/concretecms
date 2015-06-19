<?php
namespace Concrete\Core\Area\Layout\Preset;

use Concrete\Core\Area\Layout\ColumnInterface;
use HtmlObject\Element;
use Sunra\PhpSimple\HtmlDomParser;

class Column implements ColumnInterface
{

    protected $column;

    public static function fromHtml($html)
    {
        $dom = new HtmlDomParser();
        $r = $dom->str_get_html($html);

        $nodes = $r->childNodes();
        $node = $nodes[0];

        $element = new Element($node->tag);
        $element->class($node->class);

        $column = new static($element);
        return $column;
    }

    public function __construct(Element $column)
    {
        $this->column = $column;
    }

    public function getColumnHtmlObject()
    {
        return $this->column;
    }


}