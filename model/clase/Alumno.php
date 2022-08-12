<?php
require_once("Persona.php");

class Alumno extends Persona
{
	public $codigo="";
	public $institucion="";

	public function __construct(){
        $params = func_get_args();
        $num_params = func_num_args();
        $funcion_constructor ='__construct'.$num_params;
        if (method_exists($this,$funcion_constructor)) {
            call_user_func_array(array($this,$funcion_constructor),$params);
        }
    }

    public function __construct6($id,$nombre,$apellido,$correo,$codigo,$institucion)
    { 
        $this->setCodigo($codigo);
        $this->setInstitucion($institucion);
        parent::__construct($id,$nombre,$apellido,$correo);
    }


    public function __construct7($nombre,$apellido,$correo,$clave,$tipo_persona,$codigo,$institucion)
    { 
        $this->setCodigo($codigo);
        $this->setInstitucion($institucion);
        parent::__construct($nombre,$apellido,$correo,$clave,$tipo_persona);
    }
    public function __construct8($id,$nombre,$apellido,$correo,$clave,$tipo_persona,$codigo,$institucion)
    { 
        $this->setCodigo($codigo);
        $this->setInstitucion($institucion);
        parent::__construct($id,$nombre,$apellido,$correo,$clave,$tipo_persona);
    }

	

	


    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     *
     * @return self
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInstitucion()
    {
        return $this->institucion;
    }

    /**
     * @param mixed $institucion
     *
     * @return self
     */
    public function setInstitucion($institucion)
    {
        $this->institucion = $institucion;

        return $this;
    }

    
}

?>