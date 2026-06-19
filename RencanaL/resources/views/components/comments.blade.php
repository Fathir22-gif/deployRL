<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white rounded-2xl shadow-md p-6">
        <h3 class="text-xl font-bold text-[#0F172A]">Komentar</h3>
        <p class="text-slate-500 text-sm mt-1">Bagikan pengalaman atau bertanya kepada pengunjung lain.</p>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-4">
            <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4">
                <p class="text-slate-500 text-sm">Jumlah Komentar</p>
                <p class="text-2xl font-bold text-[#0F172A]">{{ $commentSummary['count'] ?? 0 }}</p>
            </div>
            <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4">
                <p class="text-slate-500 text-sm">Rata-rata Rating</p>
                <p class="text-2xl font-bold text-[#0F172A]">{{ $commentSummary['average_rating'] ?? '–' }}</p>
            </div>
        </div>

        <div id="comments-list" class="mt-6 space-y-4 text-sm text-slate-700">
            @if(isset($comments) && $comments->count())
            @foreach($comments as $c)
            <div class="bg-slate-50 border border-slate-100 rounded-xl p-4">
                <div class="flex items-center justify-between mb-2">
                    <div class="font-semibold text-[#0F172A]">{{ $c->name ?: ($c->user?->name ?? 'Pengunjung') }}</div>
                    <div class="text-xs text-slate-400">{{ $c->created_at->format('d M Y H:i') }}</div>
                </div>
                <div class="text-slate-700 text-sm">{{ $c->comment }}</div>
                @if($c->rating)
                <div class="text-yellow-500 text-sm mt-2">Rating: {{ $c->rating }}/5</div>
                @endif
            </div>
            @endforeach
            @else
            <p class="text-slate-400">Belum ada komentar. Jadilah yang pertama!</p>
            @endif
        </div>

        <form id="comment-form" class="mt-6 space-y-3" action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="destination" value="{{ $destination ?? '' }}">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                <input id="comment-name" type="text" name="name" placeholder="Nama (opsional)" class="sm:col-span-2 w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-200" />
                <select id="comment-rating" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-200">
                    <option value="">Pilih rating (opsional)</option>
                    <option>5</option>
                    <option>4</option>
                    <option>3</option>
                    <option>2</option>
                    <option>1</option>
                </select>
            </div>

            <textarea id="comment-text" name="comment" required rows="4" placeholder="Tulis komentar Anda di sini..." class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-200"></textarea>

            <div class="flex items-center justify-end gap-3">
                <button type="reset" class="px-4 py-2 rounded-lg border border-slate-200 text-sm text-slate-600 hover:bg-slate-50">Bersihkan</button>
                <button type="submit" class="px-4 py-2 rounded-lg bg-gradient-to-r from-[#1E3A8A] to-[#38BDF8] text-white text-sm font-semibold">Kirim Komentar</button>
            </div>
        </form>
    </div>
    </div>
</section>