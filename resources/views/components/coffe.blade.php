<div class="pt-[51px] mx-auto bg-[#FFFADA] min-h-screen">
    <div class="flex  items-center justify-center gap-[36px]">
        <svg width="450" height="5" viewBox="0 0 450 5" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line y1="2.5" x2="450" y2="2.5" stroke="#A0583C" stroke-width="5" />
        </svg>
        <span class="text-[23px] font-medium text-[#C08267]">Explore the Coffee World</span>
        <svg width="450" height="5" viewBox="0 0 450 5" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line y1="2.5" x2="450" y2="2.5" stroke="#A0583C" stroke-width="5" />
        </svg>
    </div>
    {{-- Card --}}
    <div class="flex justify-center mx-10 gap-[41px] mt-[47px]">
        @foreach ($data as $coffe)
            <div class="max-w-[260px] bg-[#C08267] p-4 rounded-xl shadow-lg animate-fade-in-up">
                <img src="{{ $coffe['image'] }}" alt="Card Image"
                    class="object-cover mb-4 rounded-lg max-w-full max-h-[170px]  mx-auto">
                <div class="card-body">
                    <span class="text-2xl text-white font-bold mb-2 mt-2">{{ $coffe['title'] }}</span>
                    <p class="text-[#FFFADA] mb-[50px] mt-[11px] line-clamp-3 hover:line-clamp-none">
                        {{ $coffe['description'] }}</p>
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-white font-bold text-[20px]">$8.60</span>
                        <a href="#"
                            class="bg-[#A0583C] hover:bg-[#824D38] transition-colors duration-300 ease-in-out text-white px-[18px] py-2 rounded-xl ml-2 text-xl">Order
                            now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div id="brands-section" class="flex mt-[68px] items-center justify-center">
        <div class="flex gap-[36px]">
            <svg width="450" height="5" viewBox="0 0 450 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line y1="2.5" x2="450" y2="2.5" stroke="#A0583C" stroke-width="5" />
            </svg>
            <span class="text-[23px] font-medium text-[#C08267]">Brands We Work With</span>
            <svg width="450" height="5" viewBox="0 0 450 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line y1="2.5" x2="450" y2="2.5" stroke="#A0583C" stroke-width="5" />
            </svg>
        </div>
    </div>
    <div class="flex justify-center ">
        <div class="flex gap-[43px]">
            <img src="{{ asset('img/Stackbuks logo.svg') }}" alt="">
            <img src="{{ asset('img/Nescafe-Logo.svg') }}" alt="">
            <img src="{{ asset('img/Tim hortins.svg') }}" alt="">
            <img src="{{ asset('img/Dunkin Donuts.svg') }}" alt="">
        </div>
    </div>
</div>
