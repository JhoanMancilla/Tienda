<?php

class Ejercicio
{
	public $id="";
	public $titulo="";
	public $descripcion="";
	public $fecha_inicio="";
	public $fecha_fin="";
	public $sin_fecha="";
	public $autor="";
	public $tipo_ejercicio="";
	public $estado="";
    public $id_curso="";


	public function __construct(){
        $params = func_get_args();
        $num_params = func_num_args();
        $funcion_constructor ='__construct'.$num_params;
        if (method_exists($this,$funcion_constructor)) {
            call_user_func_array(array($this,$funcion_constructor),$params);
        }
    }

	public function __construct8($titulo,$descripcion,$fecha_inicio,$fecha_fin,$sin_fecha,$autor,$tipo_ejercicio,$estado)
    { 
        $this->setTitulo($titulo);
        $this->setDescripcion($descripcion);
        $this->setFechaInicio($fecha_inicio);
        $this->setFechaFin($fecha_fin);
        $this->setSinFecha($sin_fecha);
        $this->setAutor($autor);
        $this->setTipoEjercicio($tipo_ejercicio);
        $this->setEstado($estado);
    }

    public function __construct9($id,$titulo,$descripcion,$fecha_inicio,$fecha_fin,$sin_fecha,$autor,$tipo_ejercicio,$id_curso)
    {
        $this->setId($id);
        $this->setTitulo($titulo);
        $this->setDescripcion($descripcion);
        $this->setFechaInicio($fecha_inicio);
        $this->setFechaFin($fecha_fin);
        $this->setSinFecha($sin_fecha);
        $this->setAutor($autor);
        $this->setTipoEjercicio($tipo_ejercicio);
        $this->setIdCurso($id_curso);
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
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     *
     * @return self
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
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
     *
     * @return self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

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
    public function getSinFecha()
    {
        return $this->sin_fecha;
    }

    /**
     * @param mixed $sin_fecha
     *
     * @return self
     */
    public function setSinFecha($sin_fecha)
    {
        $this->sin_fecha = $sin_fecha;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param mixed $autor
     *
     * @return self
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoEjercicio()
    {
        return $this->tipo_ejercicio;
    }

    /**
     * @param mixed $tipo_ejercicio
     *
     * @return self
     */
    public function setTipoEjercicio($tipo_ejercicio)
    {
        $this->tipo_ejercicio = $tipo_ejercicio;

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
}





?>