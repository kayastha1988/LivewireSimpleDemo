<?php

namespace App\Http\Livewire\Article;

use App\Models\Article;
use Livewire\Component;

class ShowArticle extends Component
{
    public $articles;
    public $updateArticleMode = 'yes';

  public function mount(){
      
    // $this->updateArticleMode='show';
    //   displaying all the data from DB to the blade page via livewire
    $this->articles = Article::orderby('created_at','desc')->get();
  }

  public function edit($id)
  {
  }
    public function delete($id)
    {
        if($id){
            if(Article::where('id',$id)->delete()){
                return redirect()->back();
            }
            session()->flash('message', 'Article successfully deleted.');
        }
    }

    public function render()
    {
        return view('livewire.article.show-article');
    }
}
