<style type="text/css">html, head, body {
        margin: 0;
        padding: 0;
    }

    main section#learn, main > section > div.container {
        width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    main > div.container, header.learn-header {
        display: none;
    }

    span.price.currency-RUB {
        display: none !important;
    }

    .btn.btn-default.btn-lg {
        display: none !important;
    }

    section#top div.thumbnail, section#top div.caption, strike.old_price, section#top p.-text-center {
        padding: 0 !important;
        margin: 0 !important;
    }

    body {
        font-family: 'Roboto', sans-serif;
        min-width: 1150px;
    }

    .left {
        float: left;
    }

    .right {
        float: right;
    }

    .clearfix {
        clear: both;
    }

    .content {
        width: 1150px;
        margin: auto;
    }

    input, textarea {
        outline: none;
    }

    div.line {
        width: 30px;
        height: 1px;
        margin: 20px auto 40px;
        background-color: rgb(173, 0, 17);
    }

    /* top section */
    section#top {
        padding: 80px 0 50px;
        background-image: url(/landing/img/top-bg.jpg);
        background-size: cover;
        position: relative;
    }

    div.logo {
        text-align: center;
    }

    span.top-title {
        display: block;
        text-transform: uppercase;
        font-size: 40px;
        line-height: 49px;
        font-weight: bold;
        margin: 20px auto 20px;
        color: #232269;
        text-align: center;
    }

    span.top-subtitle {
        display: block;
        text-align: center;
        font-size: 24px;
        line-height: 36px;
        margin-bottom: 6px;
        color: #000000;
    }

    a.button {
        display: block;
        width: 250px;
        text-align: center;
        margin: auto;
        background-color: rgb(173, 0, 17);
        font-size: 17px;
        text-transform: uppercase;
        padding: 12px 20px;
        color: #ffffff;
        font-weight: bold;
        border-radius: 37px;
        cursor: pointer;
        transition: all 0.25s ease-in-out;
        text-decoration: none;
    }

    a.button:hover {
        box-shadow: rgba(0, 0, 0, 0.5) 0px 0px 20px;
    }

    a.under-button {
        display: block;
        text-align: center;
        font-weight: bold;
        text-decoration: underline;
        cursor: pointer;
        width: 200px;
        margin: 5px auto 0;
        font-size: 20px;
        color: #000;
        margin-bottom: 20px;
    }

    a.under-button:hover {
        color: #333;
    }

    /* for-whom section */
    section#for-whom {
        padding: 30px 0 20px;
    }

    span.section-title {
        display: block;
        font-size: 38px;
        text-align: center;
        line-height: 49px;
    }

    span.section-subtitle {
        display: block;
        font-size: 14px;
        text-align: center;
        margin: 10px auto;
        line-height: 20px;
        text-transform: uppercase;
    }

    div.fw-content {
        font-size: 0;
        margin: 10px 0 0;
        text-align: center;
    }

    div.fw-content > div {
        display: inline-block;
        vertical-align: top;
    }

    div.fw-item {
        width: 450px;
        text-align: center;
    }

    div.fw-item:first-child {
        margin-right: 50px;
        margin-left: 100px;
    }

    span.fw-item-title {
        font-size: 25px;
    }

    div.img-contain {
        width: 200px;
        height: 200px;
        overflow: hidden;
        border-radius: 200px;
        position: relative;
        margin: 20px auto;
        border: 2px solid rgb(173, 0, 17);
    }

    div.fw-item img {
        position: absolute;
        right: -50px;
        top: -10px;
    }

    div.fw-item-adv {
        width: 333px;
        margin-right: 50px;
        margin-bottom: 50px;
    }

    div.fw-item-adv img {
        width: 80px;
        padding: 20px;
        border: 1px solid #900;
        border-radius: 60px;
        margin-bottom: 20px;
    }

    div.fw-item-adv:nth-of-type(3) {
        margin-right: 0;
    }

    span.fw-item-text {
        font-size: 12px !important;
        display: block;
        line-height: 16px;
        width: 100%;
        margin-left: 5px;
        font-weight: bold;
        text-transform: uppercase;
    }

    div.program {
        margin: 30px auto;
    }

    span.program-title {
        display: block;
        text-align: center;
        font-size: 30px;
        margin-bottom: 30px;
    }

    /* products section */
    section#products {
        padding: 30px 0;
        background-color: #ededed;
    }

    div.products-list {
        margin: 20px 0;
        font-size: 0;
        text-align: center;
    }

    div.product-item {
        display: inline-block;
        width: 250px;
        height: 250px;
        overflow: hidden;
        margin-right: 37.5px;
        margin-bottom: 30px;
        vertical-align: top;
        /*border: 1px solid #aaa;*/
        background-color: #ffffff;
        box-shadow: rgba(0, 0, 0, 0.13) 0px 2px 2px;
        border-radius: 5px;
        cursor: pointer;
    }

    div.product-item:hover {
        filter: brightness(70%);
    }

    div.product-item:nth-child(4n+4) {
        margin-right: 0;
    }

    div.p-img_container {
        width: 100%;
        height: 152px;
        overflow: hidden;
        position: relative;
    }

    div.product-item img {
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
    }

    .p-item_name {
        display: block;
        padding: 10px 0;
        font-size: 17.5px;
        background-color: rgba(255, 255, 255, 0.5);
        width: 100%;
        text-align: center;
        border-bottom: 1px solid #aaa;
        font-weight: bold;
    }

    div.p-item_img {
        width: 100%;
    }

    span.p-item_price-number {
        margin: 5px 0 0 10px;
        text-align: left;
        font-size: 15px;
        display: block;
    }

    span.p-item_price-text {
        font-size: 14px;
        display: block;
        text-align: left;
        margin: 0 0 0 10px;
    }

    span.p-item_price-text del {
        font-size: 13px;
        color: #999999;
    }

    span.p-item_price-text b {
        color: #900;
    }

    div.product-total {
        margin: 20px auto;
        text-align: center;
        font-size: 30px;
        color: rgb(173, 0, 17);
    }

    span.total-word {
        text-transform: uppercase;
    }

    span.total-number del {
        color: #000;
    }

    span.total-sale {
        font-weight: bold;
    }

    /* offer section */
    section#offer {
        padding: 30px 0;
        background-image: url(/landing/img/offer-bg.jpg);
        /*background-size: cover;*/
        background-repeat: no-repeat;
        background-position: center;
        background-position-x: -50px;
    }

    span.offer-title {
        display: block;
        font-size: 30px;
        text-align: center;
        margin: 40px auto;
        text-transform: uppercase;
        color: #ffffff;
    }

    span.offer-subtitle {
        display: block;
        font-size: 25px;
        text-align: center;
        margin: 0 auto 40px;
        color: #ffffff;
    }

    section#offer a.button {
        margin-bottom: 30px;
    }

    /* autors section */
    section#autors {
        padding: 30px 0;
    }

    div.autors-content {
        margin: 20px 0 0;
    }

    div.autor-item {
        margin-bottom: 20px;
    }

    div.autor-img {
        width: 250px;
    }

    div.autor-content {
        width: 900px;
    }

    div.autor-content.left {
        text-align: right;
    }

    div.autor-img.right {
        text-align: right;
    }

    span.autor-name {
        display: block;
        background-color: #ededed;
        padding: 15px 20px;
        font-size: 23px;
    }

    div.autor-content.left span.autor-name {
        border-right: 7px solid #900;
    }

    div.autor-content.right span.autor-name {
        border-left: 7px solid #900;
    }

    div.autor-text {
        margin-top: 20px;
    }

    div.autor-text p {
        text-align: 20px;
        line-height: 30px;
    }

    /* master-class section */
    section#master-class {
        padding: 30px 0;
        background-image: url(/landing/img/mk-bg2.jpg);
        background-size: cover;
    }

    div.mk-content {
        margin: 30px auto 0;
        height: 650px;
    }

    div.mk-content .left {
        width: 40%;
        margin-left: 10%;
        position: relative;
    }

    div.mk-content .right {
        width: 45%;
        margin-right: 2%;
        position: relative;
        z-index: 2;
    }

    div.mk-content .left img {
        width: 250%;
        position: absolute;
        left: -80%;
        top: -150px;
    }

    span.mk-title {
        display: block;
        font-size: 26px;
        text-align: center;
        line-height: 36px;
    }

    div.mk-text {
        padding-bottom: 10px;
    }

    div.mk-text p, div.mk-text li {
        font-size: 15px !important;
        line-height: 25px !important;
    }

    span.mk-autor {
        font-size: 17px;
        line-height: 20px;
    }

    div.mk-price {
        font-size: 22px;
        line-height: 60px;
        text-align: center;
        margin-left: 0 !important;
        width: 50% !important;
    }

    /* reviews section */
    section#reviews {
        padding: 30px 0;
        background-color: #ededed;
    }

    section#reviews div.content {
        position: relative;
    }

    div.reviews-content {
        width: 950px;
        margin: 20px auto;
        overflow: hidden;
        height: 400px;
        background-color: #ffffff;
        border-radius: 10px;
        position: relative;
    }

    img.to-left, img.to-right {
        position: absolute;
        top: 270px;
        cursor: pointer;
        opacity: 0.6;
        transition: all 0.2s ease-in-out;
    }

    img.to-left {
        left: 40px;
        left: 40px;
    }

    img.to-right {
        right: 40px;
    }

    img.to-left:hover, img.to-right:hover {
        opacity: 1;
    }

    img.to-left.not, img.to-right.not {
        filter: grayscale(100%);
        cursor: not-allowed;
        opacity: 0.2;
    }

    ul.rewiews-list {
        position: absolute;
        padding: 0;
        margin: 0;
        top: 0;
        left: 0;
        width: 1000%;
        font-size: 0;
        transition: all 1.5s ease-in-out;
    }

    li.review-item {
        margin: 20px;
        list-style-type: none;
        display: inline-block;
        overflow: hidden;
        font-size: 0;
        width: 910px;
        height: 360px;
    }

    li.review-item > div {
        display: inline-block;
        vertical-align: middle;
    }

    div.review-img {
        width: 300px;
        height: 360px;
        border-radius: 10px;
    }

    div.review-img img {
        width: 100%;
    }

    div.review-content {
        width: 580px;
        height: 360px;
        margin-left: 30px;
    }

    span.review-autor {
        font-size: 25px;
    }

    div.review-content p {
        font-size: 18.5px !important;
    }

    /* popup-form */
    div.popup-form {
        position: fixed;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        z-index: 5555;
        background-color: rgba(255, 255, 255, 0.5);
        display: none;
    }

    div.popup-form-content {
        width: 350px;
        padding: 20px;
        border-radius: 10px;
        margin: 100px auto 0;
        background-color: #ffffff;
        position: relative;
        box-shadow: rgba(0, 0, 0, 0.5) 0 0 10px;
    }

    div.popup-form-content label {
        cursor: pointer;
        font-size: 12px;
        position: absolute;
        bottom: 97px;
        left: 65px;
        z-index: 99999999;
    }

    div.popup-form-content input[type=checkbox] {
        position: absolute;
        bottom: 107px;
        left: 45px;
        z-index: 99999999;
    }

    span.close {
        display: block;
        position: absolute;
        top: 5px;
        right: 10px;
        font-size: 20px;
        color: #900;
        font-weight: bold;
        cursor: pointer;
        opacity: 0.7;
        transition: all 0.3s ease-in-out;
    }

    span.close:hover {
        opacity: 1;
    }

    span.popup-form-title {
        display: block;
        text-align: center;
        margin-bottom: 20px;
        font-size: 20px;
    }

    form input:not([type=submit]),
    form input:not([type=checkbox]) {
        width: 348px;
        border: 1px solid rgb(173, 0, 17);
        font-size: 17px;
        line-height: 17px;
        padding: 10px 20px;
        border-radius: 27px;
        transition: all 0.25s ease-in-out;
        display: block;
        margin: 0 auto 20px;
        transition: all 0.2s ease-in-out;
        color: #900;
    }

    form input:not([type=submit]):not([type=checkbox]):hover, textarea:hover {
        box-shadow: rgba(0, 0, 0, 0.5) 0 0 5px;
    }

    form input:not([type=submit]):not([type=checkbox]):focus, textarea:focus {
        box-shadow: rgba(0, 0, 0, 0.5) 0 0 10px;
    }

    form input[type=submit] {
        width: 348px;
        display: block;
        font-size: 17px;
        text-transform: uppercase;
        color: #ffffff;
        padding: 10px 2px;
        border-radius: 27px;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        margin: 0 auto 10px;
        border: 1px solid #900;
        color: #900;
        background-color: rgba(0, 0, 0, 0);
    }

    form input[type=submit]:hover {
        box-shadow: rgba(0, 0, 0, 0.5) 0 0 10px;
        color: #fff;
        background-color: #900;
    }

    form input[type=checkbox] {
        width: auto;
        margin: 0;
        display: inline;
    }

    /* faq section */
    section#faq {
        padding: 20px 0;
        background-image: url(/landing/img/q-bg.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    section#faq div.left {
        width: 40%;
        text-align: center;
        margin-left: 10%;
    }

    section#faq img {
        width: 80%;
        margin-left: 20%;
    }

    textarea {
        max-width: 348px;
        width: 348px;
        border: 1px solid rgb(173, 0, 17);
        font-size: 17px;
        line-height: 17px;
        padding: 10px 20px;
        border-radius: 7px;
        display: block;
        margin: 0 auto 20px;
        color: #900;
        height: 100px;
        max-height: 100px;
        font-family: Arial;
    }

    form.left {
        width: 40%;
        margin-left: 10%;
        text-align: center;
    }

    /* popup-description */
    div.popup-description {
        display: none;
        position: fixed;
        background-color: rgba(255, 255, 255, 0.5);
        z-index: 10;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }

    div.popup-description-content {
        margin: 100px auto;
        position: relative;
        padding: 20px;
        width: 460px;
        background-color: #ffffff;
        box-shadow: rgba(0, 0, 0, 0.5) 0 0 20px;
    }

    div.popup-description-content .close {
        position: absolute;
        z-index: 1;
        top: 10px;
        right: 10px;
    }

    span.popup-d_title {
        font-size: 20px;
        line-height: 25px;
    }

    div.popup-description-content ol {
        margin: 10px 0;
    }

    div.to-content {
        margin: 4px auto;
        width: 10px;
        height: 10px;
        border: 1px solid #000000;
        border-radius: 5px;
    }

    .b {
        transition: all 1s ease-in-out;
    }

    a.pol {
        position: absolute;
        bottom: -250px;
        width: 100%;
        text-align: center;
    }

    @media (max-width: 1150px) {
        body {
            min-width: 100%;
        }

        .col-lg-12 {
            padding: 0;
        }

        .content {
            width: 90%;
            margin: 0 auto;
        }

        div.fw-item-adv {
            width: 50%;
            margin-right: 0;
        }

        span.section-title {
            font-size: 30px;
            line-height: 35px
        }

        div.popup-form {
            overflow: auto;
        }

        div.popup-form-content {
            margin-top: 0;
        }

        div.autor-img {
            width: 35%;
        }

        div.autor-img img {
            width: 100%;
        }

        div.autor-content {
            width: 63%;
        }

        div.mk-content {
            /*height: auto;
            /*min-height: 200px!important;*/
        }

        div.mk-content .left img {
            top: -100px;
        }

        span.mk-title {
            font-size: 20px;
            line-height: 25px;
        }

        div.mk-text {
            padding-bottom: 10px;
        }

        div.mk-text p, div.mk-text li {
            font-size: 17px !important;
            line-height: 20px !important;
        }

        span.mk-autor {
            font-size: 17px;
            line-height: 20px;
        }

        div.mk-price {
            font-size: 20px;
            line-height: 25px;
            text-align: center;
            width: 100% !important;
            float: none !important;
        }

        div.mk-button {
            float: none !important;
            width: 100% !important;
        }

        div.mk-button .button {
            width: 100%;
            padding-left: 0;
            padding-right: 0;
        }

        div.reviews-content {
            width: 90%;
            height: 300px;
        }

        img.to-left {
            left: 0;
            top: 200px;
        }

        img.to-right {
            right: 0;
            top: 200px;
        }

        li.review-item {
            width: 9%;
            margin: 0.5%;
        }

        li.review-item > div {
            display: inline-block;
            vertical-align: top;
        }

        div.review-img {
            width: 30%;
            height: auto;
            border-radius: 10px;
        }

        div.review-img img {
            width: 100%;
        }

        div.review-content {
            width: 65%;
            height: auto;
            margin-left: 5%;
        }

        div.review-text {
            margin-top: 0 !important;
            height: 270px;
            overflow: auto;
            line-height: 20px;
        }

        span.review-autor {
            font-size: 15px;
        }

        div.review-content p {
            font-size: 12px !important;
            margin: 5px 0 !important;
        }
    }

    @media (max-width: 1150px) and (min-width: 934px) {
        div.product-item {
            margin-right: 37.5px !important;
        }

        div.product-item:nth-child(3n+3) {
            margin-right: 0 !important;
        }
    }

    @media (max-width: 933px) and (min-width: 650px) {
        div.product-item {
            margin-right: 37.5px !important;
        }

        div.product-item:nth-child(2n+2) {
            margin-right: 0 !important;
        }

        div.mk-content {
            min-height: 400px;
            height: auto;
        }

        div.mk-content .left img {
            top: -100px;
        }

        span.mk-title {
            font-size: 18px;
            line-height: 20px;
        }

        div.mk-text {
            padding-bottom: 10px;
        }

        div.mk-text p, div.mk-text li {
            font-size: 15px !important;
            line-height: 17px !important;
        }

        div.mk-text p:nth-child(2),
        div.mk-text ul {
            display: none;
        }

        span.mk-autor {
            font-size: 15px;
            line-height: 17px;
        }

        div.mk-price {
            font-size: 20px;
            line-height: 25px;
            text-align: center;
            width: 100% !important;
            float: none !important;
        }

        div.mk-button {
            float: none !important;
            width: 100% !important;
        }

        div.mk-button .button {
            width: 100%;
            padding-left: 0;
            padding-right: 0;
        }
    }

    @media (max-width: 649px) {
        div.product-item {
            width: 100%;
            margin-right: 0 !important;
        }

        div.fw-item-adv {
            width: 100%;
            margin-right: 0;
        }

        span.total-number del {
            display: block
        }

        span.program-title {
            font-size: 24px;
        }

        span.offer-title {
            font-size: 24px
        }

        span.offer-subtitle {
            line-height: 30px;
        }

        div.autor-content p {
            line-height: 20px;
            margin: 8px 0;
        }

        span.mk-title {
            font-size: 14px;
            line-height: 16px;
        }

        div.mk-text p:nth-child(2),
        div.mk-text ul {
            display: none;
        }

        div.mk-text p, span.mk-autor {
            font-size: 12px !important;
            line-height: 17px !important;
        }

        div.mk-content {
            height: auto;
        }

        div.review-content {
            margin-top: 0 !important;
        }

        /*div.review-content p {
            line-height: 17px;
        }
        div.review-img {
            width: 20%;
        }*/
        textarea, input {
            width: 94% !important;
            padding: 10px 3% !important;
        }

        div.popup-description-content {
            margin: 0;
            position: fixed;
            width: 98%;
            height: auto;
            padding: 1%;
            z-index: 999999;
            top: 52px;
            overflow: auto;
        }
    }

    @media (max-width: 500px) {
        div.mk-text {
            display: none;
        }

        div.mk-content .left img {
            top: -80px;
        }

        div.mk-button .button {
            width: 150px;
            font-size: 12px;
            padding: 5px 0;
        }

        div.mk-price del {
            display: block;
        }

        span.mk-title {
            font-size: 12px;
            margin-bottom: 10px;
        }

        form.left {
            width: 100%;
            margin: 0;
        }
    }

    }
