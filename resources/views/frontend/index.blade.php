<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Coffe Shop</title>
    <style>
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.5s ease-in-out;
        }
    </style>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    {{-- Hero --}}
    <div class="overflow-x-hidden scroll-smooth ">
        <div class="relative">
            <img class="w-full h-[726px] object-cover" src="{{ asset('img/BG.svg') }}" alt="Hero Image">
            <div class="absolute inset-0 flex  text-white">
                <!-- Navigation Bar -->
                <div class="container mx-auto">
                    <div class="flex justify-between mt-7 items-center">
                        <span class="text-[24px] hidden sm:inline">Filtro</span>
                        <!-- Hamburger Menu -->
                        <div class="lg:hidden mx-2">
                            <button id="toggleButton"
                                class="flex items-center px-3 py-2 border rounded text-gray-200 border-gray-300 hover:text-white hover:border-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                            <ul id="menu" class="hidden">
                                <li class="py-2"><a href="#" class="block px-7">Home</a></li>
                                <li class="py-2"><a href="#" class="block px-7">Explore Us</a></li>
                                <li class="py-2"><a href="#" class="block px-7">Brands</a></li>
                                <li class="py-2"><a href="#" class="block px-7">Contact Us</a></li>
                                <a href="#"
                                    class="bg-[#A0583C] hover:bg-[#824D38] transition-colors duration-300 ease-in-out text-white px-4 py-2 rounded-lg inline-block">
                                    Sign up/Login
                                </a>
                                <a href="#"
                                    class="bg-[#A0583C] hover:bg-[#824D38] transition-colors duration-300 ease-in-out text-white px-4 py-2 rounded-lg inline-block ml-2">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        class="inline-block">
                                        <mask id="mask0_6_59" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0"
                                            y="0" width="20" height="20">
                                            <rect width="20" height="20" fill="url(#pattern0)" />
                                        </mask>
                                        <g mask="url(#mask0_6_59)">
                                            <rect width="20.8" height="19.6" fill="white" />
                                        </g>
                                        <defs>
                                            <pattern id="pattern0" patternContentUnits="objectBoundingBox"
                                                width="1" height="1">
                                                <use xlink:href="#image0_6_59" transform="scale(0.01)" />
                                            </pattern>
                                            <image id="image0_6_59" width="100" height="100"
                                                xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAABmJLR0QA/wD/AP+gvaeTAAAFf0lEQVR4nO2dW4iVVRTHf8eZtMymMbuKjUk3BwtzpoSKASElS6wQIuuhhx4qBIl66fISREH1Ur6kFURZDwmREcUE0kWpyUKKpCtTTkennEbtOmijzpwelgem8Yxzvv3tvdf+zt4/+L8Mzuy/a32Xvde+fJBIJBKJhBklbQOKlIBFQBfQAVwArAV2apqKkXnAU0AZqIzTTYq+omM+sAkY4fhEVHWLmruIOBV4BjjKxImoaomSx2joBH5i8kRUdZaOzTi4DThE/cno1bEZB3dS3yNqrJ5WcRoB1wOHyZaMEeBSDbONzhxgP9mSUQHe0DAbA++SPRnDwEUaZhudFWRPRgW4X8NsDPSQPRlvE3f5yBlXkD0Z3wGna5iNgcfJloxvgfNUnEbCh9SfjPeAmTo24+FXJk/EQeABoEnJY1T8w4kHfa8i8x0JTwxwfCLKwJPAhYq+MtOsbcASryAv6UGk97Qd+KbO320B2oBZwGnAAaAf2GPf5uRo9cHnIzWnLmABcD4ybzGMlD76gM+AbcAWpGprk6uB1cj8x2XAlBr/Zi/wPtANbHbgQZ2TgXuBHWTrog4BrwPLqR24LO3fDXyfsf0K8AfwHA1SgGxCFg/sxay0MVa7kTHHJRnanwk8Qu33TFYdBTYCF2eMQTB0AF+SPxC19Alyx9UqDE4BFgPPcuIemKmGkQvjlHzh8cta4F/cJGO8BpAXeTfy7jEpwZuoF7jWVsBc0QSsx09AQtAR4EErkXNAE/IC1g6Shl4msCpACXgB/cBoahMBje0eQj8gIej5vIG0wWKyLyxoZN1hGsg8A60q05Fb9SQLf6sR2Ae0axp4DP0rMgR9DKxE+cJsI9vqwEZUP/KICmJufh36AdG+K87MHUVLnIGbskRRtBGYmjuKFrkP/aBoaQuBDQLBbB1UI2gX8nQIirnAKPrB0dAKC/GbENNxyDIC6VV4ZiuyftgZpgm5xqqL4vCEtoGJ+AH9R4dv/YaHF7nJHTKVgi2tscRmZI2XU0wSMo8Au3we2OGjEZOExHh3AHztoxGThMS6ddjLwjmThMyw7qIYDPtoxCQh0627KAbOX+hglpBp1l0Ug7N9NGKSkIPWXRSDuT4aMUnI39ZdFAMv07IpIfWz1EcjJgnps+6iGCzBw4SUSUKqdazYmAHcqm1iIn5Bv9inIeflE9Py+xdWXRSHTmTjkDNME7LVqotisQHZfucE06rtYWR7WIy0IptDu7WNjKUJf5tiQtWa3FGsgekdUkH22XVY9FI0lgM/A19pG6myFP2rNAStw86i9dw0Y2dnayNoO7L3PTd5pmJHkS3HXTaMFJw5wF3AQmSjax+eyvXjaSP7cawx6FPTgOZ99u1GjslL/J8Nmo13Eu+y0loqE8BusnfQD0QouidnLK2Q7hJRPwFNcb+GfkC05WT0bsq5wF/oB0VLO7FwaIDNJaFDiDEvU52BMQqsQnqdQdEMfI7+1epbL9oInivaiWur9AEsLq91sYp9PzJfsszB3w6RNch+y6ApAW+if/W61lu2AuaDVrJ9kKtoGgTOsRYtT1wO/Il+8FxopcU4eeU6ZCm/dgBtar3VCClwO41Tpu8hoPJIHlYjB0ZqBzSP9gCzbQdGk1XIdgbtwJpI/WAyV1xF8ZaiDgJXugjGeLSOx5gNvIQcyG/CCHJW1QfIstZdSG/uEDLYbUHmuRciBx3fcOxnJvQCNwI/Gv5+YSghR4Xvo/4rtQw8TPb+/zTk27gfUf+8zShSo2o1/P8VlhbgUWp/cL6C3A3dwM3YKfW0I5/z/n2C9o4gpzaorKYJ6USfEnLc7AKkWDeElLN7kAKebZqBRcjgddaxn5WRb5YMOGgvkUgkEolEIpFIJBKJRCKRaCj+A+Bkw43vAOmLAAAAAElFTkSuQmCC" />
                                        </defs>
                                    </svg>
                                    Get the App
                                </a>
                            </ul>
                        </div>

                        <!-- Regular Navigation Bar (visible on larger screens) -->
                        <div class="hidden lg:flex text-base">
                            <span class="px-7">Home</span>
                            <span class="px-7">Explore Us</span>
                            <span class="px-7">Brands</span>
                            <span class="px-7">Contact Us</span>
                        </div>
                        <div class="text-[12px] hidden lg:flex">
                            <a href="#"
                                class="bg-[#A0583C] hover:bg-[#824D38] transition-colors duration-300 ease-in-out text-white px-4 py-2 rounded-lg inline-block">
                                Sign up/Login
                            </a>
                            <a href="#"
                                class="bg-[#A0583C] hover:bg-[#824D38] transition-colors duration-300 ease-in-out text-white px-4 py-2 rounded-lg inline-flex gap-2 ml-2">
                                <img src="{{ asset('icons/apple logo.svg') }}" alt="">
                                Get the App
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-col h-full justify-center items-center mx-2">
                        <span class="text-7xl mx-2">
                            Power up with coffee
                        </span>
                        <span class="pt-[6px] text-2xl mx-2">
                            Start your exciting day with a cup of Brew Coffee
                        </span>
                        <a href="#"
                            class="bg-[#A0583C] hover:bg-[#824D38] transition-colors duration-300 ease-in-out text-white px-16 py-2 rounded-xl ml-2 mt-7 text-xl">Explore
                            Us</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-[51px] mx-auto bg-[#FFFADA] min-h-screen">
            <div class="flex  items-center justify-center gap-[36px]">
                <svg width="450" height="5" viewBox="0 0 450 5" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <line y1="2.5" x2="450" y2="2.5" stroke="#A0583C" stroke-width="5" />
                </svg>
                <span class="text-[23px] font-medium text-[#C08267]">Explore the Coffee World</span>
                <svg width="450" height="5" viewBox="0 0 450 5" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <line y1="2.5" x2="450" y2="2.5" stroke="#A0583C" stroke-width="5" />
                </svg>
            </div>
            {{-- Card --}}
            <div
                class="flex flex-col md:grid md:grid-cols-2  lg:flex lg:flex-row justify-center items-center mx-10 gap-[41px] mt-[47px]">
                @foreach ($data as $coffe)
                    <div data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"
                        class="max-w-[260px] bg-[#C08267] p-4 rounded-xl shadow-lg">
                        <img src="{{ $coffe['image'] }}" alt="Card Image"
                            class="object-cover mb-4 rounded-lg max-w-full max-h-[170px]  mx-auto">
                        <div class="card-body">
                            <span class="text-2xl text-white font-bold mb-2 mt-2">{{ $coffe['title'] }}</span>
                            <p class="text-[#FFFADA] mb-[50px] mt-[11px] line-clamp-3 hover:line-clamp-none">
                                {{ $coffe['description'] }}</p>
                            <div class="flex flex-col mx-10 xl:flex-row xl:mx-0 items-center justify-between mt-4">
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
                <div class="flex gap-[36px] justify-center items-center">
                    <svg width="450" height="5" viewBox="0 0 450 5" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <line y1="2.5" x2="450" y2="2.5" stroke="#A0583C" stroke-width="5" />
                    </svg>
                    <span class="text-[23px] font-medium text-[#C08267]">Brands We Work With</span>
                    <svg width="450" height="5" viewBox="0 0 450 5" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <line y1="2.5" x2="450" y2="2.5" stroke="#A0583C" stroke-width="5" />
                    </svg>
                </div>
            </div>
            <div class="flex justify-center" data-aos="zoom-in-down">
                <div class="flex gap-[43px] overflow-x-auto">
                    <img src="{{ asset('img/Stackbuks logo.svg') }}" alt="">
                    <img src="{{ asset('img/Nescafe-Logo.svg') }}" alt="">
                    <img src="{{ asset('img/Tim hortins.svg') }}" alt="">
                    <img src="{{ asset('img/Dunkin Donuts.svg') }}" alt="">
                </div>
            </div>
        </div>


        <div class="pt-[37px] mx-auto bg-[#C08267]">
            <div class="flex items-center justify-center gap-[36px]">
                <svg width="450" height="5" viewBox="0 0 450 5" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <line y1="2.5" x2="450" y2="2.5" stroke="#FFFADA" stroke-width="5" />
                </svg>
                <span class="text-[23px] font-medium text-white">Get in Touch with Us</span>
                <svg width="450" height="5" viewBox="0 0 450 5" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <line y1="2.5" x2="450" y2="2.5" stroke="#FFFADA" stroke-width="5" />
                </svg>
            </div>

            {{-- Footer --}}
            <div class="mt-[163px] flex mx-auto gap-10 justify-center items-center">
                <div class="flex flex-col md:flex-row md:mx-4 lg:mx-0">
                    <div class="text-white flex flex-col md:mr-[112px]">
                        <span class="text-[24px] font-bold">Merchandise</span>
                        <div class="text-[21px] flex flex-col">
                            <span>T-shirts</span>
                            <span>Caps</span>
                            <span>Masks</span>
                        </div>
                    </div>
                    <div class="text-white flex flex-col md:mr-[112px]">
                        <span class="text-[24px] font-bold">Franchise</span>
                        <div class="text-[21px] flex flex-col">
                            <span>Coffee Outlet</span>
                            <span>Coffee Vending Machine</span>
                            <span>Contact Us</span>
                        </div>
                    </div>
                    <div class="text-white flex flex-col md:mr-[82]">
                        <span class="text-[24px] font-bold">About Us</span>
                        <div class="text-[21px] flex flex-col">
                            <span>Promotions</span>
                            <span>Customer Care</span>
                            <span>Achievements</span>
                            <span>Careers</span>
                            <span>Legal Information</span>
                        </div>
                    </div>
                    <div class="text-white flex flex-col">
                        <span class="text-[24px] font-bold">Follow Us</span>
                        <div class="flex">
                            <div>
                                <img src="{{ asset('icons/Insta.svg') }}" alt="">
                            </div>
                            <div>
                                <img src="{{ asset('icons/Fb.svg') }}" alt="">
                            </div>
                            <div>
                                <img src="{{ asset('icons/pinterest.svg') }}" alt="">
                            </div>
                            <div>
                                <img src="{{ asset('icons/twitter.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center justify-center mt-[139px]">
                <div class="mb-[36px]">
                    <svg width="1205" height="4" viewBox="0 0 1205 4" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <line y1="1.52808" x2="1205" y2="1.52808" stroke="#FFFADA" stroke-width="3" />
                    </svg>
                    <div class="flex mt-[19px] gap-3 justify-center items-center text-white">
                        <img src="{{ asset('icons/Mask group.svg') }}" alt="">

                        <div>
                            <span class="text-[24px]">
                                Filtro
                            </span>
                        </div>
                        <div>
                            <span class="text-[21px]">All Rights Reserved</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggleButton').addEventListener('click', function() {
            document.getElementById('menu').classList.toggle('hidden');
        });
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>
