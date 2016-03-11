<?php
class Phone{

		function __construct(){

		}

    private function androidnotification($datanoti){

      $msg = array(
        'message'   => $datanoti["message"],
        'title'   => $datanoti["title"],
        'vibrate' => 1,
        'sound'   => 1,
        'largeIcon' => 'large_icon',
        'smallIcon' => 'small_icon'
      );
      $fields = array(
        'registration_ids'  => $datanoti["tokens"],
        'data'      => $msg
      );

      $headers = array(
        'Authorization: key=' . API_ACCESS_KEY,
        'Content-Type: application/json'
      );

      $ch = curl_init();
      curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
      curl_setopt( $ch,CURLOPT_POST, true );
      curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
      curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
      curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
      curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
      $result = curl_exec($ch );
      curl_close( $ch );


    }

    public function sendnotifications($notification){

        define( 'API_ACCESS_KEY', 'AIzaSyAYdSMxRmaJfz_DqMmo-Kn-9NBinriOwbA' );

        $datanoti["tokens"]= array($this->tokens($notification));
        $datanoti["title"]=$this->title($notification);
        $datanoti["message"]=$this->message($notification);
        $this->androidnotification($datanoti);

    }


    private function message($notification){

      $dbdata = DB_DataObject::Factory('Notificacion');
      $dbdata->selectAdd();
      $dbdata->selectAdd("descripcion");
      $dbdata->whereAdd("id='$notification'");
      $dbdata->find();
      if( $dbdata->fetch() ){
        $message = $dbdata->descripcion;
      }
      $dbdata->free();
      return $message;

    }

    private function title($notification){

      $dbdata = DB_DataObject::Factory('Notificacion');
      $dbdata->selectAdd();
      $dbdata->selectAdd("asunto");
      $dbdata->whereAdd("id='$notification'");
      $dbdata->find();
      if( $dbdata->fetch() ){
        $title = $dbdata->asunto;
      }
      $dbdata->free();
      return $title;

    }

    private function tokens($notification){

      $dbdata = DB_DataObject::Factory('Reciversnotifications');
      $dbdata->selectAdd();
      $dbdata->selectAdd("deviceToken");
      $dbdata->whereAdd("idNotificacion='$notification'");
      $dbdata->find();
      $contador=0;
      while( $dbdata->fetch() ){
        $ret[$contador] = $dbdata->deviceToken;
        $contador++;
      }
      $dbdata->free();
      $deviceTokens = implode (",", $ret);
      return $deviceTokens;

    }

}

?>
