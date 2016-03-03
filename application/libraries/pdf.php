<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once APPPATH.'tcpdf/tcpdf.php';
 
class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }

    //Page header
    public function Header() {
        //var_dump(K_PATH_IMAGES);
        $html = '
              <style type=text/css>
                p {
                font-family: verdana;
                font-size: 8pt;
                }
              </style>
              <table colspan="2" cellspacing="0" cellpadding="1" border="0">
       				<tr>
       					<td>			
                  <img src="http://localhost/hotelcaninoreyes/assets/PDF/logo.png" alt="Smiley face" height="150" width="150">		
                </td>
       					<td align = "center">
                  <p>R.F.C. HERC891116NG7</p>
                  <p>TEL: 30 8 00 CEL: 312 140 6016</p>
                  <p>Calle Independencia # 199 Colonia Ejidal</p>
                  <p>Rancho de Villa, Colima C.P. 28620</p>
                  <p>www.hotelcaninoreyes.com</p>
                </td>
                <td align = "center"></td>
       				</tr>
       			</table>';
        $this->writeHTMLCell($w = 0, $h = 0, $x = '5', $y = '5', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = 'top', $autopadding = true);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
/* application/libraries/Pdf.php */