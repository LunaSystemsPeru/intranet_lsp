<?php

require_once '../clases/cl_conectar.php';

class cl_venta
{
    private $c_conectar;

    /**
     * cl_venta constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
    }

    public function verVentasDiarias()
    {
        $sql = "select day(v.fecha) as dia, sum(v.monto_total) as total 
        from ventas as v 
        where month(v.fecha) = month(current_date()) and year(v.fecha) = year(current_date())
        group by day(v.fecha)";
        return $this->c_conectar->get_json_rows($sql);
    }

}