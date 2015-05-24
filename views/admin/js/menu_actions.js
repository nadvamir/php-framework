/** ------------------------------------------------------------------------------------------------
 * menu items onclick actions
 */
/**
 * opens chatbox
 */
function openChatBox ()
{
    // switching menus
    if (NAV.selected ('bottomMenu') == 'chat' || $('#chat_area').css ('display') == 'none')
        ocDiv ('chat_area');
    // if menu is disabled, then turning button off
    if ($('#chat_area').css ('display') == 'none')
        $('#chat_button').attr ('rel', 'off');
}

/**
 * opens friend chat
 */
function openFriendChat ()
{
    // switching menus
    if (NAV.selected ('bottomMenu') == 'friends' || $('#chat_area').css ('display') == 'none')
        ocDiv ('chat_area');
    // if menu is disabled, then turning button off
    if ($('#chat_area').css ('display') == 'none')
        $('#friends_button').attr ('rel', 'off');
}

/**
 * does nothing
 */
function doNothing ()
{
}

/**
 * loads a character into a popup window
 */
function loadCharacter (id)
{
    // sending ajax request for the character
    sendRequest('r=character/info&id=' + id, 'characterInfo');
}

/**
 * loads an edit item screen into popup, with current item data inserted
 * same as create item, but then id is set to be 0
 */
function editItem (id)
{
    openPopup ();
}

/**
 * loads an edit skill screen into popup, with current skill data inserted
 * same as create skill, but then id is set to be 0
 */
function editSkill (id)
{
    openPopup ();
}