<?php



class Model_Login extends Model
{        
        public function login($login, $pwd)
	{   
            $crypt_pwd = md5($pwd);
            $query = "SELECT * FROM users WHERE BINARY login='$login' AND BINARY pwd='$crypt_pwd'";
            $result = DB::query($query);
            if($result->num_rows==0){
                return FALSE;
            }else{
                return TRUE;
            }
            $result->close(); 
        }

}
