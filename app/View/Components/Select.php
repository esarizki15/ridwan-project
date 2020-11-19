<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public $globalAttribute;
    public $label;
    public $customAttribute;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($globalAttribute, $label,$customAttribute="")
    {
        $this->globalAttribute = $globalAttribute;
        $this->label = $label;
        $this->customAttribute = $customAttribute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.select');
    }
}
