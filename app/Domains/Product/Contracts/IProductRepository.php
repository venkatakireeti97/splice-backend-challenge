<?php

namespace App\Domains\Product\Contracts;

use App\Data\Models\Product;
use App\Domains\Product\ProductNotFoundException;
use Illuminate\Support\Collection;

interface IProductRepository
{
    /**
     * Summary of paginate
     * @param int $perPage
     * @param array $columns
     * @param string $pageName
     * @param mixed $page
     */
    public function paginate(int $perPage = 10, array $columns = ['*'], string $pageName = 'page', $page = null);

    /**
     * Summary of findOrFail
     * @param int $id
     * @return Product
     * 
     * @throws ProductNotFoundException
     */
    public function findOrFail(int $id): Product;


    /**
     * Summary of findFirst
     * @param string $column
     * @param string|int $value
     * @return Product|null
     */
    public function findFirst(string $column, string|int $value): Product|null;

    /**
     * Summary of findAll
     *
     * @return Collection
     */
    public function findAll(): Collection;

    /**
     * @param  int  $id
     * @return Product
     *
     * @throws ProductNotFoundException
     */
    public function findProductOfId(int $id): Product;

    /**
     * Summary of store
     * @param mixed $attributes
     * @param mixed $options
     * @return Product
     */
    public function store(array $attributes = [], array $options = []): Product;

    /**
     * Summary of update
     * @param mixed $attributes
     * @param mixed $options
     * @return Product
     */
    public function update(array $attributes = [], array $options = []): Product;

    /**
     * Summary of destroy
     * @param \App\Data\Models\Product $product
     * @return void
     */
    public function destroy(Product $product);
}
