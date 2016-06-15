<?php
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
  $ObjGrupo=new Grupo();
  $ObjUsers=new Users();
  $ObjAcudiente=new Acudiente();
  $identificador=chr(rand(ord("A"), ord("Z"))).rand(0,9).chr(rand(ord("A"), ord("Z"))).(date('HYm'));
  $ruta="../../_data/users/";
  $nombre=$identificador;
  $nombrefile="users";
  $fileexcel=$ObjUtilidad->GenerarArchivo($ruta, $nombre, $nombrefile);
 	$Filepath="../../".$fileexcel[1];
   $data = array();

  try
  {
    $Spreadsheet = new SpreadsheetReader($Filepath);

    $Sheets = $Spreadsheet -> Sheets();
    foreach ($Sheets as $Index => $Name)
    {

      $Spreadsheet -> ChangeSheet(intval($Index));
          switch ($Index) {
            case 1:
              $rolm="Alumno";
              $rolf="Alumna";
            break;
            case 3:
              $rolm="Rector";
              $rolf="Rectora";
            break;
            case 4:
              $rolm="Profesor";
              $rolf="Profesora";
            break;
            case 5:

								header( "Content-Type: application/vnd.ms-excel" );
								header( "Content-disposition: attachment; filename=usuarios.xls" );
								
								echo 'Usuario' . "\t" . 'Nombre' . "\t" . 'Documento' . "\t" . 'Contrasena' ."\n";

								for ($i=0; $i < count($data); $i++) { 
									echo $data[$i][0] . "\t" . $data[$i][1] . "\t" . $data[$i][2] . "\t" . $data[$i][3] . "\n";
									
								}

              exit();
            break;
          }


      foreach ($Spreadsheet as $Key => $Row)
      {

        if ($Key>2) {

            if ($Index==0) {

              $datagroup["idInstitucion"]=$institution;
              $datagroup["grado"]=$Row[1];
              $datagroup["identificador"]=$Row[2];
              $group=$ObjGrupo->create($datagroup);
              $groups[$Row[3]]=$group;

            }

            if ( $Index==1 || $Index==2 || $Index==3 || $Index==4 ) {

              $datauser["usuario"]=strtolower(trim(utf8_encode($Row[1])));
              $datauser["nombre"]=utf8_encode($Row[1]);
              $datauser["apellido"]=utf8_encode($Row[2]);
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

              if ($Index==1) {
                  $datauser["idGrupo"]=$groups[$Row[5]];
              }

              if ($Index==2) {
                  $datauser["idRol"]=$ObjRol->getid($Row[6]);
              }

              $contrasena=substr(md5(uniqid(rand())),0,6);
              $datauser["contrasena"]=$ObjCifrado->encryptpassword($contrasena);

              $user=$ObjUsuario->create($datauser);

              if ($Index==2) {

                  $dataacudiente["idHijo"]=$ObjUsers->idbydocument($Row[5]);
                  $dataacudiente["idAcudiente"]=$user[1];

                  $ObjAcudiente->create($dataacudiente);
              }

            	array_push($data, ( array( $user[2], ($Row[1]." ".$Row[2]) , $Row[4] , $contrasena ) ) );
            }
        }


      }

    }

  }
  catch (Exception $E)
  {
    echo $E -> getMessage();
  }
?>
