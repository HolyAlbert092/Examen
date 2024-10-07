<?php

namespace App\Exports;

use App\Models\contacto;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return contacto::all();
    }

     public function headings(): array
    {
        return ['ID', 'Nombre', 'Dirección','Número','Colonia','CP', 'Ciudad', 'Estado','Teléfono', 'Correo','Latitud','Longitud'];
    }
}
