<x-app-layout>
    <x-slot name="content">
        <div class="flex flex-start mb-0">
            <div class="p-2 bg-gray-100 hover:text-green-500 hover:border-t-4 hover:border-green-300">
                <a href="{{route('diem-danh')}}">{{__('Điểm danh theo ngày')}}</a>
            </div>
            <div class="p-2 hover:text-green-500 hover:border-t-4 hover:border-green-300 bg-gray-100">
                <a class="useQRCode" href="#">{{__('Điểm danh QR Code')}}</a>
            </div>
        </div>
        <div class="bg-gray-100 h-100">
            <div id="subjectInfo" class="w-100 flex justify-around">
                <div>
                    <span>Mã lớp học: </span>
                    @if(isset($subjectList))
                    <x-dropdown>
                        <x-slot name="title">
                            {{__($subjectList[0]->subjectId)}}
                        </x-slot>
                        <x-slot name="content">
                            <ul id="subjectList">
                                @foreach($subjectList as $subject)
                                <li>
                                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                        tabindex="-1" id="{{ $subject->subjectId }}">{{ $subject->subjectId }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </x-slot>
                        
                    </x-dropdown>
                    @endif
                </div>
                <div class="px-5 font-semibold rounded ring-1 text-center">
                    <p><i>Học phần:</i><span id="subjectName"></span></p>
                    <p><i>Học kỳ: </i><span class="semester"></span></p>
                </div>
                <div class="px-5 font-semibold rounded ring-1 text-center">
                    <p><i>Sĩ số: </i><span class="size"></span></p>
                </div>
            </div>
            <hr class="mb-5">
            <div class="overflow-y-scroll h-full relative ml-2 mt-3">

            <table class="table-fixed min-w-max border-2 overflow-y-scroll" id="attendanceListTable">
                <thead>
                    <tr id="lessonList" class="dark:text-white dark:bg-gray-600">
                    </tr>
                    <tr id="attendanceStatus">
                    </tr>
                </thead>
                <tbody id="studentList">
                </tbody>
            </table>
            </div>

            <form action="xuat-danh-sach-diem-danh">
                <div class="tk-dd pl-5 grid grid-cols-1 divide-y">
                    <h2 class='font-bold text-amber-600 text-lg p-2 antiliased'>Thông tin điểm danh</h2>
                    <div>
                        <p class="p-2 antiliased"><b>Buổi học: </b><span class="lessonToday"></span></p>
                        <div class="flex">
                            <div class="p-2 antiliased"><b>Nội dung học: </b></div>
                            <div class="mx-3"><textarea name="lessonContent" id="lessonContent" value="" onchange="studentAttendanceLst.lessonContent = this.value" cols="50" rows="5"></textarea></div>
                        </div>
                    </div>
                    <div>
                        <b class="p-2 antiliased">Sinh viên có mặt:</b> <span
                            class="presentCounter ring-2 ring-green-300 px-5">0</span>
                    </div>
                    <div>
                        <b class="p-2 antiliased">Sinh viên vắng:</b> <span
                            class="absentCounter ring-2 ring-red-300 px-5">0</span>
                    </div>

                    <button id="btnDown"
                        class="bg-green-400 p-2 mx-2 font-semibold rounded float-end relative text-white dark:bg-green-500"
                        type="button">Xuất file Excel</button>
            </form>
            <button onclick="AttendanceSubmit()"
                class="bg-green-400 p-2 mx-2 font-semibold rounded float-end relative text-white dark:bg-red-500"
                type="button">Đồng ý</button>
        </div>
        </div>
        <script>
        var lesson = "";
        var studentAttendanceLst = {
                "subjectId": $("#menu-button").text(),
                "lessonId": lesson,
                "lessonContent": $("textarea#lessonContent").val(),
                "attendanceLst": [

                ]
            };
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            var subjectId = urlParams.get('subjectId');
            $("#subjectList li").click(function() {
                subjectId = Number($(this).text());
                $("#menu-button").text($(this).text());
                fetch("/diem-danh/mon-hoc?subjectId=" + $(this).text(), {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF Token
                        }
                    })
                    .then((response) => {
                        if (!response.ok) {
                            // error processing
                            throw 'Error';
                        }
                        return response.json()
                    })
                    .then(data => {
                        let lessonListBody = "";

                        let tab = "";
                        data["lessonList"].forEach(lesson => {
                            lessonListBody +=
                                `<th class='border border-2 border-gray-300' id='${lesson["lessonId"]}'><a data-assigned-id="${lesson["lessonId"]}" class="w-min-full h-min-full py-10 px-5">${ moment(lesson["dateActive"], 'YYYY/MM/DD').format('DD/MM/YYYY') }</a></th>`;
                            tab += "<th class='p-5 border border-2 border-gray-300'></th>";
                        });
                        $("#lessonList").html(`
                <th class='p-5 border border-2 border-gray-300'>Mã sinh viên</th>
                <th class='p-5 border border-2 border-gray-300'>Tên sinh viên</th>
                ${lessonListBody}
                <th colspan="2" class='p-5 border border-2 border-gray-300'>Diểm danh</th>
                <th class='p-5 border border-2 border-gray-300'>Số buổi vắng</th>
                <th class='p-5 border border-2 border-gray-300'>Lí do vắng</th>
                <th class='p-5 border border-2 border-gray-300'><a href="">Liên hệ</a></th>
            `);
                        $("#attendanceStatus").html(`
                ${tab}
                <th class='p-5 border border-2 border-gray-300'></th>
                <th class='p-5 border border-2 border-gray-300'></th>
                <th class='p-5 border border-2 border-gray-300'>Có mặt</th>
                <th class='p-5 border border-2 border-gray-300'>Vắng mặt</th>
                <th class='p-5 border border-2 border-gray-300'></th>
                <th class='p-5 border border-2 border-gray-300'></th>
                <th class='p-5 border border-2 border-gray-300'></th>
            `);
                        $("#studentList").html("");
                        data["studentList"].forEach(info => {
                            $("#studentList").html($("#studentList").html() + `<tr>
                <td class='p-5 border border-gray-300'>${info['studentId']}</td>
                <td class='p-5 border border-gray-300'>${info['firstName']} ${info['lastName']}</td>
                ${tab.replaceAll("th", "td")}
                <td class='p-5 border border-gray-300 text-center'><input onchange='InputAttendanceChange(this)' class="present" type="radio" name="${info['studentId']}" id="" value="1"></td>
                <td class='p-5 border border-gray-300 text-center'><input onchange='InputAttendanceChange(this)' class="absent" type="radio" name="${info['studentId']}" id="" value="0"></td>
                <td class='p-5 border border-gray-300'></td>
                <td class='border border-gray-300'><textarea class="h-full w-full" value="" onchange="UpdateReason(this)" id="reason_${info['studentId']}"></textarea></td>
                <td class='p-5 border border-gray-300'><a href="./diem-danh/lien-he?studentId=${info["studentId"]}">Liên hệ</a></td>
            </tr>`)
                        });
                        $("th a").click(function(event) {
                            // Xác định chỉ số của cột tương ứng
                            var columnIndex = $(this).closest("th").index();
                            var today = new Date();
                                                        
                            var dd = String(today.getDate()).padStart(2, '0');
                            var mm = String(today.getMonth() + 1).padStart(2, '0');
                            var yyyy = today.getFullYear();
                            today = dd + '/' + mm + '/' + yyyy;
                            studentAttendanceLst.lessonId = $(this).closest("th").attr("id");
                            $(".lessonToday").text($(this).closest("th").text());
                            var id = $(this).data("assigned-id");
                            // Thêm hoặc xóa lớp CSS cho tất cả các ô trong cột
                            $("#attendanceListTable tbody tr").each(function() {
                                if($(".lessonToday").text() == today)
                                {
                                    $(this).find("td:eq(" + columnIndex + ")")
                                        .toggleClass("bg-green-500");
                                    if (sessionStorage.getItem("columnSelected") !=
                                        null) {
                                        $(this).find("td:eq(" + sessionStorage.getItem(
                                            "columnSelected") + ")").removeClass(
                                            "bg-green-500");
                                    }
                                }
                                else{
                                    confirm("Chọn ngày hiện tại để điểm danh");
                                    return;
                                }
                            });
                            sessionStorage.removeItem("columnSelected");
                            sessionStorage.setItem("columnSelected", columnIndex);
                            $("a.useQRCode").attr("href", "./diem-danh/qrcode" +
                                "?lessonId=" + id);
                        });
                        $("span#subjectName").text(
                            data["subjectInfo"][0]["subjectName"]);

                        $("span.semester").text(
                            data["subjectInfo"][0]["semester"]);

                        $("span.size").text(data["studentList"].length);
                    })
                    .catch(error => console.error('Error:', error));
            });

            if (subjectId != null) {
                $("#" + subjectId).trigger("click");
            }
            
            $("#btnDown").click(function() {
                   var table = document.getElementById('attendanceListTable');

                // Chuyển đổi bảng HTML thành worksheet
                var worksheet = XLSX.utils.table_to_sheet(table);

                // Định dạng tiêu đề in đậm và căn giữa
                var range = XLSX.utils.decode_range(worksheet['!ref']);

                // Định dạng tiêu đề "Điểm danh sinh viên" in đậm và căn chính
                var titleCellAddress = 'I6';
                worksheet[titleCellAddress] = { t: 's', v: 'Điểm danh sinh viên', s: { font: { bold: true }, alignment: { horizontal: "center" } } };

                // Định dạng cột in đậm và căn giữa
                for (var C = range.s.c; C <= range.e.c; ++C) {
                    var cell_address = XLSX.utils.encode_cell({ r: 6, c: C });
                    if (!worksheet[cell_address]) continue;
                    worksheet[cell_address].s = {
                        font: { bold: true },
                        alignment: { horizontal: "center" }
                    };
                }

                // Căn giữa toàn bộ nội dung
                for (var R = range.s.r; R <= range.e.r; ++R) {
                    for (var C = range.s.c; C <= range.e.c; ++C) {
                        var cell_address = XLSX.utils.encode_cell({ r: R, c: C });
                        if (!worksheet[cell_address]) continue;
                        if (!worksheet[cell_address].s) {
                            worksheet[cell_address].s = {};
                        }
                        worksheet[cell_address].s.alignment = { horizontal: "center" };
                    }
                }

                // Thêm khoảng trống và ô ký tên cách 2 ô so với bảng
                var signRow = range.e.r + 3;
                var signCellAddress = 'A' + (signRow + 1);
                worksheet[signCellAddress] = { t: 's', v: 'Ký tên:', s: { font: { bold: true }, alignment: { horizontal: "center" } } };

                // Kiểm tra xem 'worksheet['!merges']' đã được khởi tạo chưa, nếu chưa thì khởi tạo nó
                if (!worksheet['!merges']) {
                    worksheet['!merges'] = [];
                }

                // Hợp nhất ô
                worksheet['!merges'].push({ s: { r: signRow, c: 0 }, e: { r: signRow, c: 2 } });

                // Tạo một workbook
                var workbook = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(workbook, worksheet, "Điểm danh");

                // Xuất file Excel
                XLSX.writeFile(workbook, 
                document.getElementById("menu-button").textContent.trim() + '_' + document.getElementById("subjectName").textContent + '_diem-danh.xlsx');
            });
        });

        function InputAttendanceChange(e) {
            let studentId = $(e).attr("name");
            let status = $(e).attr("value");
            let absentCounter = Number($("span.absentCounter").text());
            let presentCounter = Number($("span.presentCounter").text());
            var isUpdated = false;
            studentAttendanceLst.attendanceLst.forEach(el => {
                if (el.studentId == studentId && el.attendance != status) {
                    el.attendance = status;
                    isUpdated = true;
                    if (status == 1) {
                        $("span.absentCounter").text(absentCounter - 1);
                        $("span.presentCounter").text(presentCounter + 1);
                    } else {
                        $("span.absentCounter").text(absentCounter + 1);
                        $("span.presentCounter").text(presentCounter - 1);
                    }
                }
            });
            if (!isUpdated) {
                studentAttendanceLst.attendanceLst.push({
                    "studentId": studentId,
                    "attendance": status,
                    "reason": $("textarea#reason_" + studentId).val()
                });
                if (status == 0) {
                    $("span.absentCounter").text(absentCounter + 1);
                } else {
                    $("span.presentCounter").text(presentCounter + 1);
                }
            }

        }
        function UpdateReason(e){
            studentAttendanceLst.attendanceLst.forEach(el => {
                if (el.studentId == e.id.split("_")[1]) {
                    el.reason = e.value;
                }
            });
        }

        function AttendanceSubmit() {
            if($(".lessonToday").text() == "")
            {
                alert("Chưa chọn ngày điểm danh !");
                return;
            }
            $.ajax({
                type: "POST",
                url: "http://127.0.0.1:8000/diem-danh/cap-nhat-diem-danh",
                data: JSON.stringify(studentAttendanceLst),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: "application/json",
                success: function(response) {
                    // Xử lý phản hồi từ controller
                    alert(response.msg);
                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi
                    alert("Failed" + xhr.responseText);
                }
            });

        }
        </script>
    </x-slot>
</x-app-layout>