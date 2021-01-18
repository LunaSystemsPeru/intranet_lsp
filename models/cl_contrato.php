<?php

require_once 'cl_conectar.php';

class cl_contrato
{
    private $id;
    private $id_proveedor;
    private $fecha_inicio;
    private $fecha_fin;
    private $duracion;
    private $monto_pactado;
    private $monto_pagado;
    private $servicio;
    private $estado;
    private $id_clasificacion;
    private $c_conectar;

    /**
     * cl_contrato constructor.
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
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * @param mixed $fecha_fin
     */
    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
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
    public function getMontoPactado()
    {
        return $this->monto_pactado;
    }

    /**
     * @param mixed $monto_pactado
     */
    public function setMontoPactado($monto_pactado)
    {
        $this->monto_pactado = $monto_pactado;
    }

    /**
     * @return mixed
     */
    public function getMontoPagado()
    {
        return $this->monto_pagado;
    }

    /**
     * @param mixed $monto_pagado
     */
    public function setMontoPagado($monto_pagado)
    {
        $this->monto_pagado = $monto_pagado;
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
        $sql = "select ifnull(max(id_contrato) + 1, 1) as codigo 
        from contratos";
        $this->id = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtener_datos()
    {
        $sql = "select * 
        from contratos 
        where id_contrato = '$this->id'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->id_proveedor =  $resultado['id_proveedor'];
        $this->fecha_fin = $resultado['fecha_fin'];
        $this->fecha_inicio = $resultado['fecha_inicio'];
        $this->duracion = $resultado['duracion'];
        $this->monto_pactado = $resultado['monto_pactado'];
        $this->monto_pagado= $resultado['monto_pagado'];
        $this->servicio = $resultado['servicio'];
        $this->estado = $resultado['estado'];
        $this->id_clasificacion = $resultado['id_clasificacion'];
    }

    public function insertar()
    {
        $query = "insert into contratos values ('" . $this->id . "', '" . $this->id_proveedor . "', '" . $this->fecha_inicio . "', '" . $this->duracion . "', 
        '" . $this->fecha_fin . "', '" . $this->monto_pactado . "', '0', '" . $this->servicio . "', '1', '" . $this->id_clasificacion . "') ";
        return $this->c_conectar->ejecutar_idu($query);
    }


    public function verFilasJson()
    {
        $sql = "select c.id_contrato, concat(c.servicio, ' | ', p.razon_social, ' | ', cm.nombre) as servicio,c.fecha_fin, date_add(c.fecha_inicio, INTERVAL c.duracion day) as fecha_fin_aprox, datediff(date_add(c.fecha_inicio, INTERVAL c.duracion day), curdate()) as restantes, c.monto_pactado, (c.monto_pagado / c.monto_pactado) as porcentaje_pagado, (c.monto_pactado - c.monto_pagado) as faltante_pagar, c.estado
            from contratos as c 
            inner join proveedores p on c.id_proveedor = p.id_proveedor 
            inner join clasificacion_movimientos cm on c.id_clasificacion = cm.id_clasificacion and c.estado = 1";
        return $this->c_conectar->get_json_rows($sql);
    }
}