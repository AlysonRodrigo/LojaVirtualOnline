<?php

namespace Admin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Perfil
 *
 * @ORM\Table(name="perfil", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Perfil
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=60, nullable=false)
     */
    private $nome;

    /**
     * @var integer
     *
     * @ORM\Column(name="perfil_id", type="integer", nullable=true)
     */
    private $perfilId;
    
    public function __construct(array $data){
    
    	$hydrator = new ClassMethods();
    	$hydrator->hydrate($data, $this);
    
    }
    
    public function toArray(){
    	$hydrator = new ClassMethods();
    	return $hydrator->extract($this);
    }
    
	public function getId() {
		return $this->id;
	}
	
	public function getNome() {
		return $this->nome;
	}
	
	public function setNome($nome) {
		$this->nome = $nome;
	}
	
	public function getPerfilId() {
		return $this->perfilId;
	}
	
	public function setPerfilId(integer $perfilId) {
		$this->perfilId = $perfilId;
	}
	
}

