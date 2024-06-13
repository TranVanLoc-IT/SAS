<!--sidenav -->
<div class="fixed left-0 top-0 w-64 h-full bg-[#f8f4f3] p-4 z-50 sidebar-menu transition-transform">
        <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
            <h2 class="font-bold text-2xl">Sinh viên</span></h2>
        </a>
        <ul class="mt-4">
            <span class="text-gray-400 font-bold">Điểm danh</span>
            <li class="mb-1 group">
                <a href="{{Route('dashboard')}}" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-home-2-line mr-3 text-lg"></i>
                    <span class="text-sm">Thống kê</span>
                </a>
            </li>
            <li class="mb-1 group">
                <div class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class='bx bx-user mr-3 text-lg'></i>                
                    <span class="text-sm">Học tập</span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </div>
                <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                    <li class="mb-4">
                        <a href="{{ route('diem-danh') }}" class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Điểm danh</a>
                    </li> 
                    <li class="mb-4">
                        <a href="{{route('chuyen-can')}}" class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Chuyên cần</a>
                    </li> 
                </ul>
            </li>
            <li class="mb-1 group">
                <a href="" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='bx bx-list-ul mr-3 text-lg'></i>                
                    <span class="text-sm">Bài giảng</span>
                </a>
            </li>
            <span class="text-gray-400 font-bold">Giảng dạy</span>
            <li class="mb-1 group">
                <a href="" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class='bx bxl-blogger mr-3 text-lg' ></i>                 
                    <span class="text-sm">Lịch dạy</span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </a>
                <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                    <li class="mb-4">
                        <a href="{{ route('schedule')}}" class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Tất cả</a>
                    </li> 
                    <li class="mb-4">
                        <a href="{{ route('schedule.today')}}" class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Hôm nay</a>
                    </li> 
                </ul>
            </li>
            <li class="mb-1 group">
                <a href="{{route('report')}}" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='bx bx-archive mr-3 text-lg'></i>                
                    <span class="text-sm">Báo cáo</span>
                </a>
            </li>
            <span class="text-gray-400 font-bold">Cá nhân</span>
            <li class="mb-1 group">
                <a href="{{route('notification')}}" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='bx bx-bell mr-3 text-lg' ></i>                
                    <span class="text-sm">Thông báo</span>
                    <span class=" md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-600 bg-red-200 rounded-full">5</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="{{route('message')}}" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='bx bx-envelope mr-3 text-lg' ></i>                
                    <span class="text-sm">Tin nhắn</span>
                    <span class=" md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-green-600 bg-green-200 rounded-full">2 New</span>
                </a>
            </li>
        </ul>
</div>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<!-- end sidenav -->