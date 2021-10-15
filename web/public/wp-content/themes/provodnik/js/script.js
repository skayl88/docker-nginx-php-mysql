$(document).ready(function () {

    if (window.location.pathname.indexOf('/konsultacziya/') >= 0) {
        var $window = $(window);
        var $sidebar = $(".sidebar-menu");
        var $sidebarTop = $sidebar.position().top;
        var $sidebarHeight = $sidebar.height();
        var $contentHeight = $('.content').height();
        var $footer = $('.footer');
        var $footerTop = $footer.position().top;

        $window.scroll(function (event) {
            $sidebar.addClass("fixed");
            var $scrollTop = $window.scrollTop();
            var $topPosition = Math.max(0, $sidebarTop - $scrollTop);
            console.log('scrolltop: ' + $scrollTop);
            console.log('sidebarHeight: ' + $sidebarHeight);
            console.log('footerTop: ' + $footerTop);
            console.log('contentHeight: ' + $contentHeight);
            if ($contentHeight > 5000) {
                var $heightBox = 900;
            } else {
                var $heightBox = 900;
            }

            if ($scrollTop + 900 > $footerTop) {
                var $topPosition = Math.min($topPosition, $footerTop - $scrollTop - $heightBox);
            }

            $sidebar.css("top", $topPosition);
        });
    }


    $('a[href^="#"], a[href^="."]').click(function () {
        var scroll_el = $(this).attr('href');
        if ($(scroll_el).length != 0) {
            $('html, body').animate({ scrollTop: $(scroll_el).offset().top }, 500);
        }
        return false;
    });

    $('.menu-btn').click(function () {
        $(this).toggleClass('open');
        $('.menu-box').toggleClass('open');
    });

    $('.price .switch-btn').click(function () {
        var parent = $(this).closest(".switch");
        $('.switch').removeClass("on");
        $('.switch').find(".switch-inp").val("0");
        var variate = parent.attr('data-var');
        console.log(variate);
        switch (variate) {
            case '1':
                $('#hid2').val('1 месяц');
                $('#hid3').val('2 500 ₽');
                $('#price_1').html('2 500 ₽');
                $('#price_2').html('');
                $('#price_3').html('');
                $('#price_4').html('');
                $('#vers').html('Онлайн версия');
                $('#desc-vers').html('Все модули = 1 подписка = 1 цена без ограничений');
                break;

            case '2':
                $('#hid2').val('3 месяца');
                $('#hid3').val('7 125 ₽');
                $('#price_1').html('7 125 ₽');
                $('#price_2').html('7 500 ₽');
                $('#price_4').html('2 375 ₽ в месяц');
                $('#price_3').html('Экономия 5%');
                $('#vers').html('Онлайн версия');
                $('#desc-vers').html('Все модули = 1 подписка = 1 цена без ограничений');
                break;

            case '3':
                $('#hid2').val('6 месяцев');
                $('#hid3').val('13 500 ₽');
                $('#price_1').html('13 500 ₽');
                $('#price_2').html('15 000 ₽');
                $('#price_3').html('Экономия 10%');
                $('#price_4').html('2 250 ₽ в месяц');
                $('#vers').html('Онлайн версия');
                $('#desc-vers').html('Все модули = 1 подписка = 1 цена без ограничений');
                break;

            case '4':
                $('#hid2').val('1 год');
                $('#hid3').val('13 500 ₽');
                $('#price_1').html('13 500 ₽');
                $('#price_2').html('30 000 ₽');
                $('#price_3').html('Скидка 50% ко Дню Знаний');
                $('#price_4').html('1 350 ₽ в месяц');
                $('#vers').html('Онлайн версия');
                $('#desc-vers').html('Все модули = 1 подписка = 1 цена без ограничений');
                break;
            case '5':
                $('#desc-vers').val('Нет необходимости продлевать лицензию, после покупки программа остается у вас навсегда.');
                $('#hid3').val('50 000₽₽');
                $('#price_1').html('50 000₽');
                $('#desc-vers').html('Нет необходимости продлевать лицензию, после покупки программа остается у вас навсегда.');
                $('#price_3').html('');
                $('#price_2').html('');
                $('#price_4').html('');
                $('#vers').html('Установочная версия');
                break;
        }

        if (parent.hasClass("on")) {
            parent.removeClass("on");
            parent.find(".switch-inp").val("0");
        } else {
            parent.addClass("on");
            parent.find(".switch-inp").val("1");
        }
    });
    $('.advantages .switch-btn').click(function () {
        var parent = $(this).closest(".switch");
        var id = parent.data("id");
        if (parent.hasClass("on")) {
            //parent.removeClass("on");
        } else {
            $('.advantages .switch').removeClass("on");
            parent.addClass("on");
            $('.advantages .items').hide();
            $('.advantages .item' + id).show();
        }
    });

    $('.sidebar-menu .ttl').click(function () {
        var parent = $(this).closest(".item");
        if (parent.hasClass("on")) {
            $('.sidebar-menu .item').removeClass("on");
        } else {
            $('.sidebar-menu .item').removeClass("on");
            parent.addClass("on");
        }
    });

    $('.sedebar-menu-btn').click(function () {
        if ($(this).hasClass("on")) {
            $(this).removeClass("on");
            $(this).text("Открыть меню");
            $(".sidebar").slideUp();
        } else {
            $(this).addClass("on");
            $(this).text("Закрыть меню");
            $(".sidebar").slideDown();
        }
    });




    var owl = $('.revs-slider.owl-carousel').owlCarousel({
        rtl: true,
        loop: true,
        //autoWidth:true,
        items: 3,
        dots: false,
        navContainer: '.revs-navs',
        nav: true,
        navText: ["<img src='/wp-content/themes/provodnik/img/left-arrow2.svg'/>", "<img src='/wp-content/themes/provodnik/img/right-arrow2.svg'/>"],
        responsive: {
            0: {
                items: 1,
                rtl: false,
                autoHeight: true,
            },
            900: {
                items: 3
            }
        }
    })

    checkClasses();
    owl.on('translated.owl.carousel', function (event) {
        checkClasses();
        owl.trigger('refresh.owl.carousel');
    });

    function checkClasses() {
        $('.revs-slider .owl-stage .owl-item').removeClass('firstActiveItem lastActiveItem');
        setTimeout(function () {
            var first = $('.revs-slider .owl-stage .owl-item.active').eq(0);
            first.addClass('firstActiveItem');
            $(".revs-box-out .out").html(first.find(".txt").html());
        }, 0);
    }


    $("#btn_overlay").click(function () {
        $("#btn_overlay").hide();
        $(".popup").hide();
        $("#question-txt").html("");
    });
    $(".close").click(function () {
        $("#btn_overlay").hide();
        $(".popup").hide();
    });
    $(".close_kviz").click(function () {
        $("#btn_overlay").hide();
        $(".popup").hide();
    });

    $('.btn-call').click(function (event) {
        event.preventDefault();
        $("#btn_overlay").show();
        var scroll = $(window).scrollTop();
        $("#callpopup").css("top", scroll + 40 + "px");
        $("#callpopup").show();

    });
    $('.btn-services').click(function (event) {
        event.preventDefault();
        $("#btn_overlay").show();
        var scroll = $(window).scrollTop();
        $("#servicespopup").css("top", scroll + 80 + "px");
        $("#servicespopup").show();

    });

    setTimeout(function () {
        $("#btn_overlay").show();
        $("#message_popup").css("top", scroll + 40 + "px");
        $("#message_popup").show();

    }, 100000);

    $('.btn-buy').click(function (event) {
        event.preventDefault();
        //$('#hid1').val($(this).attr('data-title'));	

        $("#btn_overlay").show();
        var scroll = $(window).scrollTop();
        $("#buypopup").css("top", scroll + 40 + "px");
        $("#buypopup").show();

    });

    $('.btn-demo').click(function (event) {
        event.preventDefault();
        $("#btn_overlay").show();
        var scroll = $(window).scrollTop();
        $("#demopopup").css("top", scroll + 40 + "px");
        $("#demopopup").show();

    });

    $('.btn-demo_test').click(function (event) {
        event.preventDefault();
        $("#btn_overlay").show();
        var scroll = $(window).scrollTop();
        $("#test_popup").css("top", scroll + 40 + "px");
        $("#test_popup").show();

    });
    $('.btn_quiz').click(function (event) {
        event.preventDefault();
        $("#btn_overlay").show();
        var scroll = $(window).scrollTop();
        $("#btn_quiz_popup").css("top", scroll + 40 + "px");
        $("#btn_quiz_popup").show();

    });
    $('.btn-full').click(function (event) {
        event.preventDefault();
        $("#btn_overlay").show();
        var scroll = $(window).scrollTop();
        $("#buyfullpopup").css("top", scroll + 40 + "px");
        $("#buyfullpopup").show();

    });

    //$.mask.definitions['~']='[ 1234567890+_]';
    //$("input[name='Телефон']").inputmask({"mask": "+9 (999) 999-9999"}); //specifying options

    $('.btn6').click(function () {
        var parent = $(this).closest(".btn6");
        $('.btn6').removeClass("active");
        var variate = parent.attr('data-id');
        console.log(variate);
        switch (variate) {
            case '1':
                $('.lider').addClass('active');
                $('#people').removeClass('none')
                $('#company').addClass('none')
                $('#price_1').html('2 500 ₽');
                break;

            case '2':
                $('.partners_btn').addClass('active');
                $('#company').removeClass('none')
                $('#people').addClass('none')
                break;

        }
        if (parent.hasClass("active")) {
            parent.removeClass("ctive");

        } else {
            parent.addClass("on");
        }
    });

});

