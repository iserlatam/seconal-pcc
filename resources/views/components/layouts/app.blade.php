<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet" />
        <link
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
            rel="stylesheet" />
        <link
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
            rel="stylesheet" />
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        "colors": {
                            "on-tertiary-container": "#fefcff",
                            "inverse-primary": "#62df7d",
                            "surface-container-low": "#f2f4f6",
                            "primary-fixed-dim": "#62df7d",
                            "secondary-fixed-dim": "#efc122",
                            "on-tertiary-fixed-variant": "#3f465c",
                            "primary-fixed": "#7ffc97",
                            "surface-container-high": "#e6e8ea",
                            "on-surface": "#191c1e",
                            "tertiary-fixed-dim": "#bec6e0",
                            "primary": "#006b2c",
                            "surface-bright": "#f7f9fb",
                            "on-error": "#ffffff",
                            "surface-container-highest": "#e0e3e5",
                            "on-error-container": "#93000a",
                            "secondary": "#745b00",
                            "on-tertiary": "#ffffff",
                            "on-primary": "#ffffff",
                            "on-secondary-container": "#705900",
                            "surface-variant": "#e0e3e5",
                            "secondary-fixed": "#ffe089",
                            "surface": "#f7f9fb",
                            "on-primary-fixed-variant": "#005320",
                            "on-primary-fixed": "#002109",
                            "outline": "#6e7a6c",
                            "background": "#f7f9fb",
                            "surface-dim": "#d8dadc",
                            "inverse-surface": "#2d3133",
                            "secondary-container": "#fecf32",
                            "error": "#ba1a1a",
                            "tertiary-container": "#6c748b",
                            "outline-variant": "#bdcaba",
                            "on-secondary": "#ffffff",
                            "on-secondary-fixed-variant": "#574400",
                            "surface-tint": "#006e2d",
                            "on-tertiary-fixed": "#131b2e",
                            "on-background": "#191c1e",
                            "tertiary": "#545c72",
                            "error-container": "#ffdad6",
                            "surface-container": "#eceef0",
                            "on-surface-variant": "#3e4a3d",
                            "tertiary-fixed": "#dae2fd",
                            "on-primary-container": "#f7fff2",
                            "on-secondary-fixed": "#241a00",
                            "surface-container-lowest": "#ffffff",
                            "primary-container": "#008739",
                            "inverse-on-surface": "#eff1f3"
                        },
                        "borderRadius": {
                            "DEFAULT": "0.125rem",
                            "lg": "0.25rem",
                            "xl": "0.5rem",
                            "full": "0.75rem"
                        },
                        "spacing": {
                            "base": "4px",
                            "gutter": "24px",
                            "xs": "8px",
                            "sm": "16px",
                            "margin": "32px",
                            "xl": "80px",
                            "md": "24px",
                            "lg": "48px"
                        },
                        "fontFamily": {
                            "label-md": ["Inter"],
                            "headline-md": ["Inter"],
                            "headline-lg": ["Inter"],
                            "body-lg": ["Inter"],
                            "body-sm": ["Inter"],
                            "headline-xl": ["Inter"],
                            "body-md": ["Inter"]
                        },
                        "fontSize": {
                            "label-md": ["12px", {
                                "lineHeight": "1",
                                "letterSpacing": "0.05em",
                                "fontWeight": "600"
                            }],
                            "headline-md": ["24px", {
                                "lineHeight": "1.3",
                                "fontWeight": "600"
                            }],
                            "headline-lg": ["32px", {
                                "lineHeight": "1.2",
                                "letterSpacing": "-0.01em",
                                "fontWeight": "700"
                            }],
                            "body-lg": ["18px", {
                                "lineHeight": "1.6",
                                "fontWeight": "400"
                            }],
                            "body-sm": ["14px", {
                                "lineHeight": "1.4",
                                "fontWeight": "400"
                            }],
                            "headline-xl": ["48px", {
                                "lineHeight": "1.1",
                                "letterSpacing": "-0.02em",
                                "fontWeight": "700"
                            }],
                            "body-md": ["16px", {
                                "lineHeight": "1.5",
                                "fontWeight": "400"
                            }]
                        }
                    },
                },
            }
        </script>
        <style>
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }

            body {
                font-family: 'Inter', sans-serif;
            }
        </style>
    </head>
    <body>
        <!-- TopNavBar -->
        <nav
            class="bg-surface dark:bg-inverse-surface border-outline-variant dark:border-outline sticky top-0 z-50 w-full border-b">
            <div class="px-margin py-sm mx-auto flex max-w-[1440px] items-center justify-between">
                <div class="gap-xs flex items-center">
                    <img alt="Seguridad con Altura Logo" class="w-36 object-contain"
                        src="/img/logo_seguridadConAltura.png" />
                </div>
                <div class="gap-lg hidden items-center md:flex">
                    <a class="font-body-md text-on-surface-variant dark:text-on-tertiary-fixed-variant hover:text-primary dark:hover:text-primary-fixed cursor-pointer transition-colors"
                        href="https://seguridadconaltura.com/contacto">Contacto</a>
                    <a
                        href="https://seguridadconaltura.com"
                        class="bg-primary text-on-primary px-sm py-sm font-label-md text-label-md cursor-pointer rounded-lg transition-all hover:opacity-90 active:opacity-80">
                        Volver al inicio
                    </a>
                </div>
            </div>
        </nav>
        <main class="px-6 py-lg mx-auto max-w-[1440px]">
            {{ $slot }}
        </main>
        <!-- Footer -->
        <footer class="bg-surface-container-highest dark:bg-inverse-surface border-outline-variant mt-xl border-t">
            <div
                class="px-margin py-lg mx-auto flex w-full max-w-[1440px] flex-col items-center justify-between md:flex-row">
                <div class="mb-md flex flex-col items-center md:mb-0 md:items-start">
                    <span class="font-headline-sm text-headline-sm text-on-surface mb-xs">Seguridad con Altura</span>
                    <span class="font-body-sm text-body-sm text-on-surface-variant dark:text-on-tertiary-fixed-variant">©
                        2026 Seguridad con Altura. Todos los derechos reservados.</span>
                </div>
                <div class="gap-lg flex">
                    <a class="font-body-sm text-body-sm text-on-surface-variant transition-all duration-200 hover:underline"
                        href="https://seguridadconaltura.com/nosotros">Nosotros</a>
                    <a class="font-body-sm text-body-sm text-on-surface-variant transition-all duration-200 hover:underline"
                        href="https://seguridadconaltura.com/contacto">Contacto</a>
                    <a class="font-body-sm text-body-sm text-on-surface-variant transition-all duration-200 hover:underline"
                        href="https://seguridadconaltura.com/servicios">Servicios</a>
                </div>
            </div>
        </footer>
    </body>
</html>
