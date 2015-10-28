<?php

namespace Admin\Entities;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Mensagem
 *
 * @ORM\Table(name="mensagem", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_mensagem_user1_idx", columns={"user_id"}), @ORM\Index(name="fk_mensagem_pedido1_idx", columns={"pedido_id"})})
 * @ORM\Entity
 */
class Mensagem
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
     * @ORM\Column(name="texto", type="text", length=65535, nullable=false)
     */
    private $texto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_inc", type="datetime", nullable=false)
     */
    private $dataInc;

    /**
     * @var \Pedido
     *
     * @ORM\ManyToOne(targetEntity="Pedido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pedido_id", referencedColumnName="id")
     * })
     */
    private $pedido;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;
    
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
	
	public function getTexto() {
		return $this->texto;
	}
	
	public function setTexto($texto) {
		$this->texto = $texto;
	}
	
	public function getDataInc() {
		return $this->dataInc;
	}
	
	public function setDataInc(\DateTime $dataInc) {
		$this->dataInc = $dataInc;
	}
	
	public function getPedido() {
		return $this->pedido;
	}
	
	public function setPedido(\Pedido $pedido) {
		$this->pedido = $pedido;
	}
	
	public function getUser() {
		return $this->user;
	}
	
	public function setUser(\User $user) {
		$this->user = $user;
	}
	
}

