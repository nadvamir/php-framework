/**
 * closes popup
 */
function closePopup ()
{
    $('#popup').css ('display', 'none');
}

/**
 * opens popup
 */
function openPopup ()
{
    $('#popup').css ('display', 'block');
}

/**
 * adds html code inside the popup
 */
function setPopupHtml (code)
{
    $('#popup_content > div').html (code);
}

/**
 * inserts a page into a popup, via ajax request
 */
function popup (params)
{
    $('#popup').fadeToggle (700);
    ajax (params, function (code) {
        setPopupHtml (code);
    });
}

/**
 * showing varliukas
 */
function runVarliukas () 
{
}

/**
 * disabling varliukas
 */
function stopVarliukas ()
{
}

/** ------------------------------------------------------------------------------------------------
 * ajax
 */
function ajax (params, success)
{
    runVarliukas ();
    $.ajax ({
        type: 'POST',
        url: 'index.php',
        data: params,
    }).done (function (msg) {
        success (msg);
        stopVarliukas ();
    });
}