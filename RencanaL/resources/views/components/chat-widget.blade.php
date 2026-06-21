<div id="chat-widget" class="fixed bottom-5 right-5 z-[60] font-sans">
    <div id="chat-panel" class="hidden mb-3 w-[min(22rem,calc(100vw-2.5rem))] overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl">
        <div class="flex items-center justify-between bg-[#0F172A] px-4 py-3 text-white">
            <div>
                <p class="text-sm font-semibold">RencanaLiburan AI</p>
                <p class="text-xs text-sky-100/70">Tanya ide liburan cepat</p>
            </div>
            <button id="chat-close" type="button" class="rounded-full p-1 text-sky-100/80 hover:bg-white/10 hover:text-white" aria-label="Tutup chat">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6L6 18" />
                </svg>
            </button>
        </div>

        <div id="chat-messages" class="h-72 space-y-3 overflow-y-auto bg-slate-50 p-4 text-sm">
            <div class="max-w-[85%] rounded-2xl rounded-bl-md bg-white px-3 py-2 text-slate-700 shadow-sm">
                Halo! Mau tanya rekomendasi destinasi, budget, atau itinerary?
            </div>
        </div>

        <form id="chat-form" class="flex gap-2 border-t border-slate-200 bg-white p-3">
            <input
                id="chat-input"
                type="text"
                maxlength="1000"
                autocomplete="off"
                placeholder="Tulis pesan..."
                class="min-w-0 flex-1 rounded-xl border border-slate-200 px-3 py-2 text-sm text-slate-800 outline-none focus:border-[#38BDF8] focus:ring-2 focus:ring-sky-100">
            <button type="submit" class="inline-flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-[#0F172A] text-white transition hover:bg-[#1E3A8A]" aria-label="Kirim pesan">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.5 19.5l16-7-16-7 4.5 7-4.5 7z" />
                </svg>
            </button>
        </form>
    </div>

    <button id="chat-open" type="button" class="flex h-14 w-14 items-center justify-center rounded-full bg-[#0F172A] text-white shadow-xl transition hover:-translate-y-0.5 hover:bg-[#1E3A8A]" aria-label="Buka chat">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a8 8 0 0 1-8 8H7l-4 3 1.4-5A8 8 0 1 1 21 12z" />
        </svg>
    </button>
</div>

<style>
    html[data-theme="dark"] #chat-panel {
        background: #111827;
        border-color: rgba(148, 163, 184, 0.2);
    }
    html[data-theme="dark"] #chat-messages {
        background: #020617;
    }
    html[data-theme="dark"] #chat-form {
        background: #111827;
        border-color: rgba(148, 163, 184, 0.2);
    }
    html[data-theme="dark"] #chat-input {
        background: #020617;
        border-color: rgba(148, 163, 184, 0.28);
        color: #f8fafc;
    }
</style>

<script>
    (function() {
        const panel = document.getElementById('chat-panel');
        const openButton = document.getElementById('chat-open');
        const closeButton = document.getElementById('chat-close');
        const form = document.getElementById('chat-form');
        const input = document.getElementById('chat-input');
        const messages = document.getElementById('chat-messages');
        const chatUrl = '{{ route('chat.send') }}';
        const csrfToken = '{{ csrf_token() }}';

        function addMessage(text, sender) {
            const bubble = document.createElement('div');
            bubble.textContent = text;
            bubble.className = sender === 'user'
                ? 'ml-auto max-w-[85%] rounded-2xl rounded-br-md bg-[#38BDF8] px-3 py-2 text-sm font-medium text-[#0F172A] shadow-sm'
                : 'max-w-[85%] rounded-2xl rounded-bl-md bg-white px-3 py-2 text-sm text-slate-700 shadow-sm';
            messages.appendChild(bubble);
            messages.scrollTop = messages.scrollHeight;
            return bubble;
        }

        openButton.addEventListener('click', function() {
            panel.classList.toggle('hidden');
            if (!panel.classList.contains('hidden')) {
                input.focus();
            }
        });

        closeButton.addEventListener('click', function() {
            panel.classList.add('hidden');
        });

        form.addEventListener('submit', async function(event) {
            event.preventDefault();

            const text = input.value.trim();
            if (!text) {
                return;
            }

            addMessage(text, 'user');
            input.value = '';
            input.disabled = true;

            const loading = addMessage('Sedang mengetik...', 'bot');

            try {
                const response = await fetch(chatUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ message: text }),
                });

                const data = await response.json();
                loading.textContent = data.reply || 'Maaf, belum ada jawaban.';
            } catch (error) {
                loading.textContent = 'Maaf, koneksi chat sedang bermasalah.';
            } finally {
                input.disabled = false;
                input.focus();
                messages.scrollTop = messages.scrollHeight;
            }
        });
    })();
</script>
