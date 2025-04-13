$(document).ready(function () {
    if (getCookie('confirm_cookie') == 'set') {
        $('.cookies').remove();
    }
});

$('.cookies .bb_accept').click(function () {
    if (!getCookie('confirm_cookie')) {
        setCookie('confirm_cookie', 'set', 24);
    }
});

function setCookie(key, value, expiry) {
    var expires = new Date();
    expires.setTime(expires.getTime() + expiry * 24 * 60 * 60 * 1000);
    document.cookie = key + '=' + value + ';path=/' + ';expires=' + expires.toUTCString();
}

function getCookie(key) {
    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
    return keyValue ? keyValue[2] : null;
}

function eraseCookie(key) {
    var keyValue = getCookie(key);
    setCookie(key, keyValue, '-1');
}

$('.blog-search input[name="blog_search"]').keyup(function (e) {
    let text = $(this).val();
    $.ajax({
        url: '/wp-admin/admin-ajax.php',
        type: 'post',
        data: { action: 'data_fetch', keyword: text },
        dataType: 'html',
        success: function (data) {
            if (data) {
                $('.blog-search .searching-list ul').html(data);
            } else {
                $('.blog-search .searching-list ul').empty();
                $('.blog-search .searching-list').removeClass('active');
            }
        },
    });
    if (e.which == 13) {
        window.location = '?search=' + text;
    }
});

function show_modal_thanks() {
    $('.wpcf7 ').addClass('submitting');
    $('.form-subscribe .btn').addClass('load');
    setTimeout(() => {
        $('.form-subscribe .btn').removeClass('load');
        $('.form-subscribe .btn').addClass('success');
    }, 1000);
    setTimeout(() => {
        $.fancybox.open({
            src: '#modal_thanks',
            speed: 500,
            touch: true,
            autoFocus: false,
            closeExisting: true,
            hideScrollbar: true,
            //animationEffect: "zoom-in-out",
        });
        $('.form-subscribe .btn').removeClass('success');
        $('.form-subscribe input[type="email"]').val('');
        $('.wpcf7 ').removeClass('submitting');
    }, 1500);
    $('.input').each(function (index, el) {
        $(el).attr('data-state', '');
    });
    setTimeout(() => {
        $.fancybox.close({
            src: '#modal_thanks',
        });
    }, 6500);
}

function show_modal_thanks_sub() {
    $('.form-subscribe .btn').addClass('load');
    setTimeout(() => {
        $('.form-subscribe .btn').removeClass('load');
        $('.form-subscribe .btn').addClass('success');
    }, 1000);
    setTimeout(() => {
        $.fancybox.open({
            src: '#modal_sub_thanks',
            speed: 500,
            touch: true,
            autoFocus: false,
            closeExisting: true,
            hideScrollbar: true,
            //animationEffect: "zoom-in-out",
        });
        $('.form-subscribe .btn').removeClass('success');
        $('.form-subscribe input[type="email"]').val('');
    }, 1500);
    $('.input').each(function (index, el) {
        $(el).attr('data-state', '');
    });
    setTimeout(() => {
        $.fancybox.close({
            src: '#modal_sub_thanks',
        });
    }, 6500);
}

document.addEventListener(
    'wpcf7mailsent',
    function (event) {
        if (!$(event.srcElement).hasClass('form-in-modal') && !$(event.srcElement).hasClass('form-subscribe')) {
            show_modal_thanks();
        }
        if ($(event.srcElement).hasClass('form-subscribe')) {
            show_modal_thanks_sub();
        }
    },
    false,
);
document.addEventListener(
    'wpcf7submit',
    function (event) {
        $('.wpcf7-response-output').remove();
        setTimeout(() => {
            $('.wpcf7-not-valid-tip').addClass('error_text');
        }, 10);
        setTimeout(() => {
            if ($('.wpcf7-form.form-subscribe').hasClass('invalid')) {
                $('.wpcf7-form.form-subscribe .with_line').addClass('error');
                $('.wpcf7-form.form-subscribe .with_line').after('<span class="error_text">Please fill in the field</span>');
            }
            setTimeout(() => {
                $('.wpcf7-form.form-subscribe .error_text').hide();
            }, 3000);
        }, 300);
    },
    false,
);

