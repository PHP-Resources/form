<?php

namespace Brick\Form;

use Brick\Html\ContainerTag;

/**
 * Represents a label that targets a form element.
 */
class Label
{
    /**
     * @var \Brick\Form\Element
     */
    private $element;

    /**
     * @var \Brick\Html\ContainerTag
     */
    private $tag;

    /**
     * Class constructor.
     *
     * @param Element $element
     */
    public function __construct(Element $element)
    {
        $this->element = $element;
        $this->tag = new ContainerTag('label');
    }

    /**
     * Sets an attribute on the label tag.
     *
     * @param string $name
     * @param string $value
     *
     * @return static
     */
    public function setAttribute($name, $value)
    {
        $this->tag->setAttribute($name, $value);

        return $this;
    }

    /**
     * Sets the text content of the label.
     *
     * @param string $text
     *
     * @return \Brick\Form\Label
     */
    public function setTextContent($text)
    {
        $this->tag->setTextContent($text);

        return $this;
    }

    /**
     * Sets the HTML content of the label.
     *
     * @param string $html
     *
     * @return \Brick\Form\Label
     */
    public function setHtmlContent($html)
    {
        $this->tag->setHtmlContent($html);

        return $this;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return $this->tag->isEmpty();
    }

    /**
     * Renders the label.
     *
     * @return string
     */
    public function render()
    {
        return $this->tag->setAttribute('for', $this->element->getId())->render();
    }

    /**
     * Renders the opening tag.
     *
     * @return string
     */
    public function open()
    {
        return $this->tag->renderOpeningTag();
    }

    /**
     * Render the closing tag.
     *
     * @return string
     */
    public function close()
    {
        return $this->tag->renderClosingTag();
    }

    /**
     * Convenience magic method to render the label.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }
}
