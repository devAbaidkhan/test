var firebaseConfig = {
    apiKey: "AIzaSyCnoGCBci98i7Je2YRiwu9pwtvbIn5qKAQ",
    authDomain: "dedo-push-notification.firebaseapp.com",
    projectId: "dedo-push-notification",
    storageBucket: "dedo-push-notification.appspot.com",
    messagingSenderId: "227053008640",
    appId: "1:227053008640:web:e3da5517be4b9dfef165e5",
    measurementId: "G-G5H4XT0GLZ"
};

// Initialize Firebase
initializedFirebaseApp = firebase.initializeApp(firebaseConfig);
// Retrieve Firebase Messaging object.
const messaging = firebase.messaging();

// Handle incoming messages. Called when:
// - a message is received while the app has focus
// - the user clicks on an app notification created by a service worker
//   `messaging.onBackgroundMessage` handler.


messaging.onMessage((payload) => {

    console.log('Message received. ', payload);
    var notification = payload.data;
   
    var options = {
        body: notification.message,
        icon: 'https://dedodelivery.com/testdm/img/logo/dedo-logo.png'
    }
    var n = new Notification(notification.title, options);
   var url="https://dedodelivery.com/dedo_testing/restaurant/today_order_restaurant";
   if(window.location.href==url){
     //  window.location.reload();
     $('#dt').DataTable().ajax.reload();
   }
   /* order taker order list */
   if(window.location.href=='https://dedodelivery.com/dedo_testing/ordertaker/today_order_restaurant'){
      // window.location.reload();
      $('#dt').DataTable().ajax.reload();
   }
    console.log(window.location.pathname);
    console.log(window.location.href);
}); 


function resetUI() {
    showToken('loading...');
    // Get registration token. Initially this makes a network call, once retrieved
    // subsequent calls to getToken will return from cache.
    messaging.getToken({
        vapidKey: 'BElaslGmmOMctUgh05FA4zQ0Jqd8Cu6o4cQOrTkfoWsEe9XRLN1HhqwJ1yMEc1v8lcJAWhrCR2BCMWHB1XQI0-M'
    }).then((currentToken) => {
        if (currentToken) {

            $('#fcm_token').val(currentToken);
            sendTokenToServer(currentToken);
            showToken(currentToken);
        } else {
            // Show permission request.
            console.log('No registration token available. Request permission to generate one.');
            // Show permission UI.
            //updateUIForPushPermissionRequired();
            setTokenSentToServer(false);
        }
    }).catch((err) => {
        console.log('An error occurred while retrieving token. ', err);
        showToken('Error retrieving registration token. ', err);
        setTokenSentToServer(false);
    });
}


function showToken(currentToken) {
    // Show token in console and UI.
    console.log(currentToken);
}

// Send the registration token your application server, so that it can:
// - send messages back to this app
// - subscribe/unsubscribe the token from topics
function sendTokenToServer(currentToken) {
    if (!isTokenSentToServer()) {
        console.log('Sending token to server...');
        // TODO(developer): Send the current token to your server.
        setTokenSentToServer(true);
    } else {
        console.log('Token already sent to server so won\'t send it again ' +
            'unless it changes');
    }
}

function isTokenSentToServer() {
    return window.localStorage.getItem('sentToServer') === '1';
}

function setTokenSentToServer(sent) {
    window.localStorage.setItem('sentToServer', sent ? '1' : '0');
}



function requestPermission() {
    console.log('Requesting permission...');
    Notification.requestPermission().then((permission) => {
        if (permission === 'granted') {
            console.log('Notification permission granted.');
            // TODO(developer): Retrieve a registration token for use with FCM.
            // In many cases once an app has been granted notification permission,
            // it should update its UI reflecting this.
            resetUI();
        } else {
            console.log('Unable to get permission to notify.');
        }
    });
}

function deleteToken() {
    var vapidKey = "BElaslGmmOMctUgh05FA4zQ0Jqd8Cu6o4cQOrTkfoWsEe9XRLN1HhqwJ1yMEc1v8lcJAWhrCR2BCMWHB1XQI0-M";
    // Delete registration token.
    messaging.getToken({
        vapidKey: vapidKey
    }).then((currentToken) => {
        messaging.deleteToken(currentToken).then(() => {

            console.log('Token deleted.');
            setTokenSentToServer(false);
            // Once token is deleted update UI.
            // resetUI();
        }).catch((err) => {
            console.log('Unable to delete token. ', err);
        });
    }).catch((err) => {
        console.log('Error retrieving registration token. ', err);
    });
}

function init() {
    messaging
        .requestPermission()
        .then(function () {
            return messaging.getToken({
                vapidKey: 'BElaslGmmOMctUgh05FA4zQ0Jqd8Cu6o4cQOrTkfoWsEe9XRLN1HhqwJ1yMEc1v8lcJAWhrCR2BCMWHB1XQI0-M'
            })
        })
        .then(function (token) {
            console.log(token);
            $('#fcm_token').val(token);
        }).catch(function (err) {
            console.log(err);
        });
}


//deleteToken();