let mounts = 3;
let strMounts;

function rangeSlider(value) {

    if (value == 1) {
        mounts = 1;
        strMounts = "1 месяц";
        mTotal = 2500;
        addClc();
        priceMounth = ''


    }
    if (value == 2) {
        mounts = 3;
        strMounts = "3 месяца";
        mTotal = 7125;
        addClc();
        priceMounth = '2 375 ₽ в месяц'

    }
    if (value == 3) {
        mounts = 6;
        strMounts = "6 месяцев";
        mTotal = 13500;
        addClc();
        priceMounth = '2 250 ₽ в месяц'

    }
    if (value == 4) {
        mounts = 12;
        strMounts = "1 год";
        mTotal = 13500;
        oldPrice = "30 000";
        addClc();
        priceMounth = '1 125 ₽ в месяц'

    }
    if (value == 5) {
        mounts = 'local';
        strMounts = "Купить навсегда";
        mTotal = 50000;
        addClc();
        priceMounth = ''
    }
    if (value == 6) {
        mounts = 'fransh';
        strMounts = "Для франшиз";
        mTotal = 000000;
        priceMounth = ''

        remoove();
    }
    calc(mounts, strMounts, mTotal, mounts, priceMounth);
}
let totalDop = 0
let allCheck = document.querySelectorAll('.btn-dop');
let fransh_elem = document.getElementById('check_fransh');
let cenaDop = document.getElementById('cexel');
let mountsName = document.getElementById('rangeValue')
let cMount = document.getElementById('cmount')

