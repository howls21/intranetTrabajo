<?php
class BD_asistencia extends CI_Model {
        public function marcar_hora($id_tarjeta_)
        {

            $fecha = date('Y-m-d');
                $query = $this->db->query("SELECT * FROM marcaciones where tarjeta_nfc_id_tarjeta ='$id_tarjeta_' and fecha='$fecha'");

                if($query->num_rows()>0){
                        $this->update_entry_salida($id_tarjeta_);
                        return 'U';
                }
                                else{
                        $this->insert_entry_entrada($id_tarjeta_);
                        return 'I';
                }
                return 'E';
        }

        public function insert_entry_entrada($id_tarjeta_)
        {
            //date_default_timezone_get('America/Santiago');
            $hora = date('H:i:s');
            $fecha = date('Y-m-d');
                $data = array(
                        'tarjeta_nfc_id_tarjeta' => $id_tarjeta_,
                        'entrada' => $hora,
                        'fecha' => $fecha
                        );
                $this->db->insert('marcaciones', $data);
        }

        public function update_entry_salida($id_tarjeta_)
        {
            //date_default_timezone_get('America/Santiago');
            $hora = date('H:i:s');
                 $data = array(
                        'salida' => $hora,
                        );
        $this->db->where('tarjeta_nfc_id_tarjeta', $id_tarjeta_);
        $this->db->where('fecha',date('Y-m-d'));
        return $this->db->update('marcaciones', $data);
        }


}
?>
