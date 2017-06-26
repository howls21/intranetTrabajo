<?php
class Model extends CI_Model{
    function conection($user, $password){
       $this->db->select("*");
       $this->db->where('nombre_usuario', $user);
       $this->db->where('clave', $password);
       $query = $this->db->get('usuario');
       if($query->num_rows()==0){
            return false;
        }else{
            return $query;

        }
    }
    function addWorker($data){
       return $this->db->insert('trabajador',$data);
    }
    function workerList(){
       $this->db->select("*");
       $data = $this->db->get('trabajador');
       return $data;
    }
    function insCard($data){
        return $this->db->insert('tarjeta_nfc',$data);
    }
    function obraList(){
       $this->db->select("*");
       $data = $this->db->get('obra');
       return $data;
    }
    function elementList(){
       $query = $this->db->query("select * from cargo c join stock s where c.id_cargo = s.id_cargo");
       return $query;
    }
    function addElement($data){
       $this->db->insert('cargo_trabajador',$data);
    }
    function newElement($data){
        return $this->db->insert('cargo',$data);
    }
    function decreaseStock($cantidad, $idStock){
       $nuevoStock;
       $this->db->select("*");
       $this->db->where('id_stock', $idStock);
       $query = $this->db->get('stock');
       $oldStock;
       foreach ($query->result() as $items){
           $oldStock = $items->stock;
       }
       $nuevoStock = $oldStock - $cantidad;
       $new = array(
        'stock' => $nuevoStock
       );
       $this->db->where('id_stock', $idStock);
       $this->db->update('stock', $new);
    }
    function workerSearch($rut){
        $query = $this->db->query("SELECT * FROM trabajador WHERE rut LIKE '$rut%'");
         return $query;
    }
    function obrasList(){
       $this->db->select("*");
       $data = $this->db->get('obra');
       return $data;
    }
    function searchByObra($obra){
        $this->db->select("*");
        $this->db->where('nombre_obra', $obra);
        $query = $this->db->get('obra');
        $id;
        foreach ($query->result() as $item){
            $id = $item->id_obra;
        }
        $this->db->select("*");
        $this->db->where('id_obra', $id);
        $query2 = $this->db->get('trabajador');
        return $query2;
    }
    function searchWorker2($rut){
        $this->db->select("*");
        $this->db->where('rut', $rut);
        $query = $this->db->get('trabajador');
        return $query;
    }
    function searchYear(){
        $query = $this->db->query("select min(fecha) from marcaciones");
         return $query;
    }
    function aList($y, $m, $obra){
        $mes = null;
        if($m < 10){
            $mes = "0".$m;
        }  else {
           $mes = $m;
        }
        $query = $this->db->query("SELECT * FROM marcaciones m JOIN tarjeta_nfc t on m.tarjeta_nfc_id_tarjeta = t.id_tarjeta JOIN obra o ON t.id_obra = o.id_obra JOIN trabajador tr ON t.trabajador_rut = tr.rut WHERE m.fecha LIKE '$y-$mes%' AND o.id_obra = '$obra'");
         return $query;
    }
    function workerSearch2($obra, $rut){
        $query = $this->db->query("select * from trabajador t join obra o on o.nombre_obra = '$obra' where t.id_obra = o.id_obra and rut LIKE '$rut%'");
         return $query;
    }
    function stateSearch($id, $rut){
        $query = $this->db->query("select * from estado e join trabajador t on e.rut = t.rut where e.id_obra = '$id' and e.rut = '$rut'");
         return $query;
    }
    function elementosAsignados($rut){
        $query = $this->db->query("SELECT nombre, apellido_paterno, apellido_materno, rut, nombre_cargo, cantidad, fecha_entrega, talla FROM cargo_trabajador ct
         join trabajador t on ct.rut_trabajador = t.rut join stock s on s.id_stock = ct.id_stock JOIN cargo c ON c.id_cargo = s.id_cargo
         WHERE ct.rut_trabajador = '$rut' order by ct.fecha_entrega");
        return $query;
    }
    function addObra($data){
       return $this->db->insert('obra',$data);
    }
    function searchObra($obra){
        $this->db->select("*");
        $this->db->where('nombre_obra', $obra);
        $query = $this->db->get('obra');
        return $query;
    }
    function searchWorker($rut){
        $this->db->select("*");
        $this->db->where('rut', $rut);
        $query = $this->db->get('trabajador');
        return $query;
    }
     function stateList(){
       $this->db->select("*");
       $data = $this->db->get('estado');
       return $data;
    }
    function searchState($worker,$idObra){
        $query = $this->db->query("select * from estado where rut = '$worker' and id_obra = $idObra;");
        return $query;
    }
    function addState($data){
       $this->db->insert('estado',$data);
    }


}
