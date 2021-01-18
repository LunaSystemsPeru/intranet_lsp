<?php

require_once 'cl_conectar.php';

class cl_pago_frecuente
{
    private $id;
    private $fecha_recordatorio;
    private $monto;
    private $pagado;
    private $id_proveedor;
    private $servicio;
    private $frecuencia;
    private $estado;
    private $id_clasificacion;
    private $c_conectar;

    /**
     * cl_pago_frecuente constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
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

    /**
     * @return mixed
     */
    public function getFechaRecordatorio()
    {
        return $this->fecha_recordatorio;
    }

    /**
     * @param mixed $fecha_recordatorio
     */
    public function setFechaRecordatorio($fecha_recordatorio)
    {
        $this->fecha_recordatorio = $fecha_recordatorio;
    }

    /**
     * @return mixed
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * @param mixed $monto
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
    }

    /**
     * @return mixed
     */
    public function getPagado()
    {
        return $this->pagado;
    }

    /**
     * @param mixed $pagado
     */
    public function setPagado($pagado)
    {
        $this->pagado = $pagado;
    }

    /**
     * @return mixed
     */
    public function getIdProveedor()
    {
        return $this->id_proveedor;
    }

    /**
     * @param mixed $id_proveedor
     */
    public function setIdProveedor($id_proveedor)
    {
        $this->id_proveedor = $id_proveedor;
    }

    /**
     * @return mixed
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /**
     * @param mixed $servicio
     */
    public function setServicio($servicio)
    {
        $this->servicio = $servicio;
    }

    /**
     * @return mixed
     */
    public function getFrecuencia()
    {
        return $this->frecuencia;
    }

    /**
     * @param mixed $frecuencia
     */
    public function setFrecuencia($frecuencia)
    {
        $this->frecuencia = $frecuencia;
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
    public function getIdClasificacion()
    {
        return $this->id_clasificacion;
    }

    /**
     * @param mixed $id_clasificacion
     */
    public function setIdClasificacion($id_clasificacion)
    {
        $this->id_clasificacion = $id_clasificacion;
    }

    public function obtener_id()
    {
        $sql = "select ifnull(max(id_frecuente) + 1, 1) as codigo 
        from pagos_frecuentes";
        $this->id = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtener_datos()
    {
        $sql = "select * 
        from pagos_frecuentes 
        where id_frecuente = '$this->id'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->fecha_recordatorio =  $resultado['fecha_recordatorio'];
        $this->monto = $resultado['monto'];
        $this->pagado = $resultado['pagado'];
        $this->id_proveedor = $resultado['id_proveedor'];
        $this->servicio = $resultado['servicio'];
        $this->frecuencia = $resultado['frecuencia'];
        $this->estado = $resultado['estado'];
        $this->id_clasificacion = $resultado['id_clasificacion'];
    }

    public function insertar()
    {
        $sql = "insert into pagos_frecuentes values ('$this->id', '$this->fecha_recordatorio', '$this->monto', '0', '$this->id_proveedor', '$this->servicio', '$this->frecuencia', 1, '$this->id_clasificacion')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function pasar_pago()
    {
        $sql = "update pagos_frecuentes set fecha_recordatorio = date_add(fecha_recordatorio, interval 1 month), pagado = 0 
        where id_frecuente = '$this->id'";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function verFilasJson() {
        $sql = "select pf.id_frecuente,pf.fecha_recordatorio, concat(p.razon_social, ' | ' , pf.servicio, ' | ' , cm.nombre, ' | ' , if(pf.frecuencia = 1, 'MENSUAL', 'ANUAL') ) as datos_servicio, 
            pf.monto as total, (pf.pagado / pf.monto) as porcentaje_pagado, (pf.monto - pf.pagado) as pendiente, datediff(pf.fecha_recordatorio, curdate()) as dias_faltante
            from pagos_frecuentes as pf 
            inner join clasificacion_movimientos cm on pf.id_clasificacion = cm.id_clasificacion 
            inner join proveedores p on pf.id_proveedor = p.id_proveedor 
            where (pf.fecha_recordatorio <= curdate() or month(pf.fecha_recordatorio) <= month(curdate())) and pf.estado = 1";
        //month(pf.fecha_recordatorio) <= month(curdate()) and
        return $this->c_conectar->get_json_rows($sql);
    }

}