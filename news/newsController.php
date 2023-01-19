<?php
require_once('newsView.php');
require_once('newsModel.php');
require_once('./template/tempController.php');
class newsController{

    public function news(){
        $m = new newsModel();
      
        return $m->news();
    }
     
    public function insertNews(){
        $m = new newsModel();
        $news= $_POST['news'];
        return $m->insertNews($news);
    }

   
    public function afficher_new(){
        $v = new newsView();
        return $v->afficher_news();
    }

    public function afficher_news(){
        $c = new tempController();
        $c->afficher_entete();
        $c->afficher_menu();
        $this->afficher_new();
        $c->footer();
    }
}
?>



