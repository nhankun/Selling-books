<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Book;

class BookComposer
{
    /**
     * The user repository implementation.
     *
     * @var Breed
     */
    protected $BookCom;
    /**
     * Create a new profile composer.
     *
     * @param  Breed  $Breeds
     * @return void
     */
    public function __construct(Book $BookCom)
    {
        // Dependencies automatically resolved by service container...
        $this->BookCom = $BookCom;
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
        $view->with('BookCom', $this->BookCom->pluck('name','id'));
    }
}