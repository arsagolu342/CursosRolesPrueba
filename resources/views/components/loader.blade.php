@props(['target' => ''])
<div>
      <style>
            .centrado {
                padding-top: 30%;
                position: absolute;
                top: 50%;
                left: 50%;
                width: 50px;
                height: 50px;
                transform: translate(-50%, -50%);
            }
      </style>
      <div class="absolute left-1/2 top-1/2 z-20 -translate-x-1/2 -translate-y-1/2 transform" wire:loading wire:target="{{ $target }}">
            {{-- <button class="centrado">
                  <img src="https://cdn.pixabay.com/animation/2023/05/02/04/29/04-29-03-511_512.gif" alt="">
            </button> --}}
            <div class="from:30% to:60% via:90% animate-spin rounded-full bg-gradient-to-tr from-[#cc33997b]  to-[#CC3399] p-[5px]">
                  <div class="rounded-full bg-white">
                        <div class="h-14 w-14 z-30 rounded-full"></div>
                  </div>
            </div>

      </div>
</div>
