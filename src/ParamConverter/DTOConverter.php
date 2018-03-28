<?php

declare(strict_types=1);

namespace App\ParamConverter;

use JMS\Serializer\Serializer;
use Renlife\ApiTools\Exception\ValidationException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class DTOConverter
 *
 * @package App\ParamConverter
 */
class DTOConverter implements ParamConverterInterface
{
    /**
     * @var ValidatorInterface
     */
    private $validator;
    /**
     * @var Serializer
     */
    private $serializer;

    public function __construct(ValidatorInterface $validator, Serializer $serializer)
    {
        $this->validator  = $validator;
        $this->serializer = $serializer;
    }

    /**
     * Получает переданный JSON,
     * десериализует в объект необходимого класса,
     * валидирует полученный объект и 
     * передает его в объект Request
     *
     * @param Request        $request
     * @param ParamConverter $configuration Contains the name, class and options of the object
     *
     * @return void True if the object has been successfully set, else false
     *              
     * @throws \LogicException
     * @throws ValidationException
     */
    public function apply(Request $request, ParamConverter $configuration)
    {
        $object = $this->deserialize($configuration->getClass(), $request);
        $violations = $this->validator->validate($object);
        if ($violations->count()) {
            throw new ValidationException($violations);
        }
        
        $request->attributes->set($configuration->getName(), $object);
    }

    /**
     * Проверяет подходит ли данный объект для данного конвертера
     *
     * @param ParamConverter $configuration
     *
     * @return void True if the object is supported, else false
     */
    public function supports(ParamConverter $configuration)
    {
        // TODO: Implement supports() method.
    }

    /**
     * Десериализация объекта из переданного JSON в объект переданного класса
     * 
     * @param string  $class
     * @param Request $request
     *
     * @return DTORequestInterface
     * 
     * @throws \LogicException
     */
    private function deserialize(string $class, Request $request): DTORequestInterface
    {
        return $this->serializer->deserialize($request->getContent(), $class, 'json');
    }
}
