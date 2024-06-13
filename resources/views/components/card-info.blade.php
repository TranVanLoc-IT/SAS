@props(['student', 'parent', 'attendance'])

@if(isset($student))
        <div class="p-16">
            <div class="p-8 bg-white shadow mt-24">
                <div class="grid grid-cols-1 md:grid-cols-3">
                    <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">
                        <div>
                            <p class="font-bold text-gray-700 text-xl">{{$attendance[0]->totalPresent}}</p>
                            <p class="text-gray-400">Vắng mặt</p>
                        </div>
                        <div>
                            <p class="font-bold text-gray-700 text-xl">{{$attendance[0]->totalAbsent}}</p>
                            <p class="text-gray-400">Có mặt</p>
                        </div>
                        <div>
                            <p class="font-bold text-gray-700 text-xl">{{(100 - $attendance[0]->totalAbsent * 40)<0?0:(100 - $attendance[0]->totalAbsent * 40)}}</p>
                            <p class="text-gray-400">Chuyên cần</p>
                        </div>
                    </div>
                    <div class="relative">
                        <div
                            class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
                            <img src="{{$student->imageCard}}" alt="{{$student->imageCard}}">
                        </div>
                    </div>
                </div>
                <div class="mt-20 text-center border-b pb-12">
                  <div class="text-gray-900 font-bold text-xl mb-2">{{$student->lastName.' '.$student->firstName}} - {{$student->studentId}}</div>
                  <p class="text-gray-700 text-base"><span><b>Nơi sinh: </b></span>{{$student->born}}</p>
                  <p class="text-gray-700 text-base"><span><b>Ngày sinh: </b></span>{{$student->birthDay}}</p>
                </div>
                <div class="mt-12 flex flex-col justify-center">
                    <p class="text-gray-600 text-center font-light lg:px-16">
                      <h1 class="overline font-bold italic text-xl">Thông tin phụ huynh:</h1> <br>
                      <hr class="my-2 border border-1">
                      @if(isset($parent))
                      @foreach($parent as $p)
                            <div class="flex items-center">
                              <img class="w-10 h-10 rounded-full mr-4" src="" alt="Avatar of Jonathan Reinink">
                                  <div class="text-sm">
                                      <p class="text-gray-900 leading-none antiliased font-bold text-sm">{{$p->firstName.' '.$p->lastName}}</p>
                                      <hr class="border border-1 my-1">
                                      <p class="text-gray-600 antiliased font-bold text-sm">SĐT: {{$p->phoneNumber}}</p>
                                  </div>
                            </div>
                          @endforeach
                      @endif
                </div>
            </div>
        </div>
@endif