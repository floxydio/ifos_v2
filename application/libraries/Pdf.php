<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter PDF Library
 *
 * @package			CodeIgniter
 * @subpackage		Libraries
 * @category		Libraries
 * @author			Muhanz
 * @license			MIT License
 * @link			https://github.com/hanzzame/ci3-pdf-generator-library
 *
 */
 require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf
{
	public function create($html,$filename)
    {
         $options = new Options();
	    $options->set('isRemoteEnabled', TRUE);
	    $dompdf = new Dompdf($options);
	    $dompdf->loadHtml($html);
	    $dompdf->render();
        ob_end_clean();
	    $dompdf->stream($filename.'.pdf');
  }
  public function generate($html, $filename='', $paper = '', $orientation = '', $stream=TRUE)
    {
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        if ($stream) {
            $dompdf->stream($filename.".pdf", array("Attachment" => 0));
        } else {
            return $dompdf->output();
        }
    }
}