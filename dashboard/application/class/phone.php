<?php
class Phone{

		function __construct(){

		}

    private function androidnotificationcgm($notification,$dataandroid){

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
        'priority'=> 10,
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

    private function androidnotificationonesignal($notification,$dataandroid){

    $content = array(
      "es" => $dataandroid["message"],
      "en" => $dataandroid["message"]
      );
    $headings = array(
      "es" => $dataandroid["title"],
      "en" => $dataandroid["title"]
      );

    $fields = array(
      'app_id' => "a8fae91b-a8f3-44c6-8eb2-2a733773a823",
      'include_player_ids' => $dataandroid["idsonesignal"],
      'data' => array(
        'page' => $dataandroid["page"],
        'dataone' => $dataandroid["dataone"],
        'datatwo' => $dataandroid["title"],
        'datathree' => $dataandroid["message"],
        ),
      'contents' => $content,
      'headings' => $headings,
      'priority'=>10
    );

    $fields = json_encode($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                           'Authorization: Basic ZjM1MzhlMzYtZjU2MC00ZTQyLTg0MWYtMzdiNjk3YTI5YmFj'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);

  }



    public function sendnotifications($notification,$datanotification){

        $dataandroid["tokens"]= $this->tokens($notification);
        $dataandroid["idsonesignal"]= $this->idsonesignal($notification);
        $dataandroid["page"]=$datanotification["page"];
        $dataandroid["title"]=( empty($datanotification["title"]) ) ? $this->title($notification) : $datanotification["title"];
        $dataandroid["message"]=$this->message($notification);
        $dataandroid["dataone"]=$datanotification["dataone"];
        $dataandroid["datatwo"]=$datanotification["datatwo"];

        $this->androidnotificationonesignal($notification,$dataandroid);

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

    private function idsonesignal($notification){

      $dbdata = DB_DataObject::Factory('Reciversnotifications');
      $dbdata->selectAdd();
      $dbdata->selectAdd("idOneSignal");
      $dbdata->whereAdd("idNotificacion='$notification'");
      $dbdata->find();
      $contador=0;
      while( $dbdata->fetch() ){
        if ($dbdata->idOneSignal !="") {
          $ret[$contador] = $dbdata->idOneSignal;
          $contador++;
        }
      }
      $dbdata->free();
      return $ret;

    }
}

?>
