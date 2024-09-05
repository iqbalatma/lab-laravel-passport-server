<?php

namespace App\Models;

use App\Enums\Table;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Laravel\Passport\Client;

/**
 * @property string id
 * @property string user_id
 * @property string name
 * @property string secret
 * @property string redirect
 * @property string personal_access_client
 * @property string password_client
 * @property boolean revoked
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class OauthClient extends Client
{
    use HasUuids;

    protected $table = Table::OAUTH_CLIENTS->value;
    protected $fillable = [
        "user_id", "name", "secret", "redirect", "personal_access_client", "password_client", "revoked"
    ];
}
