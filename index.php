<?php
$profile = [
    'name' => 'Diego Apolo',
    'email' => 'diegoapolo2011@gmail.com',
    'role' => 'Desarrollador de software',
    'location' => 'Machala, Ecuador',
    'bio' => 'Curioso por la tecnologia, la educacion y el desarrollo de software. Tengo 4 años en proyectos de alto impacto dando soporte tecnolgico para aplicaciones web y mobile, mi lenguaje favorito es Javascript y estoy cursando actualmente el 5to semestre de ingenieria en tecnologias de la información en la UTPL.',
    'avatar' => 'assets/image.png',
    'linkedin' => 'https://www.linkedin.com/in/diego-fernando-apolo-guachizaca-324977248/',
];

$hobbies = [
    [
        'name' => 'Jugar futbol',
        'description' => 'Partidos con amigos para despejar la mente y mantener ritmo.',
    ],
    [
        'name' => 'Leer',
        'description' => 'Libros y articulos variados para seguir aprendiendo.',
    ],
    [
        'name' => 'Escribir codigo',
        'description' => 'Disfruto resolver problemas cotidianos y soluciones tecnologicas en mi día a día.',
    ],
    [
        'name' => 'Pasear en el carro',
        'description' => 'Salir a manejar y conocer rutas nuevas.',
    ],
    [
        'name' => 'Aprender idiomas',
        'description' => 'Practicar ingles y abrir espacio a nuevos idiomas.',
    ],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil informativo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white min-h-screen">
    <div class="max-w-5xl mx-auto px-6 py-10">
        <header class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between mb-10">
            <div>
                <p class="text-xs uppercase tracking-[0.35em] text-gray-500">Perfil informativo</p>
                <h1 class="text-3xl md:text-4xl font-bold mt-3">Hola, soy <?= htmlspecialchars($profile['name']) ?></h1>
            </div>
            <div class="w-24 m-auto md:m-0 h-24 md:w-28 md:h-28 rounded-full overflow-hidden border border-gray-700 shadow-2xl bg-gradient-to-br from-green-700/40 to-blue-700/40">
                <img src="<?= htmlspecialchars($profile['avatar']) ?>" alt="Retrato de <?= htmlspecialchars($profile['name']) ?>" class="w-full h-full object-cover">
            </div>
        </header>

        <section class="bg-[#111827] rounded-2xl p-8 shadow-xl mb-8 border border-gray-800">
            <div class="flex flex-col md:flex-row md:items-start gap-8">
                <div class="flex-1">
                    <p class="text-sm text-gray-400 uppercase tracking-wide mb-2">Resumen</p>
                    <h2 class="text-2xl font-semibold mb-3"><?= htmlspecialchars($profile['role']) ?></h2>
                    <p class="text-gray-300 leading-relaxed mb-4"><?= htmlspecialchars($profile['bio']) ?></p>
                    <a href="contact.php" class="px-3 py-2 rounded-full bg-green-700/30 border border-green-800 text-green-100 hover:bg-green-700/50 transition">Ir a contacto →</a>
                </div>
                <div class="bg-gray-900/60 border border-gray-800 rounded-xl p-6 w-full md:w-72">
                    <p class="text-sm text-gray-400 mb-4">Datos personales</p>
                    <dl class="space-y-3">
                        <div>
                            <dt class="text-xs uppercase tracking-wide text-gray-500 mb-1">Correo</dt>
                            <dd class="text-xs font-semibold"><?= htmlspecialchars($profile['email']) ?></dd>
                        </div>
                        <div>
                            <dt class="text-xs uppercase tracking-wide text-gray-500 mb-1">Ubicacion</dt>
                            <dd class="text-xs font-semibold"><?= htmlspecialchars($profile['location']) ?></dd>
                        </div>
                        <div>
                            <dt class="text-xs uppercase tracking-wide text-gray-500 mb-1">LinkedIn</dt>
                            <dd class="text-xs font-semibold">
                                <a href="<?= htmlspecialchars($profile['linkedin']) ?>" target="_blank" rel="noopener noreferrer" class="text-blue-300 hover:text-blue-200 underline decoration-blue-400/70">Ver perfil</a>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </section>

        <section class="bg-[#111827] rounded-2xl p-8 shadow-xl mb-8 border border-gray-800">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <p class="text-sm text-gray-400 uppercase tracking-wide">Hobbies</p>
                    <h3 class="text-2xl font-semibold">Lo que disfruto en mi tiempo libre</h3>
                </div>
            </div>
            <div class="grid gap-3 md:grid-cols-2">
                <?php foreach ($hobbies as $hobby): ?>
                    <div class="flex items-start gap-3 bg-gray-900/60 border border-gray-800 rounded-xl p-4">
                        <div class="w-10 h-10 min-w-10 min-h-10 rounded-full bg-gradient-to-br from-green-700/70 to-blue-700/70 flex items-center justify-center text-lg font-bold">★</div>
                        <div>
                            <h4 class="text-lg font-semibold"><?= htmlspecialchars($hobby['name']) ?></h4>
                            <p class="text-gray-300 text-sm leading-relaxed"><?= htmlspecialchars($hobby['description']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <footer class="mt-10 border-t border-gray-800 pt-8">
            <div class="flex flex-col gap-6">
                <div class="flex items-center gap-3">
                    <span class="h-10 w-10 rounded-full bg-gradient-to-br from-green-700/60 to-blue-700/60 flex items-center justify-center text-lg font-semibold">DA</span>
                    <p class="text-gray-200 font-semibold">Asesoría tecnológica</p>
                </div>
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 text-sm text-gray-300">
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full bg-gray-900/70 border border-gray-800">📧 <?= htmlspecialchars($profile['email']) ?></span>
                        <span class="px-3 py-1 rounded-full bg-gray-900/70 border border-gray-800">📍 <?= htmlspecialchars($profile['location']) ?></span>
                        <span class="px-3 py-1 rounded-full bg-gray-900/70 border border-gray-800">Ultima revision <?= date('Y') ?></span>
                        <a href="contact.php" class="px-3 py-1 rounded-full bg-green-700/30 border border-green-800 text-green-100 hover:bg-green-700/50 transition">Ir a contacto →</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
