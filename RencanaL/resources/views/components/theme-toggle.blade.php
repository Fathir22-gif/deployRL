<div class="flex items-center gap-3">
    <button id="theme-toggle" type="button" aria-label="Toggle dark mode" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/10 text-white border border-white/20 hover:bg-white/15 transition-colors duration-200">
        <span id="theme-toggle-icon" class="text-lg">🌙</span>
    </button>
</div>

<style>
    html.dark { color-scheme: dark; }
    html.dark body {
        background-color: #0f172a !important;
        color: #e2e8f0 !important;
    }
    html.dark .bg-white { background-color: #111827 !important; }
    html.dark .bg-slate-50 { background-color: #020617 !important; }
    html.dark .bg-slate-100 { background-color: #111827 !important; }
    html.dark .bg-white\/10 { background-color: rgba(255,255,255,0.08) !important; }
    html.dark .bg-white\/95 { background-color: rgba(255,255,255,0.08) !important; }
    html.dark .text-slate-800,
    html.dark .text-slate-700,
    html.dark .text-slate-600,
    html.dark .text-slate-500,
    html.dark .text-slate-400,
    html.dark .text-slate-300 {
        color: #cbd5e1 !important;
    }
    html.dark .text-slate-50 { color: #f8fafc !important; }
    html.dark .border-slate-100,
    html.dark .border-white\/20,
    html.dark .border-white\/10 {
        border-color: rgba(148,163,184,0.18) !important;
    }
    html.dark .shadow-md,
    html.dark .shadow-lg,
    html.dark .shadow-xl {
        box-shadow: 0 20px 50px rgba(0,0,0,0.45) !important;
    }
</style>

<script>
    (function() {
        const toggle = document.getElementById('theme-toggle');
        const icon = document.getElementById('theme-toggle-icon');
        const stored = localStorage.getItem('theme');
        const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        const current = stored || (prefersDark ? 'dark' : 'light');

        function applyTheme(theme) {
            document.documentElement.classList.toggle('dark', theme === 'dark');
            icon.textContent = theme === 'dark' ? '☀️' : '🌙';
            localStorage.setItem('theme', theme);
        }

        applyTheme(current);

        toggle.addEventListener('click', function() {
            applyTheme(document.documentElement.classList.contains('dark') ? 'light' : 'dark');
        });
    })();
</script>
