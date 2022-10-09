// Client ID and API key from the Developer Console
var CLIENT_ID = '114634199422-08iddpm7j9fudfur1ij2eositp8vcnfs.apps.googleusercontent.com';
var API_KEY = 'AIzaSyCSZVNgLCxGYW3FWBeE0JRvbytDwv0FvrA';
// Array of API discovery doc URLs for APIs used by the quickstart
var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/tasks/v1/rest", "https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];
// Authorization scopes required by the API; multiple scopes can be
// included, separated by spaces.
var SCOPES = "https://www.googleapis.com/auth/tasks https://www.googleapis.com/auth/calendar.readonly";
var authorizeButton = document.getElementById('authorize_button');
var signoutButton = document.getElementById('signout_button');
/**
 *  On load, called to load the auth2 library and API client library.
 */
function handleClientLoad() {
    gapi.load('client:auth2', initClient);
}

$("#signout_button").on("click", function(e) {
    handleSignoutClick(e);
});
/**
 *  Initializes the API client library and sets up sign-in state
 *  listeners.
 */

function initClient() {
    gapi.client.init({
        apiKey: API_KEY,
        clientId: CLIENT_ID,
        discoveryDocs: DISCOVERY_DOCS,
        scope: SCOPES
    }).then(function() {
        // Listen for sign-in state changes.
        gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);

        // Handle the initial sign-in state.
        updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
        authorizeButton.onclick = handleAuthClick;
        signoutButton.onclick = handleSignoutClick;
    }, function(error) {
        console.log(error)
            //appendPre(JSON.stringify(error, null, 2));
    });
}

/**
 *  Called when the signed in status changes, to update the UI
 *  appropriately. After a sign-in, the API is called.
 */
function updateSigninStatus(isSignedIn) {
    var auth2 = gapi.auth2.getAuthInstance();
    var profile = auth2.currentUser.get().getBasicProfile();
    if (isSignedIn) {
        authorizeButton.style.display = 'none';
        signoutButton.style.display = 'block';
        $("#wrapper").show();
        $(".ocultar").hide();
        capturarDatos(profile.getName(), profile.getEmail(), profile.getImageUrl());

    } else {
        authorizeButton.style.display = 'block';
        signoutButton.style.display = 'none';
    }
}

/**
 *  Sign in the user upon button click.
 */
function handleAuthClick(event) {
    //  gapi.auth2.getAuthInstance().signIn();
    var isSignedIn = gapi.auth2.getAuthInstance().isSignedIn.get();
    if (isSignedIn) {
        // makeApiCall();
    } else {
        gapi.auth2.getAuthInstance().signIn();
    }
}

/**
 *  Sign out the user upon button click.
 */
function handleSignoutClick(event) {
    gapi.auth2.getAuthInstance().signOut();
    document.location.href = "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=https://www.birthday.es/";
    $("#wrapper").hide();
    $("#loggin").show();
}

function capturarDatos(nombre, email, foto) {
    let calendarioIframe = "https://calendar.google.com/calendar/embed?src=" + email + "&ctz=Europe%2FMadrid";
    $("#userName").text(nombre);
    $("#userEmail").text(email);
    $("#imgUser").attr("src", foto);
    $("#calendarioGoogle").attr("src", calendarioIframe);
}


/*****************************/


$("#nuevoBirthday").on("click", function(e) {
    e.preventDefault();

    let date = $("#fecha").val(); //formato AAAA-MM-DD
    let newDate = $("#fecha").val().split("-").reverse().join("/"); //formato DD/MM/AAAA
    let titulo = $("#titulo").val();
    let desc = $("#descripcion").val();
    if (date != "" && newDate != "" && titulo != "" && desc != "") {
        $("#crearCumple").modal('toggle');
        setCalendario(date, newDate, titulo, desc);
    } else {
        alert("Some of values are empty, it is not possible create a new event with empty values.")
    }
});

function setCalendario(fecha, fechaReverse, titulo, desc) {

    let datosCalendario = {
        'summary': titulo,
        'description': desc,
        'start': {
            'dateTime': fecha + 'T12:00:00+02:00',
            'timeZone': 'Europe/Madrid'
        },
        'end': {
            'dateTime': fecha + 'T23:59:00+02:00',
            'timeZone': 'Europe/Madrid'
        },
        'recurrence': [
            'RRULE:FREQ=YEARLY;'
        ],
    }

    //Lanzamos la informacion al Calendario Incidencias
    var dataText = gapi.client.calendar.events.insert({
        'calendarId': 'primary',
        'resource': datosCalendario
    });
    dataText.execute();
    actualizarCalendario()

}

//Funcion encargada de actualizar Google Calendar
function actualizarCalendario() {
    let email = $("#userEmail").text();
    let calendarioIframe = "https://calendar.google.com/calendar/embed?src=" + email + "&ctz=Europe%2FMadrid"

    var data = { update: calendarioIframe };
    $.ajax({
            url: 'ajax.php',
            cache: false,
            type: 'POST',
            data: data
        })
        .done(function(res) {
            $("#iframeCalendar").html(res);
        })
        .fail(function() {
            console.log("error");
        })

}