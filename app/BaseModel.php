<?php

namespace App;

use Cog\Ban\Contracts\HasBans as HasBansContract;
use Cog\Ban\Traits\HasBans;
use Nicolaslopezj\Searchable\SearchableTrait;
use Venturecraft\Revisionable\Revisionable;
use Venturecraft\Revisionable\RevisionableTrait;
use Watson\Rememberable\Rememberable;


abstract class BaseModel extends Revisionable implements HasBansContract
{
    use HasBans, Rememberable, RevisionableTrait, SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
    ];

    /**
     * @var
     */
    protected $rememberFor;

    /**
     * @var bool
     */
    protected $revisionEnabled = true;

    /**
     * @var int
     */
    protected $historyLimit = 1000;

    /**
     * @var bool
     */
    protected $revisionCleanup = true;

    /**
     * @var bool
     */
    protected $revisionCreationsEnabled = true;
}