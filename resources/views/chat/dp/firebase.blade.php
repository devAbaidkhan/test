
<html>
<head>
    <!-- firebase integration started -->

{{--    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>--}}
{{--    <!-- Firebase App is always required and must be first -->--}}
{{--    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-app.js"></script>--}}

{{--    <!-- Add additional services that you want to use -->--}}
{{--    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-auth.js"></script>--}}
{{--    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-database.js"></script>--}}
{{--    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-firestore.js"></script>--}}
{{--    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-messaging.js"></script>--}}
{{--    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-functions.js"></script>--}}

{{--    <!-- firebase integration end -->--}}

{{--    <!-- Comment out (or don't include) services that you don't want to use -->--}}
{{--    <!-- <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-storage.js"></script> -->--}}

{{--    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>--}}
{{--    <script src="https://www.gstatic.com/firebasejs/7.8.0/firebase-analytics.js"></script>--}}
</head>
<body>
Firebase
<button onclick="initFirebaseMessagingRegistration()">click</button>
</body>

<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
<script>
    console.log('11')
    const firebaseConfig = {
        apiKey: "AIzaSyBNn0rdU0nS21DFChR36VCGxSf6R7-Otzg",
        authDomain: "dedo-partner.firebaseapp.com",
        projectId: "dedo-partner",
        storageBucket: "dedo-partner.appspot.com",
        messagingSenderId: "502917211217",
        appId: "1:502917211217:web:fee919a237ca06be628470",
        measurementId: "G-900GSQDPB1"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    console.log(messaging)
    function initFirebaseMessagingRegistration() {
        messaging
            .requestPermission()
            .then(function () {
                console.log(messaging.getToken())
                return messaging.getToken()
            })
            .then(function(token) {
                console.log(token);

                // $.ajaxSetup({
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     }
                // });

                {{--$.ajax({--}}
                {{--    url: '{{ route("save-token") }}',--}}
                {{--    type: 'POST',--}}
                {{--    data: {--}}
                {{--        token: token--}}
                {{--    },--}}
                {{--    dataType: 'JSON',--}}
                {{--    success: function (response) {--}}
                {{--        alert('Token saved successfully.');--}}
                {{--    },--}}
                {{--    error: function (err) {--}}
                {{--        console.log('User Chat Token Error'+ err);--}}
                {{--    },--}}
                {{--});--}}

            }).catch(function (err) {
            console.log('User Chat Token Error'+ err);
        });
    }

    messaging.onMessage(function(payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        console.log(payload);
        new Notification(noteTitle, noteOptions);
    });

</script>


{{--<script>--}}
{{--    // Your web app's Firebase configuration--}}
{{--    const firebaseConfig = {--}}
{{--        apiKey: "AIzaSyBNn0rdU0nS21DFChR36VCGxSf6R7-Otzg",--}}
{{--        authDomain: "dedo-partner.firebaseapp.com",--}}
{{--        projectId: "dedo-partner",--}}
{{--        storageBucket: "dedo-partner.appspot.com",--}}
{{--        messagingSenderId: "502917211217",--}}
{{--        appId: "1:502917211217:web:fee919a237ca06be628470",--}}
{{--        measurementId: "G-900GSQDPB1"--}}
{{--    };--}}
{{--    // Initialize Firebase--}}
{{--    firebase.initializeApp(firebaseConfig);--}}
{{--    //firebase.analytics();--}}
{{--    const messaging = firebase.messaging();--}}
{{--    messaging--}}
{{--        .requestPermission()--}}
{{--        .then(function () {--}}
{{--//MsgElem.innerHTML = "Notification permission granted."--}}
{{--            console.log("Notification permission granted.");--}}

{{--            // get the token in the form of promise--}}
{{--            return messaging.getToken()--}}
{{--        })--}}
{{--        .then(function(token) {--}}
{{--            // print the token on the HTML page--}}
{{--            console.log(token);--}}



{{--        })--}}
{{--        .catch(function (err) {--}}
{{--            console.log("Unable to get permission to notify.", err);--}}
{{--        });--}}

{{--    messaging.onMessage(function(payload) {--}}
{{--        console.log(payload);--}}
{{--        var notify;--}}
{{--        notify = new Notification(payload.notification.title,{--}}
{{--            body: payload.notification.body,--}}
{{--            icon: payload.notification.icon,--}}
{{--            tag: "Dummy"--}}
{{--        });--}}
{{--        console.log(payload.notification);--}}
{{--    });--}}

{{--    //firebase.initializeApp(config);--}}
{{--    // var database = firebase.database().ref().child("/users/");--}}
{{--    //--}}
{{--    // database.on('value', function(snapshot) {--}}
{{--    //     renderUI(snapshot.val());--}}
{{--    // });--}}
{{--    //--}}
{{--    // // On child added to db--}}
{{--    // database.on('child_added', function(data) {--}}
{{--    //     console.log("Comming");--}}
{{--    //     if(Notification.permission!=='default'){--}}
{{--    //         var notify;--}}
{{--    //--}}
{{--    //         notify= new Notification('CodeWife - '+data.val().username,{--}}
{{--    //             'body': data.val().message,--}}
{{--    //             'icon': 'bell.png',--}}
{{--    //             'tag': data.getKey()--}}
{{--    //         });--}}
{{--    //         notify.onclick = function(){--}}
{{--    //             alert(this.tag);--}}
{{--    //         }--}}
{{--    //     }else{--}}
{{--    //         alert('Please allow the notification first');--}}
{{--    //     }--}}
{{--    // });--}}

{{--    self.addEventListener('notificationclick', function(event) {--}}
{{--        event.notification.close();--}}
{{--    });--}}


{{--</script>--}}
</html>