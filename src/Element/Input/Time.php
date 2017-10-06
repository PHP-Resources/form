<?php

declare(strict_types=1);

namespace Brick\Form\Element\Input;

use Brick\Form\Attribute\MinMaxStepAttributes;
use Brick\Form\Element\Input;
use Brick\Form\Attribute\AutocompleteAttribute;
use Brick\Form\Attribute\ListAttribute;
use Brick\Form\Attribute\ReadOnlyAttribute;
use Brick\Form\Attribute\RequiredAttribute;
use Brick\Form\Attribute\ValueAttribute;
use Brick\Validation\Validator\TimeValidator;

/**
 * Represents a time input element.
 */
class Time extends Input
{
    use AutocompleteAttribute;
    use ListAttribute;
    use MinMaxStepAttributes;
    use ReadOnlyAttribute;
    use RequiredAttribute;
    use ValueAttribute;

    /**
     * {@inheritdoc}
     */
    protected function init() : void
    {
        $this->addValidator(new TimeValidator());
    }

    /**
     * {@inheritdoc}
     */
    protected function getType() : string
    {
        return 'time';
    }

    /**
     * {@inheritdoc}
     */
    protected function doPopulate($value) : void
    {
        $this->setValue($value);
    }
}
