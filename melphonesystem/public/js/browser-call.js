/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 36);
/******/ })
/************************************************************************/
/******/ ({

/***/ 36:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(37);


/***/ }),

/***/ 37:
/***/ (function(module, exports) {

/**
 * Twilio Client configuration for the browser-calls-django
 * example application.
 */

// Store some selectors for elements we'll reuse
var callStatus = $("#call-status");
var answerButton = $(".answer-button");
// var callSupportButton = $(".call-support-button");
var hangUpButton = $(".hangup-button");
var callCustomerButtons = $(".call-customer-button");

/* Helper function to update the call status bar */
function updateCallStatus(status) {
    callStatus.text(status);
}

/* Get a Twilio Client token with an AJAX request */
(function () {

    $('.call-customer-button').on('click', function () {
        callCustomer($("#number").val());
    });

    var datas = { forPage: window.location.pathname };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: "token",
        data: datas,
        dataType: 'json',
        beforeSend: function beforeSend(xhr) {
            xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
        }
    }).done(function (data) {
        console.log(data);
        Twilio.Device.setup(data);
    });

    //     '/token', {forPage: window.location.pathname}, function(data) {
    //     // Set up the Twilio Client Device with the token
    //     console.log(data.token);
    //     Twilio.Device.setup(data.token);
    // });

    /* Callback to let us know Twilio Client is ready */
    Twilio.Device.ready(function (device) {
        updateCallStatus("Ready");
    });

    /* Report any errors to the call status display */
    Twilio.Device.error(function (error) {
        updateCallStatus("ERROR: " + error.message);
    });

    /* Callback to determine if "support_agent" is available or not */
    Twilio.Device.presence(function (presenceEvent) {
        if (presenceEvent.from === 'support_agent') {
            if (presenceEvent.available) {
                $("#support-unavailable").hide();
            } else {
                $("#support-unavailable").show();
            }
        }
    });

    /* Callback for when Twilio Client initiates a new connection */
    Twilio.Device.connect(function (connection) {
        // Enable the hang up button and disable the call buttons
        hangUpButton.prop("disabled", false);
        callCustomerButtons.prop("disabled", true);
        //        callSupportButton.prop("disabled", true);
        answerButton.prop("disabled", true);

        // If phoneNumber is part of the connection, this is a call from a
        // support agent to a customer's phone
        if ("phoneNumber" in connection.message) {
            updateCallStatus("In call with " + connection.message.phoneNumber);
        } else {
            // This is a call from a website user to a support agent
            updateCallStatus("In call with support");
        }
    });

    /* Callback for when a call ends */
    Twilio.Device.disconnect(function (connection) {
        // Disable the hangup button and enable the call buttons
        hangUpButton.prop("disabled", true);
        callCustomerButtons.prop("disabled", false);
        //        callSupportButton.prop("disabled", false);

        updateCallStatus("Ready");
    });

    /* Callback for when Twilio Client receives a new incoming call */
    Twilio.Device.incoming(function (connection) {
        updateCallStatus("Incoming support call");

        // Set a callback to be executed when the connection is accepted
        connection.accept(function () {
            updateCallStatus("In call with customer");
        });

        // Set a callback on the answer button and enable it
        answerButton.click(function () {
            connection.accept();
        });
        answerButton.prop("disabled", false);
    });

    /* Call a customer from a support ticket */
    function callCustomer(phoneNumber) {
        updateCallStatus("Calling " + phoneNumber + "...");

        var params = { "phoneNumber": phoneNumber };
        Twilio.Device.connect(params);
    }

    /* Call the support_agent from the home page */
    function callSupport() {
        updateCallStatus("Calling support...");

        // Our backend will assume that no params means a call to support_agent
        Twilio.Device.connect();
    }

    /* End a call */
    function hangUp() {
        Twilio.Device.disconnectAll();
    }
})();

/***/ })

/******/ });