<x-app-layout>
    <x-slot name="content">
        <!-- Content -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between mb-6">
                        <div>
                            <div class="flex items-center mb-1">
                                <div class="text-2xl font-semibold" id="totalSubject">
                                    @if(isset($subjectLst))
                                    {{count($subjectLst)}}
                                    @else
                                    Chưa có dữ liệu
                                    @endif
                                </div>
                            </div>
                            <div class="text-sm font-medium text-gray-400">Môn học</div>
                        </div>
                        <div class="dropdown">
                            <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                                    class="ri-more-fill"></i></button>
                            <ul
                                class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                @if(isset($semesters))
                                @foreach($semesters as $itm)
                                <li>
                                    <a href="./thong-ke/mon-hoc/{{$itm->semesterId}}"
                                        class="ajx flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">{{$itm->semester}}</a>
                                </li>
                                @endforeach
                                @else
                                None
                                @endif
                            </ul>
                        </div>
                    </div>
                    <a href="/thong-ke" class="text-[#f84525] font-medium text-sm hover:text-red-800">Xem</a>
                </div>
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between mb-4">
                        <div>
                            <div class="flex items-center mb-1">
                                <div class="text-2xl font-semibold">
                                    @if(isset($totalStudents))
                                    {{$totalStudents}}
                                    @else
                                    0
                                    @endif
                                </div>
                                <div
                                    class="p-1 rounded bg-emerald-500/10 text-emerald-500 text-[12px] font-semibold leading-none ml-2">
                                    +30%</div>
                            </div>
                            <div class="text-sm font-medium text-gray-400">Sinh viên</div>
                        </div>
                        <div>{{$currentSemester}}</div>
                    </div>
                    <a href="/#" class="text-[#f84525] font-medium text-sm hover:text-red-800">Xem</a>
                </div>
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between mb-6">
                        <div>
                            <div class="text-2xl font-semibold mb-1">100</div>
                            <div class="text-sm font-medium text-gray-400">Thành tựu</div>
                        </div>
                        <div class="dropdown">
                            <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                                    class="ri-more-fill"></i></button>
                            <ul
                                class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                <li>
                                    <a href="#"
                                        class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Hồ sơ</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Cài đặt</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Đăng xuất</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
                    <div class="flex justify-between mb-4 items-start">
                        <div class="font-medium">Tiến độ tham gia học tập</div>
                        <div class="dropdown">
                            <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                                    class="ri-more-fill"></i></button>
                            <ul
                                class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                <li>
                                    <a href="#"
                                        class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Hồ
                                        sơ</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Biểu
                                        đồ cột</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Xuất
                                        file</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                        <div class="rounded-md border border-dashed border-gray-200 p-4">
                            <div class="flex items-center mb-0.5">
                                <div class="text-xl font-semibold" id="is_learning">10</div>
                            </div>
                            <span class="text-gray-400 text-sm">Đang học</span>
                        </div>
                        <div class="rounded-md border border-dashed border-gray-200 p-4">
                            <div class="flex items-center mb-0.5">
                                <div class="text-xl font-semibold" id="is_completed">50</div>
                            </div>
                            <span class="text-gray-400 text-sm">Hoàn thành</span>
                        </div>
                        <div class="rounded-md border border-dashed border-gray-200 p-4">
                            <div class="flex items-center mb-0.5">
                                <div class="text-xl font-semibold">0</div>
                            </div>
                            <span class="text-gray-400 text-sm">Nghỉ học</span>
                        </div>
                    </div>
                    <div>
                        <canvas id="order-chart"></canvas>
                    </div>
                </div>
                <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                    <div class="flex justify-between mb-4 items-start">
                        <div class="font-medium">Chuyên cần môn học</div>
                        <div class="dropdown">
                            <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                                    class="ri-more-fill"></i></button>
                            <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]"
                                id="f-sublst">
                                @if(isset($subjectLst))
                                @foreach($subjectLst as $item)
                                <li>
                                    <a href="./chuyen-can/{{$item->subjectId}}"
                                        class="subajx flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">{{$item->subjectName}}</a>
                                </li>
                                @endforeach
                                @else
                                <li>Chưa có dữ liệu</li>
                                @endif
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                                    class="ri-more-fill"></i></button>
                            <ul
                                class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">

                                <li
                                    class="seajx flex items-center text-[13px] py-1.5 text-success text-bold px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50 semesterSelected">
                                    Chưa chọn</li>
                                @if(isset($semesters))
                                @foreach($semesters as $itm)
                                <li>
                                    <a href="./thong-ke/chuyen-can-mon-hoc/hoc-ky/{{$itm->semesterId}}"
                                        class="seajx flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">{{$itm->semester}}</a>
                                </li>
                                @endforeach
                                @else
                                None
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[460px]">
                            <thead>
                                <tr>
                                    <th
                                        class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                                        Buổi học</th>
                                    <th
                                        class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                        Nội dung</th>
                                    <th
                                        class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">
                                        Có mặt</th>
                                    <th
                                        class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">
                                        Sĩ số</th>
                                </tr>
                            </thead>
                            <tbody id="studentAttResult">
                                <tr>
                                    <td>Chưa có thông tin</td>
                                    <td>Chưa có thông tin</td>
                                    <td>Chưa có thông tin</td>
                                    <td>Chưa có thông tin</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function() {
            $("a.ajx").click(function(event) {
                event.preventDefault();
                $.ajax({
                    type: "GET",
                    url: $(this).attr("href"),
                    contenttype: "application/json",
                    success: function(response) {
                        if (response.totalSubjects != null) {
                            $("#totalSubject").text(response.totalSubjects[0]
                                .totalSubjects);
                        } else {}
                    },
                    error: function(xhr, status, error) {
                        // Xử lý lỗi
                        alert("Failed" + status);
                    }
                });
            });

            $("a.seajx").click(function(event) {
                event.preventDefault();
                $(".semesterSelected").text($(this).text());
                $.ajax({
                    type: "GET",
                    url: $(this).attr("href"),
                    contenttype: "application/json",
                    success: function(response) {
                        if (response.subjectList != null) {
                            $("#f-sublst").html("");
                            response.subjectList.forEach((el) => {
                                $("#f-sublst").html($("#f-sublst").html() +
                                    `<a href="/thong-ke/chuyen-can-mon-hoc/mon-hoc" id='${el.subjectId}' onclick='LoadSDiligent(event, this)' class=" flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">${el.subjectName}</a>`
                                );
                            });
                        } else {}
                    },
                    error: function(xhr, status, error) {
                        // Xử lý lỗi
                        alert("Failed" + status);
                    }
                });
            });
        });

        
        function LoadSDiligent(event, e) {
            event.preventDefault();
                $.ajax({
                    type: "GET",
                    url: e.getAttribute("href") + "?subjectId=" + e.getAttribute("id"),
                    data: {"subjectId" : e.getAttribute("id")},
                    contenttype: "application/json",
                    success: function(response) {
                        if (response.sdiligent != null) {
                            $("#studentAttResult").html("");
                            response.sdiligent.forEach((s) => {
                            $("#studentAttResult").html($("#studentAttResult").html() + `<tr>
                                            <td class="py-2 px-4 border-b border-b-gray-50">
                                                <div class="flex items-center">
                                                    <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">${s.dateActive}</a>
                                                </div>
                                            </td>
                                            <td class="py-2 px-4 border-b border-b-gray-50">
                                                <span class="text-[13px] font-medium text-emerald-500">${s.lesson_content}</span>
                                            </td>
                                            <td class="py-2 px-4 border-b border-b-gray-50">
                                                <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">${s.totalPresent==null?0:s.totalPresent}</span>
                                            </td>
                                            
                                            <td class="py-2 px-4 border-b border-b-gray-50">
                                                <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">${s.totalStudent}</span>
                                            </td>
                                        </tr>`);
                            });
                        } else {}
                    },
                    error: function(xhr, status, error) {
                        // Xử lý lỗi
                        alert("Failed" + status);
                    }
                });
            };
        </script>
        <!-- End Content -->
    </x-slot>
</x-app-layout>