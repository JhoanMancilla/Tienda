<?php
class Persona
{
	public $id="";
	public $nombre="";
	public $apellido="";
	public $correo="";
	public $clave="";
	public $tipo_persona="";


	public function __construct(){
        $params = func_get_args();
        $num_params = func_num_args();
        $funcion_constructor ='__construct'.$num_params;
        if (method_exists($this,$funcion_constructor)) {
            call_user_func_array(array($this,$funcion_constructor),$params);
        }
    }

    public function __construct4($id,$nombre,$apellido,$correo)
    { 
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setCorreo($correo);
        $this->setId($id);
    }


	public function __construct5($nombre,$apellido,$correo,$clave,$tipo_persona)
    { 
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setCorreo($correo);
        $this->setClave($clave);
        $this->setTipoPersona($tipo_persona);
    }

    public function __construct6($id,$nombre,$apellido,$correo,$clave,$tipo_persona)
    { 
    	$this->setId($id);
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setCorreo($correo);
        $this->setClave($clave);
        $this->setTipoPersona($tipo_persona);
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
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     *
     * @return self
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     *
     * @return self
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @param mixed $clave
     *
     * @return self
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoPersona()
    {
        return $this->tipo_persona;
    }

    /**
     * @param mixed $tipo_persona
     *
     * @return self
     */
    public function setTipoPersona($tipo_persona)
    {
        $this->tipo_persona = $tipo_persona;

        return $this;
    }
}


?>