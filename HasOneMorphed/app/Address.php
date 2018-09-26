<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 * @package App
 * @mixin \Eloquent
 * @property string $type
 * @property int $user_id
 * @property string $street
 * @property string $number
 * @property string $suffix
 * @property string $city
 */
class Address extends Model
{
    //

    public $timestamps = false;
}
