<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// panggil autoload dompdf nya
require_once 'dompdf2/lib/html5lib/Parser.php';
require_once 'dompdf2/lib/php-svg-lib/src/autoload.php';
require_once 'dompdf2/src/Autoloader.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
use Dompdf\Options;

class Pdfgenerator {

    public function generate($html, $filename='', $paper = '', $orientation = '', $stream=TRUE)
    {
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->set_option("defaultFont", "Arial");
        $canvas=$dompdf->get_canvas();
        $canvas->page_text(500,800,"Halaman: {PAGE_NUM} dari {PAGE_COUNT}","Arial",9,array(0,0,0));

        $dompdf->render();
        ob_end_clean();
        if ($stream) {
            $dompdf->stream($filename.".pdf", array("Attachment" => 0));
        } else {
            return $dompdf->output();
        }
    }
}


