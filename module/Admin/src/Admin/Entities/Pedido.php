<?php

namespace Admin\Entities;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Pedido
 *
 * @ORM\Table(name="pedido", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_pedido_user1_idx", columns={"user_id"}), @ORM\Index(name="fk_pedido_pedido_status1_idx", columns={"pedido_status_id"}), @ORM\Index(name="fk_pedido_frete1_idx", columns={"frete_id"})})
 * @ORM\Entity
 */
class Pedido
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
     * @ORM\Column(name="valor_total", type="float", precision=9, scale=2, nullable=false)
     */
    private $valorTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_pago", type="string", length=45, nullable=false)
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
     * @ORM\Column(name="data_upd", type="datetime", nullable=false)
     */
    private $dataUpd;

    /**
     * @var float
     *
     * @ORM\Column(name="valor_frete", type="float", precision=9, scale=2, nullable=false)
     */
    private $valorFrete;

    /**
     * @var string
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    /**
     * @var \Frete
     *
     * @ORM\ManyToOne(targetEntity="Frete")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="frete_id", referencedColumnName="id")
     * })
     */
    private $frete;

    /**
     * @var \PedidoStatus
     *
     * @ORM\ManyToOne(targetEntity="PedidoStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pedido_status_id", referencedColumnName="id")
     * })
     */
    private $pedidoStatus;

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
	
	public function getValorTotal() {
		return $this->valorTotal;
	}
	
	public function setValorTotal(float $valorTotal) {
		$this->valorTotal = $valorTotal;
	}
	
	public function getValorPago() {
		return $this->valorPago;
	}
	
	public function setValorPago($valorPago) {
		$this->valorPago = $valorPago;
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
	public function getValorFrete() {
		return $this->valorFrete;
	}
	
	public function setValorFrete(float $valorFrete) {
		$this->valorFrete = $valorFrete;
	}
	
	public function getObs() {
		return $this->obs;
	}
	
	public function setObs($obs) {
		$this->obs = $obs;
		return $this;
	}
	
	public function getFrete() {
		return $this->frete;
	}
	
	public function setFrete(\Frete $frete) {
		$this->frete = $frete;
	}
	
	public function getPedidoStatus() {
		return $this->pedidoStatus;
	}
	
	public function setPedidoStatus(\PedidoStatus $pedidoStatus) {
		$this->pedidoStatus = $pedidoStatus;
	}
	
	public function getUser() {
		return $this->user;
	}
	
	public function setUser(\User $user) {
		$this->user = $user;
	}
    
}

