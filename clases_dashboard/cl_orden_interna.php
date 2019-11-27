<?php
require_once '../clases/cl_conectar.php';

class cl_orden_interna
{
    private $c_conectar;

    /**
     * cl_orden_interna constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
    }

    public function verSuma_Anual()
    {
        $sql = "select sum(monto_aprobado) as total, count(id_orden_interna) as cantidad 
        from orden_interna 
        where year(fecha_inicio) = year(current_date())";
        return $this->c_conectar->get_json_rows($sql);
    }

    public function verCantidades_Mensuales()
    {
        $sql = "select count(oi.id_orden_interna) as cantidad, m.nombre 
        from meses as m 
        left join orden_interna as oi on month(oi.fecha_inicio) = m.id and year(oi.fecha_inicio) = year(current_date()) 
        group by m.id";
        return $this->c_conectar->get_json_rows($sql);
    }

    public function verMontoPorFacturar()
    {
        $sql = "select sum(oi.monto_aprobado - oi.monto_facturado) as total
        from orden_interna as oi
        where estado = 1";
        return $this->c_conectar->get_json_rows($sql);
    }
}