jQuery(document).ready(function ($) {
    $('.s-cases__filters .dropdown__item input[type="checkbox"]').change(function () {
        handler_filter();
    });

    $('.wpcf7-form.form-subscribe p').contents().unwrap();
});

function handler_filter() {
    var filters_str = '';
    var filter_html = '';

    $('.s-cases__filters .dropdown__item input[name="industry"]').each(function (index, el) {
        if (el.checked) {
            var val = $(el).val();
            if (filters_str.includes('cases_industry')) {
                filters_str += val + ',';
            } else {
                filters_str += (filters_str == '' ? '?' : '&') + 'cases_industry=' + val + ',';
            }
        }
    });

    if (filters_str.slice(-1) == ',') {
        filters_str = filters_str != '' ? filters_str.substring(0, filters_str.length - 1) : filters_str;
    }

    $('.s-cases__filters .dropdown__item input[name="services"]').each(function (index, el) {
        if (el.checked) {
            var val = $(el).val();
            if (filters_str.includes('cases_services')) {
                filters_str += val + ',';
            } else {
                filters_str += (filters_str == '' ? '?' : '&') + 'cases_services=' + val + ',';
            }
        }
    });

    if (filters_str.slice(-1) == ',') {
        filters_str = filters_str != '' ? filters_str.substring(0, filters_str.length - 1) : filters_str;
    }

    if (filters_str.slice(-1) == ',') {
        filters_str = filters_str != '' ? filters_str.substring(0, filters_str.length - 1) : filters_str;
    }

    if (filters_str == '') {
        history.pushState(null, null, window.location.pathname);
    } else {
        history.pushState(null, null, filters_str);
    }

    $.ajax({
        url: filters_str,
        type: 'GET',
        dataType: 'html',
        success: function (results) {
            if (results) {
                var data = $(results).find('.field_content > *');
                $('.field_content').fadeIn(200).html(data);
                /*var filters_activated = $(results).find('.filters-activated > *');
                $('.filters-activated').fadeIn(200).html(filters_activated);
                $('.minied-more').fadeIn(200).html($(results).find('.minied-more > *'));
                $('.minied-box').css('opacity', '1');
                $('.filters-activated').css('opacity', '1');
                $(".loader_inner").fadeOut();
                $(".loader").delay(400).fadeOut("slow");*/

                /*if ($('.filters-activated .item:not(.all)').length) {
                    $('#delete_all_filter').show();
                } else {
                    $('#delete_all_filter').hide();
                }*/
            } else {
                //search_results.hide();
            }
        },
    });
}

//clear filters

$(document).on('click', '#delete_all_filter', function () {
    //$('.filters-activated').empty();
    var filters_str = $('input[name="page_id"]').val();
    history.pushState(null, null, filters_str);

    $.ajax({
        url: filters_str,
        type: 'GET',
        dataType: 'html',
        success: function (results) {
            if (results) {
                var data = $(results).find('.field_content > *');
                $('.field_content').fadeIn(200).html(data);
            }
        },
    });
});

$('.join-form #user_file').on('change', function () {
    let parent = document.querySelector('.join-form');
    let fileInput = parent.querySelector('#user_file');
    if (fileInput.files && fileInput.files.length > 0) {
        $.each(fileInput.files, function (key, value) {
            var file_type = value['name'].split('.').pop();
            if (file_type !== 'doc' && file_type !== 'docx' && file_type !== 'pdf' && file_type !== 'xml') {
                $('.form__field .input-file').addClass('input-file--upl-err');
                setTimeout(function () {
                    $('.form__field .input-file').removeClass('input-file--uploaded');
                }, 100);
                $('#user_file').next('.input__error').show();
            } else {
                $('.form__field .input-file').removeClass('input-file--upl-err');
                $('.form__field .input-file').addClass('input-file--uploaded');
                $('#user_file').next('.input__error').hide();
            }
        });
    }
});

