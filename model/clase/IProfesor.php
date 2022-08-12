<?php

interface IProfesor{
	public function selectProfesor($id);
	public function insertProfesor(Persona $profesor);
	public function searchProfesor($correo);
	public function updateProfesor(Persona $profesor);
	public function deleteProfesor($id);

}

?>
