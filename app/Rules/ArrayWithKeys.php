<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ArrayWithKeys implements Rule
{
    protected $parameters;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (! is_array($value)) {
            return false;
        }

        if (empty($this->parameters)) {
            return true;
        }

        return empty(array_diff_key($value, array_fill_keys($this->parameters, '')));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
