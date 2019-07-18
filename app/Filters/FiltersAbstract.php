<?php

namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class FiltersAbstract
{
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $request;

    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $filters = [];

    /**
     * Undocumented function
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Undocumented function
     *
     * @param Builder $builder
     * @return void
     */
    public function filter(Builder $builder)
    {
        foreach ($this->getFilters() as $filter => $value) {
            $this->resolveFilter($filter)->filter($builder, $value);
        }

        return $builder;
    }

    public function add(array $filters)
    {
        $this->filters = array_merge($this->filters, $filters);

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function getFilters()
    {
        return $this->filterFilters($this->filters);
    }

    /**
     * Undocumented function
     *
     * @param [type] $class
     * @return void
     */
    protected function resolveFilter($filter)
    {
        return new $this->filters[$filter];
    }

    /**
     * Undocumented function
     *
     * @param [type] $filters
     * @return void
     */
    protected function filterFilters($filters)
    {
        return array_filter($this->request->only(array_keys($this->filters)));
    }
}