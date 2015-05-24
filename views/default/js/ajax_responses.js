/**
 * response which makes nothing, just for the initial creating
 */
function doNothingResponse (response)
{
}

/**
 * shows character info inside the popup
 */
function displayCharacterInfo (html)
{
    openPopup ();
    setPopupHtml (html);
    // loading drag and drop
    NAV.initParticularDragAndDrop ('.char_item');
    NAV.initParticularDragAndDrop ('.char_eq');
}