</style>
<section id="top">
    <div class="content">
        <div class="logo"><img alt="" src="/landing/img/logo.png" /></div>

        <div class="line" style="margin: 0 auto 10px;">&nbsp;</div>

        <p><span class="section-subtitle" style="color: #900;">МАСТЕРСКАЯ УПРАВЛЕНИЯ<br />
Консультируем и обучаем собственников и топ-менеджеров управлять компанией</span></p>

        <p>&nbsp;</p>

        <p><span class="top-title">летний безлимит на все курсы<br />
от компании iteam</span></p>

        <p>&nbsp;</p>

        <p><span class="top-subtitle">Содержит 3 видеокурса, 42 мастер-класса<br />
Всего 124 часа полезного видео + 60 презентаций</span> <script src="/landing/js/jquery.min.js"></script></p>
        <!--                {{pay::Купить мастер-класс}}-->

        <p>&nbsp;</p>

        <p><a class="under-button popup" style="width: 55%;">Скачать программу и Дорожную карту &laquo;7 внутренних ограничений, которые мешают развитию компании&raquo;</a></p>

        <div style="position:absolute;text-align:center;width:100%;bottom:20px;height:45px;">
            <div id="to" style="cursor:pointer;margin:5px auto;border:1px solid #000000;height:35px;width:20px;border-radius:20px;">
                <div class="to-content" id="to-content" style="">&nbsp;</div>
            </div>
        </div>
    </div>
