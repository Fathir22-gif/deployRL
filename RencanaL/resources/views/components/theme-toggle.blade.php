<div class="flex items-center gap-3">
    <button id="theme-toggle" type="button" aria-label="Toggle dark mode" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/10 text-white border border-white/20 hover:bg-white/15 transition-colors duration-200">
        <span id="theme-toggle-icon" class="text-lg">🌙</span>
    </button>
</div>

<style>
    html[data-theme="dark"] { color-scheme: dark; }
    html[data-theme="dark"] body {
        background-color: #0f172a !important;
        color: #e2e8f0 !important;
    }
    html[data-theme="dark"] .bg-white { background-color: #111827 !important; }
    html[data-theme="dark"] .bg-slate-50 { background-color: #020617 !important; }
    html[data-theme="dark"] .bg-slate-100 { background-color: #111827 !important; }
    html[data-theme="dark"] .bg-white\/10 { background-color: rgba(255,255,255,0.08) !important; }
    html[data-theme="dark"] .bg-white\/90 { background-color: rgba(255,255,255,0.10) !important; }
    html[data-theme="dark"] .bg-white\/95 { background-color: rgba(255,255,255,0.08) !important; }
    html[data-theme="dark"] .text-slate-800,
    html[data-theme="dark"] .text-slate-700,
    html[data-theme="dark"] .text-slate-600,
    html[data-theme="dark"] .text-slate-500,
    html[data-theme="dark"] .text-slate-400,
    html[data-theme="dark"] .text-slate-300 {
        color: #cbd5e1 !important;
    }
    html[data-theme="dark"] .text-slate-50 { color: #f8fafc !important; }
    html[data-theme="dark"] [class~="text-[#0F172A]"] { color: #f8fafc !important; }
    html[data-theme="dark"] [class~="text-[#1E3A8A]"] { color: #93c5fd !important; }
    html[data-theme="dark"] [class~="text-[#38BDF8]"] { color: #7dd3fc !important; }
    html[data-theme="dark"] [class~="bg-[#0F172A]"] { background-color: #111827 !important; }
    html[data-theme="dark"] [class~="bg-[#1E3A8A]"] { background-color: #1e3a8a !important; }
    html[data-theme="dark"] [class~="bg-[#38BDF8]"] { background-color: #0ea5e9 !important; }
    html[data-theme="dark"] .border-slate-100,
    html[data-theme="dark"] .border-slate-200,
    html[data-theme="dark"] .border-white\/20,
    html[data-theme="dark"] .border-white\/10 {
        border-color: rgba(148,163,184,0.18) !important;
    }
    html[data-theme="dark"] .shadow-md,
    html[data-theme="dark"] .shadow-lg,
    html[data-theme="dark"] .shadow-xl {
        box-shadow: 0 20px 50px rgba(0,0,0,0.45) !important;
    }
    html[data-theme="light"] .destination-title {
        color: #0f172a !important;
    }
    html[data-theme="dark"] .destination-title {
        color: #f8fafc !important;
    }
    html[data-theme="light"] .destination-title:hover {
        color: #1e3a8a !important;
    }
    html[data-theme="dark"] .destination-title:hover {
        color: #93c5fd !important;
    }
    html[data-theme="light"] .stat-number {
        color: #0f172a !important;
    }
    html[data-theme="dark"] .stat-number {
        color: #f8fafc !important;
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
            const isDark = theme === 'dark';
            document.documentElement.classList.toggle('dark', isDark);
            document.documentElement.setAttribute('data-theme', isDark ? 'dark' : 'light');
            icon.textContent = theme === 'dark' ? '☀️' : '🌙';
            localStorage.setItem('theme', theme);
        }

        applyTheme(current);

        toggle.addEventListener('click', function() {
            applyTheme(document.documentElement.classList.contains('dark') ? 'light' : 'dark');
        });
    })();
</script>
