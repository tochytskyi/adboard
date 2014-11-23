<?php

class Model_Admin extends Model
{        
      
    public function getUserParams($id) {
        $res = DB::query("SELECT * FROM users WHERE id={$id}");
        $row = $res->fetch_assoc();
        return $row;
    }
    
    public function isAdmin($login) {
        $res = DB::query("SELECT * FROM admins WHERE login='{$login}'");
        return $res->num_rows !== 0 ? TRUE : FALSE;
    }

}
