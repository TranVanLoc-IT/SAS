
<x-app-layout>
    <x-slot name="content">
    <div class="p-[15px] h-full bg-white mt-1 ml-1">

        <div class="w-full min-h-max">
        <div class="w-full max-h-20">
            <img src="" alt="">
        </div>
        </div>
        <div class="w-full min-h-2" id="messages-area">

        </div>
        <script>
            window.onload = function(){
                
        fetch("http://localhost:3000/" + <?php echo Auth::user()->id;?>, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then((response) => {
            if (!response.ok) {
                // error processing
                document.getElementById("messages-area").innerText = "Không có tin nhắn nào !!";
            }
            return response.json();
        })
        .then(data => {
            var generate = "";
            
            data.forEach((e)=>{
                if(e["seen"] == 1)
                {
                generate += `<div class="mt-2 pl-3 w-full bg-white dark:bg-orange-400 p-2 ${e["id"]}">
                            <div class="flex items-center justify-between w-full">
                                <p tabindex="0" class="focus:outline-none text-sm leading-none">${e["title"]}</p>
                                <div tabindex="0" aria-label="close icon" role="button" class="focus:outline-none cursor-pointer">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5 3.5L3.5 10.5" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M3.5 3.5L10.5 10.5" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <div><a class="pointer" onclick='SeenMessages(this)' class="${e["id"]}">${e["content"]}</a></div>
                            <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">Thời gian đăng: ${e["timeUp"]} - Hạn chót: ${e["timeEvent"]}</p>
                        </div>`;
                }
                else{
                    
                generate += `<div class="mt-2 pl-3 w-full bg-white dark:bg-orange-400 p-2 ${e["id"]}">
                            <div class="flex items-center justify-between w-full">
                                <p tabindex="0" class="focus:outline-none text-sm leading-none">${e["title"]}</p>
                                <div tabindex="0" aria-label="close icon" role="button" class="focus:outline-none cursor-pointer">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5 3.5L3.5 10.5" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M3.5 3.5L10.5 10.5" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                            <a onclick='SeenMessages(this)' class="btn btn-primary ${e["id"]}" data-bs-toggle="collapse" href="#collapse_${e["id"]}" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Nội dung ..
                            </a>
                            <div class="collapse" id="collapse_${e["id"]}">
                                <div class="card card-body">
                                    ${e["content"]}
                                </div>
                            </div>
                            </div>
                            <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">Thời gian đăng: ${e["timeUp"]} - Hạn chót: ${e["timeEvent"]}</p>
                        </div>`;
                }
            });
            document.getElementById("messages-area").innerHTML = generate;
        })
            }

        function SeenMessages(e){
            e.preventDefault();
            fetch("http://localhost:3000/" + "<?php echo Auth::user()->id."?id=";?>" + e.class, {
                method: 'PUT',
                data: {"seen": 1},
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then((response) => {
                if (!response.ok) {
                    document.getElementById("messages-area").innerText = "Không có tin nhắn nào !!";
                }
                return response.json();
            })
            .then(data => {
                document.querySelector("div." + e.class).removeClass("dark:bg-orange-400");
            });
        }
        </script>
    </x-slot>
</x-app-layout>