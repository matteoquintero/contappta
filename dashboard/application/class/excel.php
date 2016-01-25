<?php
class Excel{

	public function __construct(){
	}

	public function createexcel($data){

		require_once '../libreria/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$filename=$data["titulohoja"]."-".time().".xlsx";

		$columnas=array("B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","X","Y","Z");
		$numeroColumnas=count($data["encabezado"]);
		$numeroFilas=count($data["datos"]);
		$idColumna=0;
		$idFila=2;
	 	$fecha=$this->formatdate("","datefile");

		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->getCell($columnas[$idColumna].$idFila)->setValue($data["titulodoc"]);

		$styleArray = array(
		      'font' => array(
		        'name' => 'Helvetica',
		        'size' => '12',
		        'bold' => true,
		        'color' => array('rgb' => 'ffffff')
		      	),
		        'borders' => array(
		            'allborders' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array('rgb' => '45516b'))
		      	),
		    	'fill' => array(
			        'type' => PHPExcel_Style_Fill::FILL_SOLID,
			        'startcolor' => array(
			        'rgb' => 'ea564a',
		        ),
				'alignment' => array(
					'HORIZONTAL' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				    'VERTICAL_CENTER'	 => PHPExcel_Style_Alignment::VERTICAL_CENTER
				)
		      ),
		    );

		$objPHPExcel->getActiveSheet()->getStyle($columnas[$idColumna].$idFila.':'.$columnas[$numeroColumnas-1].($idFila+2))->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->mergeCells($columnas[$idColumna].$idFila.':'.$columnas[$numeroColumnas-1].($idFila+2));

		$objPHPExcel->getActiveSheet()->setTitle($data["titulohoja"]);


		$styleArray = array(
		      'font' => array(
		        'name' => 'Helvetica',
		        'size' => '10',
		        'bold' => true,
		        'color' => array('rgb' => 'ffffff')
		      	),
		        'borders' => array(
		            'allborders' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array('rgb' => '2a3141'))
		      	),
		    	'fill' => array(
			        'type' => PHPExcel_Style_Fill::FILL_SOLID,
			        'startcolor' => array(
			        'rgb' => '45516b',
		        ),
				'alignment' => array(
					'HORIZONTAL' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				    'VERTICAL_CENTER'	 => PHPExcel_Style_Alignment::VERTICAL_CENTER
				)
		      ),
		    );

		$idFila=$idFila+5;
		for ($i=0; $i < $numeroColumnas ; $i++) {

			$objPHPExcel->getActiveSheet()->setCellValue($columnas[$i].$idFila, $data["encabezado"][$i]);
		    $objPHPExcel->getActiveSheet()->getStyle($columnas[$i].$idFila)->applyFromArray($styleArray);

		}

		$styleArray = array(
		      'font' => array(
		        'name' => 'Helvetica',
		        'size' => '9',
		        'bold' => true,
		        'color' => array('rgb' => '808284')
		      	),
		        'borders' => array(
		            'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('rgb' => '45516b'))
		      	),
				'alignment' => array(
					'HORIZONTAL' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				    'VERTICAL_CENTER'	 => PHPExcel_Style_Alignment::VERTICAL_CENTER
				),
		    );

		$idFila=$idFila+2;
		$objPHPExcel->getActiveSheet()->getStyle($columnas[0].$idFila.":".$columnas[$numeroColumnas-1].(($numeroFilas-1)+$idFila))->applyFromArray($styleArray);
		for ($i=0; $i < $numeroFilas ; $i++) {

			for ($j=0; $j < $numeroColumnas ; $j++) {

					$DatoFila=$this->caracteres($data["datos"][$i][$j]);
					$objPHPExcel->getActiveSheet()->setCellValue($columnas[$j].$idFila,$DatoFila);

			}
			$idFila++;
		}

		$idFila=1;
		foreach(range('A','Z') as $idFila) {
			$max=4000;
			$min=2000;
		    $objPHPExcel->getActiveSheet()->getColumnDimension($idFila)
		        ->setAutoSize(true,$max,$min);
		}
		$objPHPExcel->getActiveSheet()->calculateColumnWidths();

		header("Content-Type: application/vnd.ms-excel; charset=utf-8");
		header("Content-Disposition: attachment; filename=$filename");
		header("Cache-Control: max-age=0");
		header('Content-Transfer-Encoding: binary');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel5");
		$objWriter->save("php://output");
		exit;

		//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel5");
		//$dir="../../_data/reports/users/".$filename;
		//$objWriter->save($dir);
		//$response[0]=$filename;
		//$response[1]=$dir;
		//return $response;

	}

    public function formatdate($Fecha, $Formato) {

    	if($Fecha==""){
    		$Fecha=date("y-m-d H:i:s");
    	}

        switch ($Formato) {

            case "datefile":
                $Parte1Fecha = date("Y-n-m", strtotime($Fecha));
                $FechaRetornar = $Parte1Fecha;
                return $FechaRetornar;
            break;

            case "Numeros12":
                $Parte1Fecha = date("Y/n/m h:i a", strtotime($Fecha));
                $FechaRetornar = $Parte1Fecha;
                return $FechaRetornar;

                break;

            case "Numeros24":
                $Parte1Fecha = date("Y-m-d-H-i", strtotime($Fecha));
                $FechaRetornar = $Parte1Fecha;
                return $FechaRetornar;

                break;

            case "Numeros24Semana":
                $Parte1Fecha = date("Y-m-d-w-H-i", strtotime($Fecha));
                $FechaRetornar = $Parte1Fecha;
                return $FechaRetornar;

                break;

            case "Letras":

                $Dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
                $Meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

                $Parte1Fecha = date("Y/n/w", strtotime($Fecha));
                $Parte1 = explode("/", $Parte1Fecha);
                $Ano = $Parte1[0];
                $Mes = $Parte1[1];
                $Dia = $Parte1[2];
                $Parte1Fecha = $Dias[$Dia] . " " . $Dia . " de " . $Meses[$Mes - 1] . " del " . $Ano;
                $Parte2Fecha = date("h:i a", strtotime($Fecha));
                $FechaRetornar = $Parte1Fecha . " a las " . $Parte2Fecha;
                return $FechaRetornar;

                break;
        }
    }

    public function caracteres($entra){
		$sale=utf8_encode($entra);
		return $sale;
	}

}

?>
