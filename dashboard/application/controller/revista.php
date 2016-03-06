<?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjRevista=new Revista();
    $ObjPagina=new Pagina();
    $ObjUtilidad=new Utilidad();
    $resultado=false;
    @$accion=$_POST["accion"];

        if (isset($accion)) {

            switch ($accion){

                case "create":

                    $consecutivo=$ObjRevista->getconsecutive();
                    $identificador=chr(rand(ord("A"), ord("Z"))).rand(0,9).chr(rand(ord("A"), ord("Z"))).$consecutivo;
                    $datamagazine["idInstitucion"]=$_POST["institute"];
										$datamagazine["revista"]=$_POST["namemagazine"];
                    $datamagazine["descripcion"]=$_POST["description"];
                    $datamagazine["numeroPaginas"]=$_POST["numberPages"];
                    $datamagazine["identificador"]=$identificador;
                    $datamagazine["consecutivo"]=$consecutivo;

                    $magazine=$ObjRevista->create($datamagazine);

                    $datapage["idRevista"]=$magazine[1];
                    $ruta="../../_data/magazines/".$identificador."/";


                    for ($i=0; $i < 3; $i++) {

                      $nombre=$i;
                      $nombrefile="file-".$i;

                      $pagina=$ObjUtilidad->GenerarArchivo($ruta, $nombre, $nombrefile);

                      $datapage["numeroPagina"]=$i;
                      $datapage["media"]=$pagina[1];

                      $ObjPagina->create($datapage);

                    }

										echo json_encode($magazine);

                break;

                case 'update':

                    $data["idRevista"]=$_POST["magazine"];
                    $data["idInstitucion"]=$_POST["institute"];
                    $data["revista"]=$_POST["namemagazine"];
                    $data["descripcion"]=$_POST["description"];

                    $response=$ObjRevista->update($data);
                    echo json_encode($response);
                break;


            }

        }else{echo json_encode($resultado);}
?>