$(document).on('submit', 'form.join-form', function (event) {
    event.preventDefault();
    var data = $(this).serialize();
    successForm(data, this);
});
function successForm(data, form) {
    var data_to = new FormData();
    let parent = document.querySelector('.join-form');
    let fileInput = parent.querySelector('#user_file');

    var error = false;

    if (fileInput.files && fileInput.files.length > 0) {
        $.each(fileInput.files, function (key, value) {
            var file_type = value['name'].split('.').pop();
            if (file_type !== 'doc' && file_type !== 'docx' && file_type !== 'pdf' && file_type !== 'xml') {
                error = true;
            } else {
                error = false;
            }
            if (key < 5) {
                if (value['size'] < 10000000) {
                    data_to.append(key, value);
                }
            }
        });
    }

    var flag = false;
    var processData = true;
    var contentType = undefined;
    var href = '/wp-admin/admin-ajax.php';
    var action = false;
    if ($(form).hasClass('join-form')) {
        var action = 'handler_join_form';
    } else {
        var action = false;
    }
    if (action) {
        if (flag) {
            var data = form_data;
            flag = false;
            processData = false;
            contentType = false;
        } else {
            data_to.append('data', data);
            data_to.append('action', action);
            processData = false;
            contentType = false;
        }

        //$('body').append(loader);
        //$('body').css('opacity', '0.5');

        var name = $('form.join-form').find('input[name=name]').val();
        var phone = $('form.join-form').find('input[name=phone]').val();
        var email = $('form.join-form').find('input[name=email]').val();
        var city = $('form.join-form').find('select[name=city]').val();
        var message = $('form.join-form').find('textarea[name=message]').val();

        var test_email = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;

        if (!name || name.length < 2) {
            error = true;
            $('form.join-form').addClass('invalid');

            $('form.join-form').find('input[name=name]').addClass('wpcf7-not-valid');
            $('form.join-form').find('input[name=name]').siblings('.input__error').show();

            setTimeout(function () {
                $('form.join-form').find('input[name=name]').removeClass('wpcf7-not-valid');
            }, 20000);
            //return false;
        }
        if (!phone || phone.length < 10) {
            error = true;
            $('form.join-form').addClass('invalid');
            $('form.join-form').find('input[name=phone]').addClass('wpcf7-not-valid');
            $('form.join-form .countries-phone .input__error').show();
            setTimeout(function () {
                $('form.join-form').find('input[name=phone]').removeClass('wpcf7-not-valid');
            }, 20000);
            //return false;
        }
        if (!email || !test_email.test(email)) {
            error = true;
            $('form.join-form').addClass('invalid');
            $('form.join-form').find('input[name=email]').addClass('wpcf7-not-valid');
            $('form.join-form').find('input[name=email]').siblings('.input__error').show();
            setTimeout(function () {
                $('form.join-form').find('input[name=email]').removeClass('wpcf7-not-valid');
            }, 20000);
            //return false;
        }
        if (!city || city.length < 2) {
            error = true;
            $('form.join-form').addClass('invalid');
            $('form.join-form').find('select[name=city]').addClass('wpcf7-not-valid');
            $('form.join-form .form__field--select .input__error').show();
            setTimeout(function () {
                $('form.join-form').find('select[name=city]').removeClass('wpcf7-not-valid');
            }, 20000);
            //return false;
        }
        if (!message || message.length < 2) {
            error = true;
            $('form.join-form').addClass('invalid');
            $('form.join-form').find('textarea[name=message]').addClass('wpcf7-not-valid');
            $('form.join-form .input--textarea .input__error').show();
            setTimeout(function () {
                $('form.join-form').find('textarea[name=message]').removeClass('wpcf7-not-valid');
            }, 20000);
            //return false;
        }

        // console.log(error);

        if (!error) {
            $('button[type="submit"]').prop('disabled', true);
            $.ajax({
                url: href,
                type: 'post',
                data: data_to,
                dataType: 'json',
                processData: processData,
                contentType: contentType,
                success: function (json) {
                    dataLayer.push({ event: 'form_careers_submission' });

                    if (json.success) {
                        //window.location = $('input[name="link_to_thanks_page"]').val();
                        $('form.join-form')[0].reset();
                        show_modal_thanks();
                        $('button[type="submit"]').prop('disabled', false);
                    } else {
                        /*$('form.form_sender input, form.form_sender textarea').removeClass('error');
                        $('form.form_sender input, form.form_sender textarea').each(function(index, el) {
                            for (var i = 0; i < json.errors.length; i++) {
                                if ($(el).attr('name') == json.errors[i]) {
                                    $(el).addClass('error');
                                }
                            }
                        });*/
                    }
                    //$('.lds-ring').remove();
                    //$('body').css('opacity', '1');
                },
            });
            // const selectVal = document.querySelector('select');
            // if (select) {

            // }
            // document.querySelector('.select__value span').textContent = "";
            const selectVal = document.querySelector('select');
            if (selectVal) {
                document.querySelector('.select__value span').textContent = '';
                selectVal.querySelectorAll('option').forEach(el => {
                    el.removeAttribute('selected');
                });
                document.querySelectorAll('.select__option').forEach((opt, i) => {
                    // if (i !== 0) {
                    opt.classList.remove('select__option--check');
                    // }
                    // else {
                    //     opt.classList.add('select__option--check');
                    // }
                });
                selectVal.querySelectorAll('option')[0].setAttribute('selected', 'selected');
            }
            // document.querySelectorAll('.input__error')
        }
    }
}

