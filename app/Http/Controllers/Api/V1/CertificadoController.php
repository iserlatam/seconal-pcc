<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\CertificadoCollection;
use App\Http\Resources\Api\V1\CertificadoResource;
use App\Models\Certificado;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): ResourceCollection
    {
        return CertificadoResource::collection(Certificado::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $documento)
    {
        return Certificado::where('documento', $documento)->get()->toResourceCollection(CertificadoResource::class);
    }
}