let totalPrice = document.getElementById('ctotal')
let border = document.getElementById('dop-border')
let mPrice = 13560;
const dopUslugi = [{
    name: 'exel',
    price: 2500
},
{
    name: 'exel+',
    price: 9000
},
{
    name: 'fransh',
    price: 0
},
]
mTotal = 0;

function calc(mounts, str, mTotal, mounts, priceMounth) {
    mountsName.innerHTML = str;
    cMount.innerHTML = mTotal.toLocaleString('ru-RU') + ' ₽ ';
    mPrice = mTotal;
    mounts = mounts;
    document.getElementById("priceMounth").innerHTML = priceMounth;
    clcfFill();
    dopPrice();

    totalCount();
    if (mounts == 12) {
        document.getElementById("pcenaOld").innerHTML = "30 000 ₽";
    } else {
        document.getElementById("pcenaOld").innerHTML = " ";
    }
    // кнопка перенос 
    if (mounts == 1 || mounts == 3 || mounts == 6) {
        document.getElementById("exel_inf").innerHTML = "2 500 ₽ "
    } else {
        document.getElementById("exel_inf").innerHTML = "Бесплатно"
    }
}
const remoove = () => {
    document.getElementById("clcdisplay").classList.add('hiden');
    document.getElementById("fransh").classList.remove('hiden');
}

const remooveFanshBtn = () => {
    document.getElementById("fransh_btn").classList.add('hiden');
}
const addFanshBtn = () => {
    document.getElementById("fransh_btn").classList.remove('hiden');
}