// request form

/*
$(document).on('submit', 'form.request-form', function (event) {
    event.preventDefault();
    var data = $(this).serialize();
    successFormR(data, this);
});
*/

function successFormR(data, form) {
    var data_to = new FormData();
    let parent = document.querySelector('.request-form');

    var error = false;

    var flag = false;
    var processData = true;
    var contentType = undefined;
    var href = '/wp-admin/admin-ajax.php';
    var action = false;
    if ($(form).hasClass('request-form')) {
        var action = 'handler_request_form';
    } else {
        var action = false;
    }
    if (action) {
        if (flag) {
            var data = form_data;
            flag = false;
            processData = false;
            contentType = false;
        } else {
            data_to.append('data', data);
            data_to.append('action', action);
            processData = false;
            contentType = false;
        }

        //$('body').append(loader);
        //$('body').css('opacity', '0.5');

        var name = $('form.request-form').find('input[name=name]').val();
        var phone = $('form.request-form').find('input[name=phone]').val();
        var email = $('form.request-form').find('input[name=email]').val();
        var company_name = $('form.request-form').find('input[name=company_name]').val();
        var details = $('form.request-form').find('textarea[name=details]').val();
        var position = $('form.request-form').find('select[name=position]').val();

        var test_email = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;

        if (!position || position.length < 2) {
            error = true;
            $('form.request-form').addClass('invalid');
            $('form.request-form').find('select[name=position]').addClass('wpcf7-not-valid');
            $('form.request-form .form__field--select .input__error').show();
            setTimeout(function () {
                $('form.request-form .form__field--select .input__error').hide();
            }, 10000);
            //return false;
        }

        if (!name || name.length < 2) {
            error = true;
            $('form.request-form').addClass('invalid');
            $('form.request-form').find('input[name=name]').addClass('wpcf7-not-valid');
            $('form.request-form').find('input[name=name]').siblings('.input__error').show();
            setTimeout(function () {
                $('form.request-form').find('input[name=name]').removeClass('wpcf7-not-valid');
            }, 10000);
            //return false;
        }

        if (!phone || phone.length < 5) {
            error = true;
            $('form.request-form').addClass('invalid');
            $('form.request-form').find('input[name=phone]').addClass('wpcf7-not-valid');
            $('form.request-form .countries-phone .input__error').show();
            setTimeout(function () {
                $('form.request-form .countries-phone .input__error').hide();
            }, 10000);
            //return false;
        }
        if (!email || !test_email.test(email)) {
            error = true;
            $('form.request-form').addClass('invalid');
            $('form.request-form').find('input[name=email]').addClass('wpcf7-not-valid');
            $('form.request-form').find('input[name=email]').siblings('.input__error').show();
            setTimeout(function () {
                $('form.request-form').find('input[name=email]').removeClass('wpcf7-not-valid');
            }, 10000);
            //return false;
        }
        if (!company_name || company_name.length < 2) {
            error = true;
            $('form.request-form').addClass('invalid');
            $('form.request-form').find('input[name=company_name]').addClass('wpcf7-not-valid');
            $('form.request-form .input--textarea .input__error').show();
            setTimeout(function () {
                $('form.request-form .input--textarea .input__error').hide();
            }, 10000);
            //return false;
        }
        if (!details || details.length < 2) {
            error = true;
            $('form.request-form').addClass('invalid');
            $('form.request-form').find('textarea[name=details]').addClass('wpcf7-not-valid');
            $('form.request-form').find('textarea[name=details]').siblings('.input__error').show();
            setTimeout(function () {
                $('form.request-form').find('textarea[name=details]').removeClass('wpcf7-not-valid');
            }, 10000);
            //return false;
        }

        if (!error) {
            $('button[type="submit"]').prop('disabled', true);
            $.ajax({
                url: href,
                type: 'post',
                data: data_to,
                dataType: 'json',
                processData: processData,
                contentType: contentType,
                success: function (json) {
                    dataLayer.push({ event: 'form_request_quote_submission' });

                    if (json.success) {
                        //window.location = $('input[name="link_to_thanks_page"]').val();
                        $('form.request-form')[0].reset();
                        show_modal_thanks();
                        $('button[type="submit"]').prop('disabled', false);
                    } else {
                        /*$('form.form_sender input, form.form_sender textarea').removeClass('error');
                        $('form.form_sender input, form.form_sender textarea').each(function(index, el) {
                            for (var i = 0; i < json.errors.length; i++) {
                                if ($(el).attr('name') == json.errors[i]) {
                                    $(el).addClass('error');
                                }
                            }
                        });*/
                    }
                    //$('.lds-ring').remove();
                    //$('body').css('opacity', '1');
                },
            });
        }
    }
}

