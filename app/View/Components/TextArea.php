<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextArea extends Component
{
    public $globalAttribute;
    public $label;
    public $defaultValue;
    public $customAttribute;
    public $rows;
    public $isTinyMce;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($globalAttribute, $label=false, $defaultValue, $customAttribute="", $rows=false, $isTinyMce = false)
    {
        $this->globalAttribute = $globalAttribute;
        $this->label = $label;
        $this->rows = $rows;
        $this->isTinyMce = $isTinyMce;
        $this->defaultValue = $defaultValue;
        $this->customAttribute = $customAttribute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.text-area');
    }
}
