<button @click="sidebarOpen = !sidebarOpen"
    :class="sidebarOpen ?
        ' transition ease-out duration-[1200ms] translate-x-[12rem] bg-[#FF0000] hover:bg-[#FF0000]/50' :
        ' transition ease-out duration-500 translate-x-0 rotate-180 bg-[#FF0000] hover:bg-[#FF0000]/50'"
    class="hidden duration-300 h-6 w-6 lg:flex items-center justify-center rounded-full  text-white fixed z-[101] top-16">
    <svg width="8" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M7.72404 15.6093L0.114709 7.99996L7.72404 0.390625L9.60938 2.27596L3.88537 7.99996L9.60938 13.724L7.72404 15.6093Z"
            fill="white" />
    </svg>
</button>
<aside x-show="sidebarOpen"
    class="hidden lg:block fixed z-[100] lg:sticky lg:inset-y-0 px-5 py-4 max-w-64 bg-white h-screen shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] duration-1000"
    x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="translate-x-[-100%]"
    x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-[170ms]"
    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-[-100%]">
    <div>
        <div class=" mb-6"><img src="{{ asset('asset/img/logo.png') }}" class="w-full" alt="Logo TelkomCare">
        </div>
        <hr class="border-gray-200 mb-6 ">
        <div>
            {{-- Menu Sidebar --}}
            <ul class="text-sm font-medium flex flex-col gap-3 text-[#A6AFCA] mb-6">
                <li class="w-full p-2 @yield('menu-dashboard')"><a href="{{ route('dokter.dashboard') }}"
                        class="flex gap-3 items-center"><i><svg class="fill-[#A6AFCA]" width="20" height="20"
                                viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.60033 11.2248C7.77532 11.2248 8.71699 12.1757 8.71699 13.359V16.1998C8.71699 17.3748 7.77532 18.3332 6.60033 18.3332H3.78366C2.61699 18.3332 1.66699 17.3748 1.66699 16.1998V13.359C1.66699 12.1757 2.61699 11.2248 3.78366 11.2248H6.60033ZM16.2171 11.2248C17.3837 11.2248 18.3337 12.1757 18.3337 13.359V16.1998C18.3337 17.3748 17.3837 18.3332 16.2171 18.3332H13.4004C12.2254 18.3332 11.2837 17.3748 11.2837 16.1998V13.359C11.2837 12.1757 12.2254 11.2248 13.4004 11.2248H16.2171ZM6.60033 1.66675C7.77532 1.66675 8.71699 2.62508 8.71699 3.80091V6.64175C8.71699 7.82508 7.77532 8.77508 6.60033 8.77508H3.78366C2.61699 8.77508 1.66699 7.82508 1.66699 6.64175V3.80091C1.66699 2.62508 2.61699 1.66675 3.78366 1.66675H6.60033ZM16.2171 1.66675C17.3837 1.66675 18.3337 2.62508 18.3337 3.80091V6.64175C18.3337 7.82508 17.3837 8.77508 16.2171 8.77508H13.4004C12.2254 8.77508 11.2837 7.82508 11.2837 6.64175V3.80091C11.2837 2.62508 12.2254 1.66675 13.4004 1.66675H16.2171Z" />
                            </svg>
                        </i>Dashboard</a>
                </li>
            </ul>
            <div class="text-sm font-medium w-full">
                <p>Halaman Akun</p>
                <a href="{{ route('dokter.profile.index') }}"
                    class="flex gap-3 items-center p-2 text-[#A6AFCA]  font-bold w-full rounded-md @yield('menu-profile')">
                    <i>
                        <svg class="fill-[#A6AFCA]" width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.44444 3.55556C4.44444 2.61256 4.81905 1.70819 5.48584 1.0414C6.15264 0.374602 7.05701 0 8 0C8.94299 0 9.84736 0.374602 10.5142 1.0414C11.181 1.70819 11.5556 2.61256 11.5556 3.55556C11.5556 4.49855 11.181 5.40292 10.5142 6.06971C9.84736 6.73651 8.94299 7.11111 8 7.11111C7.05701 7.11111 6.15264 6.73651 5.48584 6.06971C4.81905 5.40292 4.44444 4.49855 4.44444 3.55556ZM4.44444 8.88889C3.2657 8.88889 2.13524 9.35714 1.30175 10.1906C0.468253 11.0241 0 12.1546 0 13.3333C0 14.0406 0.280952 14.7189 0.781049 15.219C1.28115 15.719 1.95942 16 2.66667 16H13.3333C14.0406 16 14.7189 15.719 15.219 15.219C15.719 14.7189 16 14.0406 16 13.3333C16 12.1546 15.5317 11.0241 14.6983 10.1906C13.8648 9.35714 12.7343 8.88889 11.5556 8.88889H4.44444Z" />
                        </svg>
                    </i>Profile</a>
            </div>
        </div>
    </div>

