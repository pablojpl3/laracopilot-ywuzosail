@extends('layouts.admin')

@section('title', 'Gestión de Correos')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">Gestión de Correos</h1>
            <p class="text-slate-600">Administra y organiza toda la correspondencia</p>
        </div>
        <div class="flex space-x-3">
            <button class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                <i class="fas fa-plus mr-2"></i>Nuevo Correo
            </button>
            <button class="bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                <i class="fas fa-sync-alt mr-2"></i>Sincronizar
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Total Correos</p>
                    <p class="text-3xl font-bold text-slate-800">1,247</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-envelope text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">No Leídos</p>
                    <p class="text-3xl font-bold text-orange-600">89</p>
                </div>
                <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-envelope-open text-orange-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Con Expediente</p>
                    <p class="text-3xl font-bold text-green-600">892</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-folder-open text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Importantes</p>
                    <p class="text-3xl font-bold text-red-600">156</p>
                </div>
                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-star text-red-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Archivados</p>
                    <p class="text-3xl font-bold text-slate-600">2,341</p>
                </div>
                <div class="w-12 h-12 bg-slate-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-archive text-slate-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Filtros y Búsqueda -->
    <div class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6 mb-8">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="text" placeholder="Buscar correos..." class="pl-10 pr-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent w-80">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400"></i>
                </div>
                
                <select class="px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Todos los estados</option>
                    <option value="unread">No leídos</option>
                    <option value="read">Leídos</option>
                    <option value="important">Importantes</option>
                    <option value="archived">Archivados</option>
                </select>

                <select class="px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Todos los expedientes</option>
                    <option value="with">Con expediente</option>
                    <option value="without">Sin expediente</option>
                </select>

                <input type="date" class="px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex items-center space-x-2">
                <button class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg transition-colors duration-200">
                    <i class="fas fa-filter mr-2"></i>Filtros
                </button>
                <button class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg transition-colors duration-200">
                    <i class="fas fa-download mr-2"></i>Exportar
                </button>
            </div>
        </div>
    </div>

    <!-- Panel Principal de Correos con Separador Redimensionable -->
    <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden">
        <div class="flex h-[800px]">
            <!-- Lista de Correos (Lado Izquierdo) -->
            <div id="emailList" class="flex flex-col border-r border-slate-200" style="width: 45%; min-width: 300px;">
                <!-- Header de la Lista -->
                <div class="p-4 border-b border-slate-200 bg-slate-50">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <h3 class="text-lg font-semibold text-slate-800">Bandeja de Entrada</h3>
                            <span id="widthIndicator" class="text-xs text-slate-500 bg-slate-200 px-2 py-1 rounded-full">45%</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="p-2 hover:bg-slate-200 rounded-lg transition-colors duration-200" title="Marcar todos como leídos">
                                <i class="fas fa-check-double text-slate-600"></i>
                            </button>
                            <button class="p-2 hover:bg-slate-200 rounded-lg transition-colors duration-200" title="Actualizar">
                                <i class="fas fa-sync-alt text-slate-600"></i>
                            </button>
                            <button id="resetWidthBtn" class="p-2 hover:bg-slate-200 rounded-lg transition-colors duration-200" title="Resetear ancho del panel">
                                <i class="fas fa-expand-arrows-alt text-slate-600"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Lista de Correos -->
                <div class="flex-1 overflow-y-auto">
                    <!-- Correo 1 - Con Expediente -->
                    <div class="email-item border-b border-slate-100 p-4 hover:bg-slate-50 cursor-pointer transition-colors duration-200 relative" onclick="selectEmail(1)">
                        <div class="flex items-start space-x-3">
                            <!-- Indicadores Izquierda -->
                            <div class="flex flex-col items-center space-y-1 pt-1">
                                <!-- Indicador de No Leído -->
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                <!-- Icono de Expediente Vinculado -->
                                <div class="w-5 h-5 bg-green-100 rounded-full flex items-center justify-center" title="Expediente vinculado: EXP-2024-001">
                                    <i class="fas fa-folder text-green-600 text-xs"></i>
                                </div>
                            </div>

                            <!-- Contenido del Correo -->
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between mb-1">
                                    <h4 class="text-sm font-semibold text-slate-800 truncate">María González Pérez</h4>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xs text-slate-500">10:30 AM</span>
                                        <button class="opacity-0 group-hover:opacity-100 p-1 hover:bg-slate-200 rounded transition-all duration-200" title="Marcar como importante">
                                            <i class="fas fa-star text-slate-400 text-xs"></i>
                                        </button>
                                    </div>
                                </div>
                                <p class="text-sm text-slate-600 font-medium truncate mb-1">Solicitud de documentación adicional - Expediente EXP-2024-001</p>
                                <p class="text-xs text-slate-500 line-clamp-2">Buenos días, necesito enviar la documentación complementaria para el expediente que tenemos en proceso. Por favor, confirmen la recepción...</p>
                                
                                <!-- Etiquetas -->
                                <div class="flex items-center space-x-2 mt-2">
                                    <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Expediente</span>
                                    <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs rounded-full">Urgente</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Correo 2 - Sin Expediente -->
                    <div class="email-item border-b border-slate-100 p-4 hover:bg-slate-50 cursor-pointer transition-colors duration-200" onclick="selectEmail(2)">
                        <div class="flex items-start space-x-3">
                            <!-- Indicadores Izquierda -->
                            <div class="flex flex-col items-center space-y-1 pt-1">
                                <!-- Sin indicador de no leído (correo leído) -->
                                <div class="w-2 h-2"></div>
                                <!-- Sin icono de expediente -->
                                <div class="w-5 h-5"></div>
                            </div>

                            <!-- Contenido del Correo -->
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between mb-1">
                                    <h4 class="text-sm font-medium text-slate-600 truncate">Carlos Martín López</h4>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xs text-slate-500">Ayer</span>
                                        <button class="opacity-0 group-hover:opacity-100 p-1 hover:bg-slate-200 rounded transition-all duration-200" title="Marcar como importante">
                                            <i class="fas fa-star text-yellow-400 text-xs"></i>
                                        </button>
                                    </div>
                                </div>
                                <p class="text-sm text-slate-500 truncate mb-1">Consulta general sobre servicios</p>
                                <p class="text-xs text-slate-400 line-clamp-2">Hola, me gustaría obtener más información sobre los servicios que ofrecen. ¿Podrían enviarme un catálogo actualizado?</p>
                                
                                <!-- Etiquetas -->
                                <div class="flex items-center space-x-2 mt-2">
                                    <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">Consulta</span>
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 text-xs rounded-full">Importante</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Correo 3 - Con Expediente -->
                    <div class="email-item border-b border-slate-100 p-4 hover:bg-slate-50 cursor-pointer transition-colors duration-200" onclick="selectEmail(3)">
                        <div class="flex items-start space-x-3">
                            <!-- Indicadores Izquierda -->
                            <div class="flex flex-col items-center space-y-1 pt-1">
                                <!-- Indicador de No Leído -->
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                <!-- Icono de Expediente Vinculado -->
                                <div class="w-5 h-5 bg-green-100 rounded-full flex items-center justify-center" title="Expediente vinculado: EXP-2024-015">
                                    <i class="fas fa-folder text-green-600 text-xs"></i>
                                </div>
                            </div>

                            <!-- Contenido del Correo -->
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between mb-1">
                                    <h4 class="text-sm font-semibold text-slate-800 truncate">Ana Rodríguez Silva</h4>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xs text-slate-500">9:15 AM</span>
                                        <button class="opacity-0 group-hover:opacity-100 p-1 hover:bg-slate-200 rounded transition-all duration-200" title="Marcar como importante">
                                            <i class="fas fa-star text-slate-400 text-xs"></i>
                                        </button>
                                    </div>
                                </div>
                                <p class="text-sm text-slate-600 font-medium truncate mb-1">Actualización de estado - Expediente EXP-2024-015</p>
                                <p class="text-xs text-slate-500 line-clamp-2">Le informo que el expediente ha sido actualizado con la nueva documentación. El proceso continúa según lo previsto...</p>
                                
                                <!-- Etiquetas -->
                                <div class="flex items-center space-x-2 mt-2">
                                    <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Expediente</span>
                                    <span class="px-2 py-1 bg-purple-100 text-purple-700 text-xs rounded-full">Actualización</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Correo 4 - Sin Expediente -->
                    <div class="email-item border-b border-slate-100 p-4 hover:bg-slate-50 cursor-pointer transition-colors duration-200" onclick="selectEmail(4)">
                        <div class="flex items-start space-x-3">
                            <!-- Indicadores Izquierda -->
                            <div class="flex flex-col items-center space-y-1 pt-1">
                                <!-- Sin indicador de no leído -->
                                <div class="w-2 h-2"></div>
                                <!-- Sin icono de expediente -->
                                <div class="w-5 h-5"></div>
                            </div>

                            <!-- Contenido del Correo -->
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between mb-1">
                                    <h4 class="text-sm font-medium text-slate-600 truncate">David Fernández Ruiz</h4>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xs text-slate-500">2 días</span>
                                        <button class="opacity-0 group-hover:opacity-100 p-1 hover:bg-slate-200 rounded transition-all duration-200" title="Marcar como importante">
                                            <i class="fas fa-star text-slate-400 text-xs"></i>
                                        </button>
                                    </div>
                                </div>
                                <p class="text-sm text-slate-500 truncate mb-1">Propuesta de colaboración</p>
                                <p class="text-xs text-slate-400 line-clamp-2">Estimados, les escribo para proponer una colaboración estratégica entre nuestras empresas. Creo que podríamos...</p>
                                
                                <!-- Etiquetas -->
                                <div class="flex items-center space-x-2 mt-2">
                                    <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs rounded-full">Propuesta</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Correo 5 - Con Expediente y Archivos Adjuntos -->
                    <div class="email-item border-b border-slate-100 p-4 hover:bg-slate-50 cursor-pointer transition-colors duration-200" onclick="selectEmail(5)">
                        <div class="flex items-start space-x-3">
                            <!-- Indicadores Izquierda -->
                            <div class="flex flex-col items-center space-y-1 pt-1">
                                <!-- Sin indicador de no leído -->
                                <div class="w-2 h-2"></div>
                                <!-- Icono de Expediente Vinculado -->
                                <div class="w-5 h-5 bg-green-100 rounded-full flex items-center justify-center" title="Expediente vinculado: EXP-2024-003">
                                    <i class="fas fa-folder text-green-600 text-xs"></i>
                                </div>
                            </div>

                            <!-- Contenido del Correo -->
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between mb-1">
                                    <h4 class="text-sm font-medium text-slate-600 truncate">Laura Sánchez Moreno</h4>
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-paperclip text-slate-400 text-xs" title="Tiene archivos adjuntos"></i>
                                        <span class="text-xs text-slate-500">3 días</span>
                                        <button class="opacity-0 group-hover:opacity-100 p-1 hover:bg-slate-200 rounded transition-all duration-200" title="Marcar como importante">
                                            <i class="fas fa-star text-slate-400 text-xs"></i>
                                        </button>
                                    </div>
                                </div>
                                <p class="text-sm text-slate-500 truncate mb-1">Documentos finalizados - Expediente EXP-2024-003</p>
                                <p class="text-xs text-slate-400 line-clamp-2">Adjunto los documentos finalizados del expediente. Por favor, revisen y confirmen si todo está correcto...</p>
                                
                                <!-- Etiquetas -->
                                <div class="flex items-center space-x-2 mt-2">
                                    <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Expediente</span>
                                    <span class="px-2 py-1 bg-orange-100 text-orange-700 text-xs rounded-full">Adjuntos</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Más correos... -->
                    <div class="p-4 text-center">
                        <button class="text-blue-600 hover:text-blue-700 font-medium text-sm">
                            Cargar más correos...
                        </button>
                    </div>
                </div>
            </div>

            <!-- Separador Redimensionable - VERSIÓN DEBUG -->
            <div id="resizer" style="width: 20px; background-color: #ff0000; cursor: col-resize; display: flex; align-items: center; justify-content: center; border: 2px solid #000000;" title="SEPARADOR ROJO - ARRASTRA PARA REDIMENSIONAR">
                <div style="width: 4px; height: 60px; background-color: #ffffff; border-radius: 2px;"></div>
            </div>

            <!-- Panel de Vista Previa (Lado Derecho) -->
            <div id="emailPreview" class="flex-1 flex flex-col">
                <!-- Vista previa del correo seleccionado -->
                <div id="emailPreviewContent" class="flex-1 p-6">
                    <!-- Estado inicial - No hay correo seleccionado -->
                    <div id="noEmailSelected" class="h-full flex items-center justify-center">
                        <div class="text-center">
                            <div class="w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-envelope-open text-slate-400 text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-slate-600 mb-2">Selecciona un correo</h3>
                            <p class="text-slate-500">Haz clic en cualquier correo de la lista para ver su contenido completo</p>
                        </div>
                    </div>

                    <!-- Contenido del correo seleccionado -->
                    <div id="selectedEmailContent" class="hidden h-full flex flex-col">
                        <!-- Header del correo -->
                        <div class="border-b border-slate-200 pb-4 mb-6">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-2xl font-bold text-slate-800" id="emailSubject">Solicitud de documentación adicional - Expediente EXP-2024-001</h2>
                                <div class="flex items-center space-x-2">
                                    <button class="p-2 hover:bg-slate-100 rounded-lg transition-colors duration-200" title="Responder">
                                        <i class="fas fa-reply text-slate-600"></i>
                                    </button>
                                    <button class="p-2 hover:bg-slate-100 rounded-lg transition-colors duration-200" title="Reenviar">
                                        <i class="fas fa-share text-slate-600"></i>
                                    </button>
                                    <button class="p-2 hover:bg-slate-100 rounded-lg transition-colors duration-200" title="Archivar">
                                        <i class="fas fa-archive text-slate-600"></i>
                                    </button>
                                    <button class="p-2 hover:bg-slate-100 rounded-lg transition-colors duration-200" title="Eliminar">
                                        <i class="fas fa-trash text-red-500"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                            <span class="text-white font-semibold text-sm" id="senderInitials">MG</span>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-slate-800" id="senderName">María González Pérez</h3>
                                            <p class="text-sm text-slate-500" id="senderEmail">maria.gonzalez@email.com</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-slate-600" id="emailDate">Hoy, 10:30 AM</p>
                                    <div class="flex items-center space-x-2 mt-1" id="emailTags">
                                        <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Expediente</span>
                                        <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs rounded-full">Urgente</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Información del Expediente Vinculado -->
                            <div id="linkedExpediente" class="mt-4 p-3 bg-green-50 border border-green-200 rounded-lg">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-folder text-green-600"></i>
                                    <span class="text-sm font-medium text-green-800">Expediente vinculado:</span>
                                    <a href="#" class="text-sm text-green-600 hover:text-green-700 font-medium" id="expedienteLink">EXP-2024-001 - Tramitación de licencia comercial</a>
                                    <button class="ml-auto text-green-600 hover:text-green-700" title="Ver expediente completo">
                                        <i class="fas fa-external-link-alt text-xs"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Contenido del correo -->
                        <div class="flex-1 overflow-y-auto">
                            <div class="prose max-w-none" id="emailBody">
                                <p>Buenos días,</p>
                                <p>Espero que se encuentren bien. Me pongo en contacto con ustedes para solicitar documentación adicional relacionada con el expediente <strong>EXP-2024-001</strong> que tenemos en proceso.</p>
                                <p>Específicamente, necesitamos:</p>
                                <ul>
                                    <li>Certificado de registro mercantil actualizado</li>
                                    <li>Planos técnicos del local comercial</li>
                                    <li>Informe de impacto ambiental</li>
                                </ul>
                                <p>La documentación debe ser presentada antes del <strong>15 de marzo de 2024</strong> para continuar con el proceso de tramitación.</p>
                                <p>Por favor, confirmen la recepción de este correo y el plazo estimado para el envío de los documentos solicitados.</p>
                                <p>Quedamos a la espera de su respuesta.</p>
                                <p>Saludos cordiales,<br>
                                María González Pérez<br>
                                Departamento de Gestión Documental</p>
                            </div>

                            <!-- Archivos Adjuntos -->
                            <div id="emailAttachments" class="hidden mt-6 p-4 bg-slate-50 rounded-lg">
                                <h4 class="text-sm font-semibold text-slate-800 mb-3">Archivos Adjuntos</h4>
                                <div class="space-y-2">
                                    <div class="flex items-center justify-between p-2 bg-white rounded border">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-file-pdf text-red-500"></i>
                                            <span class="text-sm text-slate-700">documentos_requeridos.pdf</span>
                                            <span class="text-xs text-slate-500">(245 KB)</span>
                                        </div>
                                        <button class="text-blue-600 hover:text-blue-700 text-sm">Descargar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Acciones del correo -->
                        <div class="border-t border-slate-200 pt-4 mt-6">
                            <div class="flex space-x-3">
                                <button class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                                    <i class="fas fa-reply mr-2"></i>Responder
                                </button>
                                <button class="flex-1 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                                    <i class="fas fa-share mr-2"></i>Reenviar
                                </button>
                                <button class="px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg font-semibold transition-colors duration-200">
                                    <i class="fas fa-archive mr-2"></i>Archivar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript para funcionalidad de redimensionamiento y selección de correos -->
