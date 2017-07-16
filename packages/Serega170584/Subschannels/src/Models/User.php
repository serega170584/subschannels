<?php
namespace Serega170584\Subschannels\Models;

use App\User as EasyUser;

/**
 * Class User
 * @package Serega170584\Subschannels\Models
 * @property \Serega170584\Subschannels\Models\Subschannels[] $subschannels
 */
class User extends EasyUser
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subschannels()
    {
        return $this->belongsToMany(
            'Serega170584\Subschannels\Models\Subschannels',
            'subscribe_channels_to_users',
            'user_id',
            'subscribe_channel_id'
        );
    }

    /**
     * @param \Serega170584\Subschannels\Models\Subschannels $subchannel
     * @return bool
     */
    public function hasSubschannel($subschannel)
    {
        foreach ($this->subschannels as $item) {
            if ($item->id == $subschannel->id) {
                return true;
            }
        }
        return false;
    }

}

