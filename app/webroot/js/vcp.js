var apiKey;
var sessionId;
var token;
var connectionCount;

var session;
var publisher;
var subscriber;

var publisherElement = 'publisherContainer';
var subscriberElement = 'subscriberContainer';

var publisherWidth = 160;
var publisherHeight = 100;

var subscriberWidth = 480;
var subscriberHeight = 300;

var publisherProperties = {publishAudio: true, publishVideo: true, width: publisherWidth, height: publisherHeight, style: {buttonDisplayMode: "off"}};
var subscriberProperties = {subscribeToAudio: true, subscribeToVideo: true, width: subscriberWidth, height: subscriberHeight, style: {buttonDisplayMode: "off"}};

// EVENT LISTENER

function connect() {
//    if (OT.checkSystemRequirements() == 0) {
//        // The client does not support WebRTC.
//        sendMessage("Browser does not support WebRTC");
//    } 
    session = OT.initSession(apiKey, sessionId);
    sendMessage("Session has initialized. Connecting to session ... ");


    session.on({
        streamCreated: function(event) {
            sendMessage("New stream in the session: " + event.stream.streamId);
            var parentDiv = document.getElementById(subscriberElement);
            var replacementDiv = document.createElement("div"); // Create a div for the publisher to replace
            replacementDiv.id = "opentok_subscriber";
            parentDiv.appendChild(replacementDiv);

            subscriber = session.subscribe(event.stream, replacementDiv, subscriberProperties, function(error) {
                if (error) {
                    console.log(error);
                } else {
                    console.log("Subscriber added.");
                }
            });
        },
        streamDestroyed: function(event) {
            sendMessage("Stream stopped streaming. Reason: " + event.reason)
        },
        signal: function(event) {
            sendMessage("Signal sent from connection " + event.from.id + '. Message: ' + event.data);
            $("#chatdiv").append("<br><strong>"+event.from.id+"</strong>: "+event.data);
            // Process the event.data property, if there is any data.
        }
    });

    session.connect(token, function(error) {
        if (error) {
            sendMessage("Error connecting: ", error.code, error.message);
        } else {
            sendMessage("Connected to the session successfully.");
            displayBtn('connected');
        }
    });

}
function disconnect() {
    session.unsubscribe(stream);
    session.disconnect();
    sendMessage("Disconnected from session.");
    displayBtn('disconnected');
}
function publish() {

    // Replace with the replacement element ID:
    var parentDiv = document.getElementById(publisherElement);
    var replacementDiv = document.createElement("div"); // Create a div for the publisher to replace
    replacementDiv.id = "opentok_publisher";
    parentDiv.appendChild(replacementDiv);

    publisher = OT.initPublisher(replacementDiv.id, publisherProperties, function(error) {
        if (error) {
            // The client cannot publish.
            sendMessage('Can not published stream.');
        } else {
            sendMessage('Publisher initialized.');
        }
    });

    publisher.on({
        streamCreated: function(event) {
            sendMessage("Publisher started streaming.");
            sendMessage('Stream resolution: ' +
                    event.stream.videoDimensions.width +
                    'x' + event.stream.videoDimensions.height);
        },
        streamDestroyed: function(event) {
            sendMessage("Publisher stopped streaming. Reason: "
                    + event.reason);
        }
    });

    if (session.capabilities.publish == 1) {
        session.publish(publisher);
    } else {
        sendMessage("You cannot publish an audio-video stream.");
    }

}
function unpublish() {
    sendMessage("Unpublished button has clicked.");
    session.unpublish(publisher);
}
function sendMessage(message) {
    message = '<br>' + message;
    $("#statusbox").append(message);
}
function sendTextMessage() {
    var textData = $("#textMessageInput").val();
    $("#textMessageInput").val("");
    session.signal(
            {
//                to: connection1,
                data: textData,
                type: "textMessage"
            },
    function(error) {
        if (error) {
            sendMessage("signal error ("
                    + error.code
                    + "): " + error.reason);
        } else {
            sendMessage("signal sent.");
        }
    }
    );
//    alert(text);
//    $("#statusbox").append(message);
}
function displayBtn(type) {
    switch (type) {
        case 'connected':
            $('#disconnectBtn').show();
            $('#publishedBtn').show();
            $('#connectBtn').hide();
            break;
        case 'disconnected':
            $('#disconnectBtn').hide();
            $('#connectBtn').show();
            break;
        default:
            $('#disconnectBtn').hide();
            $('#connectBtn').show();
            break;
    }
}

function toggleScreen() {
    if (publisher) {
        var publisherElement = document.getElementById(publisher.id);
        if (publisherElement) {
            publisherElement.style.width = ((publisherElement.offsetWidth == publisherWidth) ? subscriberWidth : publisherWidth) + 'px';
            publisherElement.style.height = ((publisherElement.offsetHeight == publisherHeight) ? subscriberHeight : publisherHeight) + 'px';
        }
    }
    if (subscriber) {
        var subscriberElement = document.getElementById(subscriber.id);
        if (subscriberElement) {
            subscriberElement.style.width = ((subscriberElement.offsetWidth == subscriberWidth) ? publisherWidth : subscriberWidth) + 'px';
            subscriberElement.style.height = ((subscriberElement.offsetHeight == subscriberHeight) ? publisherHeight : subscriberHeight) + 'px';
        }
    }
    var contentA = $("#A").html();
    var contentB = $("#B").html();
    $("#A").html(contentB);
    $("#B").html(contentA);
}