<?php
class Phone{

		function __construct(){

		}

    private function androidnotification($notification,$dataandroid){

      $msg = array(
        'message'   => $dataandroid["message"],
        'title'   => $dataandroid["title"],
        'vibrate' => 1,
        'sound'   => 1,
        'largeIcon' => 'large_icon',
        'smallIcon' => 'small_icon',
        'page' => $dataandroid["page"],
        'dataone' => $dataandroid["dataone"],
        'datatwo' => $dataandroid["title"],
        'datathree' => $dataandroid["message"],
        'priority'=> 3,
        'notId'=> $notification,
      );
      $fields = array(
        'registration_ids'  => $dataandroid["tokens"],
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

    public function sendnotifications($notification,$datanotification){

        define( 'API_ACCESS_KEY', 'AIzaSyAYdSMxRmaJfz_DqMmo-Kn-9NBinriOwbA' );

        $dataandroid["tokens"]= $this->tokens($notification);
        $dataandroid["page"]=$datanotification["page"];
        $dataandroid["title"]=( empty($datanotification["title"]) ) ? $this->title($notification) : $datanotification["title"];
        $dataandroid["message"]=$this->message($notification);
        $dataandroid["dataone"]=$datanotification["dataone"];
        $dataandroid["datatwo"]=$datanotification["datatwo"];

        $this->androidnotification($notification,$dataandroid);

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
        if ($dbdata->deviceToken !="") {
          $ret[$contador] = $dbdata->deviceToken;
          $contador++;
        }
      }
      $dbdata->free();
      return $ret;

    }

}

?>
