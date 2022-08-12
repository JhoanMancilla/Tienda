<?php
require_once("Persona.php");

class Administrador extends Persona
{
	public $id_administrador=0;
	

	public function __construct(){
        $params = func_get_args();
        $num_params = func_num_args();
        $funcion_constructor ='__construct'.$num_params;
        if (method_exists($this,$funcion_constructor)) {
            call_user_func_array(array($this,$funcion_constructor),$params);
        }
    }

    public function __construct6($id,$nombre,$apellido,$correo,$clave,$tipo_persona)
    {
    	$this->setIdAdministrador($id); 
        parent::__construct($nombre,$apellido,$correo,$clave,$tipo_persona);
    }

    /**
     * @return mixed
     */
    public function getIdAdministrador()
    {
        return $this->id_administrador;
    }

    /**
     * @param mixed $id_administrador
     *
     * @return self
     */
    public function setIdAdministrador($id_administrador)
    {
        $this->id_administrador = $id_administrador;

        return $this;
    }
}

?>