</section>

<section>
    <p><a name="lp-form"></a></p>

    <div style="width:80%; margin:0 auto;">
        <table style="width:100%;">
            <tbody>
            <tr>
                <td style="width: 50%; vertical-align: top; text-align: center;"><span class="lp-h5" style="font-size:28px; color: #AD0011;">СТАНДАРТ</span>

                    <hr /></td>
                <td style="width: 50%; vertical-align: top; text-align: center;"><span class="lp-h5" style="font-size:28px; color: #AD0011;">МАКСИМУМ</span>
                    <hr /></td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 18px;">Получаете полный пакет материалов, изучаете мастер-классы.&nbsp;Внедряете систему обучения и развития самостоятельно. Без консалтинговой поддержки наставника.</p>
                </td>
                <td>
                    <p style="font-size:18px;">Получаете полный пакет материалов. Организация и внедрение системы обучения под руководством консультанта-наставника. Сопровождение и поддержка.&nbsp;&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td style="width: 50%;vertical-align:top;">
                    <ol>
                        <li style="font-size:18px;"><strong style="font-size:18px;">3&nbsp;видеокурса;</strong></li>
                        <li style="font-size:18px;"><strong style="letter-spacing: 0px; background-color: transparent;">42 мастеркласса;</strong></li>
                        <li style="font-size:18px;"><strong style="font-size:18px;">60 презентаций;</strong></li>
                        <li style="font-size:18px;"><strong style="font-size:18px;">Всего 124 часа полезного видео.</strong>
                            <hr /></li>
                    </ol>

                    <p style="text-align: center;"><strong style="font-size:19px;">!!! Специальная цена только</strong></p>

                    <p style="text-align: center;"><strong style="font-size:19px;">до 31 августа 2017 года</strong></p>
                </td>
                <td style="width: 50%;vertical-align:top;">
                    <ol>
                        <li style="font-size:18px;"><strong style="font-size:18px;">3&nbsp;видеокурса</strong></li>
                        <li style="font-size:18px;"><strong style="font-size:18px;">42 мастеркласса</strong></li>
                        <li style="font-size:18px;"><strong style="font-size:18px;">60 презентаций;</strong></li>
                        <li style="font-size:18px;"><strong style="font-size:18px;">Всего 124 часа полезного видео.</strong></li>
                    </ol>

                    <hr style="font-size: 18px; text-align: center;" />
                    <p style="font-size: 18px; text-align: center;"><strong>+</strong></p>

                    <ol>
                        <li style="font-size:18px;"><strong style="font-size:18px;">Диагностика системы управления компанией</strong>

                            <ul>
                                <li>Интервью с топ-менеджерами.</li>
                                <li>Тестирование управленческой команды.</li>
                                <li>Аналитический отчет по итогам тестирования.</li>
                            </ul>
                        </li>
                        <li style="font-size:18px;"><strong style="font-size:18px;">Разработка программы обучения</strong></li>
                        <li style="font-size:18px;"><strong style="font-size:18px;">Рекомендации по организации обучения</strong></li>
                        <li style="font-size:18px;"><strong style="font-size:18px;">Годовое консультационное сопровождение по вопросам обучения руководителей</strong>
                            <ul>
                                <li>Анализ выполнения плана обучения.</li>
                                <li>Оценка достигнутых результатов.</li>
                                <li>Корректировка плана.</li>
                                <li>Рекомендации по дальнейшему обучению.</li>
                            </ul>
                        </li>
                    </ol>

                    <p><strong style="font-size:18px;">&nbsp;</strong></p>
                </td>
            </tr>
            <tr>
                <td style="width: 50%; vertical-align: top; text-align: center;">
                    <p>&nbsp;</p>

                    <hr />
                    <p><span class="lp-h5" style="font-size:28px;color:#AD0011;margin-left: 20px">48 000 ₽</span></p>

                    <hr /></td>
                <td style="width: 50%; vertical-align: top; text-align: center;">
                    <p>&nbsp;</p>

                    <hr />
                    <p><span class="lp-h5" style="font-size:28px;color:#AD0011;margin-left: 20px">80 000 ₽</span></p>

                    <hr /></td>
            </tr>
            <tr>
                <td style="width: 50%;vertical-align:top;text-align:center;"><a class="button" href="https://iteam.ru/learn/webinar/letnij-bezlimit-ot-iteam-light" style="background-color: #AD0011;color:#fff;border:none;border-radius:4px;padding:20px 40px;text-decoration:none;font-size:1.2em;font-weight:bold;">Заказать</a></td>
                <td style="width: 50%;vertical-align:top;text-align:center;"><a class="button" href="https://iteam.ru/learn/webinar/letnij-bezlimit-ot-iteam--advanced" style="background-color: #AD0011;color:#fff;border:none;border-radius:4px;padding:20px 40px;text-decoration:none;font-size:1.2em;font-weight:bold;">Заказать</a></td>
            </tr>
            </tbody>
        </table>
    </div>
