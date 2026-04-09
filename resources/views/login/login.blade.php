<!DOCTYPE html>

<html class="light" lang="pt-BR"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Login | ACS/ACE Portal</title>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "tertiary": "#004a10",
                    "outline-variant": "#c1c7d1",
                    "on-surface-variant": "#414750",
                    "tertiary-fixed-dim": "#7ddc7a",
                    "surface-container": "#ebeef0",
                    "tertiary-fixed": "#98f994",
                    "surface-bright": "#f7fafc",
                    "primary-container": "#005a92",
                    "surface-tint": "#15629a",
                    "surface-container-high": "#e5e9eb",
                    "surface-variant": "#e0e3e5",
                    "on-tertiary-fixed": "#002204",
                    "on-surface": "#181c1e",
                    "surface-container-highest": "#e0e3e5",
                    "on-secondary": "#ffffff",
                    "secondary-fixed-dim": "#75d5e2",
                    "primary-fixed": "#cfe4ff",
                    "on-primary-container": "#a6d0ff",
                    "on-primary-fixed": "#001d34",
                    "error": "#ba1a1a",
                    "on-secondary-fixed": "#001f23",
                    "inverse-surface": "#2d3133",
                    "outline": "#717881",
                    "surface-container-lowest": "#ffffff",
                    "primary-fixed-dim": "#9acbff",
                    "on-secondary-fixed-variant": "#004f56",
                    "on-primary-fixed-variant": "#004a79",
                    "on-tertiary": "#ffffff",
                    "secondary-container": "#8feefc",
                    "on-tertiary-container": "#82e17f",
                    "surface-container-low": "#f1f4f6",
                    "background": "#f7fafc",
                    "on-primary": "#ffffff",
                    "surface-dim": "#d7dadc",
                    "inverse-primary": "#9acbff",
                    "on-error": "#ffffff",
                    "tertiary-container": "#006519",
                    "on-error-container": "#93000a",
                    "surface": "#f7fafc",
                    "primary": "#00426d",
                    "on-secondary-container": "#006d77",
                    "secondary-fixed": "#92f1fe",
                    "on-background": "#181c1e",
                    "secondary": "#006972",
                    "error-container": "#ffdad6",
                    "on-tertiary-fixed-variant": "#005313",
                    "inverse-on-surface": "#eef1f3"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "fontFamily": {
                    "headline": ["Manrope"],
                    "body": ["Inter"],
                    "label": ["Inter"]
            }
          },
        },
      }
    </script>
<style>.material-symbols-outlined {
    font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24
    }
.glass-effect {
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(24px)
    }
