<?php
if(!isset($_GET['token']) || $_GET['token'] != sha1(md5('spooner'))){
    die();
}

require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-config.php');
global $wpdb;
$table = isset($_POST['table']) ? $_POST['table'] : exit();
$mail_results = $wpdb->get_results("SELECT * FROM `".$table."` ORDER BY id DESC");
require_once get_template_directory() . '/gutenberg/PHPExcel.php';
$pExcel = new PHPExcel();

//if ($table == 'wp_leads') {
    $pExcel->setActiveSheetIndex(0);
    $aSheet = $pExcel->getActiveSheet();
    $aSheet->getColumnDimension('A')->setWidth(5);
    $aSheet->getColumnDimension('B')->setWidth(40);
    $aSheet->getColumnDimension('C')->setWidth(40);
    $aSheet->getColumnDimension('D')->setWidth(40);
    $aSheet->getColumnDimension('E')->setWidth(40);
    $aSheet->getColumnDimension('F')->setWidth(40);
    $aSheet->getColumnDimension('G')->setWidth(40);
    //$aSheet->getColumnDimension('H')->setWidth(40);
    //$aSheet->getColumnDimension('I')->setWidth(40);
    //$aSheet->getColumnDimension('J')->setWidth(40);
    //$aSheet->getColumnDimension('K')->setWidth(40);
    $aSheet->mergeCells('A1:G1');
    $aSheet->getRowDimension('1')->setRowHeight(40);
    $aSheet->setCellValue('A1','Замовлення');
    $aSheet->setCellValue('A2','ID');
    $aSheet->setCellValue('B2','Телефон');
    $aSheet->setCellValue('C2','Дата додавання');
    /*
    $aSheet->setCellValue('D2','Email');
    $aSheet->setCellValue('E2','Company');
    $aSheet->setCellValue('F2','Page');
    $aSheet->setCellValue('G2','Date added');
    */
    //$aSheet->setCellValue('H2','Subject');
    //$aSheet->setCellValue('I2','Start');
    //$aSheet->setCellValue('J2','Description');
    //$aSheet->setCellValue('K2','Date');
    $num_row = 3;
    foreach ($mail_results as $key => $result) {	      
    	$aSheet->getRowDimension($num_row)->setRowHeight(-1);
    	$aSheet->setCellValue('A'.$num_row, $result->id);
        $aSheet->setCellValue('B'.$num_row, htmlspecialchars_decode($result->phone));
    	$aSheet->setCellValue('C'.$num_row, htmlspecialchars_decode($result->date_added));
        /*
        $aSheet->setCellValue('D'.$num_row, htmlspecialchars_decode($result->email));
        $aSheet->setCellValue('E'.$num_row, htmlspecialchars_decode($result->company));
        $aSheet->setCellValue('F'.$num_row, get_permalink($result->page_id));
        $aSheet->setCellValue('G'.$num_row, htmlspecialchars_decode($result->date_added));
        */
    	$num_row++;
    }

    /*
} else if ($table == 'wp_contacts') {
    $pExcel->setActiveSheetIndex(0);
    $aSheet = $pExcel->getActiveSheet();
    $aSheet->getColumnDimension('A')->setWidth(5);
    $aSheet->getColumnDimension('B')->setWidth(40);
    $aSheet->getColumnDimension('C')->setWidth(40);
    $aSheet->getColumnDimension('D')->setWidth(40);
    $aSheet->getColumnDimension('E')->setWidth(40);
    $aSheet->getColumnDimension('F')->setWidth(40);
    $aSheet->getColumnDimension('G')->setWidth(40);
    $aSheet->getColumnDimension('H')->setWidth(40);
    //$aSheet->getColumnDimension('I')->setWidth(40);
    //$aSheet->getColumnDimension('J')->setWidth(40);
    //$aSheet->getColumnDimension('K')->setWidth(40);
    $aSheet->mergeCells('A1:H1');
    $aSheet->getRowDimension('1')->setRowHeight(40);
    $aSheet->setCellValue('A1','Contact form');
    $aSheet->setCellValue('A2','ID');
    $aSheet->setCellValue('B2','First name');
    $aSheet->setCellValue('C2','Last name');
    $aSheet->setCellValue('D2','Theme');
    $aSheet->setCellValue('E2','Email');
    $aSheet->setCellValue('F2','Company');
    $aSheet->setCellValue('G2','Message');
    $aSheet->setCellValue('H2','Date added');
    //$aSheet->setCellValue('H2','Subject');
    //$aSheet->setCellValue('I2','Start');
    //$aSheet->setCellValue('J2','Description');
    //$aSheet->setCellValue('K2','Date');
    $num_row = 3;
    foreach ($mail_results as $key => $result) {          
        $aSheet->getRowDimension($num_row)->setRowHeight(-1);
        $aSheet->setCellValue('A'.$num_row, $result->id);
        $aSheet->setCellValue('B'.$num_row, htmlspecialchars_decode($result->name));
        $aSheet->setCellValue('C'.$num_row, htmlspecialchars_decode($result->last_name));
        $aSheet->setCellValue('D'.$num_row, htmlspecialchars_decode($result->theme));
        $aSheet->setCellValue('E'.$num_row, htmlspecialchars_decode($result->email));
        $aSheet->setCellValue('F'.$num_row, htmlspecialchars_decode($result->company));
        $aSheet->setCellValue('G'.$num_row, htmlspecialchars_decode($result->message));
        $aSheet->setCellValue('H'.$num_row, htmlspecialchars_decode($result->date_added));
        $num_row++;
    }
}

*/

