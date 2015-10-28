<?php

namespace Admin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Estoque
 *
 * @ORM\Table(name="estoque", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_estoque_produto1_idx", columns={"produto_id"})})
 * @ORM\Entity
 */
class Estoque
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
     * @var \DateTime
     *
     * @ORM\Column(name="data_upd", type="datetime", nullable=false)
     */
    private $dataUpd;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantidade", type="integer", nullable=false)
     */
    private $quantidade;

    /**
     * @var \Produto
     *
     * @ORM\ManyToOne(targetEntity="Produto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produto_id", referencedColumnName="id")
     * })
     */
    private $produto;
    
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
	
	public function getDataUpd() {
		return $this->dataUpd;
	}
	
	public function setDataUpd(\DateTime $dataUpd) {
		$this->dataUpd = $dataUpd;
	}
	
	public function getQuantidade() {
		return $this->quantidade;
	}
	
	public function setQuantidade(integer $quantidade) {
		$this->quantidade = $quantidade;
	}
	
	public function getProduto() {
		return $this->produto;
	}
	
	public function setProduto(\Produto $produto) {
		$this->produto = $produto;
	}
	
}

