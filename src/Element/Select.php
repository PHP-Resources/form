<?php

namespace Brick\Form\Element;

use Brick\Form\Element;
use Brick\Form\Element\Select\Option\Option;
use Brick\Form\Element\Select\Option\OptionGroup;
use Brick\Html\Tag;

/**
 * Represents a select element.
 */
abstract class Select extends Element
{
    /**
     * @var \Brick\Html\Tag|null
     */
    private $tag = null;

    /**
     * The options and option groups in this Select.
     *
     * @var \Brick\Form\Element\Select\Option\OptionOrGroup[]
     */
    protected $elements = [];

    /**
     * {@inheritdoc}
     */
    protected function getTag()
    {
        if ($this->tag === null) {
            $this->tag = new Tag('select');

            if ($this->isArray()) {
                $this->tag->setAttribute('multiple', 'multiple');
            }
        }

        return $this->tag;
    }

    /**
     * @param string $content The text content of this option.
     * @param string $value   The value of this option.
     *
     * @return \Brick\Form\Element\Select\Option\Option
     */
    public function addOption($content, $value)
    {
        $option = new Option($content, $value);
        $this->elements[] = $option;

        return $option;
    }

    /**
     * Adds a batch of options to this Select.
     *
     * The array format is [value] => content.
     *
     * @param array $options
     *
     * @return static
     */
    public function addOptions(array $options)
    {
        foreach ($options as $value => $content) {
            $this->addOption($content, $value);
        }

        return $this;
    }

    /**
     * @param string $label The option group label.
     *
     * @return \Brick\Form\Element\Select\Option\OptionGroup
     */
    public function addOptionGroup($label)
    {
        $optionGroup = new Select\Option\OptionGroup($label);
        $this->elements[] = $optionGroup;

        return $optionGroup;
    }

    /**
     * Returns all the options in this Select, including the ones nested in option groups.
     *
     * @return \Brick\Form\Element\Select\Option\Option[]
     */
    protected function getOptions()
    {
        $options = [];

        foreach ($this->elements as $element) {
            if ($element instanceof Option) {
                $options[] = $element;
            }
            elseif ($element instanceof OptionGroup) {
                $options = array_merge($options, $element->getOptions());
            }
        }

        return $options;
    }

    /**
     * {@inheritdoc}
     */
    protected function onBeforeRender()
    {
        $content = '';

        foreach ($this->elements as $element) {
            $content .= $element->render();
        }

        $this->getTag()->setHtmlContent($content);
    }
}
