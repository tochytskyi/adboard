<?php



class Model_Feedback extends Model
{        
        
    const email = "tochitskiy@mail.ua";

    public function feedbackSend($name,$email,$text) {

            $to = self::email;
            $subject = 'Письмо от пользователя сайта ' . $_SERVER['HTTP_REFERER'];
            $subject = "=?utf-8?b?" . base64_encode($subject) . "?=";
            $message = "Почта пользователя: " .$email. "\n"
                      ."Сообщение: " .$text. "\n";
            $headers = 'Content-type: text/plain; charset="utf-8"';
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Date: " . date('D, d M Y h:i:s O') . "\r\n";

            return mail($to, $subject, $message, $headers);
      }
   
}
