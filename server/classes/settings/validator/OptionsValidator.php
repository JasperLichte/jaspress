<?php
namespace settings\validator;

use settings\types\options\Option;

class OptionsValidator extends Validator
{

    /** @var Option[] */
    private $options = [];

    /** @param Option[] $options */
    public function __construct(array $options)
    {
        $this->options = $options;
    }

    public function validate(string $value): bool
    {
        return in_array(
            $value,
            array_map(function(Option $option) {
                return $option->getValue();
            }, $this->options)
        );
    }

}
