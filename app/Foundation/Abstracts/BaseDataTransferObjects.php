<?php

declare(strict_types=1);

namespace App\Foundation\Abstracts;

use App\Foundation\Contracts\IDataTransferObject;
use Illuminate\Http\Request;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Normalizers\ArrayableNormalizer;
use Spatie\LaravelData\Normalizers\ArrayNormalizer;
use Spatie\LaravelData\Normalizers\JsonNormalizer;
use Spatie\LaravelData\Normalizers\ModelNormalizer;
use Spatie\LaravelData\Normalizers\ObjectNormalizer;
use Spatie\LaravelData\Support\Validation\ValidationContext;

abstract class BaseDataTransferObjects extends Data implements IDataTransferObject
{
    public function __construct($data)
    {
    }

    public static function rules(ValidationContext $context): array
    {
        return [];
    }

    public static function fromRequest(Request $request): static
    {
        return self::from([
            ...$request->all()
        ]);
    }

    public static function fromArray(array $data): static
    {
        return new static(...$data);
    }

    public static function normalizers(): array
    {
        return [
            ModelNormalizer::class,
            ArrayableNormalizer::class,
            ObjectNormalizer::class,
            ArrayNormalizer::class,
            JsonNormalizer::class,
        ];
    }
}
