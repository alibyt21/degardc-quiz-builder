<style>
    .verified {
        color: green;
    }

    .unverified {
        color: grey;
    }

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

    #answers_paginate .disabled {
        color: #c0c0c0 !important;
    }

    #answers_length select {
        min-width: 50px;
    }
</style>
<script src="https://cdn.tailwindcss.com"></script>


<div class="bg-white ml-5 py-5 px-10 rounded">
    <form action="" method="GET">
        <table id="answers" class="w-full cell-border stripe nowrap" style="width: 100%;">
            <thead>
                <tr>
                    <th style="text-align: right;">آزمون</th>
                    <th style="text-align: right;">نام و نام خانوادگی</th>
                    <th style="text-align: right;">شماره تماس</th>
                    <th style="text-align: right;">نمره</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result) : ?>
                    <tr>
                        <td>
                            <?= json_decode($result->options)->name ?>
                        </td>
                        <td>
                            نامشخص
                        </td>
                        <td>
                            <span class="<?= $result->is_verified ? "verified" : "unverified" ?>">
                                <?= $result->mobile_number ? (strlen($result->mobile_number) > 11 ? json_decode($result->mobile_number)->number : $result->mobile_number) : "نامشخص" ?>
                            </span>
                        </td>
                        <td>
                            <?= json_decode($result->result)->totalScore . " %" ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>

<script>
    setTimeout(function() {
        let table = new DataTable('#answers', {
            pageLength: 25,
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