document.addEventListener(
    'wpcf7mailsent',
    function (event) {
        if (event.detail.contactFormId == '8447' || event.detail.contactFormId == '4077' || event.detail.contactFormId == '10575' || event.detail.contactFormId == '8444') {
            //contacts
            dataLayer.push({ event: 'form_contact_us_submission' });
        } else if (event.detail.contactFormId == '9238' || event.detail.contactFormId == '9239' || event.detail.contactFormId == '4593') {
            //get_in_touch
            dataLayer.push({ event: 'form_get_in_touch_submission' });
        } else if (event.detail.contactFormId == '4198') {
            //subscription
            dataLayer.push({ event: 'form_blog_subscription_submission' });
        } else if (event.detail.contactFormId == '14106' || event.detail.contactFormId == '13946' || event.detail.contactFormId == '13294') {
            //awards_
            dataLayer.push({ event: 'form_our_awards_submission' });
        }
    },
    false,
);

/*
 * disabled sent
 */

$('.wpcf7-form').submit(function () {
    $(this).find('.wpcf7-submit').prop('disabled', true);
    var wpcf7Elm = document.querySelector('.wpcf7');
    wpcf7Elm.addEventListener(
        'wpcf7submit',
        function (event) {
            $('.wpcf7-submit').prop('disabled', false);
        },
        false,
    );
    wpcf7Elm.addEventListener(
        'wpcf7invalid',
        function () {
            $('.wpcf7-submit').prop('disabled', false);
        },
        false,
    );
});

