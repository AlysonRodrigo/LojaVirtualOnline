<?php

namespace Admin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Atributo
 *
 * @ORM\Table(name="atributo", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Atributo
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
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tipo_selecao", type="boolean", nullable=false)
     */
    private $tipoSelecao;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Produto", mappedBy="atributo")
     */
    private $produto;

    /**
     * Constructor
     */
    public function __construct(array $data)
    {
    	$hydrator = new ClassMethods();
    	$hydrator->hydrate($data, $this);
        $this->produto = new \Doctrine\Common\Collections\ArrayCollection();
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
	
	public function getTipoSelecao() {
		return $this->tipoSelecao;
	}
	
	public function setTipoSelecao(boolean $tipoSelecao) {
		$this->tipoSelecao = $tipoSelecao;
	}
	
	public function getProduto() {
		return $this->produto;
	}
	
	public function setProduto($produto) {
		$this->produto = $produto;
	}
	

}

