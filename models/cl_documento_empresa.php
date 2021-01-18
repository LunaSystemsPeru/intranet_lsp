<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 05/08/19
 * Time: 05:44 PM
 */

require_once 'cl_conectar.php';

class cl_documento_empresa
{
    private $id_documento;
    private $serie;
    private $numero;
    private $c_conectar;

    /**
     * cl_documento_empresa constructor.
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

    public function obtener_datos()
    {
        $sql = "select *  
        from documentos_empresa 
        where id_documento = '" . $this->id_documento. "'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->serie = $resultado['serie'];
        $this->numero= $resultado['numero'];
    }
}