const addClc = () => {
    document.getElementById("clcdisplay").classList.remove('hiden');
    document.getElementById("fransh").classList.add('hiden');
}
const clcfFill = () => {
    if (mounts == 'local' || mounts == 'fransh') {
        remooveFanshBtn();
        fillial = 0;
        fransh_elem.classList.remove('active');

    } else {
        addFanshBtn()
    }
    if (fransh_elem.classList.contains('active')) {

        fillial = 800 * mounts;
    } else {
        dispFill = false;
        fillial = 0;
    }
    removeDisp(dispDop, dispFill);
}
let fillial = 0;
let dop = false;
let dispDop = false;
let dispFill = false

for (let check of allCheck) {
    check.addEventListener('click', () => {
        if (check.classList.contains('active')) {
            check.classList.remove('active')
            dop = false;
            dispDop = false;

        } else {
            for (let item of allCheck) {
                item.classList.remove('active')
                dop = false
            }
            dispDop = true;

            dop = true;
            check.classList.add('active');
        }
        removeDisp(dispDop, dispFill);
        active();
        dopPrice();
    })
}
//dop fillial
const setListener = (element, type, handler) => {
    if (element) {
        return;
    }
    return () => {

        element.remooveEventListener(type, handler);
    }

};
if (fransh_elem) {
    fransh_elem.addEventListener('click', () => {
        console.log('1');

        if (fransh_elem.classList.contains('active')) {
            fransh_elem.classList.remove('active')
            dispFill = false;
            fillial = 0;

        } else {
            dispFill = true;
            fransh_elem.classList.add('active');
        }
        removeDisp(dispDop, dispFill);
        clcfFill();
        dopPrice();
    });
}

setListener(fransh_elem, 'click', () => {

    if (fransh_elem.classList.contains('active')) {
        fransh_elem.classList.remove('active')
        dispFill = false;
        fillial = 0;

    } else {
        dispFill = true;
        fransh_elem.classList.add('active');
    }
    removeDisp(dispDop, dispFill);
    clcfFill();
    dopPrice();
})


const active = () => {
    for (let check of allCheck) {
        if (check.classList.contains('active')) {
            const dataAttrValue = check.dataset.name;

            if (dop == true) {
                if (dataAttrValue == "exel") {
                    if (mounts == 1 || mounts == 3 || mounts == 6) {
                        totalDop = 2500;
                    } else {
                        totalDop = 0
                    }
                }
                if (dataAttrValue == "exel+") {
                    totalDop = 9000;
                }
            }
        }
        if (dop == false) {
            totalDop = 0;
        }
    }
}


let AllOnlyDop = document.querySelectorAll('.onlydop');

const removeDisp = (i, j) => {
    if (i === false && j == false) {
        for (let dop of AllOnlyDop) {
            dop.classList.add('hiden');
            border.classList.add('dop-border')
        }
    } else {
        for (let dop of AllOnlyDop) {
            border.classList.remove('dop-border')
            dop.classList.remove('hiden')
        }
    }
}
let fPrice = 0
let activeBtn_fransh = false;


let check_excel = document.getElementById("check_exel");

const dopPrice = () => {
    let dopTotal = totalDop + fillial
    cenaDop.innerHTML = dopTotal.toLocaleString('ru-RU') + 'P';
    active();
    totalCount();
}
const totalCount = () => {
    if (mounts == 4) {
        document.getElementById("pcenaOld").innerHTML = "30 000 ₽";
    } else {
        document.getElementById("pcenaOld").innerHTML = " ";
    }
    const total = totalDop + fillial + mPrice;
    totalPrice.innerHTML = total.toLocaleString('ru-RU') + 'P'
}
let box_mistake = document.querySelectorAll('.school_mistake .box')

for (let i = 0; i < box_mistake.length; i++) {

    let btn = box_mistake[i].querySelector('.block-mistake')
    let list = box_mistake[i].querySelector('.mistake-list')

    if (btn) {
        btn.addEventListener('click', () => {
            console.log('1');

            if (btn.classList.contains('disp')) {
                btn.classList.remove('disp')
                list.classList.remove('disp');

            } else {
                list.classList.add('disp');
                btn.classList.add('disp');
            }
        });
    }

    console.log(list);
}
