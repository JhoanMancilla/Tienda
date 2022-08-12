<?php
require_once("Persona.php");

class Profesor extends Persona
{
	public $codigo;
	public $institucion;

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

    public function __construct7($id,$nombre,$apellido,$correo,$clave,$codigo,$institucion)
    { 

        $this->setCodigo($codigo);
        $this->setInstitucion($institucion);
        parent::__construct($id,$nombre,$apellido,$correo);
    }

    public function __construct8($id,$nombre,$apellido,$correo,$clave,$tipo_persona,$codigo,$institucion)
    { 

        $this->setCodigo($codigo);
        $this->setInstitucion($institucion);
        parent::__construct($id,$nombre,$apellido,$correo,$clave,$tipo_persona);
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function setInstitucion($institucion){
        $this->institucion = $institucion;
    }

    public function getInstitucion(){
        return $this->institucion;
    }

}

?>