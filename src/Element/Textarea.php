<?php

namespace Brick\Form\Element;

use Brick\Form\Element;
use Brick\Form\Attribute\MaxLengthAttribute;
use Brick\Html\Tag;

/**
 * Represents a textarea element.
 */
class Textarea extends Element
{
    use MaxLengthAttribute;

    /**
     * @var \Brick\Html\Tag|null
     */
    private $tag = null;

    /**
     * The textarea contents.
     *
     * @var string
     */
    private $value = '';

    /**
     * {@inheritdoc}
     */
    protected function getTag()
    {
        if ($this->tag === null) {
            $this->tag = new Tag('textarea');
        }

        return $this->tag;
    }

    /**
     * @param string $value
     *
     * @return static
     */
    public function setValue($value)
    {
        $this->value = (string) $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasValue()
    {
        $value = $this->getTag()->getAttribute('value');

        return $value !== null && $value !== '';
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string|null
     */
    public function getValueOrNull()
    {
        return $this->value === '' ? null : $this->value;
    }

    /**
     * {@inheritdoc}
     */
    protected function doPopulate($value)
    {
        $this->setValue($value);
    }

    /**
     * {@inheritdoc}
     */
    protected function onBeforeRender()
    {
        $this->getTag()->setTextContent($this->value);
    }
}
