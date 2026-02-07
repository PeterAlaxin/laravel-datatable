<?php

namespace PeterAlaxin\DataTable\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property string $table_identifier
 * @property array<mixed>|null $columns
 * @property array<mixed>|null $filters
 * @property string|null $sort_column
 * @property string|null $sort_direction
 * @property int|null $per_page
 * @property int|null $selected_saved_filter_id
 */
class TableSetting extends Model
{
    protected $fillable = [
        'user_id',
        'table_identifier',
        'columns',
        'filters',
        'sort_column',
        'sort_direction',
        'per_page',
        'selected_saved_filter_id',
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
            'columns' => 'array',
            'filters' => 'array',
            'per_page' => 'integer',
        ];
    }
}
