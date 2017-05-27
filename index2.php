<?php
class Persona
{
	public $nombre='luis';
	public $apellido;

	public function guardar($nombre,$apellido)
	{
		$this->nombre = $nombre;
		$this->apellido = $apellido;
	}
	public function mostrar()
	{
		echo $this->nombre;
	}
}

$persona = new Persona();
$persona->mostrar();

?>