$style_header = array(
    // Шрифт
    'font'=>array(
        'bold' => true,
        'name' => 'Times New Roman',
        'size' => 14,
        'color'=>array(
            'rgb' => '000000'
        )
    ),
    // Выравнивание
    'alignment' => array(
        'horizontal' => PHPExcel_STYLE_ALIGNMENT::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_STYLE_ALIGNMENT::VERTICAL_CENTER,
    ),
    // Заполнение цветом
    'fill' => array(
        'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
        'color'=>array(
            'rgb' => 'F2F2F2'
        )
    ),
    'borders'=>array(
        'bottom'=>array(
            'style'=>PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'rgb'=>'000000'
            )
        ),
        'right'=>array(
            'style'=>PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'rgb'=>'000000'
            )
        )
    )
);
$aSheet->getStyle('A1:K1')->applyFromArray($style_header);
$style_header_2 = array(
    // Шрифт
    'font'=>array(
        'bold' => true,
        'name' => 'Times New Roman',
        'size' => 11,
        'color'=>array(
            'rgb' => '000000'
        )
    ),
    // Выравнивание
    'alignment' => array(
        'horizontal' => PHPExcel_STYLE_ALIGNMENT::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_STYLE_ALIGNMENT::VERTICAL_CENTER,
    ),
    // Заполнение цветом
    'fill' => array(
        'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
        'color'=>array(
            'rgb' => 'FFFFFF'
        )
    ),
    'borders'=>array(
        'bottom'=>array(
            'style'=>PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'rgb'=>'000000'
            )
        ),
        'right'=>array(
            'style'=>PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'rgb'=>'000000'
            )
        )
    )
);
$aSheet->getStyle('A2:K2')->applyFromArray($style_header_2);
$style_price = array(
    'alignment' => array(
	    'horizontal' => PHPExcel_STYLE_ALIGNMENT::HORIZONTAL_LEFT,
	    'vertical' => PHPExcel_STYLE_ALIGNMENT::VERTICAL_CENTER,
	),
    'borders'=>array(
        'bottom'=>array(
            'style'=>PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'rgb'=>'000000'
            )
        ),
        'right'=>array(
            'style'=>PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'rgb'=>'000000'
            )
        )
    )
);
$aSheet->getStyle('A3:K'.($num_row))->applyFromArray($style_price);
$aSheet->getStyle('A3:K'.($num_row))->getAlignment()->setWrapText(true);
$date = date('Ymdhms');

$objWriter = PHPExcel_IOFactory::createWriter($pExcel, 'Excel2007');
$objWriter->save(get_template_directory() . '/tmp/subscribe.xlsx');
$data = array('link' => get_template_directory_uri() . '/tmp/subscribe.xlsx');


echo json_encode($data);
?>