<?php

namespace App\Models;

use App\Traits\UploadImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory, UploadImage;

    protected $fillable = [
        'title',
        'description',
        'project_type_id',
        'domain_id',
        'image',
        'attachment',
        'user_id'
    ];
    protected $appends = ['image_path', 'attachment_path'];

    #-------------------------------- Attributes -----------------------------------#

    public function getImagePathAttribute()
    {
        if ($this->image) {
            return Storage::url($this->getStorageImagePath() . '/projects/' . $this->image);
        }

        return Storage::url('uploads/images/projects/default.jpg');
    } // end of getImagePathAttribute

    public function getAttachmentPathAttribute()
    {
        if ($this->attachment) {
            return Storage::url($this->getStorageDocsPath() . '/projects/' . $this->attachment);
        }

        return null;
    } // end of getImagePathAttribute

    #-------------------------------- Relations -----------------------------------#

    /**
     * Get the projectType that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function projectType(): BelongsTo
    {
        return $this->belongsTo(ProjectType::class, 'project_type_id');
    } //end of projectType relationships

    /**
     * Get the domain that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class, 'domain_id');
    } //end of domains relationship

    /**
     * Get the user that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
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

    /**
     * Check if user has document.
     *
     * @return boolean
     */
    public function hasDocument(): bool
    {
        return $this->attachment != null;
    }
}//end of model