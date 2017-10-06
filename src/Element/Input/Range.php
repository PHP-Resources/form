<?php

declare(strict_types=1);

namespace Brick\Form\Element\Input;

use Brick\Form\Attribute\MinMaxStepAttributes;
use Brick\Form\Element\Input;
use Brick\Form\Attribute\AutocompleteAttribute;
use Brick\Form\Attribute\ListAttribute;
use Brick\Form\Attribute\ValueAttribute;

/**
 * Represents a range input element.
 */
class Range extends Input
{
    use AutocompleteAttribute;
    use ListAttribute;
    use MinMaxStepAttributes;
    use ValueAttribute;

    /**
     * {@inheritdoc}
     */
    protected function getType() : string
    {
        return 'range';
    }

    /**
     * {@inheritdoc}
     */
    protected function doPopulate($value) : void
    {
        $this->setValue($value);
    }
}
