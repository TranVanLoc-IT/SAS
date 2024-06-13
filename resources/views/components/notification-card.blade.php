<!-- component -->

<div class="pl-3 w-full bg-white p-2">
                            <div class="flex items-center justify-between w-full">
                                <p tabindex="0" class="focus:outline-none text-sm leading-none"><span class="text-indigo-700">Sash</span> added you to the group: <span class="text-indigo-700">UX Designers</span></p>
                                <div tabindex="0" aria-label="close icon" role="button" class="focus:outline-none cursor-pointer">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5 3.5L3.5 10.5" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M3.5 3.5L10.5 10.5" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">2 hours ago</p>
                        </div>
        <script>let notification = document.getElementById("notification");
let checdiv = document.getElementById("chec-div");
let flag3 = false;
const notificationHandler = () => {
  if (!flag3) {
    notification.classList.add("translate-x-full");
    notification.classList.remove("translate-x-0");
    setTimeout(function () {
      checdiv.classList.add("hidden");
    }, 1000);
    flag3 = true;
  } else {
    setTimeout(function () {
      notification.classList.remove("translate-x-full");
      notification.classList.add("translate-x-0");
    }, 1000);
    checdiv.classList.remove("hidden");
    flag3 = false;
  }
};
</script>