.bg-medical-texture {
    background-image: linear-gradient(rgba(247, 250, 252, 0.92), rgba(247, 250, 252, 0.85)), url(https://lh3.googleusercontent.com/aida-public/AB6AXuCI6yktgPbajUQ5i62jFjdihY5aNjVuKvJsGyKqpJV8RDQzMgj9e0zFjOwchjOv65UY4iRrO9hHmlvlxTcY2mvIYaZwts5WLkwHXbkCceWAHxf6IMY4Cgc4H7qsOTlF2_nHPPChKHiEWEklAJsUZhcP5JSMKGtrYRpWwILnbRzWhSKMGgIoY7XTBnEgN8_AlITSyjKEJo4y66e3c6-rVZteEUSvXy8TYxO8GZ5CRUY-ycF4h73kzDL-AlprLszUd4AOpcI3vqozQA);
    background-size: cover;
    background-position: center
    }</style>
</head>
<body class="bg-medical-texture min-h-screen flex flex-col font-body text-on-surface" data-alt="close-up of a smiling healthcare worker in a community clinic with soft sunlight through the window and stethoscope in background">
<!-- Header / Branding Navigation Shell (Suppressed Nav, Only Branding) -->
<header class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-md shadow-sm dark:shadow-none flex justify-between items-center px-6 py-4 w-full fixed top-0 z-50">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-3xl" style="font-variation-settings: 'FILL' 1;">health_and_safety</span>
<span class="font-manrope font-bold text-lg tracking-tight text-blue-800 dark:text-blue-300">ACS/ACE Portal</span>
</div>
<div class="hidden md:flex gap-4 items-center">
<span class="text-xs font-label uppercase tracking-widest text-slate-500">Clinical Sanctuary</span>
</div>
</header>
<main class="flex-grow flex items-center justify-center p-6 mt-16">
<!-- Login Container -->
<div class="w-full max-w-[1100px] grid md:grid-cols-2 bg-surface-container-lowest rounded-xl overflow-hidden shadow-2xl">
<!-- Left Side: Narrative/Visual -->
<div class="hidden md:flex flex-col justify-between p-12 bg-primary relative overflow-hidden">
<div class="absolute inset-0 opacity-10 pointer-events-none bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-secondary-container via-transparent to-transparent"></div>
<div class="relative z-10">
<h1 class="font-headline text-display-lg text-white font-extrabold leading-tight tracking-tight">
                        Cuidado que <br/>transforma vidas.
                    </h1>
<p class="mt-6 text-on-primary-container font-body text-lg max-w-sm opacity-90">
                        Bem-vindo ao Portal do Agente Comunitário de Saúde e Agente de Combate às Endemias. Acesse suas ferramentas de trabalho.
                    </p>
</div>
<div class="relative z-10 flex items-center gap-4">
<div class="w-12 h-12 rounded-full bg-secondary-container flex items-center justify-center">
<span class="material-symbols-outlined text-on-secondary-container">shield_with_heart</span>
</div>
<div class="text-white">
<p class="font-bold text-sm">Vitalis Nexus</p>
<p class="text-xs opacity-70">Sistema de Gestão de Saúde Comunitária</p>
</div>
</div>
</div>
<!-- Right Side: Login Form -->
<div class="p-8 md:p-16 flex flex-col justify-center bg-white">
<div class="mb-10">
<h2 class="font-headline text-3xl font-bold text-primary mb-2">Entrar</h2>
<p class="text-on-surface-variant">Acesse sua conta para gerenciar visitas e dados epidemiológicos.</p>
</div>
<form class="space-y-6">
<!-- Email Field -->
<div class="space-y-2">
<label class="block text-xs font-label uppercase tracking-widest text-on-surface-variant font-semibold" for="email">E-mail Institucional</label>
<div class="relative group">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">mail</span>
<input class="w-full pl-10 pr-4 py-3 bg-surface-container-low rounded-lg border-none focus:ring-0 transition-all placeholder:text-outline/60 border-b-2 border-transparent focus:border-primary" id="email" name="email" placeholder="nome@saude.gov.br" type="email"/>
</div>
</div>
<!-- CPF Field -->
<div class="space-y-2">
<label class="block text-xs font-label uppercase tracking-widest text-on-surface-variant font-semibold" for="cpf">CPF</label>
<div class="relative group">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">badge</span>
<input class="w-full pl-10 pr-4 py-3 bg-surface-container-low rounded-lg border-none focus:ring-0 transition-all placeholder:text-outline/60 border-b-2 border-transparent focus:border-primary" id="cpf" name="cpf" placeholder="000.000.000-00" type="text"/>
</div>
</div><!-- User Type Field -->
<div class="space-y-2">
<label class="block text-xs font-label uppercase tracking-widest text-on-surface-variant font-semibold" for="user_type">Tipo de Usuário</label>
<div class="relative group">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">group</span>
<select class="w-full pl-10 pr-4 py-3 bg-surface-container-low rounded-lg border-none focus:ring-0 transition-all appearance-none border-b-2 border-transparent focus:border-primary text-on-surface-variant" id="user_type" name="user_type">
<option disabled="" selected="" value="">Selecione seu perfil</option>
<option value="administrador">Administrador</option>
<option value="acs">ACS (Agente Comunitário de Saúde)</option>
<option value="ace">ACE (Agente de Combate às Endemias)</option>
<option value="supervisor">Supervisor</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline pointer-events-none group-focus-within:text-primary transition-colors">expand_more</span>
</div>
</div>
<!-- Password Field -->
<div class="space-y-2">
<div class="flex justify-between items-center">
<label class="block text-xs font-label uppercase tracking-widest text-on-surface-variant font-semibold" for="password">Senha</label>
<a class="text-xs font-semibold text-primary hover:text-primary-container transition-colors" href="#">Esqueceu a senha?</a>
</div>
<div class="relative group">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">lock</span>
<input class="w-full pl-10 pr-12 py-3 bg-surface-container-low rounded-lg border-none focus:ring-0 transition-all placeholder:text-outline/60 border-b-2 border-transparent focus:border-primary" id="password" name="password" placeholder="••••••••" type="password"/>
<button class="absolute right-3 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface" type="button">
<span class="material-symbols-outlined">visibility</span>
</button>
</div>
</div>
<!-- Remember Me -->
<div class="flex items-center">
<input class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary/20" id="remember" type="checkbox"/>
<label class="ml-3 text-sm text-on-surface-variant font-medium" for="remember">Lembrar de mim neste dispositivo</label>
</div>
<!-- Login Button -->
<button class="w-full py-4 bg-gradient-to-br from-primary to-primary-container text-white font-headline font-bold text-lg rounded-xl shadow-lg hover:shadow-primary/20 active:scale-[0.98] transition-all flex items-center justify-center gap-2 group" type="submit">
                        Entrar
                        <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
</button>
</form>
<!-- Footer Note -->
<div class="mt-12 pt-8 border-t border-surface-container-high flex flex-col items-center gap-4">
<p class="text-xs text-on-surface-variant text-center leading-relaxed max-w-[280px]">
                        Problemas com o acesso? Entre em contato com o suporte da sua Secretaria de Saúde.
                    </p>
<div class="flex gap-4">
<span class="px-3 py-1 bg-surface-container text-[10px] font-bold uppercase tracking-widest text-on-surface-variant rounded-full">v4.2.0</span>
<span class="px-3 py-1 bg-secondary-container/30 text-[10px] font-bold uppercase tracking-widest text-secondary rounded-full">Encrypted</span>
</div>
</div>
</div>
</div>
</main>
<!-- Footer Shared Component -->
<footer class="bg-slate-50 dark:bg-slate-950 flex flex-col md:flex-row justify-between items-center px-8 py-12 w-full border-t border-slate-100 dark:border-slate-800">
<div class="mb-6 md:mb-0">
<span class="font-inter text-xs uppercase tracking-widest text-slate-400">© 2024 Clinical Sanctuary. All rights reserved.</span>
</div>
<div class="flex flex-wrap justify-center gap-8">
<a class="font-inter text-xs uppercase tracking-widest text-slate-400 hover:underline decoration-blue-500 transition-all opacity-80 hover:opacity-100" href="#">Privacy Policy</a>
<a class="font-inter text-xs uppercase tracking-widest text-slate-400 hover:underline decoration-blue-500 transition-all opacity-80 hover:opacity-100" href="#">Terms of Service</a>
<a class="font-inter text-xs uppercase tracking-widest text-slate-400 hover:underline decoration-blue-500 transition-all opacity-80 hover:opacity-100" href="#">Institutional Portal</a>
<a class="font-inter text-xs uppercase tracking-widest text-slate-400 hover:underline decoration-blue-500 transition-all opacity-80 hover:opacity-100" href="#">Help Desk</a>
</div>
</footer>
</body></html>