</section>

<section id="for-whom">
    <div class="content"><span class="section-title">Незаменимые знания для собственников<br />
бизнеса и топ-менеджеров</span> <span class="section-subtitle">курсы развивают следующие навыки:</span>

        <div class="line">&nbsp;</div>

        <div class="fw-content">
            <div class="fw-item-adv"><img alt="" src="/landing/img/fw-item-4.png" /> <span class="fw-item-text">создания стратегии и<br />
стратегического управления</span>

                <div class="clearfix">&nbsp;</div>
            </div>

            <div class="fw-item-adv"><img alt="" src="/landing/img/fw-item-2.png" /> <span class="fw-item-text">построения системы управления<br />
бизнес-процессами</span>

                <div class="clearfix">&nbsp;</div>
            </div>

            <div class="fw-item-adv"><img alt="" src="/landing/img/fw-item-3.png" /> <span class="fw-item-text">совершенствования системы<br />
мотивации сотрудников компании</span>

                <div class="clearfix">&nbsp;</div>
            </div>

            <div class="fw-item-adv"><img alt="" src="/landing/img/fw-item-1.png" /> <span class="fw-item-text">организации контроллинга,<br />
управления эффективностью</span>

                <div class="clearfix">&nbsp;</div>
            </div>

            <div class="fw-item-adv"><img alt="" src="/landing/img/fw-item-6.png" /> <span class="fw-item-text">формирования профессиональной<br />
управленческой команды</span>

                <div class="clearfix">&nbsp;</div>
            </div>
        </div>
    </div>
</section>

