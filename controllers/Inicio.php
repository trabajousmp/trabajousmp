<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Inicio_model');
        $this->template->add_js('js/html2pdf.bundle.js');
    }

    public function index() {
        $this->template->add_css('css/inicio_estilos.css');
        $this->template->load('inicio');
    }

    public function dotaciones() {
        $this->template->add_js('js/bigfraction.js');
        $this->template->add_js('js/fraction.js');
        $this->template->add_js('js/fraction.min.js');
        $this->template->add_js('js/fraction.min.js');
        $this->template->add_js('js/length.js');
        $this->template->add_js('js/dotaciones.js');
        $this->template->add_css('css/dotaciones_estilos.css');
        $this->template->add_js('js/html2pdf.bundle.js');

        $data['dota_multi'] = $this->Inicio_model->obtenerDotacionesMulti();

        $this->template->load('dotaciones', $data);
    }

    public function variaciones() {
        $this->template->add_js('js/variaciones.js');
        $this->template->add_css('css/variaciones_estilos.css');

        $this->template->load('v_variaciones');
    }

    public function calcularDotacion() {
        $rpta = $this->Inicio_model->obtenerDotacionesUni();
        echo json_encode($rpta);
    }

    public function listaDotaciones() {

        $data['dota_unifamiliar'] = $this->Inicio_model->obtenerRegistros('unifamiliar');
        $data['dota_multifamiliar'] = $this->Inicio_model->obtenerRegistros('multifamiliar');
        $data['dota_oficinas'] = $this->Inicio_model->obtenerRegistros('oficinas');
        $data['dota_hoteles'] = $this->Inicio_model->obtenerRegistros('hoteles');
        $data['dota_colegios'] = $this->Inicio_model->obtenerRegistros('colegios');
        $this->template->add_js('js/dotaciones.js');
        $this->template->add_css('css/dotaciones_estilos.css');
        $this->template->add_js('js/bigfraction.js');
        $this->template->add_js('js/fraction.js');
        $this->template->add_js('js/fraction.min.js');
        $this->template->add_js('js/length.js');
        $this->template->load('v_lista_dotaciones', $data);
    }

    public function listaVariaciones() {
        $data['consumo_futuro'] = $this->Inicio_model->obtenerRegistros('consu_futuro');
        $data['variaciones_consumo'] = $this->Inicio_model->obtenerRegistros('consu_variaciones');
        $this->template->add_js('js/variaciones.js');
        $this->template->add_css('css/variaciones_estilos.css');
        $this->template->load('v_lista_variaciones', $data);
    }

    public function guardarDotaciones() {
        $establecimiento = $this->input->get('establecimiento');
        $tan_elevado = $this->input->get('tan_elevado');
        $cisterna = $this->input->get('cisterna');
        $tiempo = $this->input->get('tiempo');
        $cau_bombeo = $this->input->get('cau_bombeo');
        $impulsion = $this->input->get('impulsion');
        $succion = $this->input->get('succion');
        $array_calculos = array('tan_elevado' => $tan_elevado, 'cisterna' => $cisterna, 'cau_bombeo' => $cau_bombeo, 'impulsion' => $impulsion, 'succion' => $succion, 'tiempo' => $tiempo);

        if ($establecimiento == 'unifamiliar') {
            $nombre_uni = $this->input->get('nombre_uni');
            $area_uni = $this->input->get('area_uni');
            $dotacion_uni = $this->input->get('dotacion_uni');
            $array_establecimiento = array('nombre' => $nombre_uni, 'area' => $area_uni, 'dotacion' => $dotacion_uni);
        } else if ($establecimiento == 'multifamiliar') {
            $nombre_multi = $this->input->get('nombre_multi');
            $dormitorios_multi = $this->input->get('dormitorios_multi');
            $departamentos_multi = $this->input->get('departamentos_multi');
            $pisos_multi = $this->input->get('pisos_multi');
            $dotacion_multi = $this->input->get('dotacion_multi');
            $total_multi = $this->input->get('total_multi');
            $array_establecimiento = array('nombre' => $nombre_multi, 'n_dormitorios' => $dormitorios_multi, 'n_departxpiso' => $departamentos_multi, 'n_pisos' => $pisos_multi, 'dotacion' => $dotacion_multi, 'total' => $total_multi);
        } else if ($establecimiento == 'oficinas') {
            $nombre_ofi = $this->input->get('nombre_ofi');
            $area_ofi = $this->input->get('area_ofi');
            $piso_ofi = $this->input->get('piso_ofi');
            $dotacion_ofi = $this->input->get('dotacion_ofi');
            $total_ofi = $this->input->get('total_ofi');
            $array_establecimiento = array('nombre' => $nombre_ofi, 'area' => $area_ofi, 'n_pisos' => $piso_ofi, 'dotacion' => $dotacion_ofi, 'total' => $total_ofi);
        } else if ($establecimiento == 'hoteles') {
            $nombre_hotel = $this->input->get('nombre_hotel');
            $dormi_hotel = $this->input->get('dormi_hotel');
            $dotacion_hotel = $this->input->get('dotacion_hotel');
            $total_hotel = $this->input->get('total_hotel');
            $array_establecimiento = array('nombre' => $nombre_hotel, 'n_dormitorio' => $dormi_hotel, 'dotacion' => $dotacion_hotel, 'total' => $total_hotel);
        } else {
            $nombre_cole = $this->input->get('nombre_cole');
            $persoResi = $this->input->get('persoResi');
            $alumResi = $this->input->get('alumResi');
            $persoNoresi = $this->input->get('persoNoresi');
            $alumNoresi = $this->input->get('alumNoresi');
            $persoResiTotal = $this->input->get('persoResiTotal');
            $alumResiTotal = $this->input->get('alumResiTotal');
            $persoNoresiTotal = $this->input->get('persoNoresiTotal');
            $alumNoresiTotal = $this->input->get('alumNoresiTotal');
            $dotacionTotalcole = $this->input->get('dotacionTotalcole');
            $array_establecimiento = array('nom_cole' => $nombre_cole, 'persoResi' => $persoResi, 'alumResi' => $alumResi, 'persoNoresi' => $persoNoresi, 'alumNoresi' => $alumNoresi, 'persoResiTotal' => $persoResiTotal, 'alumResiTotal' => $alumResiTotal, 'persoNoresiTotal' => $persoNoresiTotal, 'alumNoresiTotal' => $alumNoresiTotal, 'dotacionTotalcole' => $dotacionTotalcole);
        }
        $datos_guardar = array_merge($array_calculos, $array_establecimiento);
        $rpta = $this->Inicio_model->Guardar($establecimiento, $datos_guardar);
    }

    public function guardarVariaciones() {
        $variaciones = $this->input->get('variaciones');
        if ($variaciones == 'consu_futuro') {
            $futu_pobla = $this->input->get('futu_pobla');
            $res_futu = $this->input->get('res_futu');
            $datos_guardar = array('pobla' => $futu_pobla, 'res_consu' => $res_futu);
        } else {
            $varia_año = $this->input->get('varia_año');
            $varia_pobla = $this->input->get('varia_pobla');
            $varia_dota = $this->input->get('varia_dota');
            $varia_k1 = $this->input->get('varia_k1');
            $varia_k2 = $this->input->get('varia_k2');

            $cal1 = $this->input->get('cal1');
            $cal2 = $this->input->get('cal2');
            $cal3 = $this->input->get('cal3');
            $cal4 = $this->input->get('cal4');

            $datos_guardar = array('año' => $varia_año, 'varia_pobla' => $varia_pobla, 'varia_dota' => $varia_dota, 'k1' => $varia_k1, 'k2' => $varia_k2, 'cal1' => $cal1, 'cal2' => $cal2, 'cal3' => $cal3, 'cal4' => $cal4);
            var_dump($datos_guardar);
        }
        $rpta = $this->Inicio_model->Guardar($variaciones, $datos_guardar);
    }

    public function mostrarCalculosDotaciones() {
        $id = $this->input->get('id');
        $establecimiento = $this->input->get('establecimiento');
        $rpta = $this->Inicio_model->mostrarCalculoDotacion($id, $establecimiento);
        echo json_encode($rpta);
    }

    public function mostrarCalculosVariaciones() {
        $id = $this->input->get('id');
        $variaciones = $this->input->get('variaciones');
        $rpta = $this->Inicio_model->mostrarCalculoVariacion($id, $variaciones);
        echo json_encode($rpta);
    }

    public function generarPDFDotaciones() {
        // Using default PHP curl library
//        $ch = curl_init('https://webtopdf.expeditedaddons.com/?api_key=R1LFJPI7ZC805SETXW6K1H33U0VO95D4GA74N2BY892MQ6&content=http://www.wikipedia.org&margin=10&html_width=1024&title=My PDF Title');
//
//        $response = curl_exec($ch);
//        curl_close($ch);
//        var_dump($response);
//        $id = $this->input->get('id');
//        $establecimiento = $this->input->get('establecimiento');
////        var_dump($id,$establecimiento);
//        $data['rpta'] = $this->Inicio_model->mostrarCalculoDotacion($id, $establecimiento);
//        if ($establecimiento == 'unifamiliar') {
//            $this->load->view('pdf_dota_uni', $data);
//        } else if ($establecimiento == 'multifamiliar') {
//            $this->load->view('pdf_dota_multi', $data);
//        } else if ($establecimiento == 'oficinas') {
//            $this->load->view('pdf_dota_ofi', $data);
//        } else if ($establecimiento == 'hoteles') {
//            $this->load->view('pdf_dota_hotel', $data);
//        } else {
//            $this->load->view('pdf_dota_cole', $data);
//        }
//        $html = $this->output->get_output();
//        $this->load->library('pdf');
//        $this->dompdf->loadHtml($html);
//        $this->dompdf->setPaper('A4', 'portrait');
//        $this->dompdf->render();
//        $this->dompdf->stream("dotaciones.pdf", array("Attachment" => 0));
    }

    public function generarPDFVariaciones() {
        // Using default PHP curl library
        $ch = curl_init('https://webtopdf.expeditedaddons.com/?api_key=R1LFJPI7ZC805SETXW6K1H33U0VO95D4GA74N2BY892MQ6&content=http://www.wikipedia.org&margin=10&html_width=1024&title=My PDF Title');

        $response = curl_exec($ch);
        curl_close($ch);

        var_dump($response);

//        $id = $this->input->get('id');
//        $variaciones = $this->input->get('variaciones');
////        var_dump($variaciones);
//        $data['rpta'] = $this->Inicio_model->mostrarCalculoVariacion($id, $variaciones);
//        if ($variaciones == 'consu_futuro') {
//            $this->load->view('pdf_varia_futu', $data);
//        } else {
//            $this->load->view('pdf_varia_consu', $data);
//        }
//
//        $html = $this->output->get_output();
//        $this->load->library('Pdf');
//        $this->dompdf->loadHtml($html);
//        $this->dompdf->setPaper('A4', 'portrait');
//        $this->dompdf->render();
//        $this->dompdf->stream("variaciones.pdf", array("Attachment" => 0));
    }

    public function eliminar() {
        $id = $this->input->get('id');
        $nombre_id = $this->input->get('nombre_id');
        $tabla = $this->input->get('tabla');
        $datos = array('estado' => 'N');
        $where = array('' . $nombre_id . '' => $id);
        $rpta = $this->Inicio_model->Eliminar($tabla, $datos, $where);
        if ($rpta) {
            $data['data_' . $tabla] = $this->Inicio_model->obtenerRegistros($tabla);
            if ($tabla == 'consu_futuro' || $tabla == 'consu_variaciones') {
                echo $this->load->view('v_lista_variaciones', $data, TRUE);
            } else {
                echo $this->load->view('v_lista_dotaciones', $data, TRUE);
            }
        }
    }

}
