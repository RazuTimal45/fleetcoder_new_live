<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class DashboardLayout extends Component
{
    public function __construct(public string $pageTitle = 'Dashboard') {}

    public function render(): View
    {
        return view('layouts.dashboard');
    }
    
}
