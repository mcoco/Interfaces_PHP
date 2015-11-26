<?php

interface Auto{
	public function encender();
	public function apagar();
}

interface gasolina extends Auto{
	public function vaciartanque();
	public function llenartanque($cant);
}



//va a implementar la interface gasolina y no auto, pues gasolina ya está heredando de auto
class Deportivo implements gasolina{
	private $estado = false;
	private $tanque = 0;

	public function estado(){
		if($this->estado==true){
			print "El coche está encendido y tiene " . $this->tanque ." de litros en el depósito <br>";
		}
		else{
			print "El coche está apagado<br>";
		}
	}


	//pero la interface gasolina hereda de la interface auto, por lo que también debe llevar esos métodos
	public function encender(){
		if($this->estado){
			print "No puedes encender el coche dos veces<br>";
		}
		else{
			if($this->tanque<=0){
				print "No puede encender el auto porque el depósito está vacío<br>";
			}else{

			print "Ahora encendiste el coche<br>";
			$this->estado = true;}
		}
	}


	public function apagar(){
		if($this->estado){
			print "Coche apagado<br>";
			$this->estado = false;
		}
		else{
			print "El coche ya estaba apagado<br>";
		}
	}


	//debe de contener todos los métodos deifinidos por la interface que implementa
	public function vaciartanque(){
		$this->tanque = 0;
	}


	public function llenartanque($cant){
			$this->tanque = $cant;
	}

	public function usar($km){
		if($this->estado==true){
			$reducir = $km/3;
			$this->tanque = $this->tanque-$reducir;
			if($this->tanque<=0){
				//se acabó la gasolina y apagamos el coche
				$this->estado = false;
			}
		

		else{
			print "El coche está apagado por lo que no se puede usar";
		}
	}
	

}


$obj = new Deportivo();
$obj->llenartanque(100);
$obj->encender();
$obj->usar(120); //lo usamos y recorremos 120 km
$obj->estado();


?>