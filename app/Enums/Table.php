<?php

namespace App\Enums;


enum Table: string
{
    case OAUTH_CLIENTS = 'oauth_clients';
    case OAUTH_PERSONAL_ACCESS_CLIENTS = 'oauth_personal_access_clients';
    case OAUTH_AUTH_CODES = 'oauth_auth_codes';
    case OAUTH_REFRESH_TOKENS = 'oauth_refresh_tokens';
}
