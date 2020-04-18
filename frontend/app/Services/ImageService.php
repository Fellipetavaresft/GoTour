<?php
 
namespace App\Services;
 
use Image;
 
class ImageService
{
    public function salvarImagem($imagem)
    {
        $nomeImagem = time() . '.' . $imagem->extension();
        $path = public_path('storage/uploads/' . $nomeImagem);
        Image::make($imagem)->resize(330, 230)->save($path);
        return asset('storage/uploads/' . $nomeImagem);
    }
}