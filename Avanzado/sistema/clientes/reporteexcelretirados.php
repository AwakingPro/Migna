<?php

$fecha_reporte=date("d-m-Y");


    $conexion = new mysqli('localhost','root','m9a7r5s3','SGC',3306);
	if (mysqli_connect_errno()) {
    	printf("La conexión con el servidor de base de datos falló: %s\n", mysqli_connect_error());
    	exit();
	}
	$consulta = "SELECT * FROM SP_dato_cliente WHERE estado='Retirado' ORDER BY cliente ASC  ";
	$resultado = $conexion->query($consulta);
	if($resultado->num_rows > 0 ){
						
		date_default_timezone_set('America/Mexico_City');

		if (PHP_SAPI == 'cli')
			die('Este archivo solo se puede ver desde un navegador web');

		/** Se agrega la libreria PHPExcel */
		require_once '../../../reporteexcel/lib/PHPExcel/PHPExcel.php';

		// Se crea el objeto PHPExcel
		$objPHPExcel = new PHPExcel();

		// Se asignan las propiedades del libro
		$objPHPExcel->getProperties()->setCreator("Luis Ponce") //Autor
							 ->setLastModifiedBy("Luis Ponce") //Ultimo usuario que lo modificó
							 ->setTitle("Clientes Activos")
							 ->setSubject("Clientes Activos")
							 ->setDescription("Clientes Activos")
							 ->setKeywords("Clientes Activos")
							 ->setCategory("Clientes Activos");

		$tituloReporte = "Clientes Activos";
		$titulosColumnas = array('Razón Social', 'Rut', 'Contrato','Contacto','Correo','Telefono','Dirección Comercial','Plan','Fecha de Intalación','Velocidad','Estado del Servicio','Conexión','Auditado');
		
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:D1');
						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1',$tituloReporte)
        		    ->setCellValue('A3',  $titulosColumnas[0])
		            ->setCellValue('B3',  $titulosColumnas[1])
        		    ->setCellValue('C3',  $titulosColumnas[2])
            		->setCellValue('D3',  $titulosColumnas[3])
					->setCellValue('E3',  $titulosColumnas[4])
                    ->setCellValue('F3',  $titulosColumnas[5])
					->setCellValue('G3',  $titulosColumnas[6])
				    ->setCellValue('H3',  $titulosColumnas[7])
					    ->setCellValue('I3',  $titulosColumnas[8])
						    ->setCellValue('J3',  $titulosColumnas[9])
							    ->setCellValue('K3',  $titulosColumnas[10])
								    ->setCellValue('L3',  $titulosColumnas[11])
									    ->setCellValue('M3',  $titulosColumnas[12])
										    ->setCellValue('N3',  $titulosColumnas[13]);
											  
		
		//Se agregan los datos de los alumnos
		$i = 4;
		while ($fila = $resultado->fetch_array()) {
			$objPHPExcel->setActiveSheetIndex(0)
        		    ->setCellValue('A'.$i,  $fila['cliente'])
		            ->setCellValue('B'.$i,  $fila['rut'])
        		    ->setCellValue('C'.$i,  $fila['contrato'])
            		->setCellValue('D'.$i,  $fila['contactos'])
					->setCellValue('E'.$i,  $fila['correos'])				
					->setCellValue('F'.$i,  $fila['telefonos'])
					->setCellValue('G'.$i,  $fila['direccion_comercial'])
					->setCellValue('H'.$i,  $fila['plan'])
					->setCellValue('I'.$i,  $fila['fecha_inst'])
					->setCellValue('J'.$i,  $fila['velocidad'])
					->setCellValue('K'.$i,  $fila['estado'])
					->setCellValue('L'.$i,  $fila['alias'])
					->setCellValue('M'.$i,  $fila['auditado']);
					$i++;
		}
		
		$estiloTituloReporte = array(
        	'font' => array(
	        	'name'      => 'Verdana',
    	        'bold'      => true,
        	    'italic'    => false,
                'strike'    => false,
               	'size' =>16,
	            	'color'     => array(
    	            	'rgb' => 'FFFFFF'
        	       	)
            ),
	        'fill' => array(
				'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'	=> array('argb' => 'FF220835')
			),
            'borders' => array(
               	'allborders' => array(
                	'style' => PHPExcel_Style_Border::BORDER_NONE                    
               	)
            ), 
            'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        			'rotation'   => 0,
        			'wrap'          => TRUE
    		)
        );

		$estiloTituloColumnas = array(
            'font' => array(
                'name'      => 'Arial',
                'bold'      => true,                          
                'color'     => array(
                    'rgb' => 'FFFFFF'
                )
            ),
            'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
				'rotation'   => 90,
        		'startcolor' => array(
            		'rgb' => 'c47cf2'
        		),
        		'endcolor'   => array(
            		'argb' => 'FF431a5d'
        		)
			),
            'borders' => array(
            	'top'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'bottom'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '143860'
                    )
                )
            ),
			'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        			'wrap'          => TRUE
    		));
			
		$estiloInformacion = new PHPExcel_Style();
		$estiloInformacion->applyFromArray(
			array(
           		'font' => array(
               	'name'      => 'Arial',               
               	'color'     => array(
                   	'rgb' => '000000'
               	)
           	),
           	'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'		=> array('argb' => 'FFd9b7f4')
			),
           	'borders' => array(
               	'left'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN ,
	                'color' => array(
    	            	'rgb' => '3a2a47'
                   	)
               	)             
           	)
        ));
		 //eSTILOS
		//$objPHPExcel->getActiveSheet()->getStyle('A1:F1')->applyFromArray($estiloTituloReporte);
		//$objPHPExcel->getActiveSheet()->getStyle('A3:F3')->applyFromArray($estiloTituloColumnas);		
		//$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:D".($i-1));
				
		for($i = 'A'; $i <= 'D'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('Clientes Retirados');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);
							 $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
							 $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
							 $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
							 $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
							 $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
							 $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
							 $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
							 $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
							 $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
							 $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
							 $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
							 $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
							 $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
							 $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
							 $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
							;

		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header("Content-Disposition: attachment; filename=clientes_netland_retirados.xlsx");
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
		
	}
	else{
		print_r('No hay resultados para mostrar');
	}

?>