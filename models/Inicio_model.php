<?php

class Inicio_model extends CI_Model {

    protected $db_heroku;

    public function __construct() {
        parent::__construct();
        $this->db_heroku = $this->load->database('default', TRUE);
    }

    public function obtenerDotacionesUni() {
        $this->db_heroku->select('*');
        $this->db_heroku->from('dota_uni');
        $this->db_heroku->where('estado', 'Y');
        return $this->db_heroku->get()->result();
    }

    public function obtenerDotacionesMulti() {
        $this->db_heroku->select('*');
        $this->db_heroku->from('dota_multi');
        $this->db_heroku->where('estado', 'Y');
        return $this->db_heroku->get()->result();
    }

    public function Guardar($tabla, $datos) {
        $rpta = $this->db_heroku->insert($tabla, $datos);
        return $rpta;
    }

    public function obtenerRegistros($tabla) {
        $this->db_heroku->select('*');
        $this->db_heroku->from($tabla);
        $this->db_heroku->where('estado', 'Y');
        return $this->db_heroku->get()->result();
    }

    public function mostrarCalculoDotacion($id, $establecimiento) {
        $this->db_heroku->select('*');
        $this->db_heroku->from($establecimiento);
        if ($establecimiento == 'unifamiliar') {
            $this->db_heroku->where('id_unifamiliar', $id);
        } else if ($establecimiento == 'multifamiliar') {
            $this->db_heroku->where('id_multifamiliar', $id);
        } else if ($establecimiento == 'oficinas') {
            $this->db_heroku->where('id_oficina', $id);
        } else if ($establecimiento == 'hoteles') {
            $this->db_heroku->where('id_hotel', $id);
        } else {
            $this->db_heroku->where('id_colegios', $id);
        }
        $this->db_heroku->where('estado', 'Y');
        return $this->db_heroku->get()->row();
    }

    public function mostrarCalculoVariacion($id, $variaciones) {
        $this->db_heroku->select('*');
        $this->db_heroku->from($variaciones);
        if ($variaciones == 'consu_futuro') {
            $this->db_heroku->where('id_consu', $id);
        } else {
            $this->db_heroku->where('id_varia', $id);
        }
        $this->db_heroku->where('estado', 'Y');
        return $this->db_heroku->get()->row();
    }

    public function Eliminar($tabla, $datos, $where) {
        $rpta = $this->db_heroku->update($tabla, $datos, $where);
        return $rpta;
    }

}