<script>
$(document).ready(function() {
    console.log('=== INICIO DEBUG SEPARADOR ===');
    console.log('Document ready - jQuery funcionando');
    console.log('jQuery version:', $.fn.jquery);
    
    // Variables para el redimensionamiento
    let isResizing = false;
    let startX = 0;
    let startWidth = 0;
    
    const emailList = $('#emailList');
    const resizer = $('#resizer');
    const emailPreview = $('#emailPreview');
    
    console.log('Elementos encontrados:', {
        emailList: emailList.length,
        resizer: resizer.length,
        emailPreview: emailPreview.length
    });
    
    // Verificar si los elementos existen
    if (resizer.length === 0) {
        console.error('ERROR: No se encontró el elemento #resizer');
        return;
    }
    
    if (emailList.length === 0) {
        console.error('ERROR: No se encontró el elemento #emailList');
        return;
    }
    
    console.log('Todos los elementos encontrados correctamente');
    
    // Función para actualizar el indicador de ancho
    function updateWidthIndicator() {
        const containerWidth = emailList.parent().width();
        const currentWidth = emailList.width();
        const currentWidthPercent = Math.round((currentWidth / containerWidth) * 100);
        $('#widthIndicator').text(currentWidthPercent + '%');
    }
    
    // Cargar ancho guardado del localStorage
    const savedWidth = localStorage.getItem('emailListWidth');
    if (savedWidth) {
        emailList.css('width', savedWidth + '%');
    }
    
    // Actualizar indicador inicial
    updateWidthIndicator();
    
    // Funcionalidad de redimensionamiento
    resizer.on('mousedown', function(e) {
        console.log('Mouse down en resizer'); // Debug
        isResizing = true;
        startX = e.clientX;
        startWidth = emailList.width();
        
        // Prevenir selección de texto durante el arrastre
        $('body').addClass('select-none');
        
        // Cambiar cursor globalmente
        $('body').css('cursor', 'col-resize');
        
        // Añadir clase para indicar que se está redimensionando
        resizer.addClass('bg-blue-500');
        
        e.preventDefault();
        e.stopPropagation();
    });
    
    // Funcionalidad de doble clic para resetear ancho
    resizer.on('dblclick', function(e) {
        e.preventDefault();
        resetEmailListWidth();
    });
    
    // Función para resetear el ancho del panel de emails
    function resetEmailListWidth() {
        // Animar hacia el ancho por defecto (45%)
        emailList.animate({
            width: '45%'
        }, 300, 'swing', function() {
            // Guardar el ancho reseteado
            localStorage.setItem('emailListWidth', 45);
            updateWidthIndicator();
        });
    }
    
    // Botón para resetear ancho
    $('#resetWidthBtn').on('click', function() {
        resetEmailListWidth();
    });
    
    // Actualizar indicador cuando se redimensiona la ventana
    $(window).on('resize', function() {
        updateWidthIndicator();
    });
    
    // Asegurar que el cursor se muestre correctamente al hacer hover
    resizer.on('mouseenter', function() {
        console.log('Mouse enter en resizer'); // Debug
        $(this).css('cursor', 'col-resize');
    });
    
    resizer.on('mouseleave', function() {
        if (!isResizing) {
            $(this).css('cursor', 'col-resize');
        }
    });
    
    // Test simple de click para verificar que el elemento es clickeable
    resizer.on('click', function(e) {
        console.log('✅ Click en resizer detectado - ELEMENTO FUNCIONA');
        alert('¡El separador funciona! Click detectado.');
        e.preventDefault();
    });
    
    // Test de hover
    resizer.on('mouseenter', function() {
        console.log('✅ Mouse enter en resizer - HOVER FUNCIONA');
    });
    
    resizer.on('mouseleave', function() {
        console.log('✅ Mouse leave en resizer - HOVER FUNCIONA');
    });
    
    $(document).on('mousemove', function(e) {
        if (!isResizing) return;
        
        const containerWidth = emailList.parent().width();
        const deltaX = e.clientX - startX;
        const newWidth = startWidth + deltaX;
        const newWidthPercent = (newWidth / containerWidth) * 100;
        
        // Limitar el ancho mínimo y máximo
        if (newWidthPercent >= 25 && newWidthPercent <= 75) {
            emailList.css('width', newWidthPercent + '%');
            updateWidthIndicator();
        }
    });
    
    $(document).on('mouseup', function() {
        if (isResizing) {
            isResizing = false;
            
            // Restaurar cursor y selección
            $('body').removeClass('select-none').css('cursor', 'default');
            
            // Remover clase de redimensionamiento
            resizer.removeClass('bg-blue-500');
            
            // Guardar ancho en localStorage
            const containerWidth = emailList.parent().width();
            const currentWidth = emailList.width();
            const currentWidthPercent = (currentWidth / containerWidth) * 100;
            localStorage.setItem('emailListWidth', currentWidthPercent);
            updateWidthIndicator();
        }
    });
    
    // Datos de ejemplo para los correos
    const emailsData = {
        1: {
            subject: 'Solicitud de documentación adicional - Expediente EXP-2024-001',
            sender: 'María González Pérez',
            senderEmail: 'maria.gonzalez@email.com',
            initials: 'MG',
            date: 'Hoy, 10:30 AM',
            hasExpediente: true,
            expedienteCode: 'EXP-2024-001',
            expedienteName: 'Tramitación de licencia comercial',
            tags: ['Expediente', 'Urgente'],
            body: `
                <p>Buenos días,</p>
                <p>Espero que se encuentren bien. Me pongo en contacto con ustedes para solicitar documentación adicional relacionada con el expediente <strong>EXP-2024-001</strong> que tenemos en proceso.</p>
                <p>Específicamente, necesitamos:</p>
                <ul>
                    <li>Certificado de registro mercantil actualizado</li>
                    <li>Planos técnicos del local comercial</li>
                    <li>Informe de impacto ambiental</li>
                </ul>
                <p>La documentación debe ser presentada antes del <strong>15 de marzo de 2024</strong> para continuar con el proceso de tramitación.</p>
                <p>Por favor, confirmen la recepción de este correo y el plazo estimado para el envío de los documentos solicitados.</p>
                <p>Quedamos a la espera de su respuesta.</p>
                <p>Saludos cordiales,<br>
                María González Pérez<br>
                Departamento de Gestión Documental</p>
            `
        },
        2: {
            subject: 'Consulta general sobre servicios',
            sender: 'Carlos Martín López',
            senderEmail: 'carlos.martin@email.com',
            initials: 'CM',
            date: 'Ayer, 3:45 PM',
            hasExpediente: false,
            tags: ['Consulta', 'Importante'],
            body: `
                <p>Hola,</p>
                <p>Me gustaría obtener más información sobre los servicios que ofrecen. ¿Podrían enviarme un catálogo actualizado con precios y condiciones?</p>
                <p>Estoy particularmente interesado en:</p>
                <ul>
                    <li>Servicios de consultoría legal</li>
                    <li>Gestión de expedientes</li>
                    <li>Asesoramiento fiscal</li>
                </ul>
                <p>Espero su respuesta.</p>
                <p>Saludos,<br>Carlos Martín López</p>
            `
        },
        3: {
            subject: 'Actualización de estado - Expediente EXP-2024-015',
            sender: 'Ana Rodríguez Silva',
            senderEmail: 'ana.rodriguez@email.com',
            initials: 'AR',
            date: 'Hoy, 9:15 AM',
            hasExpediente: true,
            expedienteCode: 'EXP-2024-015',
            expedienteName: 'Recurso administrativo',
            tags: ['Expediente', 'Actualización'],
            body: `
                <p>Estimados,</p>
                <p>Les informo que el expediente <strong>EXP-2024-015</strong> ha sido actualizado con la nueva documentación presentada.</p>
                <p>El proceso continúa según lo previsto y estimamos que la resolución estará lista en aproximadamente 15 días hábiles.</p>
                <p>Les mantendremos informados de cualquier novedad.</p>
                <p>Atentamente,<br>Ana Rodríguez Silva<br>Departamento Legal</p>
            `
        },
        4: {
            subject: 'Propuesta de colaboración',
            sender: 'David Fernández Ruiz',
            senderEmail: 'david.fernandez@empresa.com',
            initials: 'DF',
            date: 'Hace 2 días',
            hasExpediente: false,
            tags: ['Propuesta'],
            body: `
                <p>Estimados,</p>
                <p>Les escribo para proponer una colaboración estratégica entre nuestras empresas.</p>
                <p>Creo que podríamos complementar muy bien nuestros servicios y ofrecer soluciones integrales a nuestros clientes.</p>
                <p>¿Les gustaría que programemos una reunión para discutir las posibilidades?</p>
                <p>Saludos cordiales,<br>David Fernández Ruiz<br>Director Comercial</p>
            `
        },
        5: {
            subject: 'Documentos finalizados - Expediente EXP-2024-003',
            sender: 'Laura Sánchez Moreno',
            senderEmail: 'laura.sanchez@email.com',
            initials: 'LS',
            date: 'Hace 3 días',
            hasExpediente: true,
            expedienteCode: 'EXP-2024-003',
            expedienteName: 'Constitución de sociedad',
            tags: ['Expediente', 'Adjuntos'],
            hasAttachments: true,
            body: `
                <p>Buenos días,</p>
                <p>Adjunto los documentos finalizados del expediente <strong>EXP-2024-003</strong>.</p>
                <p>Por favor, revisen todo el contenido y confirmen si está correcto antes de proceder con los siguientes pasos.</p>
                <p>Cualquier modificación debe ser comunicada en un plazo máximo de 48 horas.</p>
                <p>Saludos,<br>Laura Sánchez Moreno</p>
            `
        }
    };
    
    // Función para seleccionar correo
    window.selectEmail = function(emailId) {
        // Remover selección anterior
        $('.email-item').removeClass('bg-blue-50 border-l-4 border-l-blue-500');
        
        // Agregar selección al correo actual
        $(`[onclick="selectEmail(${emailId})"]`).addClass('bg-blue-50 border-l-4 border-l-blue-500');
        
        // Obtener datos del correo
        const email = emailsData[emailId];
        if (!email) return;
        
        // Ocultar mensaje de "no seleccionado"
        $('#noEmailSelected').addClass('hidden');
        $('#selectedEmailContent').removeClass('hidden');
        
        // Actualizar contenido
        $('#emailSubject').text(email.subject);
        $('#senderName').text(email.sender);
        $('#senderEmail').text(email.senderEmail);
        $('#senderInitials').text(email.initials);
        $('#emailDate').text(email.date);
        $('#emailBody').html(email.body);
        
        // Actualizar etiquetas
        const tagsHtml = email.tags.map(tag => {
            let colorClass = 'bg-gray-100 text-gray-700';
            if (tag === 'Expediente') colorClass = 'bg-green-100 text-green-700';
            else if (tag === 'Urgente') colorClass = 'bg-blue-100 text-blue-700';
            else if (tag === 'Importante') colorClass = 'bg-yellow-100 text-yellow-700';
            else if (tag === 'Actualización') colorClass = 'bg-purple-100 text-purple-700';
            else if (tag === 'Adjuntos') colorClass = 'bg-orange-100 text-orange-700';
            else if (tag === 'Propuesta') colorClass = 'bg-blue-100 text-blue-700';
            else if (tag === 'Consulta') colorClass = 'bg-gray-100 text-gray-700';
            
            return `<span class="px-2 py-1 ${colorClass} text-xs rounded-full">${tag}</span>`;
        }).join(' ');
        $('#emailTags').html(tagsHtml);
        
        // Mostrar/ocultar información del expediente
        if (email.hasExpediente) {
            $('#linkedExpediente').removeClass('hidden');
            $('#expedienteLink').text(`${email.expedienteCode} - ${email.expedienteName}`);
        } else {
            $('#linkedExpediente').addClass('hidden');
        }
        
        // Mostrar/ocultar archivos adjuntos
        if (email.hasAttachments) {
            $('#emailAttachments').removeClass('hidden');
        } else {
            $('#emailAttachments').addClass('hidden');
        }
        
        // Marcar como leído (remover punto azul)
        $(`[onclick="selectEmail(${emailId})"] .w-2.h-2.bg-blue-500`).removeClass('bg-blue-500').addClass('bg-transparent');
    };
});
</script>

<!-- Estilos CSS adicionales -->
<style>
.select-none {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.email-item:hover .opacity-0 {
    opacity: 1;
}

#resizer {
    cursor: col-resize !important;
    user-select: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    position: relative;
    z-index: 10;
}

#resizer:hover {
    background-color: #3b82f6 !important;
    cursor: col-resize !important;
}

#resizer.bg-blue-500 {
    background-color: #3b82f6 !important;
    box-shadow: 0 0 10px rgba(59, 130, 246, 0.3);
    cursor: col-resize !important;
}

#resizer > * {
    pointer-events: none;
}

#emailList {
    transition: width 0.1s ease-out;
}

#emailPreview {
    transition: flex 0.1s ease-out;
}

.prose {
    color: #374151;
    line-height: 1.6;
}

.prose p {
    margin-bottom: 1rem;
}

.prose ul {
    margin: 1rem 0;
    padding-left: 1.5rem;
    list-style-type: disc;
}

.prose li {
    margin-bottom: 0.5rem;
}

.prose strong {
    font-weight: 600;
    color: #1f2937;
}
</style>
@endsection