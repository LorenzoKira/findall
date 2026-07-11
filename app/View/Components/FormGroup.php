<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormGroup extends Component
{
    /**
     * Create a new Form Group (input with label) instance.
     */
    public function __construct(
        public ?string $text,
        public string $type,
        public string $name,
        public string $id,
        public ?bool $showForgot
    ) { 
        $this->text = $text ?: ucfirst($name);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-group');
    }
}
