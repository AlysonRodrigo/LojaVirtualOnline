<?php

namespace Admin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Pagamento
 *
 * @ORM\Table(name="pagamento", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_pagamento_pedido1_idx", columns={"pedido_id"}), @ORM\Index(name="fk_pagamento_pagamento_status1_idx", columns={"pagamento_status_id"}), @ORM\Index(name="fk_pagamento_pagamento_tipo1_idx", columns={"pagamento_tipo_id"})})
 * @ORM\Entity
 */
class Pagamento
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
     * @var float
     *
     * @ORM\Column(name="valor_pago", type="float", precision=9, scale=2, nullable=false)
     */
    private $valorPago;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_inc", type="datetime", nullable=false)
     */
    private $dataInc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_upd", type="datetime", nullable=false)
     */
    private $dateUpd;

    /**
     * @var \PagamentoStatus
     *
     * @ORM\ManyToOne(targetEntity="PagamentoStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pagamento_status_id", referencedColumnName="id")
     * })
     */
    private $pagamentoStatus;

    /**
     * @var \PagamentoTipo
     *
     * @ORM\ManyToOne(targetEntity="PagamentoTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pagamento_tipo_id", referencedColumnName="id")
     * })
     */
    private $pagamentoTipo;

    /**
     * @var \Pedido
     *
     * @ORM\ManyToOne(targetEntity="Pedido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pedido_id", referencedColumnName="id")
     * })
     */
    private $pedido;
    
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
	
	public function getValorPago() {
		return $this->valorPago;
	}
	
	public function setValorPago(float $valorPago) {
		$this->valorPago = $valorPago;
	}
	
	public function getDataInc() {
		return $this->dataInc;
	}
	
	public function setDataInc(\DateTime $dataInc) {
		$this->dataInc = $dataInc;
	}
	
	public function getDateUpd() {
		return $this->dateUpd;
	}
	
	public function setDateUpd(\DateTime $dateUpd) {
		$this->dateUpd = $dateUpd;
	}
	
	public function getPagamentoStatus() {
		return $this->pagamentoStatus;
	}
	
	public function setPagamentoStatus(\PagamentoStatus $pagamentoStatus) {
		$this->pagamentoStatus = $pagamentoStatus;
	}
	
	public function getPagamentoTipo() {
		return $this->pagamentoTipo;
	}
	
	public function setPagamentoTipo(\PagamentoTipo $pagamentoTipo) {
		$this->pagamentoTipo = $pagamentoTipo;
	}
	
	public function getPedido() {
		return $this->pedido;
	}
	
	public function setPedido(\Pedido $pedido) {
		$this->pedido = $pedido;
	}
	
}

