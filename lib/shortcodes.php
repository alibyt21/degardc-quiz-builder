<?php

function dg_quiz_builder_callback()
{
?>
    <script src="https://cdn.tailwindcss.com"></script>

    <div class="dg-main-container relative flex flex-col justify-center items-center px-2 w-full h-screen">
        <div class="bg-red-500 absolute top-4 left-2 h-2 right-2 w-auto rounded-lg my-2"></div>
        <div class="bg-white absolute top-12 left-2 right-2 rounded-lg w-auto h-[90vh] z-[1] shadow-lg">

        </div>
        <div class="bg-white opacity-50 absolute top-12 left-2 right-2 rounded-lg w-auto h-[90vh] translate-y-7 scale-95 shadow-lg">
            sal
        </div>
    </div>
<?php
}
add_shortcode("dg_quiz_builder", "dg_quiz_builder_callback");