/*
 * get cookie for utm
 */
function populateHiddenField() {
    const utm_source = getCookieUtm('utm_source');
    const utm_medium = getCookieUtm('utm_medium');
    let latestSource;
    if (utm_source && utm_medium) {
        if (utm_source === 'google' && utm_medium === 'cpc') {
            latestSource = 'Paid Search';
        } else if (utm_medium === 'referral') {
            latestSource = 'Referral';
        } else if (utm_medium === 'social') {
            latestSource = 'Social Media';
        } else if (utm_source === '(direct)' && utm_medium === '(none)') {
            latestSource = 'Direct';
        } else if (utm_medium === 'organic') {
            latestSource = 'Organic Search';
        } else {
            latestSource = '$(utm_source)';
        }
    } else {
        latestSource = '(direct)';
    }

    const hiddenInput = document.querySelector(`[name="hs_analytics_latest_source"]`);
    if (hiddenInput) {
        hiddenInput.value = latestSource;
    }
}

function getCookieUtm(name) {
    let cookieArr = document.cookie.split(';');
    for (let i = 0; i < cookieArr.length; i++) {
        let cookiePair = cookieArr[i].split('=');
        if (name === cookiePair[0].trim()) {
            return decodeURIComponent(cookiePair[1]);
        }
    }
    return null;
}

document.addEventListener('DOMContentLoaded', populateHiddenField);

document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('wpcf7mailsent', function (event) {
        const form = event.target;
        const submitButton = form.querySelector('input[type="submit"], button[type="submit"]');

        if (submitButton) {
            setTimeout(function () {
                submitButton.classList.add('disabled');
                const forms = document.querySelectorAll('.wpcf7-form');
                forms.forEach(form => {
                    form.classList.remove('sent');
                    form.classList.add('init');
                    form.setAttribute('data-status', 'init');
                });
            }, 500);
        }
    });
});



jQuery(document).ready(function ($) {
    $('input[name="whitepapers_search"]').on('keyup', function (e) {
        let search = $(this).val().trim();
        if (e.which === 13) {
            e.preventDefault();
            ajaxLoadWhitepapers(search, '');
        }
    });

    $('.js-tag-filter').on('click', function (e) {
        e.preventDefault();
        let term = $(this).data('slug');
        $('.js-tag-filter').removeClass('active');
        $(this).addClass('active');
        ajaxLoadWhitepapers('', term);
    });

    $('a[href="/whitepapers/"]').on('click', function (e) {
        e.preventDefault();
        $('.js-tag-filter').removeClass('active');
        $(this).addClass('active');
        ajaxLoadWhitepapers('', '');
    });

    function ajaxLoadWhitepapers(search = '', term = '') {

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            type: 'post',
            data: {
                action: 'whitepapers_ajax_filter',
                search: search,
                term: term,
            },
            dataType: 'json', 
          
            success: function (response) {
                if (response.success) {
                    $('.cards').html(response.data.content); 

                    if (response.data.total_posts <= 6) {
                        $('.b-pagination').hide();
                    } else {
                        $('.b-pagination').show(); 
                    }
                } else {
                    $('.cards').html('<div class="search-no-results text-center">Помилка завантаження.</div>');
                }
            },
            error: function (xhr, status, error) {
                $('.cards').html('<div class="search-no-results text-center">Error.</div>');
            },
        });
    }
});



