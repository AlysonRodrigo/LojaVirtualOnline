<?php

namespace Admin\Entities;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Produto
 *
 * @ORM\Table(name="produto", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_produto_user1_idx", columns={"user_id"}), @ORM\Index(name="fk_produto_categoria1_idx", columns={"categoria_id"})})
 * @ORM\Entity
 */
class Produto
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
     * @ORM\Column(name="nome", type="string", length=200, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=200, nullable=false)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="text", length=65535, nullable=false)
     */
    private $descricao;

    /**
     * @var float
     *
     * @ORM\Column(name="preco", type="float", precision=9, scale=2, nullable=false)
     */
    private $preco;

    /**
     * @var float
     *
     * @ORM\Column(name="peso", type="float", precision=9, scale=2, nullable=false)
     */
    private $peso;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=false)
     */
    private $ativo;

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
     * @var \Categoria
     *
     * @ORM\ManyToOne(targetEntity="Categoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     * })
     */
    private $categoria;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Atributo", inversedBy="produto")
     * @ORM\JoinTable(name="produto_atributo",
     *   joinColumns={
     *     @ORM\JoinColumn(name="produto_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="atributo_id", referencedColumnName="id")
     *   }
     * )
     */
    private $atributo;

    /**
     * Constructor
     */
    public function __construct(array $data)
    {
    	$hydrator = new ClassMethods();
    	$hydrator->hydrate($data, $this);
        $this->atributo = new \Doctrine\Common\Collections\ArrayCollection();
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
	
	public function getSlug() {
		return $this->slug;
	}
	
	public function setSlug($slug) {
		$this->slug = $slug;
	}
	
	public function getDescricao() {
		return $this->descricao;
	}
	
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}
	
	public function getPreco() {
		return $this->preco;
	}
	
	public function setPreco(float $preco) {
		$this->preco = $preco;
	}
	
	public function getPeso() {
		return $this->peso;
	}
	
	public function setPeso(float $peso) {
		$this->peso = $peso;
	}
	
	public function getAtivo() {
		return $this->ativo;
	}
	
	public function setAtivo(boolean $ativo) {
		$this->ativo = $ativo;
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
	
	public function setDataUpd($dataUpd) {
		$this->dataUpd = $dataUpd;
	}
	
	public function getCategoria() {
		return $this->categoria;
	}
	
	public function setCategoria(\Categoria $categoria) {
		$this->categoria = $categoria;
	}
	
	public function getUser() {
		return $this->user;
	}
	
	public function setUser(\User $user) {
		$this->user = $user;
	}
	
	public function getAtributo() {
		return $this->atributo;
	}
	
	public function setAtributo($atributo) {
		$this->atributo = $atributo;
	}
	
}

