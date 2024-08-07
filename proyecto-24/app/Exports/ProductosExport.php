<?php

namespace App\Exports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductosExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Obtener productos que fueron guardados en la sesión o base de datos
        // Si usas sesión:
        // return session('productos');

        // Si los obtienes de la base de datos:
        return Producto::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Almacen',
            'Lote',
            'Categoria',
            'Descripcion',
            'Precio',
            'Cantidad',
        ];
    }
}
