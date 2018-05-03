<ul class="kefu_list clearfix">
    <?php if (isset($about_us['telphone']) && !empty($about_us['telphone'])): ?>
        <li class="tel_list" style="list-style: none;"><a id="telList"></a>
            <div class="slide_wrapper">
                <p><span>TEL:<?= $about_us['telphone']; ?></span></p>
                <p><span class="country"> </span><span> </span></p></div>
        </li>
    <?php endif; ?>
    <!--    <li class="btn_top" style="list-style: none;dispay:block"><a id="toTop"></a></li>-->
</ul>
