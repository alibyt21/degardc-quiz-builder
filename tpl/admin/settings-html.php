<style>
  .degardc-blur-input:not(:focus) {
    color: transparent;
    text-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
  }
</style>
<style>
  /* START custom css */
  #panel-sections label {
    display: flex;
    white-space: nowrap;
    align-items: center;
  }


  #panel-tabs .active::after {
    width: 50px !important;
    opacity: 100 !important;
  }

  #panel-tabs .panel-tab::after {
    content: "";
    position: absolute;
    height: 10px;
    width: 0px;
    bottom: -4px;
    margin: 0 auto;
    left: 0;
    right: 0;
    z-index: 2;
    border-radius: 10px;
    background-color: #4aaefe;
    opacity: 0;
    transition: all 0.2s cubic-bezier(0.25, 0.1, 0.25, 1);
  }

  #panel-tabs .active {
    transition: all 0.5s cubic-bezier(0.25, 0.1, 0.25, 1);
    color: #333333;
  }

  #panel-sections .active {
    display: block !important;
  }

  #panel-sections th {
    width: 110px;
  }

  /* END custom css */
</style>

<div class="wrap">
  <h2>تنظیمات عمومی آزمون ساز</h2>
</div>

<script src="https://cdn.tailwindcss.com"></script>

<div class="w-full px-5">
  <section class="bg-white shadow-[0_0_20px_#ccd4d733] rounded-lg mt-8 mb-4 border border-solid border-gray-100">
    <div class="overflow-x-auto">
      <div class="flex select-none relative text-gray-400 items-center overflow-x-auto overflow-y-hidden" id="panel-tabs">
        <div id="tab1" class="flex items-center relative md:mx-6 mx-2 py-5 cursor-pointer hover:text-[#4aaefe] transition-all duration-200 panel-tab active">
          <span class="mr-2 text-sm md:text-base" style="white-space:nowrap">
            تنظیمات پیامک
          </span>
        </div>
        <div id="tab2" class="flex items-center relative md:mx-6 mx-2 py-5 cursor-pointer hover:text-[#4aaefe] transition-all duration-200 panel-tab">
          <span class="mr-2 text-sm md:text-base" style="white-space:nowrap">
            پیامک تایید شماره
          </span>
        </div>
        <div id="tab3" class="flex items-center relative md:mx-6 mx-2 py-5 cursor-pointer hover:text-[#4aaefe] transition-all duration-200 panel-tab">
          <span class="mr-2 text-sm md:text-base" style="white-space:nowrap">
            پیامک بعد از ثبت نام
          </span>
        </div>
        <div id="tab4" class="flex items-center relative md:mx-6 mx-2 py-5 cursor-pointer hover:text-[#4aaefe] transition-all duration-200 panel-tab">
          <span class="mr-2 text-sm md:text-base" style="white-space:nowrap">
            پیامک بعد از نتیجه
          </span>
        </div>
      </div>
    </div>
  </section>

  <div id="panel-sections">
    <section id="tab1-section" class="transition-all duration-500 bg-white shadow-[0_0_20px_#ccd4d733] rounded-lg p-3 lg:p-8 md:p-6 overflow-hidden hidden active">
      <label for="sms_api_username">پنل پیامکی</label>
      <select class="regular-text" name="sms_api_username" id="sms_api_username">
        <option value="faraz">فراز اس ام اس</option>
      </select>
      <label for="sms_api_username">نام کاربری وبسرویس</label>
      <input type="text" class="regular-text degardc-blur-input" name="sms_api_username" id="sms_api_username" placeholder="نام کاربری خود را اینجا وارد کنید" value="<?php echo isset($degardc_quiz_builder_options['sms_api_username']) ? $degardc_quiz_builder_options['sms_api_username'] : ''; ?>">
      <label for="sms_api_password">کلمه عبور وبسرویس</label>
      <input type="text" class="regular-text degardc-blur-input" name="sms_api_password" id="sms_api_password" placeholder="رمز عبور خود را اینجا وارد کنید" value="<?php echo isset($degardc_quiz_builder_options['sms_api_password']) ? $degardc_quiz_builder_options['sms_api_password'] : ''; ?>">
      <label for="sms_api_from">شماره ارسال کننده پیامک</label>
      <input type="text" class="regular-text" name="sms_api_from" id="sms_api_from" placeholder="سرشماره ای که از آن پیامک ارسال می‌شود را اینجا وارد کنید" value="<?php echo isset($degardc_quiz_builder_options['sms_api_from']) ? $degardc_quiz_builder_options['sms_api_from'] : ''; ?>">
      <input type="submit" name="degardc_quiz_builder_save_changes" id="degardc_quiz_builder_save_changes" class="button button-primary" value="ذخیره تغییرات">
    </section>

    <section id="tab2-section" class="transition-all duration-500 bg-white shadow-[0_0_20px_#ccd4d733] rounded-lg p-3 lg:p-8 md:p-6 overflow-hidden hidden">
    </section>

    <section id="tab3-section" class="transition-all duration-500 bg-white shadow-[0_0_20px_#ccd4d733] rounded-lg p-3 lg:p-8 md:p-6 border border-solid border-gray-100 hidden">
    </section>
    <section id="tab4-section" class="transition-all duration-500 bg-white shadow-[0_0_20px_#ccd4d733] rounded-lg p-3 lg:p-8 md:p-6 border border-solid border-gray-100 hidden">
    </section>
  </div>
</div>

<script>
  // variables
  let panelTabs = document.getElementById("panel-tabs");
  let panelSections = document.getElementById("panel-sections");

  // events
  panelTabs &&
    panelTabs.addEventListener("click", function(e) {
      let parent = find_related_parent_by_className(e.target, 'panel-tab');
      activeClickedTab(parent.id);
    });

  function activeClickedTab(tabName) {
    for (const child of panelTabs.children) {
      if (child.id === tabName) {
        child.classList.add("active");
      } else {
        child.classList.remove("active");
      }
    }
    for (const child of panelSections.children) {
      if (child.id === tabName + "-section") {
        child.classList.add("active");
      } else {
        child.classList.remove("active");
      }
    }
  }

  function find_related_parent_by_className(node, className) {
    let isFindParent = false;
    let parent = node;
    // prevent infinite loop
    let counter = 0;
    while (!isFindParent && counter <= 5) {
      if (
        parent &&
        parent.className &&
        parent.className.toString().includes(className)
      ) {
        isFindParent = true;
      } else {
        parent = parent.parentNode ? parent.parentNode : parent;
      }
      counter = counter + 1;
    }
    if (isFindParent) {
      return parent;
    } else {
      return false;
    }
  }
</script>