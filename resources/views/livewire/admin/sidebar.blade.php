<aside
    id="sidebar"
    class="fixed md:static inset-y-0 left-0 z-50 w-[400px] md:w-[350px] bg-white border-r border-slate-200 transition-transform duration-200 md:translate-x-0 h-screen overflow-y-scroll flex flex-col justify-end"
>
    <div class="h-16 flex items-center justify-between px-6 border-b border-slate-200">
        <div class="flex items-center gap-3">
            <div class="h-10 w-10 rounded-xl bg-blue-600 shadow-sm"></div>
            <div>
                <div class="font-semibold leading-tight">
                    {{-- {{ Auth::user() -> name }} --}}
                    Dashboard
                </div>
            </div>
        </div>

        <button
            type="button"
            id="closeSidebarBtn"
            class="md:hidden h-9 w-9 rounded-lg border border-slate-200 hover:bg-slate-50 transition"
            aria-label="Close sidebar"
        >
            <svg class="mx-auto h-5 w-5 text-slate-700" viewBox="0 0 24 24" fill="none">
                <path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>
    </div>

    <nav class="p-4 space-y-1 overflow-y-scroll h-5/6">
        <a href="{{ route('dashboard.admin') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-xl {{ $this -> pathName == "dashboard/admin" ? ' bg-blue-50 text-blue-700' : '' }} border border-blue-100">
            <span class="h-9 w-9 rounded-lg bg-white border border-blue-100 flex items-center justify-center">
                <svg class="h-5 w-5 " viewBox="0 0 24 24" fill="none">
                    <path d="M3 10.5L12 3l9 7.5V21a1 1 0 01-1 1h-5v-7H9v7H4a1 1 0 01-1-1V10.5z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                </svg>
            </span>
            <div>
                <div class="text-sm font-semibold">Dashboard</div>
                <div class="text-xs">overview & insights</div>
            </div>
        </a>

        <a href="{{ route('dashboard.admin.user') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-slate-100 transition  {{ $this -> isTruePath == "user" ? ' bg-blue-50 text-blue-700' : '' }}">
            <span class="h-9 w-9 rounded-lg bg-slate-50 border border-slate-200 flex items-center justify-center">
                <svg class="h-5 w-5 " viewBox="0 0 24 24" fill="none">
                    <path d="M20 21a8 8 0 10-16 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    <path d="M12 11a4 4 0 100-8 4 4 0 000 8z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </span>
            <div>
                <div class="text-sm font-semibold">Users</div>
                <div class="text-xs ">roles & status</div>
            </div>
        </a>

         <a href="{{ route('dashboard.admin.divisi') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-slate-100 transition  {{ $this -> isTruePath == "divisi" ? ' bg-blue-50 text-blue-700' : '' }}">
            <span class="h-9 w-9 rounded-lg bg-slate-50 border border-slate-200 flex items-center justify-center">
                <svg class="h-5 w-5 " viewBox="0 0 24 24" fill="none">
                    <path d="M20 21a8 8 0 10-16 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    <path d="M12 11a4 4 0 100-8 4 4 0 000 8z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </span>
            <div>
                <div class="text-sm font-semibold">Divisis</div>
                <div class="text-xs ">draft & publish</div>
            </div>
        </a>

              <a href="{{ route('dashboard.admin.leaderboard') }}" class="flex items-center gap-3 px-3 {{ $this -> isTruePath == "leaderboard" ? ' text-blue-700/70' : '' }} py-2 rounded-xl hover:bg-slate-100 transition">
            <span class="h-9 w-9 rounded-lg bg-slate-50 border border-slate-200 flex items-center justify-center">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                    <path d="M4 19h16M7 16V8m5 8V5m5 11v-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </span>
            <div>
                <div class="text-sm font-semibold">Leaderboard</div>
                <div class="text-xs">ranking & score</div>
            </div>
        </a>

            {{-- job --}}

          <a href="{{ route('dashboard.admin.job') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-slate-100 transition {{ $this -> isTruePath == "job" ? ' text-blue-700/70' : '' }}">
            <span class="h-9 w-9 rounded-lg bg-slate-50 border border-slate-200 flex items-center justify-center text-xl">
                <i class="ph ph-read-cv-logo"></i>
            </span>
            <div>
                <div class="text-sm font-semibold">Jobs</div>
                <div class="text-xs">draft & publish</div>
            </div>
        </a>

        <a href="{{ route('dashboard.admin.course') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-slate-100 transition {{ $this -> isTruePath == "course" ? ' text-blue-700/70' : '' }}">
            <span class="h-9 w-9 rounded-lg bg-slate-50 border border-slate-200 flex items-center justify-center">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                    <path d="M6 7h12v14H6V7z" stroke="currentColor" stroke-width="2"/>
                    <path d="M7 3h10v4H7V3z" stroke="currentColor" stroke-width="2"/>
                    <path d="M9 11h6M9 15h6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </span>
            <div>
                <div class="text-sm font-semibold">Courses</div>
                <div class="text-xs">draft & publish</div>
            </div>
        </a>

             {{-- Quiz --}}

        <a href="{{ route('dashboard.admin.quiz') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-slate-100 transition {{ $this -> isTruePath == "quiz" ? ' text-blue-700/70' : '' }}">
            <span class="h-9 w-9 rounded-lg bg-slate-50 border border-slate-200 flex items-center justify-center">
                <svg class="h-5 w-5 " viewBox="0 0 24 24" fill="none">
                    <path d="M6 7h12v14H6V7z" stroke="currentColor" stroke-width="2"/>
                    <path d="M7 3h10v4H7V3z" stroke="currentColor" stroke-width="2"/>
                    <path d="M9 11h6M9 15h6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </span>
            <div>
                <div class="text-sm font-semibold">Quizzes</div>
                <div class="text-xs">draft & publish</div>
            </div>
        </a>

    </nav>

 <div class="mt-auto p-4 border-t border-slate-200">
        <div class="flex items-center gap-3">
            <div class="h-[40px] w-[50px] rounded-md bg-slate-900 text-slate-50 font-bold flex justify-center items-center">
                {{ Auth::user() -> name[0] }}
            </div>

            <div class="min-w-0">
                <div class="text-sm font-semibold truncate">
                    {{ Auth::user() -> name }}
                </div>
                <div class="text-xs text-slate-500 truncate">
                    {{ Auth::user() -> email }}
                </div>
            </div>

            <a href="{{route('auth.logout')}}" class=" bg-red-600 text-slate-50 font-bold text-xs rounded-md px-2 py-1">
                Logout
            </a>
        </div>
    </div>
</aside>
