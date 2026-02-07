<?php

namespace PeterAlaxin\DataTable\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property string $table_identifier
 * @property string $name
 * @property array<mixed>|null $filters
 */
class SavedFilter extends Model
{
    protected $fillable = [
        'user_id',
        'table_identifier',
        'name',
        'filters',
    ];

    /**
     * @return BelongsTo<Model, $this>
     */
    public function user(): BelongsTo
    {
        /** @phpstan-ignore argument.templateType */
        return $this->belongsTo(config('auth.providers.users.model', 'App\\Models\\User'));
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'filters' => 'array',
        ];
    }
}
