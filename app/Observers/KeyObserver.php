<?php

namespace App\Observers;

use App\Models\Key;
use Illuminate\Support\Facades\Crypt;

class KeyObserver
{
    public function creating(Key $key)
    {
        $key->pri_key = Crypt::encrypt($key->pri_key);
    }
}
