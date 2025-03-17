<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

trait FileUpload
{
    // función para subir archivo
    public function uploadFile(UploadedFile $file, $directory = 'uploads'): string
    {
        try {

            // Crear un nombre único con la extension del archivo
            $fileName = 'curedu_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // mover archivo al directorio publico
            // $file->move(public_path($directory), $fileName);
            // disk public ver config/filesystems.php
            $file->storeAs($directory, $fileName, ['disk' => 'public']);

            // regresar una ruta completa, por ejemplo uploads/curedu_1.jpg
            return '/' . $directory . '/' . $fileName;

        } catch (Exception $e) {

            throw $e;
            
        }        
    }


    // Función para borrar archivo si está en el servidor regresa true, usar ? para evitar error si string esta vació
    public function deleteFile(?string $path): bool
    {
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
            return true;
        }
        return false;
    }


}