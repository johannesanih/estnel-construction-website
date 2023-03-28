$("document").ready(function () {

const ROOT_PATH = 'http://localhost/clients/estnel/admin/';

let pageHeader = $("#page-header"), menuIcon = $("#menu-icon"), estSideMenu = $("#est-sideMenu"), sideMenuCancelButton = $("#sideMenu-cancel-button");

let copyrightFooterDiv = $("#copyright-footer-div");
let d = new Date();
let currentYear = d.getFullYear();
let copyrightString = "<h6>"+currentYear+" &copy; Estnel. All Rights Reserved."+"</h6>";
copyrightFooterDiv.html(copyrightString);

menuIcon.on('click', () => {
    estSideMenu.css({
        'display' : 'block'
    });
    pageHeader.removeClass('sticky-top');
});

sideMenuCancelButton.on('click', () => {
    estSideMenu.css({
        'display' : 'none'
    });
    pageHeader.addClass('sticky-top');
});


let contactSendButton = $("#contact-send-button");
let dialog = $("#dialog"), dialogeMessagePanel = $("#dialog-panel"), dialogCancelButton = $("#dialog-cancel-button");

hideDialog = () => {
    dialogeMessagePanel.html("")
    dialog.css({
        'display' : 'none'
    });
    pageHeader.addClass('sticky-top');
}

showDialog = () => {
    hideDialog();
    dialog.css({
        'display' : 'block'
    });
    estSideMenu.css({
        'display' : 'none'
    });
    pageHeader.removeClass('sticky-top');
}

dialogeMessage = msg => dialogeMessagePanel.html(msg);

createDialog = msg => {
    showDialog();
    dialogeMessage(msg);
}

dialogCancelButton.on('click', hideDialog)

//Contact Form--------------

sendContactMessage = () => {

    let fullname = $("#fullname"), email = $("#email"), phonenumber = $("#phonenumber"), message = $("#message");

    let valid = false;

    if (fullname.val() == '' || fullname.val() == ' ') {
        valid = false;
    } else if(email.val() == '' || email.val() == ' ') {
        valid = false;
    } else if(phonenumber.val() == '' || phonenumber.val() == ' ') {
        valid = false;
    } else if(message.val() == '' || message.val() == ' ') {
        valid = false;
    }

    if (fullname.val() != '' && fullname.val() != ' ') {
        valid = true;
    } else if(email.val() != '' && email.val() != ' ') {
        valid = true;
    } else if(phonenumber.val() != '' && phonenumber.val() != ' ') {
        valid = true;
    } else if(message.val() != '' && message.val() != ' ') {
        valid = true;
    }

    if (valid == false) {

        let dMsg = "<span class='d-block text-center display-6 bold text-warning'>Error: Fill the contact form properly</span>";
        //console.log('i');
        createDialog(dMsg);
        //console.log('v');

    } else if (valid == true) {

        let dMsg = "<span class='d-block text-center display-6'><span class='d-block text-center spinner-border text-white'></span><span class='d-block bold text-white'>Processing</span>";
        createDialog(dMsg);

        //AJAX TO SEND MESSAGE

        let dest = "ajax/message_sender.php";
        let params = {
            'fullname' : fullname.val(),
            'email' : email.val(),
            'phonenumber' : phonenumber.val(),
            'message' : message.val()
        }

        callbackProcess = data => {
            eval('responseData = '+data);
            console.log(data)
            console.log(responseData)
            if (responseData.status == '01') {
                let dMsg = "<span class='d-block text-center display-6 bold text-warning'>"+responseData.message+"</span>";
                createDialog(dMsg);
            } else if (responseData.status == '00') {
                let dMsg = "<span class='d-block text-center display-6 bold text-white'>"+responseData.message+"</span>"
                createDialog(dMsg);
            }
        }

        $.post(dest, params, callbackProcess);

        //--------------------

    }

}

contactSendButton.on('click', sendContactMessage);

//======================================================================================//
//--------------------------Admin-------------------------------------------------------//
//======================================================================================//

let adSignUpBtn = $("#signupBtn"), adSignInBtn = $("#signinBtn"), adLogOutBtn = $("#logoutBtn"), adnLogOutBtn = $("#nlogoutBtn");

adSignIn = () => {

    let email = $("#email-inp").val(), password = $("#password-inp").val();
    let errorExist = false;

    let errorMsg = '<ol class="display-6 text-warning">';
    if(email.length == 0 || email == ' ') {
        errorMsg += '<li>Email Missing</li>';
        errorExist = true;
    }
    if(password.length == 0 || password == ' ') {
        errorMsg += '<li>Password Missing</li>';
        errorExist = true;
    }
    errorMsg += '</ol>';

    if (email.length > 0 && email != ' ') {
        var emailVal = email;
        if (password.length > 0 && password != ' ') {
            var passwordVal = password;
            errorExist = false
        }
    }

    if(errorExist) {
        createDialog(errorMsg)
        return
    } else {

        let dMsg = "<span class='d-block text-center display-6'><span class='d-block bold text-white'>Signing In</span><span class='text-center spinner-border text-white'></span>";
        createDialog(dMsg);

        let dest = 'ajax/signin.php';
        let params = {
            'email' : emailVal,
            'password' : passwordVal
        }

        callbackProcess = data => {
            eval('responseData = '+data);
            console.log(data);
            console.log(responseData)
            if (responseData.status == '01') {
                let dMsg = "<span class='d-block text-center display-6 bold text-warning'>"+responseData.message+"</span>";
                createDialog(dMsg);
            } else if (responseData.status == '00') {
                let dMsg = "<span class='d-block text-center display-6 bold text-white'>"+responseData.message+"</span>"
                createDialog(dMsg);

                setTimeout(() => {
                    window.location.href = ROOT_PATH+'index.php';
                }, 500);

            }
        }

        $.post(dest, params, callbackProcess);
    }
}

adSignUp = () => {

    let fullname = $("#fullname-inp").val(), email = $("#email-inp").val(), password = $("#password-inp").val(), c_password = $("#c_password-inp").val();
    let errorExist = false;

    let errorMsg = '<ol class="display-6 text-warning">';
    if(fullname.length == 0 || fullname == ' ') {
        errorMsg += '<li>Fullname Missing</li>';
        errorExist = true;
    }
    if(email.length == 0 || email == ' ') {
        errorMsg += '<li>Email Missing</li>';
        errorExist = true;
    }
    if(password.length == 0 || password == ' ') {
        errorMsg += '<li>Password Missing</li>';
        errorExist = true;
    }
    if(c_password.length == 0 || c_password == ' ') {
        errorMsg += '<li>Please Confirm Password</li>';
        errorExist = true;
    }
    if(c_password.length > 0 && c_password == password) {
        errorMsg += '<li>Passwords Are Not The Same, Confirm passwords Properly</li>';
        errorExist = true;
    }
    errorMsg += '</ol>';

    if(fullname.length > 0 && fullname != ' ') {
        var fullnameVal = fullname;
        if (email.length > 0 && email != ' ') {
            var emailVal = email;
            if (password.length > 0 && password != ' ') {
                var passwordVal = password;
                if (c_password.length > 0 && c_password != ' ') {
                    if (c_password == password) {
                        var c_passwordVal = c_password;
                        errorExist = false;
                    }
                }
            }
        }
    }

    if(errorExist) {
        createDialog(errorMsg)
        return
    } else {

        let dMsg = "<span class='d-block text-center display-6'><span class='d-block bold text-white'>Signing Up</span><span class='text-center spinner-border text-white'></span>";
        createDialog(dMsg);

        let dest = 'ajax/signup.php';
        let params = {
            'fullname' : fullnameVal,
            'email' : emailVal,
            'password' : passwordVal,
            'c_password' : c_passwordVal
        }

        callbackProcess = data => {
            eval('responseData = '+data);
            console.log(data);
            console.log(responseData)
            if (responseData.status == '01') {
                let dMsg = "<span class='d-block text-center display-6 bold text-warning'>"+responseData.message+"</span>";
                createDialog(dMsg);
            } else if (responseData.status == '00') {
                let dMsg = "<span class='d-block text-center display-6 bold text-white'>"+responseData.message+"</span>"
                createDialog(dMsg);

                setTimeout(() => {
                    window.location.href = ROOT_PATH+'signin.php';
                }, 500);

            }
        }

        $.post(dest, params, callbackProcess);
    }
}

adLogOut = () => {
    let msg = "<span class='d-block text-center display-6 bold text-warning'>Are you sure you want to logout?</span>";
    msg += "<span class='p-3 d-block text-center'><a href='logout.php' class='m-1 btn btn-lg btn-danger'>Yes</a><a href='javascript:void(0)' class='m-1 btn btn-lg btn-success' onclick='hideDialog()'>No</span></span>";
    createDialog(msg)
}

adLogOutBtn.on('click', adLogOut);
adnLogOutBtn.on('click', adLogOut);
adSignInBtn.on('click', adSignIn);
adSignUpBtn.on('click', adSignUp);

});