</aside>


{{-- Sidebar Mobile --}}
<button @click="sidebarOpen = !sidebarOpen"
    :class="!sidebarOpen ?
        ' transition ease-out duration-[1200ms] translate-x-[12rem] bg-[#FF0000] hover:bg-[#FF0000]/50' :
        ' transition ease-out duration-500 translate-x-0 rotate-180 bg-[#FF0000] hover:bg-[#FF0000]/50'"
    class="lg:hidden duration-300 h-6 w-6 flex items-center justify-center rounded-full  text-white fixed z-[101] top-16">
    <svg width="8" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M7.72404 15.6093L0.114709 7.99996L7.72404 0.390625L9.60938 2.27596L3.88537 7.99996L9.60938 13.724L7.72404 15.6093Z"
            fill="white" />
    </svg>
</button>
<aside x-show="!sidebarOpen"
    class="lg:hidden fixed z-[100] lg:sticky lg:inset-y-0 px-5 py-4 max-w-64 bg-white h-screen shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] duration-1000"
    x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="translate-x-[-100%]"
    x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-[170ms]"
    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-[-100%]">
    <div>
        <div class=" mb-6"><img src="{{ asset('asset/img/logo.png') }}" class="w-full" alt="Logo TelkomCare">
        </div>
        <hr class="border-gray-200 mb-6 ">
        <div>
            {{-- Menu Sidebar --}}
            <ul class="text-sm font-medium flex flex-col gap-3 text-[#A6AFCA] mb-6">
                <li class="w-full p-2 @yield('menu-dashboard')"><a href="#" class="flex gap-3 items-center"><i><svg
                                class="fill-[#A6AFCA]" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.60033 11.2248C7.77532 11.2248 8.71699 12.1757 8.71699 13.359V16.1998C8.71699 17.3748 7.77532 18.3332 6.60033 18.3332H3.78366C2.61699 18.3332 1.66699 17.3748 1.66699 16.1998V13.359C1.66699 12.1757 2.61699 11.2248 3.78366 11.2248H6.60033ZM16.2171 11.2248C17.3837 11.2248 18.3337 12.1757 18.3337 13.359V16.1998C18.3337 17.3748 17.3837 18.3332 16.2171 18.3332H13.4004C12.2254 18.3332 11.2837 17.3748 11.2837 16.1998V13.359C11.2837 12.1757 12.2254 11.2248 13.4004 11.2248H16.2171ZM6.60033 1.66675C7.77532 1.66675 8.71699 2.62508 8.71699 3.80091V6.64175C8.71699 7.82508 7.77532 8.77508 6.60033 8.77508H3.78366C2.61699 8.77508 1.66699 7.82508 1.66699 6.64175V3.80091C1.66699 2.62508 2.61699 1.66675 3.78366 1.66675H6.60033ZM16.2171 1.66675C17.3837 1.66675 18.3337 2.62508 18.3337 3.80091V6.64175C18.3337 7.82508 17.3837 8.77508 16.2171 8.77508H13.4004C12.2254 8.77508 11.2837 7.82508 11.2837 6.64175V3.80091C11.2837 2.62508 12.2254 1.66675 13.4004 1.66675H16.2171Z" />
                            </svg>
                        </i>Dashboard</a>
                </li>
                <li class="w-full p-2 @yield('menu-antrian')"><a href="#" class="flex gap-3 items-center">
                        <i>
                            <svg class="fill-[#A6AFCA]" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1 13.2678V17.7467C1 18.4386 1.56134 19 2.2533 19H16.7603C17.4522 19 18.0141 18.4386 18.0141 17.7467V13.2588C17.9252 13.2644 17.9055 13.2678 17.87 13.2678H1ZM3.48915 17.9713C3.07982 17.9713 2.74876 17.6397 2.74876 17.2315C2.74876 16.8233 3.08039 16.4917 3.48915 16.4917C3.89734 16.4917 4.22896 16.8233 4.22896 17.2315C4.22896 17.6397 3.89734 17.9713 3.48915 17.9713ZM15.5751 17.8356H6.08527C5.75252 17.8356 5.4817 17.5873 5.4817 17.254C5.4817 16.9207 5.75196 16.6719 6.08527 16.6719H15.5751C15.9084 16.6719 16.1787 16.9196 16.1787 17.254C16.1787 17.5868 15.9095 17.8356 15.5751 17.8356Z" />
                                <path
                                    d="M16.7613 10.2241V10.1982V4.84266C16.7613 4.47388 16.6149 4.1203 16.3531 3.85962L13.887 1.40425C13.6274 1.14526 13.2755 1 12.909 1H3.07742C2.6225 1 2.25428 1.36878 2.25428 1.82371V10.1976V10.2235C1.56232 10.2235 1.00098 10.7849 1.00098 11.4768V12.104H17.871C17.9059 12.104 17.9262 12.1074 18.0151 12.1136V11.4768C18.0146 10.7854 17.4532 10.2241 16.7613 10.2241ZM13.6269 2.84842L15.0024 4.22446H13.6269V2.84842ZM3.41806 2.16434H12.462V2.20263V4.73175C12.462 5.14332 12.7964 5.47776 13.208 5.47776H15.5068V10.045H3.41806V2.16434Z" />
                                <path
                                    d="M13.6448 7.26929H5.19146C4.85814 7.26929 4.58789 7.51815 4.58789 7.85146C4.58789 8.18421 4.85814 8.43363 5.19146 8.43363H13.6442C13.9775 8.43363 14.2478 8.18477 14.2478 7.85146C14.2472 7.51758 13.9769 7.26929 13.6448 7.26929Z" />
                                <path
                                    d="M5.19146 5.47791H10.0222C10.3555 5.47791 10.6252 5.18457 10.6252 4.8507C10.6252 4.51738 10.3555 4.22461 10.0222 4.22461H5.19146C4.85814 4.22461 4.58789 4.51795 4.58789 4.8507C4.58845 5.18457 4.85871 5.47791 5.19146 5.47791Z" />
                            </svg>

                        </i>Antrian</a>
                </li>
                <li class="w-full p-2 @yield('menu-jadwal')"><a href="#" class="flex gap-3 items-center">
                        <i>
                            <svg class="fill-[#A6AFCA]" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.5955 1C13.9847 0.999088 14.2924 1.30144 14.2933 1.70457L14.2942 2.39172C16.8193 2.58962 18.4873 4.31026 18.49 6.94893L18.5 14.6725C18.5036 17.5494 16.6962 19.3195 13.7991 19.3241L6.72256 19.3333C3.8436 19.3369 2.01359 17.5247 2.00997 14.6396L2.00001 7.00665C1.99639 4.35057 3.60557 2.63452 6.13065 2.40272L6.12975 1.71556C6.12884 1.31243 6.42751 1.00917 6.82573 1.00917C7.22395 1.00825 7.52262 1.3106 7.52352 1.71373L7.52443 2.35507L12.9004 2.34774L12.8995 1.7064C12.8986 1.30327 13.1973 1.00092 13.5955 1ZM13.9648 14.0092H13.9557C13.5394 14.0193 13.2054 14.3684 13.2145 14.7898C13.2154 15.2113 13.5511 15.5585 13.9675 15.5677C14.3919 15.5668 14.7359 15.2177 14.735 14.7871C14.735 14.3565 14.3901 14.0092 13.9648 14.0092ZM6.50715 14.0101C6.09083 14.0285 5.76501 14.3775 5.76592 14.799C5.78492 15.2204 6.12884 15.5503 6.54517 15.531C6.95334 15.5127 7.27825 15.1636 7.25925 14.7422C7.2502 14.3299 6.91443 14.0092 6.50715 14.0101ZM10.236 14.0055C9.81963 14.0248 9.49472 14.3729 9.49472 14.7944C9.51372 15.2159 9.85764 15.5448 10.274 15.5264C10.6812 15.5072 11.0071 15.159 10.988 14.7367C10.979 14.3253 10.6432 14.0046 10.236 14.0055ZM6.50263 10.7118C6.08631 10.7301 5.76139 11.0792 5.7623 11.5006C5.7804 11.9221 6.12522 12.2519 6.54155 12.2327C6.94882 12.2144 7.27373 11.8653 7.25472 11.4438C7.24567 11.0315 6.91081 10.7109 6.50263 10.7118ZM10.2323 10.6797C9.81601 10.698 9.49019 11.0471 9.4911 11.4686C9.5092 11.89 9.85402 12.2189 10.2703 12.2006C10.6776 12.1814 11.0025 11.8332 10.9844 11.4118C10.9745 10.9995 10.6396 10.6788 10.2323 10.6797ZM13.9611 10.6843C13.5448 10.6935 13.219 11.0325 13.2199 11.4539V11.464C13.2289 11.8854 13.5729 12.2052 13.9901 12.196C14.3974 12.186 14.7223 11.8369 14.7132 11.4154C14.6942 11.0123 14.3675 10.6834 13.9611 10.6843ZM12.9022 3.7587L7.52624 3.76603L7.52714 4.50724C7.52714 4.90212 7.22938 5.21363 6.83116 5.21363C6.43294 5.21455 6.13337 4.90396 6.13337 4.50907L6.13246 3.80359C4.36762 3.98042 3.39107 5.01757 3.39378 7.00482L3.39469 7.28976L17.0971 7.27143V6.95076C17.0582 4.98092 16.0699 3.94744 14.296 3.79352L14.2969 4.49899C14.2969 4.89296 13.9901 5.20539 13.6009 5.20539C13.2027 5.20631 12.9031 4.8948 12.9031 4.50083L12.9022 3.7587Z" />
                            </svg>

                        </i>
                        Jadwal Dokter</a>
                </li>
                <li class="w-full p-2 @yield('menu-resep')"><a href="#" class="flex gap-3 items-center">
                        <i>
                            <svg class="fill-[#A6AFCA]" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.0917 1C16.9233 1 18.5 2.63166 18.5 5.42749V14.8966C18.5 17.7383 16.9233 19.3333 14.0917 19.3333H6.40916C3.6225 19.3333 2 17.7383 2 14.8966V5.42749C2 2.63166 3.6225 1 6.40916 1H14.0917ZM6.65666 13.595C6.38166 13.5675 6.11582 13.6958 5.96916 13.9341C5.82249 14.1633 5.82249 14.4658 5.96916 14.7041C6.11582 14.9333 6.38166 15.0708 6.65666 15.0341H13.8433C14.2091 14.9975 14.485 14.6849 14.485 14.3191C14.485 13.9433 14.2091 13.6316 13.8433 13.595H6.65666ZM13.8433 9.41407H6.65666C6.26157 9.41407 5.94166 9.73582 5.94166 10.13C5.94166 10.5241 6.26157 10.845 6.65666 10.845H13.8433C14.2375 10.845 14.5583 10.5241 14.5583 10.13C14.5583 9.73582 14.2375 9.41407 13.8433 9.41407ZM9.39657 5.26249H6.65666V5.27166C6.26157 5.27166 5.94166 5.59249 5.94166 5.98666C5.94166 6.38082 6.26157 6.70166 6.65666 6.70166H9.39657C9.79165 6.70166 10.1125 6.38082 10.1125 5.97657C10.1125 5.58332 9.79165 5.26249 9.39657 5.26249Z" />
                            </svg>
                        </i>Resep Dokter</a>
                </li>
                <li class="w-full p-2 @yield('menu-rekam')"><a href="#" class="flex gap-3 items-center">
                        <i>
                            <svg class="fill-[#A6AFCA]" width="20" height="20" viewBox="0 0 20 20"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.10648 2.05441C2 3.10883 2 4.80588 2 8.2V11.8C2 15.1941 2 16.8912 3.10648 17.9456C4.21297 19 5.99383 19 9.55556 19H11.4444C15.0061 19 16.7871 19 17.8935 17.9456C19 16.8912 19 15.1941 19 11.8V8.2C19 4.80588 19 3.10883 17.8935 2.05441C16.7871 1 15.0061 1 11.4444 1H9.55556C5.99383 1 4.21297 1 3.10648 2.05441ZM11.2083 4.6C11.2083 4.22721 10.8912 3.925 10.5 3.925C10.1088 3.925 9.79167 4.22721 9.79167 4.6V5.725H8.61108C8.21988 5.725 7.90275 6.02721 7.90275 6.4C7.90275 6.77279 8.21988 7.075 8.61108 7.075H9.79167V8.2C9.79167 8.57278 10.1088 8.875 10.5 8.875C10.8912 8.875 11.2083 8.57278 11.2083 8.2V7.075H12.3889C12.7801 7.075 13.0972 6.77279 13.0972 6.4C13.0972 6.02721 12.7801 5.725 12.3889 5.725H11.2083V4.6ZM6.72222 11.125C6.33102 11.125 6.01389 11.4272 6.01389 11.8C6.01389 12.1728 6.33102 12.475 6.72222 12.475H14.2778C14.669 12.475 14.9861 12.1728 14.9861 11.8C14.9861 11.4272 14.669 11.125 14.2778 11.125H6.72222ZM7.66667 14.725C7.27547 14.725 6.95833 15.0272 6.95833 15.4C6.95833 15.7728 7.27547 16.075 7.66667 16.075H13.3333C13.7245 16.075 14.0417 15.7728 14.0417 15.4C14.0417 15.0272 13.7245 14.725 13.3333 14.725H7.66667Z" />
                            </svg>
                        </i>Rekam Medis</a>
                </li>
                <li class="w-full p-2 @yield('menu-booking')"><a href="/admin/booking" class="flex gap-3 items-center">
                        <i>
                            <svg class="fill-[#A6AFCA]" width="20" height="20" viewBox="0 0 20 20"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.2778 2C14.5283 2 14.7685 2.0995 14.9456 2.27662C15.1227 2.45374 15.2222 2.69396 15.2222 2.94444V3.88889H17.1111C17.5877 3.88874 18.0466 4.06872 18.3961 4.39275C18.7455 4.71678 18.9595 5.16091 18.9953 5.63611L19 5.77778V17.1111C19.0002 17.5877 18.8202 18.0466 18.4961 18.3961C18.1721 18.7455 17.728 18.9595 17.2528 18.9953L17.1111 19H3.88889C3.41234 19.0002 2.95335 18.8202 2.60393 18.4961C2.2545 18.1721 2.04046 17.728 2.00472 17.2528L2 17.1111V5.77778C1.99985 5.30123 2.17983 4.84224 2.50386 4.49282C2.82789 4.14339 3.27202 3.92935 3.74722 3.89361L3.88889 3.88889H5.77778V2.94444C5.77778 2.69396 5.87728 2.45374 6.0544 2.27662C6.23152 2.0995 6.47174 2 6.72222 2C6.9727 2 7.21293 2.0995 7.39005 2.27662C7.56716 2.45374 7.66667 2.69396 7.66667 2.94444V3.88889H13.3333V2.94444C13.3333 2.69396 13.4328 2.45374 13.61 2.27662C13.7871 2.0995 14.0273 2 14.2778 2ZM13.1671 8.02461L9.16078 12.0309L7.82439 10.6955C7.64626 10.5235 7.4077 10.4283 7.16007 10.4304C6.91244 10.4326 6.67556 10.5319 6.50045 10.707C6.32534 10.8821 6.22602 11.119 6.22386 11.3666C6.22171 11.6143 6.31691 11.8528 6.48894 12.0309L8.4855 14.0284C8.57409 14.1171 8.67928 14.1875 8.79507 14.2354C8.91086 14.2834 9.03497 14.3081 9.16031 14.3081C9.28564 14.3081 9.40975 14.2834 9.52554 14.2354C9.64133 14.1875 9.74652 14.1171 9.83511 14.0284L14.5026 9.36006C14.5928 9.27293 14.6647 9.16872 14.7142 9.05349C14.7637 8.93827 14.7898 8.81434 14.7908 8.68893C14.7919 8.56353 14.768 8.43917 14.7206 8.3231C14.6731 8.20703 14.6029 8.10158 14.5143 8.0129C14.4256 7.92423 14.3201 7.8541 14.2041 7.80661C14.088 7.75912 13.9636 7.73523 13.8382 7.73632C13.7128 7.73741 13.5889 7.76346 13.4737 7.81296C13.3584 7.86246 13.2542 7.93441 13.1671 8.02461Z" />
                            </svg>
                        </i>Booking</a>
                </li>
            </ul>
            <div class="text-sm font-medium w-full">
                <p>Halaman Akun</p>
                <a href="/admin/profile"
                    class="flex gap-3 items-center p-2 text-[#A6AFCA]  font-medium w-full rounded-md @yield('menu-profile')">
                    <i>
                        <svg class="fill-[#A6AFCA]" width="16" height="16" viewBox="0 0 16 16"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.44444 3.55556C4.44444 2.61256 4.81905 1.70819 5.48584 1.0414C6.15264 0.374602 7.05701 0 8 0C8.94299 0 9.84736 0.374602 10.5142 1.0414C11.181 1.70819 11.5556 2.61256 11.5556 3.55556C11.5556 4.49855 11.181 5.40292 10.5142 6.06971C9.84736 6.73651 8.94299 7.11111 8 7.11111C7.05701 7.11111 6.15264 6.73651 5.48584 6.06971C4.81905 5.40292 4.44444 4.49855 4.44444 3.55556ZM4.44444 8.88889C3.2657 8.88889 2.13524 9.35714 1.30175 10.1906C0.468253 11.0241 0 12.1546 0 13.3333C0 14.0406 0.280952 14.7189 0.781049 15.219C1.28115 15.719 1.95942 16 2.66667 16H13.3333C14.0406 16 14.7189 15.719 15.219 15.219C15.719 14.7189 16 14.0406 16 13.3333C16 12.1546 15.5317 11.0241 14.6983 10.1906C13.8648 9.35714 12.7343 8.88889 11.5556 8.88889H4.44444Z" />
                        </svg>
                    </i>Profile</a>
            </div>
        </div>
    </div>

</aside>
