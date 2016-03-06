<?php
  include_once("../library/excel/xlsxwriter.class.php");
  $filename = "usuarios.xlsx";
  header("Content-Type: text/plain");
  header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
  header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
  header('Content-Transfer-Encoding: binary');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  date_default_timezone_set('UTC');
  require('../library/excel/excel_reader2.php');
  require('../library/excel/SpreadsheetReader.php');
  require("../requires.php");
  $Ruta="../";
  IncluirArchivos($Ruta);
  @session_start();
  @$institution=$_SESSION['usuario']['idInstitucion'];
  $ObjUsuario=new Usuario();
  $ObjRol=new Rol();
  $ObjUtilidad=new Utilidad();
  $ObjCifrado=new Cifrado();
  $ObjUsers=new Users();
  $ObjAcudiente=new Acudiente();
  $identificador=chr(rand(ord("A"), ord("Z"))).rand(0,9).chr(rand(ord("A"), ord("Z"))).(date('HYm'));
  $ruta="../../_data/users/";
  $nombre=$identificador;
  $nombrefile="users";
  $fileexcel=$ObjUtilidad->GenerarArchivo($ruta, $nombre, $nombrefile);
  //sleep(30);
  //$Filepath="../../_data/users/prueba.xlsx";
 	$Filepath="../../".$fileexcel[1];


  try
  {
    $Spreadsheet = new SpreadsheetReader($Filepath);
    $writer = new XLSXWriter();
    $writer->setAuthor('Contappta');

    $Sheets = $Spreadsheet -> Sheets();
    foreach ($Sheets as $Index => $Name)
    {

      $Spreadsheet -> ChangeSheet(intval($Index));
          switch ($Index) {
            case 0:
              $rolm="Rector";
              $rolf="Rectora";
            break;
            case 1:
              $rolm="Profesor";
              $rolf="Profesora";
            break;
            case 2:
              $rolm="Alumno";
              $rolf="Alumna";
            break;
            case 4:
              $writer->writeToStdOut();
              exit();
            break;
          }

          $header = array(
              'usuario'=>'string',
              'nombre'=>'string',
              'documento'=>'string',
              'contrasena'=>'string'
          );
          $data = array();

      foreach ($Spreadsheet as $Key => $Row)
      {

        if ($Key >= 1) {

            if ($Index!=4) {

              $datauser["usuario"]=strtolower(trim($Row[1]));
              $datauser["nombre"]=$Row[1];
              $datauser["apellido"]=$Row[2];
              $datauser["documento"]=$Row[4];
              $datauser["idInstitucion"]=$institution;

              switch ($Row[3]) {
                case 'M':
                  $datauser["idRol"]=$ObjRol->getid($rolm);
                break;
                case 'F':
                  $datauser["idRol"]=$ObjRol->getid($rolf);
                break;
              }

              if ($Index==3) {
                  $datauser["idRol"]=$ObjRol->getid($Row[6]);
              }
              $contrasena=substr(md5(uniqid(rand())),0,6);
              $datauser["contrasena"]=$ObjCifrado->encryptpassword($contrasena);

              $user=$ObjUsuario->create($datauser);

              if ($Index==3) {
                  $dataacudiente["idHijo"]=$ObjUsers->idbydocument($Row[5]);
                  $dataacudiente["idAcudiente"]=$user[1];
                  $ObjAcudiente->create($dataacudiente);
              }

              array_push($data, ( array( $user[2], ($Row[1]." ".$Row[2]) , $Row[4] , $contrasena ) ) );
              $writer->writeSheet($data,$Name,$header);
            }

        }

      }
      unset($data);

    }

  }
  catch (Exception $E)
  {
    echo $E -> getMessage();
  }
?>
