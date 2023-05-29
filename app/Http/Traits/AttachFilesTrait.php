<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait AttachFilesTrait
{
    public function uploadFile($request ,$name , $folder)
    {
        $file_name = $request->file($name)->getClientOriginalName();
       // $request->file($name)->storeAs('attachments/library/', $file_name ,'upload_attachments');
        $request->file($name)->storeAs('attachments/',$folder.'/'.$file_name, 'upload_attachments');
    }

    public function deleteFile($name)
    {
        $exists = Storage::disk('upload_attachments')->exists('attachments/library/'.$name);

        if($exists)
        {
            Storage::disk('upload_attachments')->delete('attachments/library/'.$name);
        }
    }

    public function deleteFileEvent($name)
    {
        $exists = Storage::disk('upload_attachments')->exists('attachments/EventsSchool/'.$name);

        if($exists)
        {
            Storage::disk('upload_attachments')->delete('attachments/EventsSchool/'.$name);
        }
    }

    public function deleteFileNews($name)
    {
        $exists = Storage::disk('upload_attachments')->exists('attachments/NewsSchool/'.$name);

        if($exists)
        {
            Storage::disk('upload_attachments')->delete('attachments/NewsSchool/'.$name);
        }
    }
}