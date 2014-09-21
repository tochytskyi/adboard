<?php



class Model_User extends Model
{
	
        public function get_user($login)
	{   
            $query = "SELECT * FROM users WHERE login='$login'";
            $result = DB::query($query);
            if($result->num_rows!==0){
                    $userinfo = $result->fetch_assoc(); 
            }else{
                    $userinfo = array(); 
            }
            $result->close(); 
            return $userinfo;
        }
        
        public function getUserCards($login)
	{   
            $query = "SELECT * FROM cards WHERE holder_id='$login'";
            $result = DB::query($query);
            if($result->num_rows!==0){
                    $cards = $result->fetch_all();
            }else{
                    $cards = array(); 
            }
            $result->close(); 
            return $cards;
        }
        
        public function deleteCard($id) {
            $query = "DELETE FROM cards WHERE id=$id";
            $result = DB::query($query);

            return $result?TRUE:FALSE;
        }
        
        public function addCard($number, $company, $holderLogin) {
            $query = "INSERT INTO cards (number,company,holder_id) VALUES('$number','$company','$holderLogin')";
            $result = DB::query($query);

            return $result?TRUE:FALSE;
        }
        
        public function search($text,$user) {
            $query = "SELECT * FROM cards WHERE LOWER(company) LIKE '%$text%' AND holder_id='$user'";
            $result = DB::query($query);
            if($result->num_rows!==0){
                 $id = 0;
                 while($card = $result->fetch_assoc()){
                     $cards['card'.++$id] = array("number"=>$card['number'],"company"=>$card['company'],"id"=>$card['id']);
                 }
            }else{
                    $cards = array(); 
            }
            $result->close(); 
            return $cards;
        }

}
