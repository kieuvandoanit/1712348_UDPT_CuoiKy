<?php 
class Home extends Controller{
    protected $homemodel;
    public function __construct(){
        $this->homemodel = $this->model("HomeModel");
    }

    public function SayHi(){ 
        $data['category'] = $this->homemodel->getCategory();
        $data['singerband'] = $this->homemodel->getTop20SingerBand();
        $data['newalbum'] = $this->homemodel->getTop20NewAlbum();
        $this->view("search",$data);  
    }
}

?>