$("document").ready(function () {

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

//--------------------------

});