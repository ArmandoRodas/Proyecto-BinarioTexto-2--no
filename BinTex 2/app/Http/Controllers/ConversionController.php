<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversionController extends Controller
{
    //


    public function convert(Request $request)
    {
        $inputText=$request->input('inputText');
        $conversionType=$request->input('conversionType');
        $outputText='';


        if($conversionType ==='text-to-binary')
        {
            //convertir texto a binario
            $outputText=$this->textToBinary($inputText);
        } elseif($conversionType==='binary-to-text'){
                //convierte texto a binario
                $outputText=$this->binaryToText($inputText);
            }

        return view ('welcome', ['outputText'=>$outputText]); 
    }

   /* private function textToBinary($text)
    {
        $binary='';
        for($i = 0; $i < strlen($text); $i++){
            $binary .= sprintf("%08b", ord ($text[$i])) . '';
        }
        return trim($binary);
    }
    */

    private function textToBinary($text)
{
    $binary = '';
    for ($i = 0; $i < strlen($text); $i++) {
        // Convertir cada carácter a su valor binario de 8 bits
        $binary .= sprintf("%08b", ord($text[$i])) . ' ';
    }
    // Eliminar el último espacio adicional
    return trim($binary);
}





/*    private function binaryToText($binary)
    {
        $text = '';
        $binaries = explode(' ', $binary);
        foreach ($binaries as $bin){
            $text .= chr(bindec($bin));
        }
        return $text;
    }
*/

private function binaryToText($binary)
{
    $text = '';
    // Eliminar cualquier espacio adicional en los extremos
    $binary = trim($binary);
    // Separar el binario en bloques de 8 bits
    $binaries = explode(' ', $binary);
    
    foreach ($binaries as $bin) {
        // Validar que el bloque sea de 8 bits
        if (strlen($bin) == 8) {
            $text .= chr(bindec($bin));
        }
    }
    
    return $text;
}



}
