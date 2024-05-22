<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Producto;
use App\Models\SubProducto;

class ExcelController extends Controller
{
    public function importExcel(Request $request)
    {
        // Validar el archivo cargado
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        // Cargar el archivo Excel
        $path = $request->file('file')->getRealPath();
        $spreadsheet = IOFactory::load($path);

        // Obtener la primera hoja activa
        $sheet = $spreadsheet->getActiveSheet();

        foreach ($sheet->getRowIterator() as $index => $row) {
            // Saltar la primera fila si contiene encabezados
            if ($index == 1) {
                continue;
            }
        
            // Iterar sobre cada celda en la fila
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            $rowData = [];
        
            foreach ($cellIterator as $cell) {
                // Obtener el valor de la celda
                $value = $cell->getValue();
        
                // Verificar si el valor de la celda no es nulo ni una cadena vacía
                if ($value !== null && $value !== '') {
                    $rowData[] = $value;
                }
            }
        
            // Verificar que el array $rowData tenga al menos 5 elementos
            if (count($rowData) < 6) {
                continue;
            }
        
            // Asumir que el archivo Excel tiene las columnas en el orden correcto:
            // producto, codigo, tamaño, pack, codBarra, orden
            $productoNombre = $rowData[0];
            $codigo = $rowData[1];
            $tamaño = $rowData[2];
            $pack = $rowData[3];
            $codBarra = $rowData[4];
            $productoOrden = $rowData[5];

            // Buscar o crear el producto
            $producto = Producto::where('nombre', $productoNombre)->first();

            // Verificar si el producto ya existe
            if ($producto) {
                // Si el producto ya existe, actualiza el orden
                $producto->update(['orden' => $productoOrden]);
            } else {
                // Si el producto no existe, crea uno nuevo
                $producto = Producto::create(['nombre' => $productoNombre, 'orden' => $productoOrden, 'destacado' => 0]);
            }
        
            // Crear el subproducto asociado
            SubProducto::create([
                'producto_id' => $producto->id,
                'codigo' => $codigo,
                'tamaño' => $tamaño,
                'pack' => $pack,
                'codBarra' => $codBarra,
            ]);
        }

        return response()->json(['message' => 'Datos importados exitosamente!'], 200);
    }
}
