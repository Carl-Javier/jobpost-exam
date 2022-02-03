<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'jobs';

    const PUBLISHED = 1;
    const UNPUBLISHED = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'company_name',
        'salary_details',
        'description',
        'is_published',
        'expiration_date',
        'published_date',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tags::class)->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function types()
    {
        return $this->belongsToMany(JobTypes::class, 'jobs_types'
            , 'jobs_id', 'types_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function countries()
    {
        return $this->belongsToMany(Country::class, 'countries_jobs'
            , 'jobs_id', 'countries_id')->withTimestamps();
    }
}
