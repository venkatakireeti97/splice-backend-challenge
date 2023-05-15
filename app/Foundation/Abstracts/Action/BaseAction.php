<?php

declare(strict_types=1);

namespace App\Foundation\Abstracts\Action;

use App\Exceptions\DomainException\DomainRecordNotFoundException;
use Illuminate\Http\Response;
use Lorisleiva\Actions\Concerns\AsAction;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

abstract class BaseAction
{
    use AsAction;
    
    public function __construct(protected LoggerInterface $logger)
    {
    }

    /**
     * @throws NotFoundHttpException
     * @throws BadRequestHttpException
     */
    // public function __invoke(): Response {
    //     try {
    //         return $this->execute();
    //     } catch (DomainRecordNotFoundException $e) {
    //         throw new NotFoundHttpException($e->getMessage());
    //     }
    // }

    /**
     * @throws DomainRecordNotFoundException
     * @throws BadRequestHttpException
     */
    // abstract protected function execute();

    /**
     * Summary of respondWithData
     * 
     * @param mixed|null $data
     * @param int $statusCode
     * @return ActionPayload
     */
    protected function respondWithData(mixed $data = null, int $statusCode = 200): ActionPayload
    {
        return new ActionPayload($statusCode, $data);
    }
}
