// serverInfo.request == response function
var serverInfo = {
    'currentRequest': null,
    'request': doNothingResponse,
    'characterInfo': displayCharacterInfo,
};


function sendRequest(rq, rqCode)
{
    // setting up request, so that we parse it later
    // however only if there is no ther requests pending
    if (serverInfo.currentRequest == null)
        serverInfo.currentRequest = rqCode;
    else
    {
        //alert ('can\'t stack requests!');
        return;
    }
    //startLoading ();
    
    xmlHttp = new XMLHttpRequest();
    xmlHttp.open("POST", "index.php", false);
    xmlHttp.onreadystatechange = function()
    {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
        {
            // a response may be json document or simple html
            // simple html should not be processed
            if (xmlHttp.responseText.substr (0, 10) == 'PLAIN_HTML')
            {
                serverInfo[serverInfo.currentRequest] (xmlHttp.responseText.substr (10));
                serverInfo.currentRequest = null;
                return;
            }   
            // otherwise lets process JSON
            var response = JSON.parse (xmlHttp.responseText);
            if (response.error != undefined)
                alert (response.error);
            else
                serverInfo[serverInfo.currentRequest] (response);
            serverInfo.currentRequest = null;
        }
    }

    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.setRequestHeader("Content-length", rq.length);
    xmlHttp.setRequestHeader("Connection", "close");
    xmlHttp.send(rq);
}
