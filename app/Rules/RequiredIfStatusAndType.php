<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RequiredIfStatusAndType implements ValidationRule
{
    protected $status;
    protected $type;

    public function __construct($status, $type)
    {
        $this->status = $status;
        $this->type = $type;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->status === 'publish' && $this->type === 'simple' && empty($value)) {
            $fail("The {$attribute} field is required when status is 'publish' and product type is 'simple'.");
        }
    }
}
