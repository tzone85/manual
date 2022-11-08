<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

/**
 * A question
 * @ORM\Entity
 */
#[ApiResource(
	operations: [
		new Get(),
		new Put(),
		new Patch(),
//	new Delete(),
		new GetCollection(),
		new Post()
	]
)]
class Question
{
	/**
	 * The id of the question
	 *
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private ?int $id = null;

	/**
	 * The contents of the question
	 *
	 * @ORM\Column(type="text")
	 */
	#[NotBlank]
	private string $question = '';

	/**
	 * The date that the question was added
	 *
	 * @ORM\Column(type="datetime")
	 */
	#[NotNull]
	private ?\DateTimeInterface $addedDate = null;

	/**
	 * @var Answer[] Possible answers for this question
	 *
	 * @ORM\OneToMany(
	 *     targetEntity="Answer",
	 *     mappedBy="question",
	 *	 	cascade={"persist", "remove"}
	 *	 )
	 */
	private iterable $answers;

	public function __construct()
	{
		$this->answers = new ArrayCollection();
	}

	public function getQuestion(): string
	{
		return $this->question;
	}

	/**
	 * @return int|null
	 */
	public function getId(): ?int
	{
		return $this->id;
	}

	public function setQuestion(string $question): void
	{
		$this->question = $question;
	}

	public function getAddedDate(): ?\DateTimeInterface
	{
		return $this->addedDate;
	}

	public function setAddedDate(?\DateTimeInterface $addedDate): void
	{
		$this->addedDate = $addedDate;
	}

	/**
	 * @return iterable
	 */
	public function getAnswers(): iterable|ArrayCollection
	{
		return $this->answers;
	}


}