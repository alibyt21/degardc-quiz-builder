<style>

</style>
<script src="https://cdn.tailwindcss.com"></script>

<div class="flex p-4 bg-white m-3 overflow-hidden">
    <table id="all-quiz" class="w-full nowrap" style="width: 100%;">
        <thead>
            <tr>
                <th style="text-align: right;">آزمون</th>
                <th style="text-align: right;">ویرایش</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($results as $result): ?>
            <tr>
                <td>
                    <?= json_decode($result->options)->name ?>
                </td>
                <td>
                    <a href="?page=degardc-quiz-builder-new&id=<?= $result->id ?>" class="bg-blue-500 rounded px-4 py-2 text-white cursor-pointer border-none no-underline hover:text-white">
                        ویرایش
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<script>
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
</script>