<section id="products">
    <div class="content"><span class="section-title">Обеспечьте знаниями всех сотрудников компании</span> <span class="section-subtitle">3 видеокурса, 42 мастер-класса, 124 часа полезного видео</span>

        <div class="line">&nbsp;</div>

        <div class="products-list">
            <div class="product-item" for="prod-1"><span class="p-item_name">Стратегическое управление</span>

                <div class="p-img_container"><img alt="" src="/landing/img/%D0%A1%D0%A2%D0%A0%D0%90%D0%A2%D0%95%D0%93%D0%98%D0%A7%D0%95%D0%A1%D0%9A%D0%9E%D0%95%20%D0%A3%D0%9F%D0%A0%D0%90%D0%92%D0%9B%D0%95%D0%9D%D0%98%D0%95.jpg" /></div>
                <span class="p-item_price-number">Длительность курса: 32 часа</span> <span class="p-item_price-text">Цена: <del>60000 р.</del> <b>входит в стоимость</b></span></div>

            <div class="product-item" for="prod-2"><span class="p-item_name">Управление процессами</span>

                <div class="p-img_container"><img alt="" src="/landing/img/%D0%A3%D0%9F%D0%A0%D0%90%D0%92%D0%9B%D0%95%D0%9D%D0%98%D0%95%20%D0%9F%D0%A0%D0%9E%D0%A6%D0%95%D0%A1%D0%A1%D0%90%D0%9C%D0%98.jpg" /></div>
                <span class="p-item_price-number">Длительность курса: 18 часов</span> <span class="p-item_price-text">Цена: <del>40000 р.</del> <b>входит в стоимость</b></span></div>

            <div class="product-item" for="prod-3"><span class="p-item_name">Целевое управление</span>

                <div class="p-img_container"><img alt="" src="/landing/img/%D0%A6%D0%B5%D0%BB%D0%B5%D0%B2%D0%BE%D0%B5%20%D1%83%D0%BF%D1%80%D0%B0%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5.jpg" /></div>
                <span class="p-item_price-number">Длительность курса: 24 часа</span> <span class="p-item_price-text">Цена: <del>48000 р.</del> <b>входит в стоимость</b></span></div>

            <div class="product-item" for="prod-4"><span class="p-item_name">Организационная структура</span>

                <div class="p-img_container"><img alt="" src="/landing/img/%D0%9E%D0%A0%D0%93%D0%90%D0%9D%D0%98%D0%97%D0%90%D0%A6%D0%98%D0%9E%D0%9D%D0%9D%D0%90%D0%AF%20%D0%A1%D0%A2%D0%A0%D0%A3%D0%9A%D0%A2%D0%A3%D0%A0%D0%902.jpg" /></div>
                <span class="p-item_price-number">Длительность курса: 2 часа</span> <span class="p-item_price-text">Цена: <del>4000 р.</del> <b>входит в стоимость</b></span></div>

            <div class="product-item" for="prod-5"><span class="p-item_name">Экономика и финансы</span>

                <div class="p-img_container"><img alt="" src="/landing/img/%D0%AD%D0%9A%D0%9E%D0%9D%D0%9E%D0%9C%D0%98%D0%9A%D0%90%20%D0%98%20%D0%A4%D0%98%D0%9D%D0%90%D0%9D%D0%A1%D0%AB.jpg" /></div>
                <span class="p-item_price-number">Длительность курса: 12 часов</span> <span class="p-item_price-text">Цена: <del>16000 р.</del> <b>входит в стоимость</b></span></div>

            <div class="product-item" for="prod-6"><span class="p-item_name">Мотивация сотрудников</span>

                <div class="p-img_container"><img alt="" src="/landing/img/%D0%9C%D0%9E%D0%A2%D0%98%D0%92%D0%90%D0%A6%D0%98%D0%AF%20%D0%A1%D0%9E%D0%A2%D0%A0%D0%A3%D0%94%D0%9D%D0%98%D0%9A%D0%9E%D0%92.jpg" style="width: 110%;" /></div>
                <span class="p-item_price-number">Длительность курса: 4 часа</span> <span class="p-item_price-text">Цена: <del>8000 р.</del> <b>входит в стоимость</b></span></div>

            <div class="product-item" for="prod-7"><span class="p-item_name">Корпоративная культура</span>

                <div class="p-img_container"><img alt="" src="/landing/img/%D0%9A%D0%9E%D0%A0%D0%9F%D0%9E%D0%A0%D0%90%D0%A2%D0%98%D0%92%D0%9D%D0%90%D0%AF%20%D0%9A%D0%A3%D0%9B%D0%AC%D0%A2%D0%A3%D0%A0%D0%90.jpg" /></div>
                <span class="p-item_price-number">Длительность курса: 8 часов</span> <span class="p-item_price-text">Цена: <del>4000 р.</del> <b>входит в стоимость</b></span></div>

            <div class="product-item" for="prod-8"><span class="p-item_name">Маркетинг и продажи</span>

                <div class="p-img_container"><img alt="" src="/landing/img/%D0%9C%D0%90%D0%A0%D0%9A%D0%95%D0%A2%D0%98%D0%9D%D0%93%20%D0%98%20%D0%9F%D0%A0%D0%9E%D0%94%D0%90%D0%96%D0%98.jpg" style="width: 120%;" /></div>
                <span class="p-item_price-number">Длительность курса: 4 часа</span> <span class="p-item_price-text">Цена: <del>4000 р.</del> <b>входит в стоимость</b></span></div>

            <div class="product-item" for="prod-9"><span class="p-item_name">Управление знаниями</span>

                <div class="p-img_container"><img alt="" src="/landing/img/%D0%A3%D0%9F%D0%A0%D0%90%D0%92%D0%9B%D0%95%D0%9D%D0%98%D0%95%20%D0%97%D0%9D%D0%90%D0%9D%D0%98%D0%AF%D0%9C%D0%98.jpg" /></div>
                <span class="p-item_price-number">Длительность курса: 2 часа</span> <span class="p-item_price-text">Цена: <del>4000 р.</del> <b>входит в стоимость</b></span></div>

            <div class="product-item" for="prod-10"><span class="p-item_name">Управление проектами</span>

                <div class="p-img_container"><img alt="" src="/landing/img/%D0%A3%D0%9F%D0%A0%D0%90%D0%92%D0%9B%D0%95%D0%9D%D0%98%D0%95%20%D0%9F%D0%A0%D0%9E%D0%95%D0%9A%D0%A2%D0%90%D0%9C%D0%98.jpg" style="width: 120%;" /></div>
                <span class="p-item_price-number">Длительность курса: 2 часа</span> <span class="p-item_price-text">Цена: <del>4000 р.</del> <b>входит в стоимость</b></span></div>

            <div class="product-item" for="prod-11"><span class="p-item_name">Управление изменениями</span>

                <div class="p-img_container"><img alt="" src="/landing/img/%D0%A3%D0%9F%D0%A0%D0%90%D0%92%D0%9B%D0%95%D0%9D%D0%98%D0%95%20%D0%98%D0%97%D0%9C%D0%95%D0%9D%D0%95%D0%9D%D0%98%D0%AF%D0%9C%D0%98.jpg" style="width: 120%;" /></div>
                <span class="p-item_price-number">Длительность курса: 6 часов</span> <span class="p-item_price-text">Цена: <del>12000 р.</del> <b>входит в стоимость</b></span></div>
        </div>
    </div>
</section>

<section id="program">
    <div class="content">
        <div class="program"><span class="program-title">Ознакомьтесь с подробной программой курсов</span> <a class="button popup">Скачать программу</a></div>
    </div>
</section>

<section id="offer">
    <div class="content">
        <table style="width: 300px; margin: auto;">
            <tbody>
            <tr>
                <th><span class="lp-h5" style="font-size:28px;color:wheat;margin-left: 20px">СТАНДАРТ</span></th>
                <th><span class="lp-h5" style="font-size:28px;color:wheat;margin-left: 20px">МАКСИМУМ</span></th>
            </tr>
            <tr>
                <th><span class="lp-h5" style="font-size:28px;color:wheat;margin-left: 20px">48 000 ₽</span></th>
                <th><span class="lp-h5" style="font-size:28px;color:wheat;margin-left: 20px">80 000 ₽</span></th>
            </tr>
            <tr>
                <td style="width: 50%;vertical-align:top;text-align:center;"><a class="button" href="https://iteam.ru/learn/webinar/letnij-bezlimit-ot-iteam-light" style="background-color: #AD0011;color:#fff;border:none;border-radius:4px;padding:20px 40px;text-decoration:none;font-size:1.2em;font-weight:bold;">Заказать</a></td>
                <td style="width: 50%;vertical-align:top;text-align:center;"><a class="button" href="https://iteam.ru/learn/webinar/letnij-bezlimit-ot-iteam--advanced" style="background-color: #AD0011;color:#fff;border:none;border-radius:4px;padding:20px 40px;text-decoration:none;font-size:1.2em;font-weight:bold;">Заказать</a></td>
            </tr>
            </tbody>
        </table>
    </div>
</section>
<!--блок двух цен-->

