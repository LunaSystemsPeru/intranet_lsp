<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 30/07/19
 * Time: 05:39 PM
 */

require_once 'cl_conectar.php';

class cl_orden_interna
{
    private $id_orden_interna;
    private $numero_orden;
    private $fecha_inicio;
    private $duracion;
    private $monto_facturado;
    private $monto_aprobado;
    private $estado;
    private $id_usuario;
    private $id_cotizacion;
    private $c_conectar;

    /**
     * cl_orden_interna constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdOrdenInterna()
    {
        return $this->id_orden_interna;
    }

    /**
     * @param mixed $id_orden_interna
     */
    public function setIdOrdenInterna($id_orden_interna)
    {
        $this->id_orden_interna = $id_orden_interna;
    }

    /**
     * @return mixed
     */
    public function getNumeroOrden()
    {
        return $this->numero_orden;
    }

    /**
     * @param mixed $numero_orden
     */
    public function setNumeroOrden($numero_orden)
    {
        $this->numero_orden = $numero_orden;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * @param mixed $fecha_inicio
     */
    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    /**
     * @return mixed
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * @param mixed $duracion
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    }

    /**
     * @return mixed
     */
    public function getMontoFacturado()
    {
        return $this->monto_facturado;
    }

    /**
     * @param mixed $monto_facturado
     */
    public function setMontoFacturado($monto_facturado)
    {
        $this->monto_facturado = $monto_facturado;
    }

    /**
     * @return mixed
     */
    public function getMontoAprobado()
    {
        return $this->monto_aprobado;
    }

    /**
     * @param mixed $monto_aprobado
     */
    public function setMontoAprobado($monto_aprobado)
    {
        $this->monto_aprobado = $monto_aprobado;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @return mixed
     */
    public function getIdCotizacion()
    {
        return $this->id_cotizacion;
    }

    /**
     * @param mixed $id_cotizacion
     */
    public function setIdCotizacion($id_cotizacion)
    {
        $this->id_cotizacion = $id_cotizacion;
    }

    public function obtener_id()
    {
        $sql = "select ifnull(max(id_orden_interna) + 1, 1) as codigo 
        from orden_interna";
        $this->id_orden_interna = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtener_numero()
    {
        $sql = "select ifnull(max(numero_orden_interna) + 1, concat(year(current_date()), '001')) as codigo 
        from orden_interna where numero_orden_interna like concat(year(current_date()), '%') ";
        $this->numero_orden = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtener_datos()
    {
        $sql = "select *  
        from orden_interna 
        where id_orden_interna = '" . $this->id_orden_interna . "'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->numero_orden = $resultado['numero_orden_interna'];
        $this->fecha_inicio = $resultado['fecha_inicio'];
        $this->duracion = $resultado['duracion'];
        $this->monto_facturado = $resultado['monto_facturado'];
        $this->monto_aprobado = $resultado['monto_aprobado'];
        $this->estado = $resultado['estado'];
        $this->id_usuario = $resultado['id_usuario'];
        $this->id_cotizacion = $resultado['id_cotizacion'];
    }

    public function verTodas()
    {
        $sql = "select oi.numero_orden_interna, oi.id_orden_interna, concat(c.descripcion, ' | ',p.nombre_comercial) as descripcion, oi.fecha_inicio, oi.monto_aprobado, 
oi.monto_facturado, (oi.monto_aprobado - oi.monto_facturado) as diferencia,  (oi.monto_facturado / oi.monto_aprobado) as porcentaje_pago, oi.estado,  date_add(oi.fecha_inicio, interval oi.duracion day) as fecha_termino, 
datediff(date_add(oi.fecha_inicio, interval oi.duracion day), CURRENT_DATE()) as dias_restantes, oi.duracion  
from orden_interna as oi 
inner join cotizaciones as c on c.id_cotizacion = oi.id_cotizacion 
inner join prospectos as p on p.id_prospecto = c.id_prospecto
where oi.estado = 1";
        return $this->c_conectar->get_json_rows($sql);
    }

    public function verPasados()
    {
        $sql = "select oi.numero_orden_interna, oi.id_orden_interna, concat(c.descripcion, ' | ',p.nombre_comercial) as descripcion, oi.fecha_inicio, oi.monto_aprobado, 
oi.monto_facturado, (oi.monto_aprobado - oi.monto_facturado) as diferencia,  (oi.monto_facturado / oi.monto_aprobado) as porcentaje_pago, oi.estado,  date_add(oi.fecha_inicio, interval oi.duracion day) as fecha_termino, 
datediff(date_add(oi.fecha_inicio, interval oi.duracion day), CURRENT_DATE()) as dias_restantes, oi.duracion  
from orden_interna as oi 
inner join cotizaciones as c on c.id_cotizacion = oi.id_cotizacion 
inner join prospectos as p on p.id_prospecto = c.id_prospecto
where oi.estado = 1 and date_add(oi.fecha_inicio, interval oi.duracion day) < curdate()";
        return $this->c_conectar->get_json_rows($sql);
    }

    public function insertar()
    {
        $sql = "insert into orden_interna values ('" . $this->id_orden_interna . "', '" . $this->numero_orden . "', '" . $this->fecha_inicio . "', '" . $this->duracion . "', 
        '0', '" . $this->monto_aprobado . "', 1, '" . $this->id_usuario . "', '" . $this->id_cotizacion . "')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function finalizar()
    {
        $sql = "update orden_interna 
        set estado = 2 
        where id_orden_interna = '" . $this->id_orden_interna . "'";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function ver_ordenes_mensuales()
    {
        $sql = "select DISTINCT(m.id) as mes, ifnull(count(oi.monto_aprobado), 0) as cuenta, ifnull(sum(oi.monto_aprobado), 0) as monto 
from meses as m 
left JOIN orden_interna as oi on month(oi.fecha_inicio) = m.id and year(oi.fecha_inicio) = year(CURRENT_DATE()) 
group by m.id";
        return $this->c_conectar->get_Cursor($sql);
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