<?php

namespace App\Models;

use App\Traits\UploadImage;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laratrust\Traits\LaratrustUserTrait;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Notifiable, LaratrustUserTrait, UploadImage;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
        'image',
        'accept_policy',
        'profile_completed',
        'summary',
        'location',
        'is_private',
        'domain_id'
    ];

    protected $appends = ['image_path', 'full_name'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => 'array',
    ];

    #-------------------------------- Attributes -----------------------------------#
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    } // end of getNameAttribute

    public function getImagePathAttribute()
    {
        if ($this->image) {
            return Storage::url($this->getStorageImagePath() . '/users/' . $this->image);
        }

        return asset('admin_assets/images/default.png');
    } // end of getImagePathAttribute

    public function getFullNameAttribute()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    } // end of getImagePathAttribute

    #-------------------------------- Scoop -----------------------------------#
    public function scopeWhenRoleId($query, $roleId)
    {
        return $query->when($roleId, function ($q) use ($roleId) {

            return $q->whereHas('roles', function ($qu) use ($roleId) {

                return $qu->where('id', $roleId);
            });
        });
    } // end of scopeWhenRoleId

    #-------------------------------- Relations -----------------------------------#

    /**
     * Get all of the project for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function project(): HasMany
    {
        return $this->hasMany(Project::class, 'user_id');
    }

    /**
     * Get the domain that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class, 'domain_id');
    } // end of domain

    /**
     * Get all of the discusses for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function discusses(): HasMany
    {
        return $this->hasMany(Discuss::class, 'user_id');
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    /**
     * Get all of the likes for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likable');
    }

    #-------------------------------- Functions -----------------------------------#
    /**
     * Check if user has image.
     *
     * @return boolean
     */
    public function hasImage(): bool
    {
        return $this->image != null;
    }
}//end of model