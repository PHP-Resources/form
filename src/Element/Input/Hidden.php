<?php

declare(strict_types=1);

namespace Brick\Form\Element\Input;

use Brick\Form\Element\Input;
use Brick\Form\Attribute\ValueAttribute;

/**
 * Represents a hidden input element.
 */
class Hidden extends Input
{
    use ValueAttribute;

    /**
     * {@inheritdoc}
     */
    protected function getType() : string
    {
        return 'hidden';
    }

    /**
     * {@inheritdoc}
     */
    protected function doPopulate($value) : void
    {
        $this->setValue($value);
    }
}
