<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * An Answer
 *
 * @ORM\Entity
 */
#[ApiResource]
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
	private ?string $answer = '';

	/**
	 * Date answer was added
	 *
	 * @ORM\Column(type="datetime")
	 */
	private ?\DateTimeInterface $addedDate = null;

	/**
	 * The question to the answer
	 *
	 * @ORM\ManyToOne(
	 *     targetEntity="Question",
	 *     inversedBy="answers")
	 */
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