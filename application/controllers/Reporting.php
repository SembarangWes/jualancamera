<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporting extends CI_Controller {

    
    public function r_camera()
	{ 
		$data = [ 'data' => $this->Kamera_model->list(10, 0, 'null', 'null') ];

		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->load_view('admin/print_camera', $data, 'print.pdf'); 
	}
}