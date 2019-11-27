<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 26/07/19
 * Time: 07:03 PM
 */

require_once 'cl_conectar.php';

class cl_cotizacion
{
    private $fecha;
    private $numero;
    private $id_cotizacion;
    private $id_prospecto;
    private $descripcion;
    private $duracion;
    private $total;
    private $estado;
    private $id_usuario;
    private $archivo_pdf;
    private $archivo_doc;
    private $tipo_pago;
    private $c_conectar;

    /**
     * cl_cotizacion constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
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
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
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
    public function getArchivoPdf()
    {
        return $this->archivo_pdf;
    }

    /**
     * @param mixed $archivo_pdf
     */
    public function setArchivoPdf($archivo_pdf)
    {
        $this->archivo_pdf = $archivo_pdf;
    }

    /**
     * @return mixed
     */
    public function getArchivoDoc()
    {
        return $this->archivo_doc;
    }

    /**
     * @param mixed $archivo_doc
     */
    public function setArchivoDoc($archivo_doc)
    {
        $this->archivo_doc = $archivo_doc;
    }

    /**
     * @return mixed
     */
    public function getTipoPago()
    {
        return $this->tipo_pago;
    }

    /**
     * @param mixed $tipo_pago
     */
    public function setTipoPago($tipo_pago)
    {
        $this->tipo_pago = $tipo_pago;
    }

    public function obtener_id()
    {
        $sql = "select ifnull(max(id_cotizacion) + 1, 1) as codigo 
        from cotizaciones";
        $this->id_cotizacion = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtener_datos()
    {
        $sql = "select *  
        from cotizaciones 
        where id_cotizacion = '" . $this->id_cotizacion . "'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->fecha = $resultado['fecha'];
        $this->numero = $resultado['numero'];
        $this->id_prospecto = $resultado['id_prospecto'];
        $this->descripcion= $resultado['descripcion'];
        $this->duracion = $resultado['duracion'];
        $this->total = $resultado['total'];
        $this->estado = $resultado['estado'];
        $this->id_usuario = $resultado['id_usuario'];
        $this->archivo_doc= $resultado['archivo'];
        $this->archivo_pdf= $resultado['archivo'];
        $this->tipo_pago = $resultado['tipo_pago'];
    }

    public
    function insertar()
    {
        $query = "insert into cotizaciones values ('" . $this->id_cotizacion . "', '" . $this->fecha . "', '" . $this->numero . "', '" . $this->id_prospecto . "', 
        '" . $this->descripcion . "', '" . $this->duracion . "', '" . $this->total . "', '0', '" . $this->id_usuario . "', '" . $this->archivo_pdf . "', '" . $this->tipo_pago . "') ";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public
    function ver_filas()
    {
        $sql = "select concat(date_format(c.fecha, '%Y%m-%d'), LPAD(c.numero, 2, 0)) as codigo, c.id_cotizacion, concat(p.nombre_comercial, ' | ' , p.datos) as cliente, c.descripcion, c.total, c.estado, c.archivo 
        from cotizaciones as c 
        inner join prospectos as p on p.id_prospecto = c.id_prospecto";
        return $this->c_conectar->get_Cursor($sql);
    }

    public
    function ver_filas_json()
    {
        $sql = "select concat(date_format(c.fecha, '%Y%m-%d'), LPAD(c.numero, 2, 0)) as codigo, c.id_cotizacion, concat(p.nombre_comercial, ' | ' , p.datos) as cliente, c.descripcion, c.total, c.estado, c.archivo 
        from cotizaciones as c 
        inner join prospectos as p on p.id_prospecto = c.id_prospecto";
        $json = $this->c_conectar->get_json_rows($sql);
        return $json;
    }

}