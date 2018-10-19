<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Author;

class AuthorComposer
{
    /**
     * The user repository implementation.
     *
     * @var Breed
     */
    protected $AuthorCom;
    /**
     * Create a new profile composer.
     *
     * @param  Breed  $Breeds
     * @return void
     */
    public function __construct(Author $AuthorCom)
    {
        // Dependencies automatically resolved by service container...
        $this->AuthorCom = $AuthorCom;
    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        //dd($this->Breeds->pluck('name','id'));
        $view->with('AuthorCom', $this->AuthorCom->pluck('name','id'));
    }
}