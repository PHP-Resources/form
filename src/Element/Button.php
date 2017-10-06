<?php

namespace Brick\Form\Element;

use Brick\Form\Attribute\ValueAttribute;
use Brick\Form\Element;
use Brick\Html\Tag;

/**
 * Represents a button element.
 */
abstract class Button extends Element
{
    use ValueAttribute;

    /**
     * @var \Brick\Html\Tag|null
     */
    private $tag = null;

    /**
     * {@inheritdoc}
     */
    protected function getTag()
    {
        if ($this->tag === null) {
            $this->tag = new Tag('button', [
                'type' => $this->getType()
            ]);
        }

        return $this->tag;
    }

    /**
     * @param string $text
     *
     * @return static
     */
    public function setTextContent($text)
    {
        $this->tag->setTextContent($text);

        return $this;
    }

    /**
     * @param string $html
     *
     * @return static
     */
    public function setHtmlContent($html)
    {
        $this->tag->setHtmlContent($html);

        return $this;
    }

    /**
     * Renders the opening tag.
     *
     * @return string
     */
    public function open()
    {
        return $this->getTag()->renderOpeningTag();
    }

    /**
     * Renders the closing tag.
     *
     * @return string
     */
    public function close()
    {
        return $this->getTag()->renderClosingTag();
    }

    /**
     * Returns the type of this button.
     *
     * @return string
     */
    abstract protected function getType();
}
