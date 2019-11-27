<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 30/07/19
 * Time: 06:59 PM
 */

require_once 'cl_conectar.php';

class cl_venta
{
    private $id_venta;
    private $periodo;
    private $fecha;
    private $id_prospecto;
    private $id_documento;
    private $serie;
    private $numero;
    private $monto_total;
    private $monto_pagado;
    private $estado;
    private $id_usuario;
    private $archivo;
    private $c_conectar;

    /**
     * cl_venta constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdVenta()
    {
        return $this->id_venta;
    }

    /**
     * @param mixed $id_venta
     */
    public function setIdVenta($id_venta)
    {
        $this->id_venta = $id_venta;
    }

    /**
     * @return mixed
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * @param mixed $periodo
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getIdProspecto()
    {
        return $this->id_prospecto;
    }

    /**
     * @param mixed $id_prospecto
     */
    public function setIdProspecto($id_prospecto)
    {
        $this->id_prospecto = $id_prospecto;
    }

    /**
     * @return mixed
     */
    public function getIdDocumento()
    {
        return $this->id_documento;
    }

    /**
     * @param mixed $id_documento
     */
    public function setIdDocumento($id_documento)
    {
        $this->id_documento = $id_documento;
    }

    /**
     * @return mixed
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getMontoTotal()
    {
        return $this->monto_total;
    }

    /**
     * @param mixed $monto_total
     */
    public function setMontoTotal($monto_total)
    {
        $this->monto_total = $monto_total;
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
    public function getArchivo()
    {
        return $this->archivo;
    }

    /**
     * @param mixed $archivo
     */
    public function setArchivo($archivo)
    {
        $this->archivo = $archivo;
    }

    public function obtener_id()
    {
        $sql = "select ifnull(max(id_venta) + 1, 1) as codigo 
        from ventas";
        $this->id_venta = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtener_numero()
    {
        $sql = "select ifnull(max(periodo_numero) + 1, concat(year('".$this->fecha."'), LPAD(month('".$this->fecha."'), 2, 0), '01')) as codigo 
        from ventas 
        WHERE concat(year(fecha), month(fecha)) like concat(year('".$this->fecha."'), month('".$this->fecha."'), '%')";
        $this->periodo = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtener_datos()
    {
        $sql = "select *  
        from ventas 
        where id_venta = '" . $this->id_venta. "'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->periodo= $resultado['periodo_numero'];
        $this->fecha= $resultado['fecha'];
        $this->id_prospecto = $resultado['id_prospecto'];
        $this->id_documento= $resultado['id_documento'];
        $this->serie= $resultado['serie'];
        $this->numero= $resultado['numero'];
        $this->monto_pagado= $resultado['monto_pagado'];
        $this->monto_total= $resultado['monto_total'];
        $this->estado= $resultado['estado'];
        $this->id_usuario= $resultado['id_usuario'];
    }

    public function ver_filas_json()
    {
        $sql = "select v.periodo_numero, v.id_venta, v.fecha, p.nombre_comercial, ds.abreviatura, v.serie, v.numero, concat(ds.abreviatura, ' | ', lpad(v.serie, 3, 0), ' - ', lpad(v.numero, 5, 0)) as doc_sunat, v.monto_total, v.monto_pagado, v.estado
from ventas as v 
inner join prospectos as p on p.id_prospecto = v.id_prospecto
inner join documentos_sunat as ds on ds.id_documento = v.id_documento";
        return $this->c_conectar->get_json_rows($sql);
    }

    public function insertar()
    {
        $sql = "insert into ventas values ('" . $this->id_venta . "', '" . $this->periodo . "', '" . $this->fecha . "', '" . $this->id_prospecto . "', 
        '" . $this->id_documento. "', '" . $this->serie . "', '" . $this->numero . "', '" . $this->monto_total . "', '0', '1', '" . $this->id_usuario. "', '" . $this->archivo . "')";
        return $this->c_conectar->ejecutar_idu($sql);
    }


}