<?php

require_once 'cl_conectar.php';

class cl_proveedor
{
    private $id;
    private $documento;
    private $razon_social;
    private $direccion;
    private $total_compra;
    private $total_pagado;
    private $producto;
    private $c_conectar;

    /**
     * cl_proveedor constructor.
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
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * @param mixed $documento
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }

    /**
     * @return mixed
     */
    public function getRazonSocial()
    {
        return $this->razon_social;
    }

    /**
     * @param mixed $razon_social
     */
    public function setRazonSocial($razon_social)
    {
        $this->razon_social = strtoupper($razon_social);
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = strtoupper($direccion);
    }

    /**
     * @return mixed
     */
    public function getTotalCompra()
    {
        return $this->total_compra;
    }

    /**
     * @param mixed $total_compra
     */
    public function setTotalCompra($total_compra)
    {
        $this->total_compra = $total_compra;
    }

    /**
     * @return mixed
     */
    public function getTotalPagado()
    {
        return $this->total_pagado;
    }

    /**
     * @param mixed $total_pagado
     */
    public function setTotalPagado($total_pagado)
    {
        $this->total_pagado = $total_pagado;
    }

    /**
     * @return mixed
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * @param mixed $producto
     */
    public function setProducto($producto)
    {
        $this->producto = $producto;
    }

    public function obtener_id()
    {
        $sql = "select ifnull(max(id_proveedor) + 1, 1) as codigo 
        from proveedores";
        $this->id = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtener_datos()
    {
        $sql = "select * 
        from proveedores 
        where id_proveedor = '$this->id'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->documento =  $resultado['documento'];
        $this->razon_social = $resultado['razon_social'];
        $this->direccion = $resultado['direccion'];
        $this->total_compra = $resultado['total_compra'];
        $this->total_pagado = $resultado['total_pagado'];
        $this->producto = $resultado['producto'];
    }

    public function verFilasJson()
    {
        $sql = "select *
            from proveedores";
        return $this->c_conectar->get_json_rows($sql);
    }

    public function ver_filas_busqueda($termino)
    {
        $sql = "select * 
        from proveedores 
        where razon_social like '%".$termino."%' or documento like '%".$termino."%'";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function insertar()
    {
        $query = "insert into proveedores 
        values ('$this->id', '$this->documento', '$this->razon_social', '$this->direccion', '0', '0', '$this->producto') ";
        return $this->c_conectar->ejecutar_idu($query);
    }

}