<section id="autors">
    <div class="content"><span class="section-title">Авторы курсов</span>

        <div class="autors-content">
            <div class="autor-item">
                <div class="autor-img left"><img alt="" src="/landing/img/kochnev.png" /></div>

                <div class="autor-content right"><span class="autor-name">Александр Кочнев</span>

                    <div class="autor-text">
                        <p>Управляющий партнер консалтинговой компании iTeam, кандидат технических наук, член Российской ассоциации управления проектами.</p>

                        <p>Лучший, по мнению многих, специалист по управлению компанией.</p>

                        <p>Опыт работы в управленческом консалтинге более 15 лет. Руководитель многих консалтинговых проектов в компаниях различных отраслей: заводы, торговые сети, банки, предприятия сферы услуг, многопрофильные холдинги, государственные учреждения регионального и федерального уровня.</p>
                    </div>
                </div>

                <div class="clearfix">&nbsp;</div>
            </div>

            <div class="autor-item">
                <div class="autor-content left"><span class="autor-name">Кирилл Горбачев</span>

                    <div class="autor-text">
                        <p>Предприниматель, основатель успешных бизнес-проектов, консультант iTeam по направлениям &quot;Разработка Стратегии&quot; и &quot;Диагностика и Изменение Организационной Культуры&quot;.</p>

                        <p>Окончил Российский Университет Дружбы Народов по специальности Мировая экономика. Получил диплом с отличием MBA в одном из передовых университетов Великобритании - Стратклайд (Глазго), всемирно известным в области разработки стратегии. Прошел обучение по курс диагностики и изменения организационной культуры в Гааге (Нидерланды) и является сертифицированным консультантом Центра Хофстеде.</p>
                    </div>
                </div>

                <div class="autor-img right"><img alt="" src="/landing/img/Gorbachev_Kirill.png" /></div>

                <div class="clearfix">&nbsp;</div>
            </div>
        </div>
    </div>
</section>

<section id="master-class">
    <div class="content"><span class="section-title">Убедитесь сами в полезности наших курсов:</span> <span class="section-subtitle">выгодное предложение - купите Мастер-класс с <b>95%</b> скидкой&nbsp;</span>

        <div class="line">&nbsp;</div>

        <div class="mk-content">
            <div class="left"><img alt="" src="/landing/img/Mockup2.png" /></div>

            <div class="right"><span class="mk-title">Чему и как нужно обучать руководителей<br />
Чтобы они стали лидерами перемен</span>

                <div class="mk-text">
                    <p>На мастер-классе вы узнаете, какой должна быть система корпоративного обучения, позволяющая с оптимальными затратами достигать быстрого роста квалификации руководителей подразделений.</p>

                    <p>Вы получите ответы на следующие вопросы:</p>

                    <ul>
                        <li>Почему бесполезны курсы МВА?</li>
                        <li>Почему мала эффективность семинаров по менеджменту?</li>
                        <li>Какие требования предъявляются к системе корпоративного обучения?</li>
                        <li>Как разработать программу обучения?</li>
                        <li>Какая форма обучения является наиболее эффективной?</li>
                        <li>Что такое &quot;мастер-проект&quot;?</li>
                        <li>Как совместить обучение и работу?</li>
                    </ul>
                    <span class="mk-autor">Автор мастер-класса: <b>Александр Кочнев</b>, специалист по управлению и организационному развитию.</span></div>

                <div class="left mk-price">Цена: <del>4000 руб.</del> <b>199 руб.</b></div>

                <div class="right mk-button"><a class="button" href="https://iteam.ru/learn/webinar/middle_manager/#master-class" target="_blank">Купить мастер-класс</a></div>

                <div class="clearfix">&nbsp;</div>
            </div>

            <div class="clearfix">&nbsp;</div>
        </div>
    </div>
</section>

<section id="reviews">
    <div class="content"><span class="section-title">Отзывы наших участников</span> <img alt="" class="to-left not" num="1" src="/landing/img/to-left.png" />
        <div class="reviews-content">
            <ul class="rewiews-list">
                <li class="review-item">
                    <div class="review-img"><img alt="" src="/landing/img/review-1.jpg" /></div>

                    <div class="review-content">
                        <div class="review-text" style="margin-top: 60px;"><span class="review-autor">Борисюк Юрий Александрович</span>

                            <p>Вашу компанию я считаю одной из самых сильных на рынке консалтинговых услуг в нашей стране. Мне нравится, что вы затрагиваете широкий диапазон управленческих проблем и освещаете их достаточно качественно и глубоко. В публикациях вашей компании я нахожу для себя много полезного, поскольку всегда интересно знакомиться с опытом профессионалов, учиться у них.</p>
                        </div>
                    </div>
                </li>
                <li class="review-item">
                    <div class="review-img" style="margin-top: 10px;"><img alt="" src="/landing/img/review-2.jpg" /></div>

                    <div class="review-content" style="margin-top: 40px;">
                        <div class="review-text"><span class="review-autor">Дрягин Олег Борисович</span>

                            <p>Мне очень нравится цикл мастер-классов, которые Вы ведете. Лично я, ранее являясь руководителем фабрики, начал менять свои подходы к управлению, в т.ч. благодаря информации получаемой от Вас. Она как-то отзывалась с тем, что я делал и наблюдал на фабрике. С тех пор у меня зародилась мысль как же малоэффективна промышленная способность России и как огромен потенциал и как это можно реализовать. Лично знакомясь с проблемами разных предприятий (иногда друзья приглашают как эксперта) я вижу, как многое можно сделать, как увеличить и результативность и эффективность.</p>
                        </div>
                    </div>
                </li>
                <li class="review-item">
                    <div class="review-img"><img alt="" src="/landing/img/review-3.jpg" /></div>

                    <div class="review-content" style="margin-top: 20px;">
                        <div class="review-text"><span class="review-autor">Владимир Володин</span>

                            <p>Когда я столкнулся с пониманием что что-то не так я осознал что нужны изменения. Но что менять? Как менять?<br />
                                Приняв участие в интернет-курсе &quot;Целевое управление. Как сделать компанию управляемой и эффективной&quot;, я нашел ответы на все вопросы. Я понял, с чего начать, как последовательно фрагментировать &quot;чего хочу&quot; в последовательность действий, как превратить результаты действий в измеряемые величины, как взаимодействовать с сотрудниками, чтобы они вместе с вами участвовали в этом процессе. Но самое главное семинар окончательно утвердил меня в понимании необходимости начинать с себя. За это отдельное большое спасибо.</p>
                        </div>
                    </div>
                </li>
                <li class="review-item">
                    <div class="review-img"><img alt="" src="/landing/img/review-4.png" /></div>

                    <div class="review-content">
                        <div class="review-text"><span class="review-autor">Виктория Николаева</span>

                            <p>С большим интересом и удовольствием посмотрела вебинар Александра Кочнева &quot;Приведите в порядок бизнес-процессы&quot;. Профессиональный подход и качество. Рекомендую всем, кто столкнулся с проблемами изменений в организации, кто хочет улучшить бизнес-процессы и повышать конкурентоспособность своих компаний! Весь материал излагается очень доступно, и все предлагаемые процессы настолько близки к реальности, что только очень ленивый не сможет это усвоить! Иногда хватает просто такого вебинара, чтобы понять, что нужно делать, и почему что-то не работает. Возможно, это будет полезно даже тем, кто считает, что все налажено и двигается само собой. Открывается новое видение и новые перспективы. Спасибо за новые возможности! Успехов Вам и Вашим партнерам!</p>
                        </div>
                    </div>
                </li>
                <li class="review-item">
                    <div class="review-img"><img alt="" src="/landing/img/review-5.jpg" style="margin-top: 20px;" /></div>

                    <div class="review-content">
                        <div class="review-text" style="margin-top: 60px;"><span class="review-autor">Сергей Мацвей</span>

                            <p>Хотелось бы Вас поблагодарить за весь цикл веб семинаров по целевому управлению. Несмотря на то, что теперь работы стало гораздо больше чем было, но я это люблю ))<br />
                                В результате есть четкое понимание и даже план действий что нужно делать, чтобы вывести компанию в лидеры, сделать ее более эффективной и прибыльной! Буду ждать Ваших новых семинаров.</p>
                        </div>
                    </div>
                </li>
                <li class="review-item">
                    <div class="review-img"><img alt="" src="/landing/img/review-6.jpeg" style="margin-top: 20px;" /></div>

                    <div class="review-content">
                        <div class="review-text" style="margin-top: 60px;"><span class="review-autor">Ирина Короп</span>

                            <p>...очень понравилось, всё было четко, понятно, материал изложен достаточно плотно, основные моменты оговаривались, были правильно расставлены акценты. Также очень понравилось, что мастер-класс ориентирован на практику, есть живые примеры для рассмотрения</p>
                        </div>
                    </div>
                </li>
                <li class="review-item">
                    <div class="review-img"><img alt="" src="/landing/img/review-7.png" style="margin-top: 20px;" /></div>

                    <div class="review-content">
                        <div class="review-text" style="margin-top: 60px;"><span class="review-autor">Елена Кравцова</span>

                            <p>Хочу поблагодарить за подбор очень интересной темы вебинара &quot;Приведите в порядок бизнес-процессы&quot;. Соглашусь с тем, что было сказано, что этому нигде не обучают, как ни странно. Я пишу из Чехии и скажу, что в этом отношении (обучение конкретике) здесь ситуация не в лучшем состоянии. Поэтому я искала информацию на эту тему в интернете, исходящую от нас, русских. Еще раз спасибо, что вы есть. Очень доступно и, главное, полезно. Желаю удачи во всех направлениях.</p>
                        </div>
                    </div>
                </li>
                <li class="review-item">
                    <div class="review-img"><img alt="" src="/landing/img/review-8.jpeg" style="margin-top: 20px;" /></div>

                    <div class="review-content">
                        <div class="review-text" style="margin-top: 60px;"><span class="review-autor">Андрей Молодцов</span>

                            <p>...в нескольких слайдах и примерах сконцентрирована суть управления процессами компании и пути анализа в случае отклонений от намеченных результатов. Материал мастер-класса хорошо подходит для топ-менеджеров и менеджеров среднего звена данной категории сотрудников</p>
                        </div>
                    </div>
                </li>
                <li class="review-item">
                    <div class="review-img"><img alt="" src="/landing/img/review-9.png" style="margin-top: 20px;" /></div>

                    <div class="review-content">
                        <div class="review-text" style="margin-top: 60px;"><span class="review-autor">Степанов Александр Викторович</span>

                            <p>...содержание понравилось, польза, безусловно, есть. Знания по этим вопросам были, но теперь всё систематизировано и уложилось в голове по полочкам. Ведущий тоже на уровне - доходчиво и по делу</p>
                        </div>
                    </div>
                </li>
                <li class="review-item">
                    <div class="review-img"><img alt="" src="/landing/img/review-10.png" style="margin-top: 20px;" /></div>

                    <div class="review-content">
                        <div class="review-text" style="margin-top: 60px;"><span class="review-autor">Болот Бегалиев</span>

                            <p>..пространство расширилось! Взгляд на компанию становится многомернее. Проекции обязывают это сделать. Главное все это можно согласовать с помощью стратегии. Спасибо!</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <img alt="" class="to-right" num="1" src="/landing/img/to-right.png" /></div>
