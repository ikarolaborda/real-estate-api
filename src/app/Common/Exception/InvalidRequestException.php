<?php

declare(strict_types=1);

namespace App\Common\Exception;

use App\Common\Exception\ClientException;
use App\Common\Exception\Error;
use App\Common\Exception\ExceptionTokens;
use Particle\Validator\ValidationResult;

class InvalidRequestException extends ClientException
{
    /**
     * @param Error[] $errors
     */
    public function __construct(array $errors = [])
    {
        parent::__construct('INVALID_REQUEST', 400, ExceptionTokens::INVALID_REQUEST, $errors);
    }

    public static function fromValidationResult(ValidationResult $result): self
    {
        $errors = [];

        foreach ($result->getMessages() as $field => $fieldErrors) {
            foreach ($fieldErrors as $errorType => $errorMessage) {
                $errors[] = new Error($errorMessage, $field);
            }
        }

        return new self($errors);
    }
}
