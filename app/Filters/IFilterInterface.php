<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Http\FormRequest;

interface IFilterInterface
{
    public static function search(FormRequest $request): Builder;
}