</section>

<section id="faq">
    <div class="content"><span class="section-title">Остались вопросы?</span> <span class="section-subtitle">Мы с радостью на них ответим</span>

        <div class="line" style="margin-bottom: 20px;">&nbsp;</div>

        <form class="left"><span class="popup-form-title">Введите данные и наш менеджер<br />
перезвонит вам в течение 15 минут</span><textarea name="text" placeholder="Ваш вопрос"></textarea> <input name="tel" placeholder="Телефон" type="tel" /> <input name="email" placeholder="Email" type="email" /> <input id="politic" name="politic" required="" type="checkbox" /> <label for="politic" style="cursor:pointer;">Я принимаю <a href="https://iteam.ru/learn/course/politika-konfidentsialnosti" target="_blank">политику конфиденциальности</a></label> <input type="submit" value="Задать вопрос" />&nbsp;</form>

        <div class="clearfix">&nbsp;</div>
    </div>
</section>

<div class="popup-form">
    <div class="popup-form-content"><span class="close">X</span> <span class="popup-form-title">Получить программу</span> <script type="text/javascript"
                                                                                                                                  src="https://app.getresponse.com/view_webform_v2.js?u=Bh5z&webforms_id=5865206"></script> <input id="politic1" name="politic" required="" type="checkbox" /> <label for="politic1" style="cursor:pointer;">Я принимаю <a href="https://iteam.ru/learn/course/politika-konfidentsialnosti" target="_blank">политику конфиденциальности</a></label></div>
</div>

<div class="popup-description" id="prod-1">
    <div class="popup-description-content"><span class="close">X</span> <span class="popup-d_title">Стратегическое управление</span>

        <ol>
            <li>Как предвидеть и преодолевать кризисы управления</li>
            <li>Поставьте диагноз своему бизнесу</li>
            <li>Как создается стратегия. Краткое руководство по проектированию будущего.</li>
            <li>Как найти миссию компании</li>
            <li>Управление стратегией с помощью сбалансированной системы показателей (BSC)</li>
            <li>Позиционирование компании на рынке</li>
            <li>Как выявить скрытые стратегические проблемы после проведенного анализа</li>
            <li>Как осуществляется стратегический выбор и принимаются стратегические решения</li>
            <li>Стратегический анализ трендов</li>
            <li>Мысли глобально, действуй локально</li>
            <li>Разработка стратегии шаг за шагом</li>
            <li>Управление стратегией компании с помощью сбалансированной системы показателей (bsc)</li>
        </ol>
        <span class="p-item_price-number">Длительность курса: 32 часа</span> <span class="p-item_price-text">Цена: <del>60000 р.</del> <b>входит в стоимость</b></span></div>
</div>

<div class="popup-description" id="prod-2">
    <div class="popup-description-content"><span class="close">X</span> <span class="popup-d_title">Управление процессами</span>

        <ol>
            <li>Как найти и укрепить самое слабое звено в цепи процессов</li>
            <li>Практикум по внедрению процессного подхода</li>
            <li>Как создать систему управления процессами за 4 месяца</li>
            <li>Инженерный подход к созданию системы управления процессами</li>
            <li>Что такое зрелость процессов и как ее измерять?</li>
        </ol>
        <span class="p-item_price-number">Длительность курса: 18 часов</span> <span class="p-item_price-text">Цена: <del>40000 р.</del> <b>входит в стоимость</b></span></div>
</div>

<div class="popup-description" id="prod-3">
    <div class="popup-description-content"><span class="close">X</span> <span class="popup-d_title">Целевое управление</span>

        <ol>
            <li>Как создать систему KPI. Применение показателей деятельности для мотивации сотрудников</li>
            <li>Целевое управление. BSC, KPI, контроллинг</li>
            <li>Организация как система</li>
            <li>Планирование как система</li>
            <li>Управлять по-настоящему</li>
            <li>Опыт применения KPI: причины успехов и несбывшихся ожиданий</li>
            <li>Что значит &quot;управлять рисками&quot; и как это делается на практике?</li>
        </ol>
        <span class="p-item_price-number">Длительность курса: 24 часа</span> <span class="p-item_price-text">Цена: <del>48000 р.</del> <b>входит в стоимость</b></span></div>
