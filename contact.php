<?php
require_once __DIR__ . '/src/db.php';

$flash = ['success' => null, 'error' => null];
$errors = ['name' => '', 'email' => '', 'message' => ''];
$name = '';
$email = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim((string)($_POST['name'] ?? ''));
    $email = trim((string)($_POST['email'] ?? ''));
    $message = trim((string)($_POST['message'] ?? ''));

    $nameLen = strlen($name);
    $messageLen = strlen($message);

    if ($name === '') {
        $errors['name'] = 'El nombre es obligatorio.';
    } elseif ($nameLen < 4 || $nameLen > 40) {
        $errors['name'] = 'El nombre debe tener entre 4 y 40 caracteres.';
    }

    if ($email === '') {
        $errors['email'] = 'El correo es obligatorio.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Ingresa un correo valido.';
    }

    if ($message === '') {
        $errors['message'] = 'El mensaje es obligatorio.';
    } elseif ($messageLen < 8 || $messageLen > 120) {
        $errors['message'] = 'El mensaje debe tener entre 8 y 120 caracteres.';
    }

    if (!array_filter($errors)) {
        try {
            $pdo = getDBConnection();
            $stmt = $pdo->prepare('INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)');
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':message' => $message,
            ]);

            $flash['success'] = 'Mensaje enviado y guardado.';
            $name = '';
            $email = '';
            $message = '';
        } catch (Exception $e) {
            $flash['error'] = 'No se pudo guardar el mensaje. Verifica la conexion a la base de datos.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white min-h-screen">
    <div class="max-w-5xl mx-auto px-6 py-10">
        <header class="flex flex-col gap-3 mb-10">
            <div>
                <a href="index.php" class="text-white">← Volver al perfil</a>
            </div>
            <p class="text-xs uppercase tracking-[0.35em] text-gray-500">Contacto</p>
            <h1 class="text-3xl md:text-4xl font-bold">Hablemos</h1>
            <p class="text-gray-400">Completa el formulario para registrar tu mensaje. Respeta el mismo esquema de datos: nombre, correo y mensaje.</p>
        </header>

        <main class="space-y-8">
            <section class="bg-[#111827] rounded-2xl p-8 shadow-xl border border-gray-800">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="flex-1 space-y-3">
                        <p class="text-sm text-gray-400 uppercase tracking-wide">Formulario</p>
                        <h2 class="text-2xl font-semibold">Enviame un mensaje</h2>
                        <p class="text-xs text-gray-500">Los campos marcados con * son obligatorios.</p>
                        <?php if ($flash['success']): ?>
                            <p class="text-sm text-green-200 bg-green-900/40 border border-green-800 rounded-lg px-4 py-2"><?= htmlspecialchars($flash['success']) ?></p>
                        <?php elseif ($flash['error']): ?>
                            <p class="text-sm text-red-200 bg-red-900/40 border border-red-800 rounded-lg px-4 py-2"><?= htmlspecialchars($flash['error']) ?></p>
                        <?php endif; ?>
                    </div>
                    <form class="bg-gray-900/60 border border-gray-800 rounded-2xl p-6 w-full md:w-96 space-y-4" action="contact.php" method="post" novalidate>
                        <div class="space-y-2">
                            <label for="name" class="text-sm text-gray-200">Nombre *</label>
                            <input id="name" name="name" type="text" minlength="4" maxlength="40" required class="w-full rounded-lg bg-black/40 border border-gray-800 px-3 py-2 text-white placeholder-gray-500 focus:outline-none focus:border-blue-500" placeholder="Tu nombre completo" value="<?= htmlspecialchars($name) ?>">
                            <p class="text-xs text-red-300 min-h-[1.25rem]"><?= htmlspecialchars($errors['name']) ?></p>
                        </div>
                        <div class="space-y-2">
                            <label for="email" class="text-sm text-gray-200">Correo *</label>
                            <input id="email" name="email" type="email" required class="w-full rounded-lg bg-black/40 border border-gray-800 px-3 py-2 text-white placeholder-gray-500 focus:outline-none focus:border-blue-500" placeholder="tu@email.com" value="<?= htmlspecialchars($email) ?>">
                            <p class="text-xs text-red-300 min-h-[1.25rem]"><?= htmlspecialchars($errors['email']) ?></p>
                        </div>
                        <div class="space-y-2">
                            <label for="message" class="text-sm text-gray-200">Mensaje *</label>
                            <textarea id="message" name="message" rows="4" minlength="8" maxlength="120" required class="w-full rounded-lg bg-black/40 border border-gray-800 px-3 py-2 text-white placeholder-gray-500 focus:outline-none focus:border-blue-500" placeholder="Cuéntame en qué te puedo ayudar"><?= htmlspecialchars($message) ?></textarea>
                            <p class="text-xs text-red-300 min-h-[1.25rem]"><?= htmlspecialchars($errors['message']) ?></p>
                        </div>
                        <button type="submit" class="w-full bg-green-700 hover:bg-green-600 transition text-white font-semibold px-4 py-2 rounded-lg border border-green-800">Enviar</button>
                    </form>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
