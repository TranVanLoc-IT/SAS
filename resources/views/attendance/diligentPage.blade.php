<x-app-layout>
    <x-slot name="content">
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
            <table class="table-fixed w-min-full border-2 overflow-x-scroll" id="attendanceListTable">
                <thead>
                    <tr id="lessonList" class="dark:text-white dark:bg-gray-600">
                    </tr>
                    <tr id="attendanceStatus">
                    </tr>
                </thead>
                <tbody id="studentList">
                </tbody>
            </table>

            <form action="xuat-danh-sach-diem-danh">
                <div class="tk-dd pl-5 grid grid-cols-1 divide-y">
                    <h2 class='font-bold text-amber-600 text-lg p-2 antiliased'>Thông tin điểm danh</h2>
                    <div>
                        <p class="p-2 antiliased"><b>Buổi học: </b><span class="lessonToday"></span></p>
                        <div class="flex">
                            <div class="p-2 antiliased"><b>Nội dung học: </b></div>
                            <div class="mx-3"><textarea name="lessonContent" id="lessonContent" value="" contenteditable='false' cols="50" rows="5"></textarea></div>
                        </div>
                    </div>

                    <button onclick="DownMyFile()"
                        class="bg-green-400 p-2 mx-2 font-semibold rounded float-end relative text-white dark:bg-green-500"
                        type="button">Xuất file Excel</button>
            </form>
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
                fetch("/chuyen-can/mon-hoc/" + $(this).text(), {
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
                        return response.json();
                    })
                    .then(data => {
                        let lessonListBody = "";
                        var dateHeader = [];
                        let tab = [];
                        data["lessonList"].forEach(lesson => {
                            dateHeader.push(lesson["lessonId"]);
                            lessonListBody +=
                                `<th class='border border-2 border-gray-300' id='${lesson["lessonId"]}'><a data-assigned-id="${lesson["lessonId"]}" class="w-min-full h-min-full py-10 px-5">${ moment(lesson["dateActive"], 'YYYY/MM/DD').format('DD/MM/YYYY') }</a></th>`;
                            tab += "<th class='p-5 border border-2 border-gray-300'></th>";
                        });
                        $("#lessonList").html(`
                <th class='p-5 border border-2 border-gray-300'>Mã sinh viên</th>
                <th class='p-5 border border-2 border-gray-300'>Tên sinh viên</th>
                ${lessonListBody}
                
                <th class='p-5 border border-2 border-gray-300'>Lý do vắng</th>
                <th class='p-5 border border-2 border-gray-300'>Tổng buổi vắng</th>
                <th class='p-5 border border-2 border-gray-300'>Cấm thi</th>
                <th class='p-5 border border-2 border-gray-300'><a href="">Liên hệ</a></th>
            `);
                        $("#attendanceStatus").html(`
                ${tab}
                <th class='p-5 border border-2 border-gray-300'></th>
                <th class='p-5 border border-2 border-gray-300'></th>
                <th class='p-5 border border-2 border-gray-300'></th>
                <th class='p-5 border border-2 border-gray-300'></th>
            `);
            tab = "";
                        $("#studentList").html("");
                var total = 0;
                data["studentList"].forEach(info => {
                        total = 0;
                        var has = [];
                            data["results"].forEach(re => {
                                if(info["studentId"] == re["studentId"] && !has.includes(re["lessonId"]))
                                {
                                    has.push(re["lessonId"]);
                                    // bị chiếm bởi sinh viên trước đẩy 1 ô
                                    if(re["present"] == 1)
                                    {
                                        tab += `<td class='p-5 border border-gray-300'><a id='${re["lessonId"] + '_' + re["studentId"]}'>Có</a></td>`;
                                    }
                                    else if(re["present"] == 0)
                                    {
                                        total += 1;
                                        tab += `<td class='p-5 border border-gray-300'><a id='${re["lessonId"] + '_' + re["studentId"]}'>Vắng</a></td>`;
                                    }
                                }
                                else if (!has.includes(re["lessonId"])){
                                    var isUpdated = false;
                                    has.push(re["lessonId"]);
                                    data["results"].forEach(ag => {
                                        if(info["studentId"] == ag["studentId"] && ag["lessonId"] == re["lessonId"])
                                        {
                                            isUpdated = true;
                                            if(ag["present"] == 1)
                                            {
                                                tab += `<td class='p-5 border border-gray-300'><a id='${re["lessonId"] + '_' + info["studentId"]}'>Có</a></td>`;
                                            }
                                            else if(ag["present"] == 0)
                                            {
                                                total += 1;
                                                tab += `<td class='p-5 border border-gray-300'><a id='${re["lessonId"] + '_' + info["studentId"]}'>Vắng</a></td>`;
                                            }
                                        }
                                    });
                                    if(!isUpdated){
                                        tab += `<td class='p-5 border border-gray-300' id='${re["lessonId"] + '_' + info["studentId"]}'></td>`;
                                    }
                                }
                            });
                $("#studentList").html($("#studentList").html() + `<tr>
                <td class='p-5 border border-gray-300'>${info['studentId']}</td>
                <td class='p-5 border border-gray-300'>${info['firstName']} ${info['lastName']}</td>
                ${tab}
                <td class='border border-gray-300'><textarea class="h-full w-full" value="" onchange="UpdateReason(this)" id="reason_${info['studentId']}"></textarea></td>
                <td class='p-5 border border-gray-300'>${total}</td>
                <td class='p-5 border border-gray-300'>${total > 3 ? "Cấm": total == 2 ? "Cảnh báo":"Không" }</td>
                <td class='p-5 border border-gray-300'><a href="./diem-danh/lien-he?studentId=${info["studentId"]}">Liên hệ</a></td>
            </tr>`)
            tab = "";
                        });
                        $("td a").click(function(){
                            fetch("/chuyen-can/mon-hoc/li-do/" + $(this).attr("id").split("_")[0] + '/' + $(this).attr("id").split("_")[1], {
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
                        return response.json();
                    })
                    .then(data => {
                        $("textarea#reason_"+ $(this).attr("id").split("_")[1]).val(data["reason"][0]["reason"]);
                    });
                        
                        })
                        $("th a").click(function(event) {
                            // Xác định chỉ số của cột tương ứng
                            var columnIndex = $(this).closest("th").index();

                            $(".lessonToday").text($(this).closest("th").text());
                            var id = $(this).data("assigned-id");

                            fetch("/chuyen-can/mon-hoc/noi-dung/" + id, {
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
                        return response.json();
                    })
                    .then(data => {
                        $("#lessonContent").text(data["content"]["lesson_content"]);
                    });
                            // Thêm hoặc xóa lớp CSS cho tất cả các ô trong cột
                            $("#attendanceListTable tbody tr").each(function() {
                                    $(this).find("td:eq(" + columnIndex + ")")
                                        .toggleClass("bg-green-500");
                                    if (sessionStorage.getItem("columnSelected") !=
                                        null) {
                                        $(this).find("td:eq(" + sessionStorage.getItem(
                                            "columnSelected") + ")").removeClass(
                                            "bg-green-500");
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
        });

            function DownMyFile() {
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
                    XLSX.utils.book_append_sheet(workbook, worksheet, "Chuyên cần");

                    // Xuất file Excel
                    XLSX.writeFile(workbook, 
                document.getElementById("menu-button").textContent.trim() + '_' + document.getElementById("subjectName").textContent + '_chuyen-can.xlsx');
            }
        </script>
    </x-slot>
</x-app-layout>