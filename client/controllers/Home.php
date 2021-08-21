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

    public function loginHandle(){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $result = $this->homemodel->loginHandle($username,$password);
            if(isset($result[0])){
                echo $result[0]['UserName'];
            }
        }else{
            echo '-1';
        }
    }

    public function Search(){
        $keySearch = $_POST['keySearch'];
        
        if(isset($_POST['singer'])){
            $data['result_singer'] = $this->homemodel->search($keySearch, "singer");
        }
        if(isset($_POST['album'])){
            $data['result_album'] = $this->homemodel->search($keySearch, "album");
        }
        if(isset($_POST['song'])){
            $data['result_song'] = $this->homemodel->search($keySearch, "song");
        }
        echo(json_encode($data));
        // $data['category'] = $this->homemodel->getCategory();
        // $data['singerband'] = $this->homemodel->getTop20SingerBand();
        // $data['newalbum'] = $this->homemodel->getTop20NewAlbum();
        // $this->view("search",$data);
    }
}
?>