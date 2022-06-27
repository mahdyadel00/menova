<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

/**
 * Handling uploads images.
 */
trait UploadImage
{
    /**
     * Upload image.
     *
     * @param \Illuminate\Http\UploadedFile $image
     * @param string $folder
     * @return mixed
     */
    public function uploadImage($image, $folder)
    {
        if (is_null($image)) {
            return null;
        }
        $image->store(self::getStorageImagePath() . '/' . $folder);
        return $image->hashName();
    }

    /**
     * Upload document.
     *
     * @param \Illuminate\Http\UploadedFile $document
     * @param string $folder
     * @return mixed
     */
    public function uploadDocument($document, $folder)
    {
        if (is_null($document)) {
            return null;
        }
        $document->store(self::getStorageDocsPath() . '/' . $folder);
        return $document->hashName();
    }

    /**
     * Remove image from folder.
     *
     * @param string $imageName
     * @param string $folder
     * @return void
     */
    public function deleteImage($imageName, $folder)
    {
        if (!is_null($imageName)) {
            Storage::disk('local')->delete(self::getStorageImagePath() . '/' . $folder . '/' . $imageName);
        }
    }

    /**
     * Remove document from folder.
     *
     * @param string $docName
     * @param string $folder
     * @return void
     */
    public function deleteDocument($docName, $folder)
    {
        if (!is_null($docName)) {
            Storage::disk('local')->delete(self::getStorageDocsPath() . '/' . $folder . '/' . $docName);
        }
    }

    /**
     * Get storage images path.
     *
     * @return string
     */
    public static function getStorageImagePath(): string
    {
        return 'public/uploads/images/';
    }

    /**
     * Get storage documents path.
     *
     * @return string
     */
    public static function getStorageDocsPath(): string
    {
        return 'public/uploads/docs/';
    }
}