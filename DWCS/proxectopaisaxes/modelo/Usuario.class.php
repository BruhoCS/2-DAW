<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade 
    
    @Autor: NON TOCAR!!!

    @Data modificación: 08/11/2024

    @Versión 1.0 

    IMPORTANTE >>>>>>>>>>>>>>>>>>>>>>> ESTA PÁXINA NON É MODIFICABLE!!!

*/

class Usuario {
  public ?int $id;
  public ?string $nome;
  public ?string $apelidos;
  public ?string $login;  
  public ?string $hashContrasinal;
  public ?string $rol;
  public ?string $email;
  
  public function __construct(?int $id = null, ?string $nome = null, ?string $apelidos = null, ?string $login = null, ?string $hashContrasinal = null, ?string $rol = null, ?string $email = null) {
    $this->id = $id;
    $this->nome = $nome;
    $this->apelidos = $apelidos;
    $this->login = $login;
    $this->hashContrasinal = $hashContrasinal;
    $this->rol = $rol;
    $this->email = $email;
  }
}
?>