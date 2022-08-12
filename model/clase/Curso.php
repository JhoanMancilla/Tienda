<?php 

/**
 * summary
 */
class Curso
{
    public $id_curso=0;
    public $codigo_curso="";
    public $fecha_inicio="";
    public $fecha_fin="";
    public $estado="";
    public function __construct(){
        $params = func_get_args();
        $num_params = func_num_args();
        $funcion_constructor ='__construct'.$num_params;
        if (method_exists($this,$funcion_constructor)) {
            call_user_func_array(array($this,$funcion_constructor),$params);
        }
    }

	public function __construct4($id_curso,$codigo_curso,$fecha_inicio,$fecha_fin)
    { 
        $this->setIdCurso($id_curso);
        $this->setCodigoCurso($codigo_curso);
        $this->setFechaInicio($fecha_inicio);
        $this->setFechaFin($fecha_fin);
    }

    /**
     * @return mixed
     */
    public function getIdCurso()
    {
        return $this->id_curso;
    }

    /**
     * @param mixed $id_curso
     *
     * @return self
     */
    public function setIdCurso($id_curso)
    {
        $this->id_curso = $id_curso;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodigoCurso()
    {
        return $this->codigo_curso;
    }

    /**
     * @param mixed $codigo_curso
     *
     * @return self
     */
    public function setCodigoCurso($codigo_curso)
    {
        $this->codigo_curso = $codigo_curso;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * @param mixed $fecha_inicio
     *
     * @return self
     */
    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * @param mixed $fecha_fin
     *
     * @return self
     */
    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;

        return $this;
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
     *
     * @return self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
}

 ?>