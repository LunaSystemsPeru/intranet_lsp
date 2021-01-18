<?php
require_once 'cl_conectar.php';

class cl_gasto
{
    private $id;
    private $conectar;

    /**
     * cl_gasto constructor.
     */
    public function __construct()
    {
        $this->conectar = cl_conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function insertar()
    {
        $sql = "insert into gastos values ('" . $this->id . "')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function eliminar()
    {
        $sql = "delete from gastos where id_movimiento = '$this->id' ";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function verFilasJson()
    {
        $sql = "select g.id_movimiento, bm.fecha, cb.nombre as banco, bm.descripcion, bm.sale as monto, cm.nombre as clasificacion 
        from gastos as g 
        inner join bancos_movimientos bm on g.id_movimiento = bm.id_movimiento
        inner join caja_bancos cb on bm.id_banco = cb.id_banco
        inner join clasificacion_movimientos cm on bm.id_clasificacion = cm.id_clasificacion
        where year(bm.fecha) = year(curdate()) and month(bm.fecha) = month(curdate())";
        return $this->conectar->get_json_rows($sql);
    }
}