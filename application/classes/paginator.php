<?php

class Paginator{
    private $rows;
    private $numPerPage = 10;
    private $pages;
    private $current = 0;


    public function __construct() {
        $this->rows = $this->countRows();
        $this->pages = ceil($this->rows/$this->numPerPage);
    }

    public function countRows() {
        $result = DB::query("SELECT COUNT(*) AS count FROM cards WHERE holder_id='{$_SESSION['user']}'");
        $count = $result->fetch_assoc();
        $this->rows = $count[count];
        
        return $this->rows;
    }
    
    public function writeHrefs() {
        echo "<div class=\"pagination\">";
        for($i=1; $i<=$this->pages; $i++) {
            if($i==$this->current+1){
               echo "<a href=\"../user/?num=$i\" class=\"page active\">$i</a>";  
            }else{
                echo "<a href=\"../user/?num=$i\" class=\"page gradient\">$i</a>"; 
            }
             
        }
        echo "</div>";
    }
    
    public function getCards() {
        if (isset($_GET['num'])) {
            $this->current = ($_GET['num'] - 1);
        }
        $start = abs($this->current*$this->numPerPage);
        $result = DB::query("SELECT * FROM cards WHERE holder_id='{$_SESSION['user']}' LIMIT $start,$this->numPerPage ");
        
        return $result->fetch_all();
    }
}