<?php 
class HomeModel extends DB{
    public function getCategory(){
        $sql = "SELECT * FROM `genre`";
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return $arr;
    }

    public function getTop20SingerBand(){
        $sql = "SELECT a.* , COUNT(s.SongID) as NumberSong FROM `artist` a left join `song` s ON a.ArtistID = s.ArtistID GROUP BY a.ArtistID ORDER BY NumberSong desc LIMIT 20";
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return $arr;
    }

    public function getTop20NewAlbum(){
        $sql = "SELECT * FROM `album` ORDER BY `ReleaseDate` DESC LIMIT 20";
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return $arr;
    }

    public function loginHandle($username, $password){
        $sql = "SELECT * FROM `user` WHERE `UserName` = '$username' AND `PassWord` = '$password'";
        $arr = [];
        $rows = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_assoc($rows)){
            $arr[] = $row;
        }
        return $arr;
    }
}

?>