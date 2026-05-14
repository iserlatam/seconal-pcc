<div>

    <!-- Welcome Section -->
    <header class="mb-lg max-w-3xl">
        <h1 class="font-headline-xl text-headline-xl text-primary mb-sm">Consulta de Certificados</h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant mb-xs">Bienvenido al portal de validación de
            Seguridad con Altura.</p>
        <p class="font-body-md text-body-md text-outline">Ingrese su número de documento para verificar la validez y
            los detalles de sus certificaciones de trabajo en alturas.</p>
    </header>
    <!-- Query Section (2 Columns) -->
    <section class="gap-gutter grid grid-cols-1 items-start lg:grid-cols-12">
        <!-- Left Column: Search Form -->
        <div class="bg-surface-container-low border-outline-variant p-lg rounded-DEFAULT border lg:col-span-3">
            <div class="gap-sm flex flex-col">
                <label class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider"
                    for="doc-number">Número de Documento</label>
                <div class="relative">
                    <span
                        class="material-symbols-outlined left-sm text-outline absolute top-1/2 -translate-y-1/2">badge</span>
                    <input
                        wire:keydown.enter="consult"
                        wire:model.live.debounce.500ms='document'
                        class="pl-xl pr-sm py-md border-outline focus:border-primary focus:ring-primary bg-surface-container-lowest text-body-md placeholder:text-outline-variant w-full border outline-none transition-all focus:ring-1"
                        id="doc-number" placeholder="Ej. 12345678" type="text" />
                </div>
                <!-- ... (Botón de búsqueda) ... -->
                <button wire:click="consult" wire:loading.attr="disabled" class="bg-secondary-container text-on-secondary-fixed font-headline-md text-headline-md py-md gap-xs border-secondary flex w-full items-center justify-center rounded-DEFAULT border shadow-sm transition-all hover:opacity-90 active:opacity-80">
                    <span wire:loading.remove wire:target="consult" class="material-symbols-outlined">search</span>
                    <!-- Spinner simple mientras carga -->
                    <svg wire:loading wire:target="consult" class="animate-spin h-5 w-5 text-current" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Buscar</span>
                </button>
            </div>
            <div class="mt-lg pt-sm border-outline-variant border-t">
                <div class="gap-sm flex items-start">
                    <span class="material-symbols-outlined text-primary" data-weight="fill">verified_user</span>
                    <div class="w-full min-w-0">
                        <h4 class="font-label-md text-label-md text-primary mb-xs">NOTA OFICIAL</h4>
                        <p class="font-body-sm text-body-sm text-on-surface-variant w-auto">Este sistema está sincronizado
                            y siempre al día con los registros de nuestros alumnos. Recuerde que el sitio oficial
                            para validar las certificaciones es</p>
                        <a href="https://servicios.seconal.net/empresas/consultas/certificaciones"
                        class="underline break-all">
                            https://servicios.seconal.net/empresas/consultas/certificaciones
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right Column: Data Table -->
        <div
            class="border-outline-variant bg-surface-container-lowest overflow-hidden rounded-DEFAULT border shadow-sm lg:col-span-9">
            <div class="overflow-x-auto">
                <table class="w-full border-collapse text-left min-w-max">
                    <thead class="bg-inverse-surface text-on-primary-fixed">
                        <tr>
                            <th
                                class="px-sm py-md font-label-md text-label-md text-surface-container-lowest whitespace-nowrap uppercase">
                                Nombre Completo</th>
                            <th
                                class="px-sm py-md font-label-md text-label-md text-surface-container-lowest whitespace-nowrap uppercase">
                                Tipo Doc</th>
                            <th
                                class="px-sm py-md font-label-md text-label-md text-surface-container-lowest whitespace-nowrap uppercase">
                                Número Doc</th>
                            <th
                                class="px-sm py-md font-label-md text-label-md text-surface-container-lowest whitespace-nowrap uppercase">
                                Fecha</th>
                            <th
                                class="px-sm py-md font-label-md text-label-md text-surface-container-lowest whitespace-nowrap uppercase">
                                Dpto.</th>
                            <th
                                class="px-sm py-md font-label-md text-label-md text-surface-container-lowest whitespace-nowrap uppercase">
                                Ciudad</th>
                            <th
                                class="px-sm py-md font-label-md text-label-md text-surface-container-lowest uppercase">
                                Curso</th>
                            <th
                                class="px-sm py-md font-label-md text-label-md text-surface-container-lowest whitespace-nowrap uppercase">
                                Código Certificado</th>
                        </tr>
                    </thead>
                    <tbody wire:loading.class="opacity-50 blur-[2px]" class="divide-outline-variant z-10 divide-y relative">
                        @forelse ($this->certificaciones as $certificado)
                            <tr wire:loading.remove wire:target="consult" class="hover:bg-surface-container-low group transition-colors">
                                <td class="px-sm py-md font-body-sm text-body-sm text-on-surface">
                                    {{ $certificado['nombre_completo'] }}
                                </td>

                                <td class="px-sm py-md font-body-sm text-body-sm text-on-surface-variant uppercase">
                                    {{ $certificado['tipo_doc'] }}
                                </td>
                                <td class="px-sm py-md font-body-sm text-body-sm text-on-surface">
                                    {{ $certificado['documento'] }}
                                </td>
                                <td class="px-sm py-md font-body-sm text-body-sm text-on-surface-variant">
                                    {{ \Carbon\Carbon::parse($certificado['fecha_creacion'])->format('d M Y') }}
                                </td>
                                <td class="uppercase px-sm py-md font-body-sm text-body-sm text-on-surface-variant">
                                    {{ $certificado['departamento'] }}
                                </td>
                                <td class="uppercase px-sm py-md font-body-sm text-body-sm text-on-surface-variant">
                                    {{ $certificado['ciudad'] }}
                                </td>
                                <td class="px-sm py-md">
                                    <span
                                        class="uppercase bg-primary-container px-xs font-label-md text-label-md text-on-primary-container flex justify-center items-center rounded-full py-1">
                                        {{ $certificado['curso'] }}
                                    </span>
                                </td>
                                <td class="px-sm py-md font-body-sm text-body-sm text-primary font-bold">
                                    {{ $certificado['codigo_certificado'] }}
                                </td>
                            </tr>
                        @empty
                            <!-- Zebra Pattern Placeholder -->
                            <tr class="bg-surface-container-low hover:bg-surface-container-high transition-colors">
                                <td class="px-sm py-md font-body-sm text-outline text-center italic" colspan="9">
                                    {{ empty($this->documento) ? 'Ingrese un documento para ver resultados...' : 'No se encontraron certificados para este documento.' }} </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Informational Cards -->
    <section class="mt-xl gap-gutter grid grid-cols-1 md:grid-cols-3">
        <div class="border-outline-variant p-lg rounded-DEFAULT border bg-white">
            <span class="material-symbols-outlined text-primary mb-sm text-[40px]"
                data-icon="construction">construction</span>
            <h3 class="font-headline-md text-headline-md mb-xs">Equipos Certificados</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant">Todos nuestros cursos incluyen el uso de
                equipos de última tecnología y de maxima calidad</p>
        </div>
        <div class="border-outline-variant p-lg rounded-DEFAULT border bg-white">
            <span class="material-symbols-outlined text-primary mb-sm text-[40px]"
                data-icon="engineering">engineering</span>
            <h3 class="font-headline-md text-headline-md mb-xs">Instructores Senior</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant">Personal altamente calificado con
                años de experiencia en el sector industrial y de rescate.</p>
        </div>
        <div class="border-outline-variant p-lg rounded-DEFAULT border bg-white">
            <span class="material-symbols-outlined text-primary mb-sm text-[40px]"
                data-icon="cloud_done">cloud_done</span>
            <h3 class="font-headline-md text-headline-md mb-xs">Respaldo Digital</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant">Sus certificados están seguros y
                disponibles 24/7 en nuestra plataforma en la nube para auditorías inmediatas.</p>
        </div>
    </section>
</div>