</div>

<div class="popup-description" id="prod-4">
    <div class="popup-description-content"><span class="close">X</span> <span class="popup-d_title">Организационная структура</span>

        <ol>
            <li>Что такое правильная организационная структура и как её построить?</li>
        </ol>
        <span class="p-item_price-number">Длительность курса: 2 часа</span> <span class="p-item_price-text">Цена: <del>4000 р.</del> <b>входит в стоимость</b></span></div>
</div>

<div class="popup-description" id="prod-5">
    <div class="popup-description-content"><span class="close">X</span> <span class="popup-d_title">Экономика и финансы</span>

        <ol>
            <li>Что должен знать каждый руководитель о финансах?</li>
            <li>Методы распределения косвенных расходов</li>
            <li>Как правильно рассчитать себестоимость продуктов и услуг</li>
            <li>Что такое roi и как рассчитать отдачу на инвестиции</li>
            <li>Окупаются ли ваши инвестиции в развитие? Считаем и анализируем</li>
            <li>Чем должен заниматься финансовый директор?</li>
        </ol>
        <span class="p-item_price-number">Длительность курса: 12 часов</span> <span class="p-item_price-text">Цена: <del>16000 р.</del> <b>входит в стоимость</b></span></div>
</div>

<div class="popup-description" id="prod-6">
    <div class="popup-description-content"><span class="close">X</span> <span class="popup-d_title">Мотивация сотрудников</span>

        <ol>
            <li>Что должен знать каждый руководитель о мотивации сотрудников?</li>
            <li>Измените подход к мотивации ваших сотрудников.</li>
        </ol>
        <span class="p-item_price-number">Длительность курса: 4 часа</span> <span class="p-item_price-text">Цена: <del>8000 р.</del> <b>входит в стоимость</b></span></div>
</div>

<div class="popup-description" id="prod-7">
    <div class="popup-description-content"><span class="close">X</span> <span class="popup-d_title">Корпоративная культура</span>

        <ol>
            <li>Спиральная динамика &ndash; инструмент стратегии</li>
            <li>Как создаётся сильная корпоративная культура</li>
            <li>Как создать сервис, покоряющий клиентов</li>
            <li>Диагностика и изменение организационной культуры</li>
        </ol>
        <span class="p-item_price-number">Длительность курса: 8 часов</span> <span class="p-item_price-text">Цена: <del>4000 р.</del> <b>входит в стоимость</b></span></div>
</div>

<div class="popup-description" id="prod-8">
    <div class="popup-description-content"><span class="close">X</span> <span class="popup-d_title">Маркетинг и продажи</span>

        <ol>
            <li>Что должен знать каждый руководитель о маркетинге.</li>
            <li>Как стать локальным монополистом на целевом рынке.</li>
            <li>Как стать лидером в конкурентной гонке</li>
        </ol>
        <span class="p-item_price-number">Длительность курса: 4 часа</span> <span class="p-item_price-text">Цена: <del>4000 р.</del> <b>входит в стоимость</b></span></div>
</div>

<div class="popup-description" id="prod-9">
    <div class="popup-description-content"><span class="close">X</span> <span class="popup-d_title">Управление знаниями</span>

        <ol>
            <li>Чему и как нужно обучать руководителей?</li>
        </ol>
        <span class="p-item_price-number">Длительность курса: 2 часа</span> <span class="p-item_price-text">Цена: <del>4000 р.</del> <b>входит в стоимость</b></span></div>
</div>

<div class="popup-description" id="prod-10">
    <div class="popup-description-content"><span class="close">X</span> <span class="popup-d_title">Управление проектами</span>

        <ol>
            <li>Управление проектами: суть дела</li>
        </ol>
        <span class="p-item_price-number">Длительность курса: 2 часа</span> <span class="p-item_price-text">Цена: <del>4000 р.</del> <b>входит в стоимость</b></span></div>
</div>

<div class="popup-description" id="prod-11">
    <div class="popup-description-content"><span class="close">X</span> <span class="popup-d_title">Управление изменениями</span>

        <ol>
            <li>Управление изменениями: инженерный подход</li>
            <li>Архитектура организационных изменений</li>
            <li>Быстрая компания. Как сделать изменения постоянными</li>
        </ol>
        <span class="p-item_price-number">Длительность курса: 6 часов</span> <span class="p-item_price-text">Цена: <del>12000 р.</del> <b>входит в стоимость</b></span></div>
</div>
<script type="text/javascript">
    $(".to-right").click(function () {
        var num = parseInt($(this).attr('num')),
            value = 10 * (num);
        if (num < 9) {
            $('.rewiews-list').attr('style', 'transform: translate(-' + value + '%,0);');
            if (num == 1) {
                $(".to-left").removeClass('not');
            }
            num = num + 1;
            $(this).attr('num', num);
            $(".to-left").attr('num', num);
        } else if (num == 9) {
            $('.rewiews-list').attr('style', 'transform: translate(-' + value + '%,0);');
            $(this).addClass('not');
            num = num + 1;
            $(this).attr('num', num);
            $(".to-left").attr('num', num);
        }
    });
    $(".to-left").click(function () {
        var num = parseInt($(this).attr('num')),
            value = 10 * (num - 2);
        if (num > 2) {
            $('.rewiews-list').attr('style', 'transform: translate(-' + value + '%,0);');
            if (num == 10) {
                $(".to-right").removeClass('not');
            }
            num = num - 1;
            $(this).attr('num', num);
            $(".to-right").attr('num', num);
        } else if (num == 2) {
            $('.rewiews-list').attr('style', 'transform: translate(0,0);');
            $(this).addClass('not');
            num = num - 1;
            $(this).attr('num', num);
            $(".to-right").attr('num', num);
        }
    });
    $(".popup").click(function () {
        $(".popup-form").attr('style', 'display: block;');
        $("body").attr('style', 'overflow: hidden;');
    });
    $(".close").click(function () {
        $(".popup-form").removeAttr('style');
        $(".popup-description").removeAttr('style');
        $("body").removeAttr('style');
    });
    setTimeout(function () {
        $(".btn.btn-default.btn-lg").html("Сделать заказ")
        $(".btn.btn-default.btn-lg").addClass('button');
        $(".button").removeClass('btn');
        $(".button").removeClass('btn-default');
        $(".button").removeClass('btn-lg');
    }, 1);
    $(".product-item").click(function () {
        var pId = "#" + $(this).attr('for');
        $(pId).attr('style', 'display: block');
        $("body").attr('style', 'overflow: hidden;');
    });
    setInterval(function () {
        $("#to-content").addClass('b');
        $("#to-content").attr('style', 'transform: translate(0,15px);opacity: 0;');
        setTimeout(function () {
            $("#to-content").removeClass('b');
            $("#to-content").removeAttr('style');
        }, 1000);
    }, 2000);
    $("#to").click(function (event) {
        event.preventDefault();
        var id = "#for-whom",
            top = $(id).offset().top - 50;
        $('body,html').animate({scrollTop: top}, 1500);
    });
    $("form.left").submit(function (e) {
        e.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "/landing/post.php",
            data: form_data,
            success: function () {
                alert("Ваше сообщение отправлено!");
            }
        });
    });
</script><!--<p><a class="pol" href="https://iteam.ru/learn/course/politika-konfidentsialnosti">Политика конфиденциальности</a></p>-->