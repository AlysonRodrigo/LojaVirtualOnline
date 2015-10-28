<?php

namespace Admin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * EstoqueLog
 *
 * @ORM\Table(name="estoque_log", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_estoque_log_estoque1_idx", columns={"estoque_id"})})
 * @ORM\Entity
 */
class EstoqueLog
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
     * @var \DateTime
     *
     * @ORM\Column(name="data_inc", type="datetime", nullable=false)
     */
    private $dataInc;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantidade", type="integer", nullable=false)
     */
    private $quantidade;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tipo", type="boolean", nullable=false)
     */
    private $tipo;

    /**
     * @var \Estoque
     *
     * @ORM\ManyToOne(targetEntity="Estoque")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estoque_id", referencedColumnName="id")
     * })
     */
    private $estoque;
    
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
	
	public function getDataInc() {
		return $this->dataInc;
	}
	
	public function setDataInc(\DateTime $dataInc) {
		$this->dataInc = $dataInc;
	}
	
	public function getQuantidade() {
		return $this->quantidade;
	}
	
	public function setQuantidade(integer $quantidade) {
		$this->quantidade = $quantidade;
	}
	
	public function getTipo() {
		return $this->tipo;
	}
	
	public function setTipo(boolean $tipo) {
		$this->tipo = $tipo;
	}
	
	public function getEstoque() {
		return $this->estoque;
	}
	
	public function setEstoque(\Estoque $estoque) {
		$this->estoque = $estoque;
	}
	
}

