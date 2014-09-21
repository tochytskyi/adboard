<?php



class Model_Registration extends Model
{        
        public function addNewUser($data){   
            $pwd = md5($data['pwd']);
            $query = "INSERT INTO users (name,sername,login,email,pwd) "
                    . "VALUES('{$data['name']}','{$data['sername']}','{$data['login']}','{$data['email']}','{$pwd}')";
            $result = DB::query($query);
            if($result){
                return TRUE;
            }else{
                return FALSE;
            }
             
        }
        
        public function sendMailToUser($email,$pwd,$login) {

            $to = $email;
            $subject = 'Регистрация на сайте: ' . $_SERVER['HTTP_REFERER'];
            $subject = "=?utf-8?b?" . base64_encode($subject) . "?=";
            $message = "Ваш логин для входа: " .$login. "\n "
                      ."Пароль: " .$pwd. "\n";
            $headers = 'Content-type: text/plain; charset="utf-8"';
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Date: " . date('D, d M Y h:i:s O') . "\r\n";

         
            mail($to, $subject, $message, $headers);
      }
      
      public function freeLogin($login) {
          
            $query = "SELECT * FROM users WHERE login='$login'";
            $result = DB::query($query);
            if($result->num_rows==0){
                return TRUE;
            }else{
                return FALSE;
            }
            $result->close(); 
      }
      
      public function userExist($screen_name) {
          $query = "SELECT * FROM users WHERE login='$screen_name'";
            $result = DB::query($query);
            if($result->num_rows==0){
                return FALSE;
            }else{
                return TRUE;
            }
            $result->close(); 
      }
      

}
