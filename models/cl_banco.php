<?php

require_once 'cl_conectar.php';

class cl_banco
{
    private $id_banco;
    private $nombre;
    private $cuenta;
    private $monto;
    private $conectar;

    /**
     * cl_banco constructor.
     */
    public function __construct()
    {
        $this->conectar = cl_conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdBanco()
    {
        return $this->id_banco;
    }

    /**
     * @param mixed $id_banco
     */
    public function setIdBanco($id_banco)
    {
        $this->id_banco = $id_banco;
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
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * @param mixed $cuenta
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;
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

    public function obtener_datos()
    {
        $sql = "select *  
        from caja_bancos 
        where id_banco = '" . $this->id_banco . "'";
        $resultado = $this->conectar->get_Row($sql);
        $this->nombre = $resultado['nombre'];
        $this->monto = $resultado['monto'];
        $this->cuenta = $resultado['nro_cuenta'];
    }


    public function verFilas()
    {
        $sql = "select * from caja_bancos order by monto desc";
        return $this->conectar->get_Cursor($sql);
    }

    public function verOtrosBancos()
    {
        $sql = "select * from caja_bancos where id_banco != '$this->id_banco' order by nombre desc";
        return $this->conectar->get_Cursor($sql);
    }

    public function sumaSaldos()
    {
        $sql = "select sum(monto) as saldo from caja_bancos";
        return $this->conectar->get_json_rows($sql);
    }

    public function ver_filas_json()
    {
        $sql = "select * from caja_bancos";
        return $this->conectar->get_json_rows($sql);
    }

}