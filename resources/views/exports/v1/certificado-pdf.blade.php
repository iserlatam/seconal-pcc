<div style="background-color: #fff">
    <header>
        <h1 style="text-align: center">CERTIFICADO DE CAPACITACIÓN Y ENTRENAMIENTO PARA TRABAJO EN ALTURAS</h1>
        <h2 style="text-align: center">SEGURIDAD CON ALTURA</h2>
        <p style="margin-top: 16px">En cumplimiento de NTC 6072 de 2014 y Resolución 4272 de 2021</p>
        <p style="position: absolute; bottom: 0; right: 0; font-size: 10px;">
            Código: DTA-SGI-F-01
            Versión: 03
            Fecha: 01/02/2023
        </p>
    </header>

    <section id="certificado">
        <p style="margin-top: 16px; text-align: center; font-weight: bold;">Certifica que</p>
        <h3 style="text-align: center; font-weight: bold; font-size: 38px">{{ $record->nombre_completo }}</h3>
        <div>
            @if ($record->tipo_documento === 'cc' || $record->tipo_documento === 'CC')
                <p style="text-align: center;">Cedula de ciudadania</p>
            @elseif ($record->tipo_documento === 'ti')
                <p style="text-align: center;">Tarjeta de identidad</p>
            @elseif ($record->tipo_documento === 'ce')
                <p style="text-align: center;">Cédula de extranjería</p>
            @elseif ($record->tipo_documento === 'pa')
                <p style="text-align: center;">Pasaporte</p>
            @endif
            <p style="text-align: center;">No.: {{ $record->numero_documento }}</p>
        </div>
        <div id="curso">
            <p style="text-align: center; font-weight: bold;">Curso y aprobó la acción de formación:</p>
            <h3 style="text-align: center; font-weight: bold; font-size: 38px">{{ $record->curso }}</h3>
            <p style="text-align: center;">Con una duración de 8 horas</p>
        </div>
    </section>

</div>
