<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Bot extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'short_description',
        'long_description',
        'company_id',
        'cashback_fire_percent',
        'cashback_fire_period',
        'welcome_message',
        'bot_domain',
        'bot_token',
        'bot_token_dev',
        'order_channel',
        'main_channel',
        'commands',
        'message_threads',
        'cashback_config',
        'vk_shop_link',
        'callback_link',
        'balance',
        'tax_per_day',
        'image',
        'description',
        'info_link',
        'social_links',
        'is_active',
        'auto_cashback_on_payments',
        'maintenance_message',
        'bot_type_id',
        'level_1',
        'level_2',
        'level_3',
        'blocked_message',
        'payment_provider_token',
        'blocked_at',
        'is_template',
        'template_description',
        'creator_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'cashback_fire_percent' => 'integer',
        'cashback_fire_period' => 'integer',

        'balance' => 'double',
        'tax_per_day' => 'double',
        'social_links' => 'array',
        'message_threads' => 'array',
        'cashback_config' => 'array',
        'commands' => 'array',
        'is_active' => 'boolean',
        'auto_cashback_on_payments' => 'boolean',
        'bot_type_id' => 'integer',
        'level_1' => 'double',
        'level_2' => 'double',
        'level_3' => 'double',
        'blocked_at' => 'datetime:Y-m-d H:i:s',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];




}
