<?php
include "../modelo/database.php";
include "../class.upload.php";
if (isset($_FILES["name"])) {
    $up = new Upload($_FILES["name"]);
    if ($up->uploaded) {
        $up->Process("./uploads/");
        if ($up->processed) {
            /// leer el archivo excel
            require_once '../PHPExcel/Classes/PHPExcel.php';
            $archivo = "uploads/" . $up->file_dst_name;
            $inputFileType = PHPExcel_IOFactory::identify($archivo);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($archivo);
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            for ($row = 2; $row <= $highestRow; $row++) {
                $title = $sheet->getCell("A" . $row)->getValue();
                $desc = $sheet->getCell("B" . $row)->getValue();
                $image = $sheet->getCell("C" . $row)->getValue();
                $orientacion = $sheet->getCell("D" . $row)->getValue();
                $tamano = $sheet->getCell("E" . $row)->getValue();
                $tags = $sheet->getCell("F" . $row)->getValue();
                $imagen_completa_menu = $sheet->getCell("G" . $row)->getValue();
                $formato_imagen = $sheet->getCell("H" . $row)->getValue();

                $sql = "insert into imagecrud (TITLE, DESCRIPTION, IMAGE, orientacion, tamano, tags, imagen_completa_menu, formato_imagen) value ";
                $sql .= " (\"$title\",\"$desc\",\"$image\",\"$orientacion\",\"$tamano\",\"$tags\",\" $imagen_completa_menu\",\" $formato_imagen\")";

                $con->query($sql);
            }
            unlink($archivo);
        }
    }
}
echo "<script>
 window.location = '../index.php';
 </script>
";
