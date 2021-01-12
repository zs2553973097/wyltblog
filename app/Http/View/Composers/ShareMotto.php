<?php

namespace App\Http\View\Composers;

use App\Http\Services\FrontService;
use Illuminate\View\View;
class ShareMotto
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $frontServices;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $frontServices
     * @return void
     */
    
    public function __construct(FrontService $frontServices)
    {
        // Dependencies automatically resolved by service container...
        $this->frontServices = $frontServices;
    }
    
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $motto = $this->frontServices->getMotto();
        
        $view->with('motto', $motto);
    }
}