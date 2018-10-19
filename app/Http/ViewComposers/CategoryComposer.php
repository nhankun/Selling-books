<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Category;

class CategoryComposer
{
    /**
     * The user repository implementation.
     *
     * @var Breed
     */
    protected $CategoriesCom;
    /**
     * Create a new profile composer.
     *
     * @param  Breed  $Breeds
     * @return void
     */
    public function __construct(Category $CategoriesCom)
    {
        // Dependencies automatically resolved by service container...
        $this->CategoriesCom = $CategoriesCom;
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
        $view->with('CategoriesCom', $this->CategoriesCom->pluck('name','id'));
    }
}