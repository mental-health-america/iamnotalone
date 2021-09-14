@extends('layout.master')
@section('content')
<div class="relative">
    <div class="absolute w-full h-full overflow-hidden" style="z-index: -1;">
        <div style="background-position: center; background-repeat: no-repeat; background-size: cover; z-index: -1;"
            class="absolute w-full h-full lazyloaded"></div>
    </div>
    <div class="w-full w-max-770 m-auto p-h-20 p-t-10 p-b-10" style="padding: 13px 231px 9px 112px;">
        <div class="clickable radius shadow w-full p-l-30 fl m-v-20 bg-white" style="padding: 8px 21px 5px 40px;">
            <div class="fl-1">
                <h3 id="what-is-mongodb" class="dark-green clickable m-0 fnt-medium p-v-20" style="color: #116149;padding-top: 20px;padding-bottom: 20px; font-weight: 500;">What is Lorem Ipsum?</h3>
                <div class="overflow-hidden faq_text"
                    style="height: auto; max-height: 1500px; transition: all 200ms ease 0ms; opacity: 1;">
                    <div class="m-0 p-b-30 dark-gray fl fl-wrap">
                        <p>This is a general purpose, document-based, distributed data platform built for modern
                            application developers and for the cloud. No data platform is more productive to use.</p>
                    </div>
                </div>
            </div><button class="clickable m-l-20 green fnt-24 p-h-20">
                <div style="transform: rotate(45deg); transition: all 200ms ease 0ms;">
                    <mdb-icon name="close_x" style="--icon-size: 15px;"></mdb-icon>
                </div>
            </button>
        </div>
        
    </div>
    <div class="w-full w-max-770 m-auto p-h-20 p-t-10 p-b-10" style="padding: 13px 231px 9px 112px;">
        <div class="clickable radius shadow w-full p-l-30 fl m-v-20 bg-white" style="padding: 8px 21px 5px 40px;">
            <div class="fl-1">
                <h3 id="what-is-mongodb" class="dark-green clickable m-0 fnt-medium p-v-20" style="color: #116149;padding-top: 20px;padding-bottom: 20px; font-weight: 500;">What is Lorem Ipsum 2?</h3>
                <div class="overflow-hidden"
                    style="height: auto; max-height: 1500px; transition: all 200ms ease 0ms; opacity: 1;">
                    <div class="m-0 p-b-30 dark-gray fl fl-wrap">
                        <p>This is a general purpose, document-based, distributed data platform built for modern
                            application developers and for the cloud. No data platform is more productive to use.</p>
                    </div>
                </div>
            </div><button class="clickable m-l-20 green fnt-24 p-h-20">
                <div style="transform: rotate(45deg); transition: all 200ms ease 0ms;">
                    <mdb-icon name="close_x" style="--icon-size: 15px;"></mdb-icon>
                </div>
            </button>
        </div>
        
    </div>
</div>
@endsection
@section('js')
    <script>
        var classAdd = function() {
            document.getElementsByClassName("faq_text")[0].style.height= "auto"; 
            document.getElementsByClassName("faq_text")[0].style.maxHeight= "1500px"; 
            document.getElementsByClassName("faq_text")[0].style.transition= "transition: all 200ms ease 0ms;";  
            document.getElementsByClassName("faq_text")[0].style.opacity= "1"; 
        };
        var elements = document.getElementsByClassName("clickable");
        for (var i = 0; i < elements.length; i++) {
            elements[i].addEventListener('click', classAdd, false);
        }

    </script>
@endsection