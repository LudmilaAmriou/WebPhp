<?php
require_once('newsView.php');
require_once('newsModel.php');
require_once('./template/tempController.php');
class newsController{

    public function rec(){
        $m = new newsModel();
        return $m->rec();  
    }

    public function news(){
        $m = new newsModel();
        return $m->news();
    }

    public function afficher_rec(){
        $v = new newsView();
        return $v->afficher_rec();
    }

    public function afficher_new(){
        $v = new newsView();
        return $v->afficher_new();
    }

    public function afficher_news(){
        $c = new tempController();
        $c->afficher_entete();
        $c->afficher_menu();
        $this->afficher_rec();
        $this->afficher_new();
        $c->footer();
    }
}
?>



