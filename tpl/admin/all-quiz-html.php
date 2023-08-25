<style>
    td {
        padding: 15px !important;
    }

    th {
        border-top: 1px solid #dddddd;
        border-bottom: 1px solid #dddddd;
        border-right: 1px solid #dddddd;
    }

    .dataTables_filter {
        margin-bottom: 20px;
    }

    .dataTables_wrapper .dataTables_paginate a.paginate_button.current {
        color: white !important;
        background: #4aaefe !important;
        border: 1px solid #4aaefe !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #29A0FF;
        border: 1px solid #29A0FF;
    }

    .dataTables_length {
        margin-bottom: 20px;
    }

    .dataTables_length select {
        margin: 0px 8px;
    }

    .dataTables_filter input {
        margin: 0 8px;
        border: 1px solid #aaaaaa !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0px 12px;
    }

    .dataTables_paginate {
        padding-top: 12px !important;
    }

    .paginate_button {
        border: 1px solid #efefef !important;
        margin: 0px !important;
    }

    #all-quiz_paginate .disabled {
        color: #c0c0c0 !important;
    }

    #all-quiz_length select {
        min-width: 50px;
    }
</style>
<script src="https://cdn.tailwindcss.com"></script>


<div class="w-full my-6">
    <a class="bg-green-600 text-white px-4 py-3 rounded" href="?page=degardc-quiz-builder-new">ساخت آزمون جدید</a>
</div>
<div class="bg-white ml-5 py-5 px-10 rounded">
    <form action="" method="GET">
        <table id="all-quiz" class="w-full cell-border stripe nowrap" style="width: 100%;">
            <thead>
                <tr>
                    <th style="text-align: right;">آزمون</th>
                    <th style="text-align: right;">کد کوتاه</th>
                    <th style="text-align: right;">تاریخ ایجاد</th>
                    <th style="text-align: right;">شرکت کنندگان</th>
                    <th style="text-align: right;">ویرایش</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result) : ?>
                    <tr>
                        <td>
                            <?= json_decode($result->options)->name ?>
                        </td>
                        <td>
                            [degardc_quiz_builder id=<?= $result->id ?>]
                        </td>
                        <td>
                            <?= int_time_to_jalali_date(strtotime($result->created_at), 1) ?>
                        </td>
                        <td>
                            <a href="?page=degardc-quiz-builder-answers&id=<?= $result->id ?>" class="bg-green-700 rounded px-4 py-2 text-white cursor-pointer border-none no-underline hover:text-white">
                                مشاهده
                            </a>
                        </td>
                        <td>
                            <a href="?page=degardc-quiz-builder-new&id=<?= $result->id ?>" class="bg-blue-600 rounded px-4 py-2 text-white cursor-pointer border-none no-underline hover:text-white">
                                ویرایش
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>

<script>
    setTimeout(function() {
        let table = new DataTable('#all-quiz', {
            scrollX: true,
            pagingType: "full_numbers",
            language: {
                lengthMenu: "نمایش _MENU_ نتیجه در هر صفحه",
                zeroRecords: "متاسفانه نتیجه ای یافت نشد",
                info: " نمایش صفحه _PAGE_ از مجموع _PAGES_ صفحه ",
                search: " جستجو: ",
                paginate: {
                    next: "بعدی",
                    previous: "قبلی",
                    first: "ابتدا",
                    last: "انتها",
                },
                infoEmpty: "",
                infoFiltered: "",
            },
        });
    }, 0);
</script>