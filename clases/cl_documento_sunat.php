<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 06/08/19
 * Time: 10:00 AM
 */

require_once 'cl_conectar.php';

class cl_documento_sunat
{
    private $id_documento;
    private $nombre;
    private $abreviatura;
    private $cod_sunat;
    private $c_conectar;

    /**
     * cl_documento_sunat constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getAbreviatura()
    {
        return $this->abreviatura;
    }

    /**
     * @param mixed $abreviatura
     */
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;
    }

    /**
     * @return mixed
     */
    public function getCodSunat()
    {
        return $this->cod_sunat;
    }

    /**
     * @param mixed $cod_sunat
     */
    public function setCodSunat($cod_sunat)
    {
        $this->cod_sunat = $cod_sunat;
    }

    public function obtener_id()
    {
        $sql = "select ifnull(max(id_documento) + 1, 1) as codigo 
        from documentos_sunat";
        $this->id_documento = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtener_datos()
    {
        $sql = "select *  
        from documentos_sunat 
        where id_documento = '" . $this->id_documento. "'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->nombre = $resultado['nombre'];
        $this->abreviatura= $resultado['abreviatura'];
        $this->cod_sunat = $resultado['cod_sunat'];
    }

    public function insertar()
    {
        $sql = "insert into ventas_cobros values ('" . $this->id_cobro . "', '" . $this->id_venta . "', '" . $this->fecha . "', '" . $this->monto . "', 
        '" . $this->id_usuario . "', '" . $this->id_movimiento . "')";
        return $this->c_conectar->ejecutar_idu($sql);
    }
}