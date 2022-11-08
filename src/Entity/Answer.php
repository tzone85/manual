<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Common\Filter\SearchFilterInterface;
use ApiPlatform\Doctrine\Orm\Filter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiFilter;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;


/**
 * An Answer
 *
 * @ORM\Entity
 */
#[ApiResource,
 ApiFilter(
	 SearchFilter::class,
	 properties: [
		 'answer' => SearchFilterInterface::STRATEGY_PARTIAL,
		 'question.addedDate' => SearchFilterInterface::STRATEGY_EXACT
	 ]
 ),
	ApiFilter(
		Filter\OrderFilter::class,
		properties: ['answer']
	)
]
class Answer
{

	/**
	 * Id for the answer
	 *
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private ?int $id = null;

	/**
	 * Contents of the answer
	 *
	 * @ORM\Column(type="text")
	 */
	#[NotBlank]
	private ?string $answer = '';

	/**
	 * Date answer was added
	 *
	 * @ORM\Column(type="datetime")
	 */
	#[NotNull]
	private ?\DateTimeInterface $addedDate = null;

	/**
	 * The question to the answer
	 *
	 * @ORM\ManyToOne(
	 *     targetEntity="Question",
	 *     inversedBy="answers")
	 */
	#[NotNull]
	private ?Question $question = null;

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getAnswer(): ?string
	{
		return $this->answer;
	}

	public function setAnswer(?string $answer): void
	{
		$this->answer = $answer;
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
	 * @return Question|null
	 */
	public function getQuestion(): ?Question
	{
		return $this->question;
	}

	/**
	 * @param Question|null $question
	 */
	public function setQuestion(?Question $question): void
	{
		$this->question = $question;
	}

}